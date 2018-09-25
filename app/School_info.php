<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School_info extends Model
{
    protected $fillable = [
        'school_name', 'school_region', 'school_city', 'phone_number'
    ];
}
