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

Route::get('/home', 'HomeController@index')->name('home');


//Users

Route::get('/users', 'HomeController@display_all_users')->name('users.show');

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

//Purposes

Route::get('/purposes', 'PurposeController@listPurposes')->name('purposes.show');

Route::get('/purposes/delete/{role_id}', 'PurposeController@destroy')->name('purposes.destroy');

Route::get('/purposes/create', 'PurposeController@create')->name('purposes.create');

Route::post('/purposes', 'PurposeController@store')->name('purposes.store');

Route::get('/purposes/{purpose_id}', 'PurposeController@showPurposeInfo')->name('purpose.info');

Route::post('/purposes/update', 'PurposeController@update')->name('purpose.update');

//Policies

Route::get('/policies', 'PolicyController@listPolicies')->name('policies.show');

Route::get('/policies/delete/{policy_id}', 'PolicyController@destroy')->name('policies.destroy');

Route::get('/policies/create', 'PolicyController@create')->name('policies.create');

Route::post('/policies', 'PolicyController@store')->name('policies.store');

Route::get('/policies/{policy_id}', 'PolicyController@showPolicyInfo')->name('policies.info');

Route::post('/policies/update', 'PolicyController@update')->name('policies.update');



