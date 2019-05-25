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
