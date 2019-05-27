<?php

namespace App\Http\Controllers;

use App\Policy;
use App\PolicyPurpose;
use App\Purpose;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurposeController extends Controller
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
        $purposes = Purpose::all();

        return view('purposes.index', [
            'purposes' => $purposes
        ]);

    }

    public function create()
    {
        $logged_user = Auth::user();

        return view('purposes.create', [
            'user_id' => $logged_user['id'],
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:purposes',
            'purpose' => 'required',
            'action' => 'required',
            'creator_id' => 'required|numeric'
        ]);

        $logged_user = Auth::user();

        $purpose = new Purpose();

        $purpose->name = $request->request->get('name');
        $purpose->purpose = $request->request->get('purpose');
        $purpose->action = $request->request->get('action');
        $purpose->creator_id = $logged_user->id;

        $purpose->save();

        session()->put('notifications', [
            ["icon" => "fa fa-info", "message" => "Purpose created successfully"]
        ]);

        return redirect('/purposes');

    }

    public function show($id)
    {
        $purpose = Purpose::find($id);
        $logged_user = Auth::user();

        return view('purposes.view', [
            'purpose' => $purpose,
            'user_id' => $logged_user->id
        ]);

    }

    public function edit($id)
    {
        $purpose = Purpose::find($id);
        $policies = Policy::all();

        foreach ($purpose->policies()->get() as $p1) {
            foreach ($policies as $p2) {
                if ($p1->id == $p2->id) {
                    $p2['selected'] = true;
                }
            }
        }
        $logged_user = Auth::user();

        return view('purposes.update', [
            'purpose' => $purpose,
            'user_id' => $logged_user['id'],
            'policies' => $policies
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            //'name' => 'required|unique:purposes',
            'creator_id' => 'required|numeric'
        ]);

        $purpose = Purpose::find($id);

        $purpose->name = $request['name'];
        $purpose->purpose = $request['purpose'];
        $purpose->action = $request['action'];
        $purpose->creator_id = $request['creator_id'];

        $purpose->save();

        PolicyPurpose::where('purpose_id', $purpose['id'])->delete();

        foreach ($request['policies'] as $policy) {
            echo $policy;
            PolicyPurpose::create([
                'policy_id' => $policy,
                'purpose_id' => $purpose['id']
            ]);
        }

        session()->put('notifications', [
            ["icon" => "fa fa-info", "message" => "Purpose updated successfully"]
        ]);
        return redirect('/purposes');
    }

    public function destroy($id)
    {

        $purpose = Purpose::find($id);

        $purpose->delete();

        session()->put('notifications', [
            ["icon" => "fa fa-info", "message" => "Purpose deleted successfully"]
        ]);
        return redirect('/purposes');

    }

}
