<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\HrDepartment;
use Illuminate\Http\Request;
use App\Models\HrEmployee;

class HrEmployeesController extends Controller
{
    //
    public function index()
    {
        return view('dashboard.pages.hr.employees.index',[
            'employees' => HrEmployee::all()
        ]);
    }
    protected function departmentOptions()
    {
        return HrDepartment::pluck('name','id');
    }
    
    public function create()
    {
        return view('dashboard.pages.hr.employees.create',[
            'employee' => new HrEmployee,
            'departments' => $this->departmentOptions()
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:hr_employees,email',
            'phone' => 'nullable|string|max:20',
            'department_id' => 'nullable|exists:hr_departments,id',
            'job_title' => 'nullable|string|max:255',
            'hire_date' => 'nullable|date',
            'salary' => 'nullable|numeric|min:0',
            'status' => 'nullable|in:active,inactive,terminated,on_leave',
            'address' => 'nullable|string|max:500',
            'notes' => 'nullable|string|max:1000',
        ]);

        HrEmployee::create($request->all());

        return redirect()->route('dashboard.hr.employees.index')->with('success', 'تم إضافة الموظف بنجاح.');
    }
    public function edit(HrEmployee $employee)
    {
        return view('dashboard.pages.hr.employees.edit',[
            'employee' => $employee,
            'departments' => $this->departmentOptions()
        ]);
    }
    public function show(HrEmployee $employee)
    {
        return view('dashboard.pages.hr.employees.show',[
            'employee' => $employee,
        ]);
    }
    public function update(Request $request, HrEmployee $employee)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:hr_employees,email,' . $employee->id,
            'phone' => 'nullable|string|max:20',
            'department_id' => 'nullable|exists:hr_departments,id',
            'job_title' => 'nullable|string|max:255',
            'hire_date' => 'nullable|date',
            'salary' => 'nullable|numeric|min:0',
            'status' => 'nullable|in:active,inactive,terminated,on_leave',
            'address' => 'nullable|string|max:500',
            'notes' => 'nullable|string|max:1000',
        ]);

        $employee->update($request->all());

        return redirect()->route('dashboard.hr.employees.index')->with('success', 'تم تحديث بيانات الموظف بنجاح.');
    }
    public function destroy(HrEmployee $employee)
    {
        $employee->delete();

        return redirect()->route('dashboard.hr.employees.index')->with('success', 'تم حذف الموظف بنجاح.');
    }   
}
