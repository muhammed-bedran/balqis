<?php

namespace App\Http\Controllers\Dashboard\Hr;

use App\Http\Controllers\Controller;
use App\Models\HrEmployee;
use App\Models\HrPayroll;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class HrPayrollsController extends Controller
{
    //
    public function index()
    {
        return view('dashboard.pages.hr.payrolls.index', [
            'payrolls' => HrPayroll::latest()->paginate(10),
        ]);
    }
    protected function employeeOptions()
    {
        return HrEmployee::orderBy('name')->pluck('name', 'id');
    }
    public function create()
    {
        return view('dashboard.pages.hr.payrolls.create', [
            'payroll' => new HrPayroll(),
            'employees' => $this->employeeOptions(),
        ]);
    }
    protected function validated(Request $request, ?HrPayroll $payroll = null)
    {
        $period = $request->input('period');
        [$year, $month] = $this->splitPeriod($period);
        return $request->validate([
            'employee_id' => [
                'required',
                'exists:hr_employees,id',
                Rule::unique('hr_payrolls', 'employee_id')
                ->ignore($payroll?->id)
                    ->where(fn($query) => $query->where('year', $year)->where('month', $month)),

            ],
            'period' => 'required|date_format:Y-m',
            
            'notes' => 'nullable|string|max:1000',
        ]);
    }

    public function edit(HrPayroll $payroll)
    {
        return view('dashboard.pages.hr.payrolls.edit', [
            'payroll' => $payroll,
            'employees' => $this->employeeOptions(),
        ]);
    }


    protected function splitPeriod(string $period)
    {
        if (!$period) {
            return [null, null];
        }
        [$year, $month] = explode('-', $period); // 2026-09
        return [$year, $month];
    }


    public function store(Request $request)
    {
        $data = $this->validated($request);
        [$year, $month] = $this->splitPeriod($data['period']);
        $employee = HrEmployee::findOrFail($data['employee_id']);
        $totals =HrPayroll::totalsFor($employee, $year, $month);
        HrPayroll::create([
            'employee_id' => $data['employee_id'],
            'year' => $year,
            'month' => $month,
          
            'notes' => $data['notes'] ?? null,
            ...$totals,
            'status' => 'draft',
            
        ]);
        return redirect()->route('dashboard.hr.payrolls.index')->with('success', 'تم إنشاء الفاتورة بنجاح');
    }
}
