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

Route::get('/roles', 'RoleController@listRoles')->name('roles.show');

Route::get('/roles/delete/{role_id}', 'RoleController@destroy')->name('role.destroy');

Route::get('/roles/create', 'RoleController@create')->name('role.create');

Route::post('/roles', 'RoleController@store')->name('role.save');

Route::get('/roles/{role_id}', 'RoleController@showRoleInfo')->name('role.info');

Route::post('/roles/update', 'RoleController@update')->name('role.update');

// Purposes
Route::get('/purposes', 'PurposeController@index');
Route::post('/purposes', 'PurposeController@store');
Route::get('/purposes/create', 'PurposeController@create');
Route::get('/purposes/{id}', 'PurposeController@show');
Route::get('/purposes/{id}/edit', 'PurposeController@edit');
Route::post('/purposes/{id}', 'PurposeController@update');
Route::get('/purposes/{id}/delete', 'PurposeController@destroy');

//Policies
Route::get('/policies', ["uses" => "PolicyController@listPolicies", "middleware" => "authorized"])->name('policies.show');
Route::get('/policies/delete/{policy_id}', 'PolicyController@destroy')->name('policies.destroy');
Route::get('/policies/create', 'PolicyController@create')->name('policies.create');
Route::post('/policies', 'PolicyController@store')->name('policies.store');
Route::get('/policies/{policy_id}', 'PolicyController@showPolicyInfo')->name('policies.info');
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



