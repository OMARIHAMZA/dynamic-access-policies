<?php

namespace App\Http\Controllers;

use App\AccessRequestsHistory;
use App\User;
use Illuminate\Support\Facades\Auth;

class AccessRequestsHistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();

        if ($user->role_id == 1) //admin
        {
            $requests = AccessRequestsHistory::all();
        } else {
            $requests = $user->requestsHistory();
        }

        foreach ($requests as $req) {
            $req['requester_name'] = User::find($req->requester_id)->name;
            $req['requester_name'] = User::find($req->requester_id)->name;
        }

        return view('history.index', [
            'requests' => $requests
        ]);
    }
}
