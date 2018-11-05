<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function notification() {
        $notif = Auth::user()->notifications()->orderBy('created_at', 'desc')->get();
        return view('menu.notification', ['notif' => $notif]);
    }

    public function elibrary() {
        return view('menu.elibrary');
    }

    public function emading() {
        return view('menu.emading');
    }
}
