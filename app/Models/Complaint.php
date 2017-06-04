<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{

    protected $fillable = [
                            'citizen_id',
                            'authority_id',
                            'type_contamination_id',
                            'type_communication_id',
                            'complaint_state_id',
                            'latitude',
                            'longitude',
                            'commentary'
                          ];

    protected $table = 'complaints';

    const COMPLETED = 2;

    /**
     * Relationship with the citizen
     * @return App\Models\Citizen
     */
    public function citizen()
    {
        return $this->belongsTo(Citizen::class, 'citizen_id');
    }

    /**
     * Relationship with the images of the complaint
     * @return App\Models\ComplaintImage
     */
    public function images()
    {
        return $this->hasMany(ComplaintImage::class);
    }

    /**
     * Relationship with the authority assigned
     * @return App\Models\Authority
     */
    public function authority()
    {
        return $this->belongsTo(Authority::class);
    }

    /**
     * Relationship with the type
     * @return App\Models\ContaminationType
     */
    public function contamination_type()
    {
        return $this->belongsTo(ContaminationType::class, 'type_contamination_id');
    }

    /**
     * Relationship with the channel (Telegram, Messenger, Facebook-Web)
     * @return App\Models\Channel
     */
    public function channel()
    {
        return $this->belongsTo(Channel::class, 'type_communication_id');
    }

    /**
     * Filter for only get complaint completed
     * @param  Builder $query before apply the filter
     * @return Builder after apply the filter
     */
    public function scopeCompleted($query)
    {
        return $query->where('complaint_state_id', static::COMPLETED);
    }

    /**
     * Format the created_at attribute
     * @return date
     */
    public function getCreatedAtFormattedAttribute()
    {
        return $this->created_at->format('d/m/Y H:i:s');
    }

    public function getIsCompletedAttribute()
    {
        return $this->complaint_state_id == static::COMPLETED;
    }
}
