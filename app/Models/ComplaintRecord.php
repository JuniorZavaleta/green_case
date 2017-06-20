<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComplaintRecord extends Model
{
    protected $table = 'complaint_state_record';

    protected $fillable = ['complaint_status_id'];

    public function complaint()
    {
        return $this->belongsTo(Complaint::class);
    }

    public function status()
    {
        return $this->belongsTo(ComplaintStatus::class);
    }
}
