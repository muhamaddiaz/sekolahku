<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use \App\Notification;
use \App\School_info;
use \App\siswa;
use \App\Guru;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'school_info_id', 'name', 'username', 'email', 'password', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function siswa() {
        return $this->hasOne(siswa::class);
    }

    public function guru() {
        return $this->hasOne(Guru::class);
    }

    public function schoolInfo() {
        return $this->belongsTo(School_info::class);
    }

    public function notifications() {
        return $this->hasMany(Notification::class);
    }
}
