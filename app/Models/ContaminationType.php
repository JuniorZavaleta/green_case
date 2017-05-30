<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContaminationType extends Model
{
    public function complaints()
    {
        return $this->hasMany(Complaint::class);
    }
}
