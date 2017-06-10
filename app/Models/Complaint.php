<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    const INCOMPLETED = 1;
    const COMPLETED = 2;
    const ACCEPTED = 3;
    const REJECTED = 4;
    const ON_ATTENTION = 5;
    const ATTENDED = 6;

    /**
     * Relationship with the citizen
     * @return App\Models\Citizen
     */
    public function citizen()
    {
        return $this->belongsTo(Citizen::class);
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
     * Relationship with the district assigned
     * @return App\Models\District
     */
    public function district()
    {
        return $this->belongsTo(District::class);
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
     * Relationship with the status (incompleto, registrado, etc)
     * @return App\Models\ComplaintStatus
     */
    public function status()
    {
        return $this->belongsTo(ComplaintStatus::class, 'complaint_state_id');
    }

    /**
     * Filter for only get complaint completed
     * @param  Builder $query before apply the filter
     * @return Builder after apply the filter
     */
    public function scopeCompleted($query)
    {
        return $query->where('complaint_state_id', '!=' ,static::INCOMPLETED);
    }

    /**
     * Filter for only get complaint completed
     * @param  Builder $query before apply the filter
     * @return Builder after apply the filter
     */
    public function scopeIncompleted($query)
    {
        return $query->where('complaint_state_id', static::INCOMPLETED);
    }

    /**
     * Format the created_at attribute
     * @return date
     */
    public function getCreatedAtFormattedAttribute()
    {
        if ($this->created_at) {
            return $this->created_at->format('d/m/Y H:i:s');
        }
    }

    /**
     * Return true is the status is completed
     * @return bool
     */
    public function getIsCompletedAttribute()
    {
        return $this->complaint_state_id == static::COMPLETED;
    }
}
