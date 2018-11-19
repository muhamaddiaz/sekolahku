<?php

namespace App\Exports;

use App\Guru;

class GuruExport implements \Maatwebsite\Excel\Concerns\FromCollection 
{
    public function collection() 
    {
        return Guru::all();
    }
}