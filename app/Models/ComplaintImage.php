<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComplaintImage extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $fillable = ['complaint_id', 'img'];

    protected $table = 'img_complaint';

    /**
     * Relationship with complaint
     * @return Complaint
     */
    public function complaint()
    {
        return $this->belongsTo(Complaint::class);
    }

    /**
     * Handle the path of the image
     * @return string
     */
    public function getImgPathAttribute()
    {
        if ($this->complaint->type_communication_id == Channel::TELEGRAM) {
            return env('BOT_HOST').$this->attributes['img'];
        }

        return $this->attributes['img'];
    }
}
