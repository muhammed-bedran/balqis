@php
    $typeLables = [
        'late' => 'تأخير',
        'absence' => 'غياب',
        'loan' => 'قرض',
        'penalty' => 'عقوبة',
        'tax' => 'ضريبة',
        'other' => 'أخرى',
    ];


@endphp
@extends('layouts.dashboard.index')

@section('title', 'الموارد البشرية -  الخصومات')
@section('content')
    @include('dashboard.pages.hr._menu', ['current' => 'deducations'])
    <!-- إحصائيات سريعة -->
    {{-- <div class="row mb-4">
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="stat-box">
                <div class="stat-icon">
                    <i class="fas fa-list"></i>
                </div>
                <div class="stat-content">
                    <div class="stat-number">128</div>
                    <div class="stat-label">إجمالي الأقسام</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="stat-box">
                <div class="stat-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="stat-content">
                    <div class="stat-number">96</div>
                    <div class="stat-label">نشط</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="stat-box">
                <div class="stat-icon">
                    <i class="fas fa-clock"></i>
                </div>
                <div class="stat-content">
                    <div class="stat-number">22</div>
                    <div class="stat-label">قيد الانتظار</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="stat-box">
                <div class="stat-icon">
                    <i class="fas fa-ban"></i>
                </div>
                <div class="stat-content">
                    <div class="stat-number">10</div>
                    <div class="stat-label">موقوف</div>
                </div>
            </div>
        </div>
    </div> --}}

    <x-flash-message />
    <!-- الجدول -->
    <form action="{{ URL::current() }}" method="get" class="row m-2 g-3 align-items-end m-2 mt-3">
        <div class="col-md-4 ">
            <input type="text" name="name" class="form-control" value="{{ request()->query('name') }}">
        </div>
        <div class="col-md-3">
            <select name="status" class="form-control">
                <option value="">الكل</option>
                <option value="active" {{ request()->query('status') === 'active' ? 'selected' : '' }}>نشط</option>
                <option value="inactive" {{ request()->query('status') === 'inactive' ? 'selected' : '' }}>غير نشط</option>
            </select>
        </div>
        <div class="col-md-4">
            <button type="submit" class="btn btn-primary">
                بحث
                <i class="fas fa-search ml-1"></i>
            </button>
            <button type="reset" class="btn btn-danger" id="resetBtn">
                اعادة التعيين
                <i class="fas fa-undo ml-1"></i>
            </button>

        </div>

    </form>
    <div class="card table-card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-list-alt ml-2"></i>
                قائمة خصومات الموظفين 
            </h3>
            <div class="card-tools">
                <a href="{{ route('dashboard.hr.deducations.create') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus ml-1"></i> إضافة خصم جديد
                </a>


            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive table-responsive-custom">
                <table class="table table-bordered table-striped table-hover table-brown mb-0">
                    <thead>
                        <tr>
                            <th class="col-id">#</th>
                            <th>اسم الموظف</th>
                            <th>العنوان</th>
                            <th>نوع </th>
                            <th>المبلغ</th>
                            <th>تاريخ الخصم</th>


                            <th>تاريخ الطلب</th>

                            <th class="col-actions">الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($deductions as $item)
                            <tr>
                                <td class="col-id">{{ $item->id }}</td>
                                <td><strong>{{ $item->employee->name }}</strong></td>
                                <td>{{ $item->title }}</td>
                                <td>{{  $typeLables[$item->type] ?? $item->type}}</td>
                                <td>{{ $item->amount }}</td>
                                <td>{{ $item->date }}</td>


                                <td>{{ $item->created_at?->format('Y-m-d') }}</td>
                                <td class="col-actions">
                                    <div class="action-btn-group">
                                        <a href="{{ route('dashboard.hr.deducations.show', $item->id) }}"
                                            class="btn btn-info btn-action" title="عرض">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('dashboard.hr.deducations.edit', $item->id) }}"
                                            class="btn btn-warning btn-action" title="تعديل">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <form action="{{ route('dashboard.hr.deducations.destroy', $item->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-action" title="حذف">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr class="table-empty">
                                <td colspan="6">لا توجد مكافآت</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection



@push('styles')
    <style>

    </style>
@endpush

@push('scripts')
    <script>
        document.getElementById('resetBtn').addEventListener('click', function () {
            window.location.href = '{{ route('dashboard.hr.departments.index') }}';
        });
    </script>
@endpush