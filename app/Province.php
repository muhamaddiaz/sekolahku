<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\City;

class Province extends Model
{
    protected $fillable = [
        'province_id', 'province'
    ];

    public function getCities() {
        return $this->hasMany(City::class);
    }
}
