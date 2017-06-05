<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Authority extends Model
{
    /**
     * Relationship with complaints
     * @return Complaint
     */
    public function complaints()
    {
        return $this->hasMany(Complaint::class);
    }

    /**
     * Relationship with District
     * @return District
     */
    public function district()
    {
        return $this->belongsTo(District::class);
    }

    /**
     * Relationship with user
     * @return User
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }
}
