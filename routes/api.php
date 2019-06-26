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

Route::post('/integrate', 'UsersController@integrate');

Route::post('/access_request', 'API\AccessPermissionRequest@accessRequest');

Route::post('/emergency_access_log', "API\AccessPermissionRequest@emergencyAccessLog");

Route::get('/access_permission_request', 'API\AccessPermissionRequest@check');
