<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\User;
// use Illuminate\Support\Facades\Hash;
// use Validator;
use Illuminate\Support\Facades\DB;
use App\Absent;

class AbsentController extends Controller
{
    // Get My absent
    public function getAbsent(INT $id = null, Request $request) {
        if ($id == null) {
            $absent = Absent::all();
            return response()->json($absent, 200);
        } else {
            if ($request->date == null) {
                $absent = Absent::where('users_id', $id)
                    ->join('users', 'absents.users_id', '=', 'users.id')
                    ->select('users.name', 'users.photo', 'absents.*')    
                    ->get();
            } else {
                $this->validate($request, [
                    'date'     => 'required|string|max:191'
                ]);
                 $absent = Absent::where('users_id', $id)
                    ->where('date','LIKE', "%$request->date%")
                    ->join('users', 'absents.users_id', '=', 'users.id')
                    ->select('users.name', 'users.photo', 'absents.*')
                    ->get();
            }

            if (!$absent) {
                return response()->json([
                    'error' => 'Absent not found'
                ], 400);
            } else {
                return response()->json($absent, 200);
            }
        }
    }

    // Admin get absent
    public function getAbsentAdmin(INT $id = null, Request $request)
    {
        if ($id == null) {
            $absent = Absent::all();
            return response()->json($absent, 200);
        } else {
            if ($request->date == null) {
                $absent = Absent::where('absents.branch_id', $id)
                    ->join('users', 'absents.users_id', '=', 'users.id')
                    ->select('users.name', 'users.username', 'users.branch', 'users.photo', 'absents.*')
                    ->get();
            } else {
                $this->validate($request, [
                    'date'     => 'required|string|max:191'
                ]);
                $absent = Absent::where('absents.branch_id', $id)
                    ->where('date', 'LIKE', "%$request->date%")
                    ->join('users', 'absents.users_id', '=', 'users.id')
                    ->select('users.name', 'users.username', 'users.branch', 'users.photo', 'absents.*')
                    ->get();
            }

            if (!$absent) {
                return response()->json([
                    'error' => 'Absent not found'
                ], 400);
            } else {
                return response()->json($absent, 200);
            }
        }
    }

    // Add Absent
    public function absent(Request $request,INT $id) {
        $this->validate($request, [
            'longitude'     => 'required|string|max:191|min:4',
            'latitude' => 'required|string|max:191|min:4',
            'location'    => 'required|string|max:191|min:5'
        ]);

        // check absent today
        $check_absent = Absent::where('users_id', $id)->where('date', date('d/m/Y'))->first();
        
        if (!$check_absent) {
            $absent = Absent::create([
                'id'         => null,
                'users_id'    => $id,
                'longitude'  => $request->longitude,
                'latitude'   => $request->latitude,
                'location'   => $request->location,
                'time_entry' => date("H:i:s"),
                'time_out'   => date("H:i:s"),
                'date'       => date('d/m/Y')
            ]);
    
            return response()->json($absent, 200);
        } else {
            return response()->json([
                'error' => 'Already absent for today'
            ], 400);
        }
    }

    public function getAbsentDetail(INT $user_id,INT $id = null) {
        if ($id == null && $user_id == null) {
            return response()->json([
                'error' => 'User ID & Absent Id cannot NULL'
            ], 400);
        } else {
            $users = Absent::where('users_id', $user_id)
                ->where('absents.id',$id)
                ->join('users', 'absents.users_id', '=', 'users.id')
                ->select('users.name', 'users.photo', 'users.email', 'users.id', 'absents.*')
                ->first();
            if (!$users) {
                return response()->json([
                    'error' => 'Absent does not exist'
                ], 400);
            } else {
                return response()->json($users, 200);
            }
        }
    }

}