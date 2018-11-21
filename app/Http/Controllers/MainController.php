<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mading;
use App\Siswa;
use App\Library;
use App\School_Info;
use App\User;
use DB; 

class MainController extends Controller
{
    public function notification() {
        $notif = Auth::user()->notifications()->orderBy('created_at', 'desc')->get();
        return view('menu.notification', [
                'notif' => $notif
            ]);
    }

    public function notificationDelete() {
        Auth::user()->notifications()->delete();
        return back()->with('success', 'Catatan pemberitahuan berhasil dihapus');
    }

    public function elibrary() {
        $data = Library::all();
        $schoolInfo = Auth::user()->schoolInfo()->first();
        $school = Library::all('school_info_id');
        $school_library = School_Info::find($school)->first();
        $user_library = Library::all('user_id');
        $user = User::find($user_library)->first();
        return view('menu.elibrary',[
            'data' => $data,
            'schoolInfo' => $schoolInfo,
            'school_library' => $school_library,
            'user' => $user
        ]);
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
            $school_id = User::find($siswa)->first();
            return view('menu.emading',[
                'mading' => $mading,
                'siswa' => $siswa,
                'data' => $data,
                'school' => $school,
                'school_id' => $school_id
            ]);
        }
    }
}
