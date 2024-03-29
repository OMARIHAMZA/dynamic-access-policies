<?php

namespace App\Http\Controllers;

use App\ExternalTable;
use App\Policy;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PolicyController extends Controller
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

    public function index()
    {
        $user = Auth::user();

        if ($user->role_id == 1) //admin
        {
            $policies = Policy::all();
        } else {
            $policies = $user->policies;
        }

        return view('policies.index', [
            'policies' => $policies,
        ]);

    }

    public function create()
    {
        $user = Auth::user();

        if ($user->roleTitle() == "admin") {
            $external_tables = ExternalTable::where('policy_defined', false)->get();

            $external_users = User::where([
                'role_id' => Role::where('title', 'user')->first()->role_id
            ])->get();
        } else {
            $external_tables = $user->externalTables()->where('policy_defined', false)->get();
        }


        return view('policies/create', [
            'user_id' => $user->id,
            'external_tables' => $external_tables,
            'external_users' => $external_users
        ]);

    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:policies',
            'creator_id' => 'required|numeric',
            'data_element' => 'required|numeric',
            'rules' => 'required|json',
            'emergency_rules' => 'required|json',
        ]);

        Policy::create([
            'name' => $request['name'],
            'creator_id' => $request['creator_id'],
            'rules' => $request['rules'],
            'emergency_rules' => $request['emergency_rules'],
            'data_element' => $request['data_element'],
        ]);

        $data = ExternalTable::find($request['data_element']);
        $data->policy_defined = true;
        $data->update();

        session()->put('alerts', [
            ["icon" => "success", "message" => "Policy created successfully"]
        ]);

        return redirect('/policies');
    }

    public function show($id)
    {
        $policy = Policy::find($id);

        return view('policies.view', [

            'policy' => $policy

        ]);
    }

    public function edit($id)
    {
        $user = Auth::user();

        if ($user->roleTitle() == "admin") {
            $external_tables = ExternalTable::where('policy_defined', false)->get();
        } else {
            $external_tables = $user->externalTables()->where('policy_defined', false)->get();
        }

        $policy = Policy::find($id);

        return view('policies.update', [

            'policy' => $policy,
            'external_tables' => $external_tables,
            'user_id' => $user->id
        ]);

    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',
            'data_element' => 'required|numeric',
            'creator_id' => 'required|numeric',
            'rules' => 'required|json',
            'emergency_rules' => 'required|json',
        ]);

        $policy = Policy::find($id);
        $policy->name = $request['name'];
        $policy->rules = $request['rules'];
        $policy->emergency_rules = $request['emergency_rules'];
        $policy->data_element = $request['data_element'];
        $policy->update();

        session()->put('alerts', [
            ["icon" => "success", "message" => "Policy updated successfully"]
        ]);

        return redirect('/policies');
    }

    public function destroy($id)
    {

        $policy = Policy::find($id);

        $data = ExternalTable::find($policy->data_element);
        $data->policy_defined = false;
        $data->update();

        $policy->delete();

        session()->put('alerts', [
            ["icon" => "success", "message" => "Policy deleted successfully"]
        ]);

        return redirect('/policies');

    }
}
