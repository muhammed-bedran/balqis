<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\HrEmployee;
use App\Models\HrLeaveRequest;
use Illuminate\Http\Request;

class HrLeaveRequestController extends Controller
{
    //
    public function index()
    {
        return view('dashboard.pages.hr.leaves.index',[
            'leaves' => HrLeaveRequest::all()
        ]);
    }
    protected function employeeOptions()
    {
        return HrEmployee::orderBy('name')->pluck('name','id');
    }
    public function create()
     {
        return view('dashboard.pages.hr.leaves.create',[
            'leave' => new HrLeaveRequest(),
            'employees' => $this->employeeOptions(),
        ]);
     }
     protected function validated(Request $request)
     {
         return $request->validate([
             'employee_id' => 'required|exists:hr_employees,id',
             'type' => 'required|string|max:255',
             'start_date' => 'required|date',
             'end_date' => 'required|date|after_or_equal:start_date',
             'reason' => 'nullable|string|max:1000',    
         ]);
     }
     public function store(Request $request)
     {
        $data = $this->validated($request);
        $data['days'] = HrLeaveRequest::calculateDays($data['start_date'], $data['end_date']);
        $data['status'] = 'pending';
        HrLeaveRequest::create($data);
        return redirect()->route('dashboard.hr.leaves.index')->with('success', 'تم إنشاء طلب الإجازة بنجاح');
     }
     public function edit(HrLeaveRequest $leave)
     {
        return view('dashboard.pages.hr.leaves.edit',[
            'leave' => $leave,
            'employees' => $this->employeeOptions(),
        ]);
     }
        public function update(Request $request, HrLeaveRequest $leave)
        {
            $data = $this->validated($request);
            $data['days'] = HrLeaveRequest::calculateDays($data['start_date'], $data['end_date']);
            $leave->update($data);
            return redirect()->route('dashboard.hr.leaves.index')->with('success', 'تم تحديث طلب الإجازة بنجاح');
        }
        public function destroy(HrLeaveRequest $leave)
        {
            $leave->delete();
            return redirect()->route('dashboard.hr.leaves.index')->with('success', 'تم حذف طلب الإجازة بنجاح');
        }
        public function approve(HrLeaveRequest $leave)
        {
            $leave->update([
                'status' => 'approved',
                'reviewed_at' => now(),
                'review_notes' => request('review_notes'),
                ]);
            return redirect()->route('dashboard.hr.leaves.index')->with('success', 'تم الموافقة على طلب الإجازة بنجاح');
        }
        public function reject(HrLeaveRequest $leave)
        {
            $leave->update([
                'status' => 'rejected',
                'reviewed_at' => now(),
                'review_notes' => request('review_notes'),
                ]);
            return redirect()->route('dashboard.hr.leaves.index')->with('success', 'تم رفض طلب الإجازة بنجاح');
        }
        public function show(HrLeaveRequest $leave)
        {
            return view('dashboard.pages.hr.leaves.show',[
                'leave' => $leave,
            ]);
        }
      
}
