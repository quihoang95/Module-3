<?php

namespace App\Models;

use App\Http\Controllers\StatusConst;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticate;
use Illuminate\Notifications\Notifiable;

class User extends Authenticate
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    function getStatus() {
        return ($this->status == StatusConst::ACTIVE) ? 'active': 'disable';
    }

    function roles() {
        return $this->belongsToMany(Role::class, 'role_user','user_id','role_id');
    }
}
