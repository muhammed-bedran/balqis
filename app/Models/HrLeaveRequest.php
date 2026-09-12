<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HrLeaveRequest extends Model
{
    //
    protected $fillable = [
        'employee_id',
        'type',
        'status',
        'start_date',
        'end_date',
        'reason',
        'days',
        'reviewed_at',
        'review_notes',
    ];
    public function employee()
    {
        return $this->belongsTo(HrEmployee::class);
    }
}
