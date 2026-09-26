<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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
        return $this->belongsTo(HrEmployee::class, 'employee_id');
    }
    public static function calculateDays(string $startDate, string $endDate)
    {
        $start = Carbon::parse($startDate)->startOfDay();
        $end = Carbon::parse($endDate)->startOfDay();
        return (int) $start->diffInDays($end) + 1;
    }
}
