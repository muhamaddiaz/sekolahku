<?php

namespace App\Imports;

use App\User;
use App\Guru;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class UsersImport implements ToCollection
{
    public function collection(Collection $rows) {
        $stat = true;
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
                $id = Auth::user()->school_info_id;
                User::create([
                    'school_info_id' => $id,
                    'name' => $row[0],
                    'username' => $row[1],
                    'email' => $row[2],
                    'password' => bcrypt($row[3]),
                    'role' => 2
                ]);
            }
        }
        return $stat;
    }
}
