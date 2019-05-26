<?php

namespace App\Http\Controllers;

use App\Policy;
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


    public function listPolicies()
    {

        $policies = Policy::all();

        return view('policies/policies', [
            'policies' => $policies
        ]);

    }

    public function create()
    {

        $purposes = Purpose::all();
        $logged_user = Auth::user();

        return view('policies/create', [
            'purposes' => $purposes,
            'user_id' => $logged_user->id
        ]);

    }

    public function store(Request $request)
    {

        $request->validate([

            'name' => 'required|unique:policies',
            'purposes' => 'required|min:1',
            'description' => 'required'

        ]);

        $logged_user = Auth::user();

        $policy = new Policy();

        $policy->name = $request->request->get('name');

        $policy->description = $request->request->get('description');

        $policy->creator_id = $logged_user->id;

        $purposesIds = str_split($request->request->get('purposes'));

        $purposes = Purpose::find($purposesIds);

        $policy->save();

        $policy->purposes()->attach($purposes);

        return redirect('/policies');


    }

    public function showPolicyInfo($id)
    {

        $policy = Policy::find($id);

        $purposes = Purpose::all();

        return view('/policies/update', [

            'policy' => $policy,
            'purposes' => $purposes

        ]);

    }

    public function update(Request $request)
    {


        $request->validate([

            'name' => 'unique:policies,name,' . $request->request->get('policy_id')

        ]);

        $policy = Policy::find($request->request->get('policy_id'));

        $policy->name = $request->request->get('name');

        $policy->description = $request->request->get('description');

        $purposesIds = str_split($request->request->get('purposes'));

        $purposes = Purpose::find($purposesIds);

        $policy->save();

        if (!empty($purposes)) {
            $policy->purposes()->detach();
            $policy->purposes()->attach($purposes);
        }

        return redirect('/policies');

    }


    public function destroy($id)
    {

        $policy = Policy::find($id);

        $policy->delete();

        return redirect('/policies');

    }
}
