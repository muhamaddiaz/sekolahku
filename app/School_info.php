<?php

namespace App;

use App\User;
use App\Kelas;
use App\Guru;
use App\siswa;
use App\Forum;
use Illuminate\Database\Eloquent\Model;

class School_info extends Model
{
    protected $fillable = [
        'school_name', 'school_region', 'school_city', 'phone_number'
    ];
    public function users() {
        return $this->hasMany(User::class);
    }
    public function siswa()
    {
    	return $this->hasMany(siswa::class);
    }
    public function guru()
    {
    	return $this->hasMany(Guru::class);
    }
    public function kelas() {
        return $this->hasMany(Kelas::class);
    }

    public function forums() {
        return $this->hasMany(Forum::class);
    }
}
