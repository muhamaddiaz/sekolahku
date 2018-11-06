<?php

namespace App;

use App\School_info;
use App\siswa as Siswa;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';

    public function school() {
        return $this->belongsTo(School_info::class);
    }

    public function siswa() {
        return $this->hasMany(Siswa::class);
    }

    public function getFullKelasAttribute() {
        $tingkat = $this->tingkat_kelas;
        $jurusan = $this->jurusan_kelas;
        $bagian = $this->bagian_kelas;
        return "$tingkat $jurusan $bagian";
    }
}
