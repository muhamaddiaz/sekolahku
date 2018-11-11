<?php

namespace App;

use \App\User;
use \App\Kelas;
use \App\Mading;
use \App\siswa as Siswa;

use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    protected $table = 'siswa';
     
    protected $fillable = [
        'school_info_id', 'kelas_id', 'nama', 'NISN', 'kelas', 'email', 'osis'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
    public function school()
    {
    	return $this->belongsTo('App\School_info');
    }
    public function mading()
    {
        return $this->hasMany(Mading::class);
    }
    public function orang_tua()
    {
    	return $this->hasMany('App\Model\siswa');
    }
    public function kelas()
    {
    	return $this->belongsTo(Kelas::class);
    }
}
