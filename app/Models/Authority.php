<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Authority extends Model
{
    public function complaints()
    {
        return $this->hasMany(Complaint::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }
}
