<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Termwind\Components\Hr;

class HrDeducation extends Model
{
    //
    protected $table = 'hr_deducations';
    protected $fillable = [
        'employee_id',
        'title',
        'type',
        'amount',
        'date',
        'notes',
    ];
    public function employee()
    {
        return $this->belongsTo(HrEmployee::class, 'employee_id');
    }
}
