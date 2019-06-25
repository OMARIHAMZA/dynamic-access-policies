<?php

namespace App\Http\Controllers\API;

use App\ExternalRole;
use App\ExternalTable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccessPermissionRequest extends Controller
{
    
    public function rekt(Request $request){
        dd($request);
    }
    public function check(Request $request)
    {
        if (!isset($request['token'])) {
            return response()
                ->json([
                    "status" => "ERROR",
                    "cause" => "Token is required"
                ]);
        }

        $user = \App\User::where('token', $request['token'])->first();

        if (!$user) {
            return response()
                ->json([
                    "status" => "ERROR",
                    "cause" => "Invalid user token."
                ]);
        }

        if ($user->roleTitle() != "user") { // user role must be 'User'
            return response()
                ->json([
                    "status" => "ERROR",
                    "cause" => "You are n't allowed to use this system function."
                ]);
        }

        $data = json_decode($request['data']);

        $role_name = $data->role;
        if (ExternalRole::where('name', $role_name) == null) {
            return response()
                ->json([
                    "status" => "OK",
                    "permission" => "ACCESS DENIED"
                ]);
        }

        $ts = array_unique($data->tables);
        $tables = ExternalTable::whereIn('name', $ts)->get();
        if (count($tables) != count($ts)) {
            return response()
                ->json([
                    "status" => "OK",
                    "permission" => "ACCESS DENIED"
                ]);
        }

        return response()
            ->json(["status" => "OK",
                "permission" => "GRANTED"]);
    }
}
