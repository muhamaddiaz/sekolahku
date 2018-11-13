<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mading;
use App\Siswa;
use DB; 

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
        if(Auth::user()->role == 1)
        {    
            $school= Auth::user()->schoolInfo()->first();
            $mading = Mading::all();
            $data = Auth::user()->first();
            $user = Mading::all('siswa_id');
            $siswa = Siswa::find($user)->first();
            return view('menu.emading',[
                'mading' => $mading,
                'siswa' => $siswa,
                'data' => $data,
                'school' => $school
            ]);
        }
        elseif(Auth::user()->role == 2)
        {
            $school= Auth::user()->schoolInfo()->first();
            $mading = Mading::all();
            $data = Auth::user()->guru()->first();
            $user = Mading::all('siswa_id');
            $siswa = Siswa::find($user)->first();
            return view('menu.emading',[
                'mading' => $mading,
                'siswa' => $siswa,
                'data' => $data,
                'school' => $school
            ]);
        }
        else
        {
            $school= Auth::user()->schoolInfo()->first();
            $mading = Mading::all();
            $data = Auth::user()->siswa()->first();
            $user = Mading::all('siswa_id');
            $siswa = Siswa::find($user)->first();
            return view('menu.emading',[
                'mading' => $mading,
                'siswa' => $siswa,
                'data' => $data,
                'school' => $school
            ]);
        }
    }
}
