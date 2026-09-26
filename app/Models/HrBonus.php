<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HrBonus extends Model
{
    //
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
