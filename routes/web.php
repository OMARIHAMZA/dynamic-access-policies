<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect("/login");
});

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');

//Users

Route::get('/users', 'UsersController@index')->name('users.index');

Route::get('/users/delete/{user_id}', 'UsersController@destroy')->name('users.destroy');

Route::get('/users/create', 'UsersController@create')->name('users.create');

Route::post('/users', 'UsersController@store')->name('users.store');

Route::get('/users/{user_id}', 'UsersController@showUserInfo')->name('user.show');

Route::post('/users/update', 'UsersController@update')->name('users.update');

//Roles

Route::get('/roles', 'RoleController@index');

Route::post('/roles', 'RoleController@store');

Route::get('/roles/create', 'RoleController@create');

Route::get('/roles/{id}/edit', 'RoleController@edit');

Route::post('/roles/{id}', 'RoleController@update');

Route::get('/roles/{id}/delete', 'RoleController@destroy');


//Policies
Route::get('/policies', ["uses" => "PolicyController@index", "middleware" => "authorized"])->name('policies.show');

Route::get('/policies/delete/{policy_id}', 'PolicyController@destroy')->name('policies.destroy');

Route::get('/policies/create', 'PolicyController@create')->name('policies.create');

Route::post('/policies', 'PolicyController@store')->name('policies.store');

Route::get('/policies/show/{policy_id}', 'PolicyController@showPolicyInfo');

Route::get('/policies/edit/{policy_id}', 'PolicyController@editPolicyInfo');

Route::post('/policies/{policy_id}/update', 'PolicyController@update')->name('policies.update');

//Permissions
Route::get('/permissions', 'PermissionController@index');
Route::post('/permissions', 'PermissionController@store');
Route::get('/permissions/create', 'PermissionController@create');
Route::get('/permissions/{id}', 'PermissionController@show');
Route::get('/permissions/{id}/edit', 'PermissionController@edit');
Route::post('/permissions/{id}', 'PermissionController@update');
Route::get('/permissions/{id}/delete', 'PermissionController@destroy');

//Rules
Route::get('/rules', 'RuleController@index');

Route::get('/alerts', function () {
    $data = session()->get('alerts');
    session()->remove('alerts');
    return $data;
});

Route::post('/users/integrate', 'UsersController@cmsIntegration');

//Permission Denied
Route::get('/access_denied', 'api\AccessPermissionRequest@permissionDenied')->name('access_denied');

//Access Requests History
Route::get('/history', 'AccessRequestsHistoryController@index');
