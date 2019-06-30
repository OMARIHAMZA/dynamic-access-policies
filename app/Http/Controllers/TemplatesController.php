<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TemplatesController extends Controller
{
    public function index($name, Request $request)
    {
        $query = DB::table($request['table'])->where($request['PK'], '=', $request['ID'])->get();

        return view($name, [
            "data" => $query
        ]);
    }
}
