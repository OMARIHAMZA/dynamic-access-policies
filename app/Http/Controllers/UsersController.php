<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $roles = Role::all();

        return view('/users/create', [
            'roles' => $roles
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([

            'name' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'role_id' => 'required|numeric'

        ]);


        $user = new User();

        $user->name = $request->request->get('name');
        $user->email = $request->request->get('email');
        $user->password = Hash::make($request->request->get('password'));
        $user->role_id = $request->request->get('role_id');

        $user->save();


        return redirect('/users');

    }

    public function showUserInfo($id)
    {

        $roles = Role::all();

        $user = User::find($id);

        return view('/users/update', [
            'roles' => $roles,
            'user' => $user
        ]);

    }

    public function update(Request $request)
    {

        $request->validate([

            'name' => 'unique:users,name,' . $request->request->get('id'),
            'email' => 'email|unique:users,email,' . $request->request->get('id'),

        ]);

        $user = User::find($request->request->get('id'));

        $user->name = $request->request->get('name');

        $user->email = $request->request->get('email');

        $user->password = Hash::make($request->request->get('password'));

        $user->role_id = $request->request->get('role_id');


        $user->save();

        return redirect('/users');

    }

    public function destroy($id)
    {
        $logged_user = Auth::user();

        //Check if the logged user is an Admin
        $is_admin = $logged_user->role_id == 1;

        if ($logged_user && $is_admin) {

            $user = User::find($id);
            $user->delete();

        } else {
            if (!$is_admin) {
                return Redirect::action('HomeController@display_all_users')->withErrors(['You don\'t have required permissions']);
            }
        }

        return redirect('/users');

    }


}
