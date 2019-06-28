<?php

namespace App\Http\Controllers;

use App\Notification;
use App\Work;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $works = [
            new Work('Policy "PLC#01" emergency rules does not defined', 'localhost:5555/policies/'),
            new Work('Policy "PLC#01" emergency rules does not defined', 'localhost:5555/policies/'),
            new Work('Policy "PLC#01" emergency rules does not defined', 'localhost:5555/policies/'),
            new Work('Policy "PLC#01" emergency rules does not defined', 'localhost:5555/policies/'),
            new Work('Policy "PLC#01" emergency rules does not defined', 'localhost:5555/policies/'),
            new Work('Policy "PLC#01" emergency rules does not defined', 'localhost:5555/policies/'),
            new Work('Policy "PLC#01" emergency rules does not defined', 'localhost:5555/policies/'),
            new Work('Policy "PLC#01" emergency rules does not defined', 'localhost:5555/policies/'),
            new Work('Policy "PLC#01" emergency rules does not defined', 'localhost:5555/policies/')
        ];

        $notifications = [
            new Notification("Nazeer Allahham", '/'),
            new Notification("Nazeer Allahham", '/'),
            new Notification("Nazeer Allahham", '/'),
            new Notification("Nazeer Allahham", '/'),
        ];

        return view('home', [
            'works' => $works,
            'notifications' => $notifications
        ]);
    }
}
