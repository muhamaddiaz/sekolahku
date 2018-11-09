<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Siswa;

class Mading extends Model
{
    protected $table = 'mading';
    protected $primaryKey = 'id_mading';

    public function siswa()
    {
    	return $this->hasMany(Siswa::class);
    }
}

