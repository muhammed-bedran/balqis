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
                    <div class="stat-number">{{ $category->name }} / {{ $products->total() }}</div>
                    <div class="stat-label">إجمالي المنتجات</div>
                </div>
            </div>
        </div>
       
    </div>

    <x-flash-message />
    <!-- الجدول -->
 
    <div class="card table-card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-list-alt ml-2"></i>
                قائمة المنتجات
            </h3>
            <div class="card-tools">
                <a href="{{ route('dashboard.products.create') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus ml-1"></i> إضافة منتج جديدة
                </a>
                {{-- <button type="button" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus ml-1"></i> إضافة متجر جديدة
                </button> --}}

            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive table-responsive-custom">
                <table class="table table-bordered table-striped table-hover table-brown mb-0">
                <thead>
                    <tr>
                        <th class="col-id">#</th>
                        <th>اسم المنتج</th>
                        <th>اسم المتجر</th>
                        <th>الوصف</th>
                        <th>الحالة</th>
                        <th>تاريخ التسجيل</th>
                        <th class="col-actions">الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                        <tr>
                            <td class="col-id">{{ $product->id }}</td>
                            <td><strong>{{ $product->name }}</strong></td>
                            <td>{{ $product->store->name ?? '-' }}</td>
                            <td class="text-muted-cell" title="{{ $product->description }}">{{ $product->description ?? '-' }}</td>
                            <td>
                                <span class="badge badge-status {{ $product->status }}">
                                    {{ $product->status === 'active' ? 'نشط' : 'غير نشط' }}
                                </span>
                            </td>
                            <td>{{ $product->created_at?->format('Y-m-d') }}</td>
                            <td class="col-actions">
                                <div class="action-btn-group">
                                    <a href="{{ route('dashboard.products.show', $product->id) }}" class="btn btn-info btn-action" title="عرض">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('dashboard.products.edit', $product->id) }}" class="btn btn-warning btn-action" title="تعديل">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('dashboard.products.destroy', $product->id) }}" method="post">
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
                            <td colspan="7">لا توجد منتجات في هذه الفئة</td>
                        </tr>
                    @endforelse
                </tbody>
                </table>
            </div>
            @if ($products->hasPages())
                <div class="dashboard-pagination">
                    {{ $products->links() }}
                </div>
            @endif
        </div>
    </div>


@endsection