<?php

namespace App\Http\Controllers;

use App\User;
use App\Notification;
use Illuminate\Http\Request;
use App\Imports\UsersImport;
use App\Imports\SiswaImport;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function _constructor(Excel $ex) {}

    public function importGuru(Request $req) {
        $notif = new Notification;
        if($req->hasFile('excel_data_pengajar')) {
            Excel::import(new UsersImport, $req->file('excel_data_pengajar'));
            $notif->type = 'success';
            $notif->message = 'Data pengajar berhasil di import';
            Auth::user()->notifications()->save($notif);
            return back()->with('success', 'Data guruhbnhgnbnhhnh berhasil di import');
        }
    }

    public function importSiswa(Request $req) {
        $notif = new Notification;
        if($req->hasFile('excel_data_pelajar')) {
            Excel::import(new SiswaImport, $req->file('excel_data_pelajar'));
            $notif->type = 'success';
            $notif->message = 'Data siswa berhasil di import';
            Auth::user()->notifications()->save($notif);
            return back()->with('success', 'Data siswa berhasil di import');
        }
    }
}
