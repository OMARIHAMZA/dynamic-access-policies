<?php

namespace App\Http\Controllers;

use App\ExternalTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExternalTableController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();

        $flag = false;
        if ($user->role_id == 1) //admin
        {
            $tables = ExternalTable::all();

            foreach ($tables as $t) {
                $t['creator_name'] = $t->creatorName();
            }

            $flag = true;
        } else {
            $tables = $user->externalTables;
        }

        return view('external_tables.index', [
            'tables' => $tables,
            'flag' => $flag
        ]);
    }

    public function create()
    {
        $user = Auth::user();

        return view('external_tables.create', [
            'user_id' => $user->id
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:1',
            'creator_id' => 'required|numeric',
        ]);

        ExternalTable::create([
            'name' => $request['name'],
            'creator_id' => $request['creator_id'],
        ]);

        session()->put('alerts', [
            ["icon" => "success", "message" => "DataElement added successfully"]
        ]);
        return redirect('/data_elements');
    }

    public function edit($id)
    {
        $table = ExternalTable::find($id);

        return view('external_tables.update', [
            'table' => $table
        ]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:1',
            'creator_id' => 'required|numeric',
        ]);

        if (Auth::user()->roleTitle() !== "admin" && isset($request['creator_id'])) {
            session()->put('alerts', [
                ["icon" => "warning", "message" => "You cannot change Data Element owner. Please contact us."]
            ]);
            return redirect('/data_elements');
        }

        $table = ExternalTable::find($id);
        $table['name'] = $request['name'];
        $table['creator_id'] = $request['creator_id'];
        $table->update();

        session()->put('alerts', [
            ["icon" => "success", "message" => "Data element updated successfully"]
        ]);
        return redirect('/data_elements');
    }

    public function destroy($id)
    {
        $table = ExternalTable::find($id);
        $table->delete();

        session()->put('alerts', [
            ["icon" => "success", "message" => "Data Element deleted successfully"]
        ]);
        return redirect('/data_elements');
    }
}
