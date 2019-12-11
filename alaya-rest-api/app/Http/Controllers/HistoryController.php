<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\History;

class HistoryController extends Controller
{
    // Add History treatment
    public function addHistory(Request $request)
    {
        $this->validate($request, [
            'users_id'     => 'required|string|max:50',
            'treatment_id' => 'required|string|max:50',
            'date'         => 'required|string|max:50',
            'time_entry'   => 'required|string|max:50',
            'time_out'     => 'required|string|max:50',
            'duration'     => 'required|string|max:50'
        ]);

        $history = History::create([
            'id' => null,
            'users_id' => $request->users_id,
            'treatment_id' => $request->treatment_id,
            'date' => $request->date,
            'time_entry' => $request->time_entry,
            'time_out' => $request->time_out,
            'duration' => $request->duration
        ]);

        return response()->json($history, 200);
    }

    // Get all user history treatment
    public function history(INT $user_id = null, INT $id = null, Request $request)
    {
        if ($user_id == null ) {
            $History = History::all();
            return response()->json($History, 200);
        } else {
            if ($id != null) {
                if ($request->date == null) {
                    $History = History::where('history.id', $id)
                        ->where('users_id',$user_id)   
                        ->join('users', 'history.users_id', '=', 'users.id')
                        ->join('treatments', 'history.treatment_id', '=', 'treatments.id')
                        ->select('users.name', 'history.*', 'treatments.*','history.id', 'users.name AS title')
                        ->first();
                } else {
                    $this->validate($request, [
                        'date'     => 'required|string|max:191'
                    ]);
                    $History = History::where('history.id', $id)
                        ->where('users_id', $user_id)
                        ->where('date', 'LIKE', "%$request->date%")
                        ->join('users', 'history.users_id', '=', 'users.id')
                        ->join('treatments', 'history.treatment_id', '=', 'treatments.id')
                        ->select('users.name', 'history.*', 'treatments.*', 'history.id')
                        ->first();
                }
            } else {
                if ($request->date == null) {
                    $History = History::where('users_id', $user_id)
                        ->join('users', 'history.users_id', '=', 'users.id')
                        ->join('treatments', 'history.treatment_id', '=', 'treatments.id')
                        ->select('users.name', 'history.*', 'treatments.*', 'history.id')
                        ->get();
                } else {
                    $this->validate($request, [
                        'date'     => 'required|string|max:191'
                    ]);
                    $History = History::where('users_id', $user_id)
                        ->where('date', 'LIKE', "%$request->date%")
                        ->join('users', 'history.users_id', '=', 'users.id')
                        ->join('treatments', 'history.treatment_id', '=', 'treatments.id')
                        ->select('users.name', 'history.*', 'treatments.*', 'history.id')
                        ->get();
                }
            }

            if (!$History) {
                return response()->json([
                    'error' => 'History not found'
                ], 400);
            } else {
                return response()->json($History, 200);
            }
        }

    }

    public function getHistoryAdmin(INT $id = null, Request $request)
    {
        $History = History::where('history.branches_id', $id)
            ->join('users', 'history.users_id', '=', 'users.id')
            ->join('treatments', 'history.treatment_id', '=', 'treatments.id')
            ->select('history.*','treatments.*','users.name', 'treatments.name AS title')
            ->get();

            // if ($request->date == null) {
            // } else {
            //     $this->validate($request, [
            //         'date'     => 'required|string|max:191'
            //     ]);
            //     $History = History::where('branch_id', $branch)
            //         ->where('date', 'LIKE', "%$request->date%")
            //         ->join('users', 'history.users_id', '=', 'users.id')
            //         ->join('treatments', 'history.users_id', '=', 'treatments.id')
            //         ->select('users.name', 'history.*', 'treatments.*', 'history.id')
            //         ->get();
            // }
 
            if (!$History) {
                return response()->json([
                    'error' => 'History not found'
                ], 400);
            } else {
                return response()->json($History, 200);
            }

    }
}