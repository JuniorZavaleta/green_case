<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Citizen extends Authenticatable
{
    protected $fillable = ['name'];

    public function channels()
    {
        return $this->belongsToMany(
            Channel::class,
            'citizen_communication',
            'citizen_id',
            'communication_type_id'
        );
    }
}
