<?php

namespace App\Http\Controllers;

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


    public function listPolicies()
    {

        $policies = Policy::all();

        return view('policies/policies', [
            'policies' => $policies
        ]);

    }

    public function create()
    {

        $logged_user = Auth::user();

        return view('policies/create', [
            'user_id' => $logged_user->id
        ]);

    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:policies',
            'description' => 'required',
            'creator_id' => 'required|numeric'
        ]);

        $logged_user = Auth::user();

        $policy = new Policy();
        $policy->name = $request->request->get('name');
        $policy->description = $request->request->get('description');
        $policy->creator_id = $logged_user->id;
        $policy->save();

        $purposes = Purpose::find($request['purposes']);
        if (!empty($purposes)) {
            $policy->purposes()->detach();
            $policy->purposes()->attach($purposes);
        }

        return redirect('/policies');
    }

    public function showPolicyInfo($id)
    {
        $policy = Policy::find($id);

        $purposes = Purpose::all();
        foreach ($policy->purposes()->get() as $p1) {
            foreach ($purposes as $p2) {
                if ($p1->id == $p2->id) {
                    $p2['selected'] = true;
                }
            }
        }

        return view('/policies/update', [

            'policy' => $policy,
            'purposes' => $purposes

        ]);

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            //  'name' => 'unique:policies,name,' . $request->request->get('policy_id')
        ]);

        $policy = Policy::find($id);
        $policy->name = $request['name'];
        $policy->description = $request['description'];
        $policy->save();

        $purposes = Purpose::find($request['purposes']);

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
