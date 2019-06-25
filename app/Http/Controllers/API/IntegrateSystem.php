<?php

namespace App\Http\Controllers\API;

use App\ExternalRole;
use App\ExternalTable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IntegrateSystem extends Controller
{
    public function integrate(Request $request)
    {
        if (!isset($request['token'])) {
            return response()
                ->json([
                    "status" => "ERROR",
                    "cause" => "Token is required"
                ]);
        }

        // token => tw7vdE4e6xKXtR2
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

        $tables = $data->tables;
        foreach ($tables as $table) {
            ExternalTable::create([
                'name' => $table,
                'creator_id' => $user->id
            ]);
        }

        $roles = $data->roles;
        foreach ($roles as $role) {
            ExternalRole::create([
                'name' => $role,
                'description' => '',
                'creator_id' => $user->id
            ]);
        }

        return response()->json([
            'status' => 'done',
            'message' => 'system integrated successfully!'
        ]);
    }
}
