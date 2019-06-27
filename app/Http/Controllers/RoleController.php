<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Validator;

class RoleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function listRoles()
    {

        $roles = Role::all();
        return view('roles/roles', [

            'roles' => $roles

        ]);

    }

    public function create()
    {

        return view('roles/create');

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:roles',
            'description' => 'required'
        ]);

        Role::create([
            'title' => $request['title'],
            'description' => $request['description'],
        ]);

        session()->put('alerts', [
            ["icon" => "fa fa-info", "message" => "Role added successfully"]
        ]);
        return redirect('/roles');
    }

    public function showRoleInfo($id)
    {

        $role = Role::find($id);

        return view('roles/update', [
            'role' => $role
        ]);

    }

    public function update(Request $request)
    {

        $request->validate([

            'title' => 'required|unique:roles,title,' . $request->request->get('id')

        ]);

        $role = Role::find($request->request->get('id'));

        $role->title = $request->request->get('title');

        $role->description = $request->request->get('description');

        $role->update();

        return redirect('/roles');

    }

    public function destroy($id)
    {

        //Get all users with the current role
        $users = User::where('role_id', $id)->get();

        //Check if there is users that have this role
        if (($users->count()) > 0) {
            return Redirect::action('RoleController@listRoles')->withErrors(["You can't delete this role because there are {$users->count()} users connected with this role."]);
        } else {

            $role = Role::find($id);
            $role->delete();
            return redirect('/roles');

        }
    }

}
