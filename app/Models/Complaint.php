<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    protected $fillable = [
                            'citizen_id',
                            'authority_id',
                            'type_contamination_id',
                            'type_communication_id'
                            'complaint_state_id',
                            'latitude',
                            'longitude',
                            'commentary'
                          ];

    protected $table = 'complaints';

    public function citizens()
    {
        return $this->belongsTo(Citizen::class, 'citizen_id');
    }
}
