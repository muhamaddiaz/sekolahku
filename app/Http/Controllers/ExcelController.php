<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function _constructor(Excel $ex) {}

    public function import(Request $req) {
        $path = $req->file('excel_data')->getRealPath();
        Excel::import(new UsersImport, $req->file('excel_data'));
        return back()->with('success', 'Data berhasil di import');
    }
}
