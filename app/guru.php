<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class guru extends Model
{
    protected $table='guru';
    
    public function school()
    {
    	return $this->belongsTo('App\Model\School_info');
    }
}
