@php
    $statusLables = [
        'active' => 'نشط',
        'on_leave' => 'في إجازة',
        'terminated' => 'تم إنهاء الخدمة',
        'inactive' => 'غير نشط',
    ]
@endphp

@extends('layouts.dashboard.index')
@section('title', 'الموارد البشرية - تفاصيل الموظف')
@section('content')
    <div class="row mb-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> تفاصيل الموظف </h3>
                    <a href="{{ route('dashboard.hr.employees.index') }}" class="btn btn-primary btn-sm">قائمة الموظفين</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <tbody>
                            <tr>
                                <th>اسم
                                    الموظف</th>
                                </th>
                                <td>{{ $employee->name }}</td>
                            </tr>
                            <tr>
                                <th>تاريخ التوظيف</th>
                                <td>{{ $employee->hire_date }}</td>
                            </tr>
                            <tr>
                                <th>حالة الموظف</th>
                                <td>{{ $statusLables[$employee->status] ?? $employee->status }}</td>
                            </tr>
                            <tr>
                                <th>تاريخ الانشاء</th>
                                <td>{{ $employee->created_at }}</td>
                            </tr>
                            <tr>
                                <th>تاريخ التعديل</th>
                                <td>{{ $employee->updated_at }}</td>
                            </tr>
                            <tr>
                                <th>وصف الموظف</th>
                                <td>{{ $employee->address }}</td>
                            </tr>
                            <tr>
                                <th>القسم</th>
                                <td>{{ $employee->department?->name ?? '-' }}</td>
                            </tr>
                           

                        </tbody>
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