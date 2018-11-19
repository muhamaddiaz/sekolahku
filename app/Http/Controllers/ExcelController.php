<?php

namespace App\Http\Controllers;

use App\User;
use App\Notification;
use Illuminate\Http\Request;
use App\Imports\UsersImport;
use App\Imports\SiswaImport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function _constructor(Excel $ex) {}

    public function importGuru(Request $req) {
        $notif = new Notification;
        $extension = $req->file('excel_data_pengajar')->getClientOriginalExtension();
        if($req->hasFile('excel_data_pengajar') && $extension == 'xlsx') {
            Excel::import(new UsersImport, $req->file('excel_data_pengajar'));
            if(!(session('danger'))) {
                $notif->type = 'success';
                $notif->message = 'Data pengajar berhasil di import';
                Auth::user()->notifications()->save($notif);
                return back()->with('success', 'Data pengajar berhasil di import');
            } else {
                $notif->type = 'danger';
                $notif->message = 'Terdapat data duplikat, operasi dibatalkan';
                Auth::user()->notifications()->save($notif);
                return back();
            }
        } else {
            $notif->type = 'danger';
            $notif->message = 'format file tidak sesuai, operasi dibatalkan!';
            Auth::user()->notifications()->save($notif);
            return back()->with('danger', 'format file tidak sesuai, operasi dibatalkan!');
        }
    }

    public function importSiswa(Request $req) {
        $notif = new Notification;
        $extension = $req->file('excel_data_pelajar')->getClientOriginalExtension();
        if($req->hasFile('excel_data_pelajar') && $extension == 'xlsx') {
            Excel::import(new SiswaImport, $req->file('excel_data_pelajar'));
            if(!(session('danger'))) {
                $notif->type = 'success';
                $notif->message = 'Data pelajar berhasil di import';
                Auth::user()->notifications()->save($notif);
                return back()->with('success', 'Data pelajar berhasil di import');
            } else {
                $notif->type = 'danger';
                $notif->message = 'Terdapat data duplikat, operasi dibatalkan';
                Auth::user()->notifications()->save($notif);
                return back();
            }
        } else {
            $notif->type = 'danger';
            $notif->message = 'format file tidak sesuai, operasi dibatalkan!';
            Auth::user()->notifications()->save($notif);
            return back()->with('danger', 'format file tidak sesuai, operasi dibatalkan!');
        }
    }

    public function downloadGuru() {
        $file= public_path(). "/download/guru_sekolahku.xlsx";
        $headers = array(
                'Content-Type: application/xlsx',
                );
        return Response::download($file, 'guru_sekolahku', $headers);
    }

    public function downloadSiswa() {
        $file= public_path(). "/download/siswa_sekolahku.xlsx";
        $headers = array(
                'Content-Type: application/xlsx',
                );
        return Response::download($file, 'siswa_sekolahku.xlsx', $headers);
    }

    public function exportGuru() {
        return Excel::download(new \App\Exports\GuruExport, 'guru.xlsx');
    }

}
