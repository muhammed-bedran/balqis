<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HrPayroll extends Model
{
    //
    protected $table = 'hr_payrolls';

    protected $fillable = [
        'employee_id',
        'year',
        'month',
        'base_salary',
        'bonuses_total',
        'deductions_total',
        'net_salary',
        'status',
        'paid_at',
      
    ];
    public function employee()
    {
        return $this->belongsTo(HrEmployee::class, 'employee_id');
    }

    public function period()
    {
        //return $this->year . '-' . $this->month;
        return sprintf('%04d-%02d',$this->year, $this->month);

    }     
    
    // 2026-9

    public function isPaid()
    {
        return $this->status === 'paid';
    }


    public static function totalsFor(HrEmployee $employee, int $year, int $month)
    {
        $bonuses = $employee->bonuses()
            ->whereYear('date', $year)
            ->whereMonth('date', $month)
            ->sum('amount');

        $deductions = $employee->deductions()
            ->whereYear('date', $year)
            ->whereMonth('date', $month)
            ->sum('amount');
        
        $base = (float) ($employee->salary ?? 0);
        return [
            'base_salary' => $base,
            'bonuses_total' => $bonuses,
            'deductions_total' => $deductions,
            'net_salary' => $base + $bonuses - $deductions
        ];
    }

}
 // 2026
    // 150
    //50
    //100