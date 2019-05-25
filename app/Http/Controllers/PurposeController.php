<?php

namespace App\Http\Controllers;

use App\Purpose;
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

    public function listPurposes()
    {

        $purposes = Purpose::all();


        return view('purposes/purposes', [
            'purposes' => $purposes
        ]);

    }

    public function create()
    {

        $logged_user = Auth::user();

        return view('purposes/create', [
            'user_id' => $logged_user->id
        ]);

    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|unique:purposes',
            'purpose' => 'required',
            'action' => 'required'
        ]);

        $logged_user = Auth::user();

        $purpose = new Purpose();

        $purpose->name = $request->request->get('name');
        $purpose->purpose = $request->request->get('purpose');
        $purpose->action = $request->request->get('action');
        $purpose->creator_id = $logged_user->id;

        $purpose->save();

        return redirect('/purposes');

    }

    public function destroy($id)
    {

        $purpose = Purpose::find($id);

        $purpose->delete();

        return redirect('/purposes');

    }

    public function showPurposeInfo($id)
    {


        $purpose = Purpose::find($id);
        $logged_user = Auth::user();

        return view('purposes/update', [
            'purpose' => $purpose,
            'user_id' => $logged_user->id
        ]);

    }

    public function update(Request $request)
    {

        $request->validate([
            'name' => 'unique:purposes,name,' . $request->request->get('id')
        ]);

        $purpose = Purpose::find($request->request->get('id'));

        $purpose->name = $request->request->get('name');
        $purpose->purpose = $request->request->get('purpose');
        $purpose->action = $request->request->get('action');

        $purpose->save();

        return redirect('/purposes');

    }
}
