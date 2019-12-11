<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\User;
// use Illuminate\Support\Facades\Hash;
// use Validator;
use Illuminate\Support\Facades\DB;
use App\Branch;

class BranchController extends Controller
{
    public function all()
    {
        return Branch::all();
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
            'end' => $request->end
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
        $users = User::find($id);

        if (!$users) {
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

            $users->name = $request->input('name');
            $users->address = $request->input('address');
            $users->phone = $request->input('phone');
            $users->maps = $request->input('maps');
            $users->start = $request->input('start');
            $users->end = $request->input('end');
            $users->save();

            return response()->json($users, 200);
        }
    }


}