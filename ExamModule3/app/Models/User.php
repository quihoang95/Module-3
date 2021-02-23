<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable= [
        'name',
        'birth',
        'gender',
        'phoneNumber',
        'cmnd',
        'email',
        'address',
        'role_id'
    ];
    function role()
    {
        return $this->belongsTo(Role::class,'role_id');
    }
    public $timestamps = false;




}
