<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComplaintStatus extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'complaint_status';

    public function complaints()
    {
        return $this->hasMany(Complaint::class, 'complaint_status_id');
    }
}
