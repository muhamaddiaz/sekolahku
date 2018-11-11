<?php

namespace App\Http\Controllers;

use App\Mading;
use App\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function notification() {
        $notif = Auth::user()->notifications()->orderBy('created_at', 'desc')->get();
        return view('menu.notification', ['notif' => $notif]);
    }

    public function notificationDelete() {
        Auth::user()->notifications()->delete();
        return back()->with('success', 'Catatan pemberitahuan berhasil dihapus');
    }

    public function elibrary() {
        return view('menu.elibrary');
    }

    public function emading() {
        $mading = Mading::all();
        $user = Siswa::all('id');
        $siswa = Mading::where('id_mading',$user)->get();
        return view('menu.emading',[
            'mading' => $mading,
            'siswa' => $siswa
        ]);
    }
}
