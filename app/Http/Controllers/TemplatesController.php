<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TemplatesController extends Controller
{
    public function index($name, Request $request)
    {
        $query = [];
        if (isset($request['table']) && isset($request['PK']) && isset($request['ID'])) {

            $query = DB::table($request['table'])->where($request['PK'], '=', $request['ID'])->get();
        }


        $data = [];
        if (isset($request['user_id'])) {
            $data['user_id'] = Auth::user()->id;
        }

        if (isset($request['role_name'])) {
            $data['role_name'] = Auth::user()->roleTitle();
        }

        return view($name, [
            "data" => $data,
            "rows" => $query
        ]);
    }
}
