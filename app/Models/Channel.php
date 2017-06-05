<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    const MESSENGER = 1;
    const TELEGRAM = 2;
    const FACEBOOK = 3;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'communication_types';

    /**
     * Relationship with citizens
     * @return Citizen
     */
    public function citizens()
    {
        return $this->belongsToMany(
            Citizen::class,
            'citizen_communication',
            'communication_type_id',
            'citizen_id'
        );
    }

    /**
     * Relationship with complaints
     * @return Complaint
     */
    public function complaints()
    {
        return $this->hasMany(Complaint::class);
    }
}
