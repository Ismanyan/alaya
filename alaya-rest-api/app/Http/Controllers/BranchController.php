<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Branch;

class BranchController extends Controller
{
    public function all()
    {
        return Branch::all();
    }

    public function detail(INT $id = null)
    {
        $branch = Branch::find($id);
        return response()->json($branch, 200);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name'     => 'required|string',
            'address' => 'required|string',
            'phone'    => 'required|numeric',
            'maps' => 'required|string',
            'start'  => 'required|string|max:191|min:1',
            'end' => 'required|string|max:191|min:1'
        ]);

        $branch = Branch::create([
            'id' => null,
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'start' => $request->start,
            'end' => $request->end,
            'lat' => $request->lat,
            'long' => $request->long
        ]);

        return response()->json($branch, 200);
    }

    public function delete(INT $id = null)
    {
        $branch = Branch::find($id);

        if (!$branch) {
            return response()->json([
                'error' => 'Branch does not exist'
            ], 400);
        } else {
            $branch->delete();
            return response()->json($branch, 200);
        }
    }

    public function edit(INT $id = null, Request $request)
    {
        $branch = Branch::find($id);

        if (!$branch) {
            return response()->json([
                'error' => 'Branch does not exist'
            ], 400);
        } else {

            $this->validate($request, [
                'name'     => 'required|string',
                'address' => 'required|string',
                'phone'    => 'required|numeric',
                'maps' => 'required|string',
                'start'  => 'required|string|max:191|min:1',
                'end' => 'required|string|max:191|min:1'
            ]);

            $branch->name = $request->input('name');
            $branch->address = $request->input('address');
            $branch->phone = $request->input('phone');
            $branch->maps = $request->input('maps');
            $branch->start = $request->input('start');
            $branch->end = $request->input('end');
            $branch->lat = $request->input('lat');
            $branch->long = $request->input('long');
            $branch->save();

            return response()->json($branch, 200);
        }
    }


}