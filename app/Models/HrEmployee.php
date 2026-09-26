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
        return $this->belongsTo(HrDepartment::class, 'department_id');
    }
    public function bonuses()
    {
        return $this->hasMany(HrBonus::class, 'employee_id');
    }
    public function deductions()
    {
        return $this->hasMany(HrDeducation::class, 'employee_id');
    }
}
