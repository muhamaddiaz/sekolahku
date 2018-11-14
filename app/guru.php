<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use \App\User;
use \App\Kelas;
use \App\School_info;

class Guru extends Model
{
    protected $table='guru';

    protected $fillable = [
        'school_info_id', 'nama', 'mata_pelajaran'
    ];

    public function kelas() {
        return $this->hasOne(Kelas::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
    
    public function school()
    {
    	return $this->belongsTo(School_info::class);
    }
}
