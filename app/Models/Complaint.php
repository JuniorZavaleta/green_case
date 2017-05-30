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

    public function citizen()
    {
        return $this->belongsTo(Citizen::class, 'citizen_id');
    }

    public function images()
    {
        return $this->hasMany(ComplaintImage::class);
    }

    public function contamination_type()
    {
        return $this->belongsTo(ContaminationType::class, 'type_contamination_id');
    }

    public function channel()
    {
        return $this->belongsTo(Channel::class, 'type_communication_id');
    }

    public function getCreatedAtFormattedAttribute()
    {
        return $this->created_at->format('d/m/Y H:i:s');
    }
}
