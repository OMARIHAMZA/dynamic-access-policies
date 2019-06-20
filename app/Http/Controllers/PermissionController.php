<?php

namespace App\Http\Controllers;

use App\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $permissions = Permission::all();

        return view('permissions.index', [
            'permissions' => $permissions
        ]);
    }

    public function create()
    {
        return view('permissions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:permissions',
            'description' => 'required'
        ]);

        Permission::create([
            'title' => $request['title'],
            'description' => $request['description']
        ]);

        session()->put('alerts', [
            ["icon" => "fa fa-info", "message" => "Permission added successfully"]
        ]);
        return redirect('/permissions');
    }

    public function show($id)
    {
        $permission = Permission::find($id);

        return view('permissions.view', [
            'permission' => $permission
        ]);
    }

    public function edit($id)
    {
        $permission = Permission::find($id);

        return view('permissions.update', [
            'permission' => $permission
        ]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',//|unique:permissions
            'description' => 'required'
        ]);

        $permission = Permission::find($id);
        $permission['title'] = $request['title'];
        $permission['description'] = $request['description'];
        $permission->save();

        session()->put('alerts', [
            ["icon" => "fa fa-info", "message" => "Permission updated successfully"]
        ]);
        return redirect('/permissions');
    }

    public function destroy($id)
    {
        $permission = Permission::find($id);
        $permission->delete();

        session()->put('alerts', [
            ["icon" => "fa fa-info", "message" => "Permission deleted successfully"]
        ]);
        return redirect('/permissions');
    }
}
