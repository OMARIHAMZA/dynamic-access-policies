<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/access_permission_request', function (Request $request) {
    if (!isset($request['token'])) {
        return response()
            ->json([
                "status" => "ERROR",
                "cause" => "Token is required"
            ]);
    }

    //$user = \App\User::where('token', $request['token'])->first();
//    $user = \App\User::first();

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

//    return response()
//        ->json(["status" => "OK",
//            "permission" => "GRANTED"]);

    return "GRANTED";
});
