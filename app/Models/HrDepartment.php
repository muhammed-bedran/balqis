<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HrDepartment extends Model
{
    //
    protected $fillable = [
        'name',
        'description',
        'status'
    ];
    public function employees()
    {
        return $this->hasMany(HrEmployee::class);
    }
}
