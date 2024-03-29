<?php

namespace App\Http\Controllers\API;

use App\ExternalRole;
use App\ExternalTable;
use App\Policy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

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

        if ($user->roleTitle() != 'user') { // user role must be 'User'
            return response()
                ->json([
                    "status" => "ERROR",
                    "cause" => "You are n't allowed to use this system function."
                ]);
        }

        $data = json_decode($request['data'], true);

        foreach ($data as $table) {

            $table_id = -1;

            foreach ($table as $key => $value) {

                if ($key == "name") {

                    $name = $table["name"];
                    $table_id = ExternalTable::create([
                        'creator_id' => $user->id,
                        'name' => $name
                    ])->table_id;

                } else if ($key == 'policy') {

                    $policy = $table["policy"];
                    Policy::create([
                        'creator_id' => $user->id,
                        'data_element' => $table_id,
                        'name' => $policy["name"],
                        'rules' => json_encode($policy["rules"]),
                        'emergency_rules' => json_encode($policy["emergency_rules"])
                    ]);
                }

            }
        }

        return response()->json([
            'status' => 'done',
            'message' => 'system integrated successfully!'
        ]);
    }
}
