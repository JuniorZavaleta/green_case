<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    protected $table = 'complaints';

    public function citizens()
    {
        return $this->belongsTo(
            Citizen::class,
            'citizen_id'
        );
    }
}
