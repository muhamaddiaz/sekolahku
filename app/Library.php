<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\School_Info;

class Library extends Model
{
    protected $table='libraries';

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
    public function schoolInfo()
    {
    	return $this->belongsTo(School_Info::class);
    }
}
