<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Termwind\Components\Hr;

class HrEmployee extends Model
{
    //
    protected $fillable = [
        'name',
        'email',
        'phone',
        'department_id',
        'job_title',
        'hire_date',
        'salary',
        'status',
        'address',
        'notes',
    ];
    public function department()
    {
        return $this->belongsTo(HrDepartment::class);
    }
}
