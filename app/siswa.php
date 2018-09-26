<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    public function school
    {
    	return $this->belongsTo('App\Model\School_info');
    }
    public function orang_tua
    {
    	return $this->hasMany('App\Model\siswa');
    }
}
