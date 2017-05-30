<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    const MESSENGER = 1;
    const TELEGRAM = 2;
    const FACEBOOK = 3;

    protected $table = 'communication_types';

    public function citizens()
    {
        return $this->belongsToMany(
            Citizen::class,
            'citizen_communication',
            'communication_type_id',
            'citizen_id'
        );
    }

    public function complaints()
    {
        return $this->hasMany(Complaint::class);
    }
}
