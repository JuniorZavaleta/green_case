<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    /**
     * @var integer Max lenght for short description of the activity
     */
    const MAX_LEN_SHORT_DESCRIPTION = 60;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
    ];

    /**
     * Relationship with complaint
     * @return Complaint
     */
    public function complaint()
    {
        return $this->belongsTo(Complaint::class);
    }

    /**
     * Relationship with images
     * @return ActivityImage
     */
    public function images()
    {
        return $this->hasMany(ActivityImage::class);
    }

    /**
     * Transforme the description when is too long for index
     * @return string
     */
    public function getShortDescriptionAttribute()
    {
        $description = $this->attributes['description'];

        if (strlen($description) > self::MAX_LEN_SHORT_DESCRIPTION) {
            $description = substr($description, 0, self::MAX_LEN_SHORT_DESCRIPTION).'...';
        }

        return $description;
    }
}
