<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    public function authorities()
    {
        return $this->hasMany(Authority::class);
    }
}
