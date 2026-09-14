@php
    $typeLables = [
        'annual' => 'سنوية',
        'sick' => 'مرضية',
        'maternity' => 'أمومة',
        'paternity' => 'أبوة',
        'unpaid' => 'غير مدفوعة الأجر',
        'other' => 'أخرى',
    ];
    $statusLables = [
        'pending' => 'قيد الانتظار',
        'approved' => 'موافق عليه',
        'rejected' => 'مرفوض',
    ]
@endphp

@extends('layouts.dashboard.index')
@section('title', 'الموارد البشرية - تفاصيل طلب الإجازة')
@section('content')
    <div class="row mb-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> تفاصيل طلب الإجازة </h3>
                    <a href="{{ route('dashboard.hr.leaves.index') }}" class="btn btn-primary btn-sm">قائمة طلبات الإجازة</a>
                </div>
                <div class="card-body">
                   <table class="table table-bordered">
                        <tr>
                            <th>رقم الطلب</th>
                            <td>{{ $leave->id }}</td>
                        </tr>
                        <tr>
                            <th>الموظف</th>
                            <td>{{ $leave->employee->name }}</td>
                        </tr>
                        <tr>
                            <th>نوع الإجازة</th>
                            <td>{{  $typeLables[$leave->type] ?? $leave->type}}</td>
                        </tr>
                        <tr>
                            <th>من تاريخ</th>
                            <td>{{ $leave->start_date }}</td>
                        </tr>
                        <tr>
                            <th>إلى تاريخ</th>
                            <td>{{ $leave->end_date }}</td>
                        </tr>
                        <tr>
                            <th>عدد الأيام</th>
                            <td>{{ $leave->days }}</td>
                        </tr>
                        <tr>
                            <th>الحالة</th>
                            <td>{{  $statusLables[$leave->status] ?? $leave->status}}</td>
                        </tr>
                        <tr>
                            <th>تاريخ الطلب</th>
                            <td>{{ $leave->created_at }}</td>
                        </tr>
                        <tr>
                            <th>تاريخ التحديث</th>
                            <td>{{ $leave->updated_at }}</td>
                        </tr>
                        <tr>
                            <th>سبب الإجازة</th>
                            <td>{{ $leave->reason }}</td>
                        </tr>
                        <tr>
                            <th>ملاحظات</th>
                            <td>{{ $leave->notes }}</td>
                        </tr>

                   </table>
                </div>
            </div>
        </div>
    </div>


@endsection



@push('styles')
    <style>

    </style>
@endpush

@push('scripts')

@endpush