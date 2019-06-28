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

Route::middleware('auth:api')->get('/user', 'UsersController@getUser');

Route::post('/integrate', 'API\IntegrateSystem@integrate');

Route::get('/access_request', 'API\AccessPermissionRequest@accessRequest');

Route::get('/requests/history', "API\AccessPermissionRequest@history");
Route::post('/requests/{id}/OK', "API\AccessPermissionRequest@okay");

//Route::get('/access_permission_request', 'API\AccessPermissionRequest@check');
