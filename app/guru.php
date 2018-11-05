<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table='guru';
    
    public function school()
    {
    	return $this->belongsTo('App\Model\School_info');
    }
}
