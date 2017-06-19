<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityImage extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $fillable = [
        'img'
    ];

    protected $table = 'img_activity';

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }
}
