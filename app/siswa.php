<?php

namespace App;

use \App\User;
use \App\siswa as Siswa;

use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    protected $table = 'siswa';
     
    protected $fillable = [
        'school_info_id', 'nama', 'NISN', 'kelas', 'email', 'osis'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
    public function school()
    {
    	return $this->belongsTo('App\Model\School_info');
    }
    public function orang_tua()
    {
    	return $this->hasMany('App\Model\siswa');
    }
    public function kelas()
    {
    	return $this->belongsTo(Siswa::class);
    }
}
