<?php

namespace App\Imports;

use App\siswa;
use App\User;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;

class SiswaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $id = Auth::user()->school_info_id;

        $user = new User([
            'school_info_id' => $id,
            'name' => $row[0],
            'username' => $row[1],
            'email' => $row[2],
            'password' => bcrypt($row[3]),
            'role' => 0
        ]);

        $user->save();

        $siswa = new siswa([
            'school_info_id' => $id,
            'user_id' => $user->id,
            'nama' => $row[0],
            'NISN' => $row[4],
            'kelas' => $row[5],
            'email' => $row[2],
            'osis' => 0,
        ]);

        $x = $user->siswa()->save($siswa);
        return [$user, $x];
    }
}
