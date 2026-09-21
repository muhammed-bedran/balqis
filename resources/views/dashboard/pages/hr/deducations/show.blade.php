@php
    $typeLables = [
        'performance' => 'مكافأة أداء',
        'overtime' => 'مكافأة عمل إضافي',
        'holiday' => 'مكافأة عطلة',
        'commission' => 'مكافأة  عمولة',
     
    ];
    
@endphp

@extends('layouts.dashboard.index')
@section('title', 'الموارد البشرية - تفاصيل طلب الإجازة')
@section('content')
    <div class="row mb-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> تفاصيل  المكافآت </h3>
                    <a href="{{ route('dashboard.hr.bonuses.index') }}" class="btn btn-primary btn-sm">قائمة المكافآت  </a>
                </div>
                <div class="card-body">
                   <table class="table table-bordered">
                       <tr>
                           <th>اسم الموظف</th>
                           <td>{{ $bonus->employee->name }}</td>
                       </tr>
                       <tr>
                           <th>نوع المكافآت</th>
                           <td>{{ $typeLables[$bonus->type] }}</td>
                       </tr>
                       <tr>
                           <th>قيمة المكافآت</th>
                           <td>{{ $bonus->amount }}</td>
                       </tr>
                       <tr>
                           <th>ملاحظات</th>
                           <td>{{ $bonus->notes }}</td>
                       </tr>
                       <tr>
                           <th>تاريخ المكافآت</th>
                           <td>{{ $bonus->date }}</td>
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