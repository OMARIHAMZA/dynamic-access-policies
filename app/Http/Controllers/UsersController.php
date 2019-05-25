<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function create()
    {
        return view('/users/create');
    }

    public function destroy($id)
    {
        $logged_user = Auth::user();

        if ($logged_user && $logged_user->role_id == 1) {

            $user = User::find($id);
            $user->delete();

        } else {

        }

        return redirect()->route('/users');
    }


}
