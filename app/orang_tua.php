<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orang_tua extends Model
{
    protected $table='orang_tua';

    public function siswa
    {
    	return $this->belongsTo('App\Model\siswa');
    }
}
