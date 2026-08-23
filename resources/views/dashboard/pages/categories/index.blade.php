@extends('layouts.dashboard.index')

@section('content')
    <!-- إحصائيات سريعة -->
    <div class="row mb-4">
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="stat-box">
                <div class="stat-icon">
                    <i class="fas fa-list"></i>
                </div>
                <div class="stat-content">
                    <div class="stat-number">128</div>
                    <div class="stat-label">إجمالي الفئات</div>
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
    </div>

    <x-flash-message />
    <!-- الجدول -->
    <form action="{{ URL::current() }}" method="get" class="row m-2 g-3 align-items-end m-2 mt-3">
        <div class="col-md-4 ">
            <input type="text" name="name" class="form-control" value="{{ request()->query('name') }}">
        </div>
        <div class="col-md-3">
            <select name="status" class="form-control">
                <option value="">الكل</option>
                <option value="active" {{ request()->query('status') === 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ request()->query('status') === 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>
        <div class="col-md-4">
            <button type="submit" class="btn btn-primary">
                search
                <i class="fas fa-search ml-1"></i>  
            </button>
            <button type="reset" class="btn btn-danger" id="resetBtn">
                reset
                <i class="fas fa-undo ml-1"></i>  
            </button>

        </div>

    </form>
    <div class="card table-card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-list-alt ml-2"></i>
                قائمة الفئات
            </h3>
            <div class="card-tools">
                <a href="{{ route('dashboard.categories.create') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus ml-1"></i> إضافة فئة جديدة
                </a>
                {{-- <button type="button" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus ml-1"></i> إضافة فئة جديدة
                </button> --}}

            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive table-responsive-custom">
                <table class="table table-bordered table-striped table-hover table-brown mb-0">
                <thead>
                    <tr>
                        <th class="col-id">#</th>
                        <th>اسم الفئة</th>
                        <th>الوصف</th>
                        <th>عدد المنتجات</th>
                        <th>الحالة</th>
                        <th>تاريخ التسجيل</th>
                        <th class="col-actions">الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $category)
                        <tr>
                            <td class="col-id">{{ $category->id }}</td>
                            <td><strong>{{ $category->name }}</strong></td>
                            <td class="text-muted-cell" title="{{ $category->description }}">{{ $category->description ?? '-' }}</td>
                            <td>{{ $category->products_count }}</td>
                            <td>
                                <span class="badge badge-status {{ $category->status }}">
                                    {{ $category->status === 'active' ? 'نشط' : 'غير نشط' }}
                                </span>
                            </td>
                            <td>{{ $category->created_at?->format('Y-m-d') }}</td>
                            <td class="col-actions">
                                <div class="action-btn-group">
                                    <a href="{{ route('dashboard.categories.show', $category->id) }}" class="btn btn-info btn-action" title="عرض">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('dashboard.categories.edit', $category->id) }}" class="btn btn-warning btn-action" title="تعديل">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="{{ route('dashboard.categories.products', $category->id) }}" class="btn btn-brown btn-action" title="المنتجات">
                                        <i class="fas fa-box"></i>
                                    </a>
                                    <form action="{{ route('dashboard.categories.destroy', $category->id) }}" method="post">
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
                            <td colspan="7">لا توجد فئات</td>
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
            window.location.href = '{{ route('dashboard.categories.index') }}';
        });
    </script>
@endpush