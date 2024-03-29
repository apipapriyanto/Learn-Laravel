<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\UsersRegisteredEmail;
use Mail;
use App\Status;

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
        // Mail::to('apriyanto@smkmuhi.sch.id')->send(new UsersRegisteredEmail());
        // return new UsersRegisteredEmail();

        $statuses = Status::latest()->get();

        return view('home', compact('statuses'));
    }
}
