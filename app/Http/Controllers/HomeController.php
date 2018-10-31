<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notifCount = Auth::user()->notifications()->count();
        $school = Auth::user()->schoolInfo()->first();
        return view('menu.mainmenu', ['school' => $school, 'notifCount' => $notifCount]);
    }
}
