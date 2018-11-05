<?php

namespace App\Http\Controllers;

use App\User;
use App\School_info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;

class StaffController extends Controller
{
    public function pengajar() {
        $school = School_info::where('id', Auth::user()->school_info_id)->first();
        $pengajar = $school->users()->where('role', 2)->get();
        return view('menu.staff.pengajar', ['pengajar' => $pengajar]);
    }

    public function pelajar() {
        $school = School_info::where('id', Auth::user()->school_info_id)->first();
        $pelajar = $school->users()->where('role', 0)->get();
        return view('menu.staff.pelajar', ['pelajar' => $pelajar]);
    }

    public function getPengajarTable() {
        $school = School_info::where('id', Auth::user()->school_info_id)->first();
        $pengajar = $school->users()->where('role', 2)->get();
        return Datatables::of($pengajar)->make(true);
    }
}
