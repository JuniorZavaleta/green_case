<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'type_user', 'state',
    ];

    const ADMIN     = 1;
    const AUTHORITY = 2;
    const CITIZEN   = 3;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function authority()
    {
        return $this->hasOne(Authority::class, 'id');
    }

    public function getIsAdminAttribute()
    {
        return $this->attributes['type_user'] == 1;
    }
}
