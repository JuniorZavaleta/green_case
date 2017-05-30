<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComplaintImage extends Model
{
    protected $table = 'img_complaint';

    public function complaint()
    {
        return $this->belongsTo(Complaint::class);
    }

    public function getImgPathAttribute()
    {
        return env('BOT_HOST').$this->attributes['img'];
    }
}
