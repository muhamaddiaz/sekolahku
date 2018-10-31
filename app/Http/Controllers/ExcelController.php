<?php

namespace App\Http\Controllers;

use App\Notification;
use Illuminate\Http\Request;
use App\Imports\UsersImport;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function _constructor(Excel $ex) {}

    public function import(Request $req) {
        $notif = new Notification;
        if($req->hasFile('excel_data')) {
            Excel::import(new UsersImport, $req->file('excel_data'));
            $notif->type = 'success';
            $notif->message = 'Data berhasil di import';
            Auth::user()->notifications()->save($notif);
            return back()->with('success', 'Data berhasil di import');
        }
    }
}
