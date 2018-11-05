<?php

namespace App\Imports;

use App\siswa;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class SiswaImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        $stat = true;
        $id = Auth::user()->school_info_id;
        foreach($rows as $row) {
            $user = User::all();
            if($user) {
                foreach($user as $u) {
                    if($row[2] == $u->email) {
                        session()->flash('danger', 'Terdapat data duplikat');
                        $stat = false;
                    }
                }
            }

            if($stat) {
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
                    'kelas_id' => 1,
                    'nama' => $row[0],
                    'NISN' => $row[4],
                    'email' => $row[2],
                    'osis' => 0,
                ]);

                $x = $user->siswa()->save($siswa);
            }
        }
    }
}
