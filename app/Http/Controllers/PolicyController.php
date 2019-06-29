<?php

namespace App\Http\Controllers;

use App\ExternalTable;
use App\Policy;
use App\PolicyPurpose;
use App\Purpose;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            'policies' => $policies
        ]);

    }

    public function create()
    {
        $user = Auth::user();

        if ($user->roleTitle() == "admin") {
            $external_tables = ExternalTable::where('policy_defined', false);
        } else {
            $external_tables = $user->externalTables()->where('policy_defined', false)->get();
        }

        return view('policies/create', [
            'user_id' => $user->id,
            'external_tables' => $external_tables
        ]);

    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|unique:policies',
            'creator_id' => 'required|numeric',
            'data_element' => 'required'
        ]);

        $logged_user = Auth::user();

        $policy = new Policy();
        $policy->name = $request->request->get('name');
        $policy->creator_id = $logged_user->id;
        $policy->rules = $request->request->get('rules');
        $policy->emergency_rules = $request->request->get('emergency_rules');
        $policy->data_element = $request->request->get('data_element');
        $policy->save();

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
        $policy = Policy::find($id);

        $external_tables = ExternalTable::all();

        return view('policies.update', [

            'policy' => $policy,
            'external_tables' => $external_tables

        ]);

    }

    public function update(Request $request, $id)
    {

        $request->validate([
//              'name' => 'unique:policies'
        ]);

        $policy = Policy::find($id);
        $policy->name = $request->request->get('name');
        $policy->rules = $request->request->get('rules');
        $policy->emergency_rules = $request->request->get('emergency_rules');
        $policy->data_element = $request->request->get('data_element');
        $policy->save();


        return redirect('/policies');
    }

    public function destroy($id)
    {

        $policy = Policy::find($id);

        $policy->delete();

        return redirect('/policies');

    }
}
