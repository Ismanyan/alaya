<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Treatment;
use App\History;

class TreatmentController extends Controller
{
    // Get all treatment
    public function getAll($id)
    {
        $treatments = Treatment::where('branch_id',$id)->get();
        return response()->json($treatments, 200);
    }
    

    // Get Detail treatment
    public function detail(INT $id) {
        $treatment = Treatment::where('id', $id)->first();

        if ($treatment) {
            return response()->json($treatment, 200);
        } else {
            return response()->json([
                'error' => 'Treatment not found'
            ], 400);
        }
    }

    // Add new Treatment
    public function add(Request $request)
    {
        $treatment = Treatment::create([
            'id'         => null,
            'name'  => $request->longitude,
            'desc'   => $request->latitude,
            'price'   => $request->location,
            'photo' => 'profile.jpg',
            'branch_id' => $request->branch_id,
            'date'       => date('d/m/Y')
        ]);

        if ($treatment) {
            return response()->json($treatment, 200);
        } else {
            return response()->json([
                'error' => 'Treatment not found'
            ], 400);
        }
    }

    public function getTreatmentAdmin(INT $id = null, Request $request)
    {

        if ($request->date == null) {
            $treatment = History::where('history.branches_id', $id)
                ->join('users', 'history.users_id', '=', 'users.id')
                ->join('treatments', 'history.treatment_id', '=', 'treatments.id')
                ->select('users.name', 'history.*', 'treatments.*', 'history.id', 'users.name AS title')
                ->get();
        } else {
            $this->validate($request, [
                'date'     => 'required|string|max:191'
            ]);
            $treatment = History::where('history.branches_id', $id)
                ->where('history.date', 'LIKE', "%$request->date%")
                ->join('users', 'history.users_id', '=', 'users.id')
                ->join('treatments', 'history.treatment_id', '=', 'treatments.id')
                ->select('users.name', 'history.*', 'treatments.*', 'history.id', 'users.name AS title')
                ->get();
        }

        if (!$treatment) {
            return response()->json([
                'error' => 'Absent not found'
            ], 400);
        } else {
            return response()->json($treatment, 200);
        }
    }

    public function getDetailTreatmentAdmin(INT $id = null)
    {
        $treatment = History::where('history.id', $id)
            ->join('users', 'history.users_id', '=', 'users.id')
            ->join('treatments', 'history.treatment_id', '=', 'treatments.id')
            ->select('users.name', 'history.*', 'treatments.*', 'history.id', 'users.name AS title')
            ->first();
        if ($treatment) {
            return response()->json($treatment, 200);
        } else {
            return response()->json('Treatment not found', 400);
        }
    }
}