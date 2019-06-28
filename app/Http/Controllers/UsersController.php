<?php

namespace App\Http\Controllers;

use App\ExternalRole;
use App\ExternalTable;
use App\Role;
use App\User;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getUser()
    {

    }

    public function index()
    {
        $users = User::all();
        return view('users/users', [
            "users" => $users
        ]);
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
            'password' => 'required|min:8',
            'role_id' => 'required|numeric'
        ]);

        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'role_id' => $request['role_id']
        ]);

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

    public function cmsIntegration(Request $request)
    {

        $request->validate([

            'tables' => 'required|min:1',
            'roles' => 'required|min:1'

        ]);

        $user_id = Auth()->user()->id;

        foreach (explode(',', $request->get('tables')) as $table) {
            $external_table = new ExternalTable([
                'creator_id' => $user_id,
                'name' => $table
            ]);
            $external_table->save();
        }

        foreach (explode(',', $request->get('roles')) as $role) {
            $role = new ExternalRole([
                'creator_id' => $user_id,
                'name' => $role,
                'description' => ""
            ]);
            $role->save();
        }

        session()->put('notifications', [
            ["icon" => "fa fa-info", "message" => "System integrated successfully."]
        ]);

        return back();

    }

    public function integrate(Request $request)
    {

        $user_id = Auth()->user()->id;

        $data = json_decode($request["data"], true);

        foreach ($data as $key => $value) {
            switch ($key) {
                case "tables":
                    foreach ($value as $table_name) {
                        $external_table = new ExternalTable([
                            'creator_id' => $user_id,
                            'name' => $table_name
                        ]);
                        $external_table->save();
                    }
                    break;
                case "roles":
                    foreach ($value as $role) {
                        $role = new ExternalRole([
                            'creator_id' => $user_id,
                            'name' => $role['name'],
                            'description' => $role['description']
                        ]);
                        $role->save();
                    }
                    break;
            }
        }

        session()->put('notifications', [
            ["icon" => "fa fa-info", "message" => "System integrated successfully."]
        ]);

        return back();
    }

}
