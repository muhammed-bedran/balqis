<?php

namespace App\Http\Controllers\Dashboard\Hr;

use App\Http\Controllers\Controller;
use App\Models\HrDeducation;
use App\Models\HrEmployee;
use Illuminate\Http\Request;

class HrDeducationController extends Controller
{
    //
    public function index()
    {
        return view('dashboard.pages.hr.deducations.index',[
            'deductions' => HrDeducation::all()
        ]);
    }
    protected function employeeOptions()
    {
        return HrEmployee::orderBy('name')->pluck('name', 'id');
    }
    protected function validated(Request $request)
    {
        return $request->validate([
            'employee_id' => 'required|exists:hr_employees,id',
            'title' => 'required|string|max:255',
            'type' => 'required|in:late,absence,loan,penalty,tax,other',
            'amount' => 'required|numeric|min:0',
            'date' => 'required|date',
            'notes' => 'nullable|string|max:1000',
        ]);
    }
    public function create()
    {
        return view('dashboard.pages.hr.deducations.create',[
            'deduction' => new HrDeducation(),
            'employees' => $this->employeeOptions(),
        ]);
    }
    public function store(Request $request)
    {
        HrDeducation::create($this->validated($request));
        return redirect()->route('dashboard.hr.deducations.index')->with('success', 'ـمت إضافة التعليمات بنجاح.');
    }
    public function edit(HrDeducation $deducation)
    {
        return view('dashboard.pages.hr.deducations.edit',[
            'deduction' => $deducation,
            'employees' => $this->employeeOptions(),
        ]);
    }
    public function update(Request $request, HrDeducation $deducation)
    {
        $deducation->update($this->validated($request));
        return redirect()->route('dashboard.hr.deducations.index')->with('success', 'ـمت حفظ التعليمات بنجاح.');
    }
    public function destroy(HrDeducation $deducation)
    {
        $deducation->delete();
        return redirect()->route('dashboard.hr.deducations.index')->with('success', 'ـمت حذف التعليمات بنجاح.');
    }
    public function show(HrDeducation $deducation)
    {
        return view('dashboard.pages.hr.deducations.show',[
            'deduction' => $deducation,
        ]);
    }

}
