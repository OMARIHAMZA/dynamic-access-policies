<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccessPermissionRequest extends Controller
{
    public function check(Request $request)
    {
        if (!isset($request['token'])) {
            return response()
                ->json([
                    "status" => "ERROR",
                    "cause" => "Token is required"
                ]);
        }
//
//    //token => tw7vdE4e6xKXtR2
//    $user = \App\User::where('token', $request['token'])->first();
//
//    if (!$user) {
//        return [
//            "status" => "ERROR",
//            "cause" => "Invalid token."
//        ];
//    }

        $data = $request['data'];

//    foreach ($data as $el) {
//        echo $el;
////        if (false) {
////            return [
////                "status" => "OK",
////                "permission" => "ACCESS DENIED"
////            ];
////        }
//    }

        return response()
            ->json(["status" => "OK",
                "permission" => "GRANTED",
                "data" => $data]);
    }
}
