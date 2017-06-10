<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContaminationType extends Model
{
    /**
     * Relationship with complaints
     * @return Complaint
     */
    public function complaints()
    {
        return $this->hasMany(Complaint::class);
    }
}
