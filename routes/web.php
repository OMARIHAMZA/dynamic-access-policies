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

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect("/login");
});

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');

//Users
Route::get('/users', 'UsersController@index')->name('users.index');

Route::post('/users', 'UsersController@store')->name('users.store');

Route::post('/users/integrate', 'UsersController@cmsIntegration');

Route::get('/users/create', 'UsersController@create')->name('users.create');

Route::get('/users/{user_id}', 'UsersController@showUserInfo')->name('user.show');

Route::get('/users/{user_id}/delete/', 'UsersController@destroy')->name('users.destroy');

Route::post('/users/{user_id}/update', 'UsersController@update')->name('users.update');


//Roles

Route::get('/roles', 'RoleController@index');

Route::post('/roles', 'RoleController@store');

Route::get('/roles/create', 'RoleController@create');

Route::get('/roles/{id}/edit', 'RoleController@edit');

Route::post('/roles/{id}', 'RoleController@update');

Route::get('/roles/{id}/delete', 'RoleController@destroy');


//Policies
Route::get('/policies', ["uses" => "PolicyController@index", "middleware" => "authorized"])->name('policies.index');

Route::post('/policies', 'PolicyController@store');

Route::get('/policies/create', 'PolicyController@create');

Route::get('/policies/{id}', 'PolicyController@show');

Route::get('/policies/{id}/edit', 'PolicyController@edit');

Route::post('/policies/{id}/update', 'PolicyController@update');

Route::get('/policies/{id}/delete', 'PolicyController@destroy');

//Permissions
Route::get('/permissions', 'PermissionController@index');

Route::post('/permissions', 'PermissionController@store');

Route::get('/permissions/create', 'PermissionController@create');

Route::get('/permissions/{id}', 'PermissionController@show');

Route::get('/permissions/{id}/edit', 'PermissionController@edit');

Route::post('/permissions/{id}', 'PermissionController@update');

Route::get('/permissions/{id}/delete', 'PermissionController@destroy');

//External Tables
Route::get('/data_elements', 'ExternalTableController@index');

Route::post('/data_elements', 'ExternalTableController@store');

Route::get('/data_elements/create', 'ExternalTableController@create');

Route::get('/data_elements/{id}', 'ExternalTableController@show');

Route::get('/data_elements/{id}/edit', 'ExternalTableController@edit');

Route::post('/data_elements/{id}', 'ExternalTableController@update');

Route::get('/data_elements/{id}/delete', 'ExternalTableController@destroy');

//Rules
Route::get('/rules', 'RuleController@index');

Route::get('/alerts', function () {
    $data = session()->get('alerts');
    session()->remove('alerts');
    return $data;
});

//Permission Denied
Route::get('/access_denied', 'api\AccessPermissionRequest@permissionDenied')->name('access_denied');

//Access Requests History
Route::get('/history', 'AccessRequestsHistoryController@index');

//Templates makes
Route::get('/templates/{name}', 'TemplatesController@index');

