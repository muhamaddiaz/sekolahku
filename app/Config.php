<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $fillable = [
        'background_image'
    ];
    public function user() {
        return $this->belongsTo(User::class);
    }
}
