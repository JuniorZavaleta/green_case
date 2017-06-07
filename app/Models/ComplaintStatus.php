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
    protected $table = 'complaint_states';

    public function complaints()
    {
        return $this->hasMany(Complaint::class, 'complaint_state_id');
    }
}
