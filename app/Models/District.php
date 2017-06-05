<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    /**
     * Relationship with authorities
     * @return Authority
     */
    public function authorities()
    {
        return $this->hasMany(Authority::class);
    }
}
