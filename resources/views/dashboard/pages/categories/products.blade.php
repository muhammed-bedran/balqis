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
            <table id="usersTable" class="table table-bordered table-striped table-hover table-brown" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>اسم المنتج</th>
                       
                        <th>اسم المتجر</th>
                        <th> الوصف</th>
                        <th>الحالة</th>
                        <th>تاريخ التسجيل</th>
                        <th>الإجراءات</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td><strong>{{ $product->name }}</strong></td>
                          
                            <td>{{ $product->store->name }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->status }}</td>
                            <td>{{ $product->created_at }}</td>
                            <td style="justify-content: space-between;display:flex">
                                {{-- <button class="btn btn-primary btn-action" title="عرض"><i class="fas fa-eye"></i></button>
                                --}}
                                <a href="{{ route('dashboard.products.show', $product->id) }}"
                                    class="btn btn-primary btn-action" title="عرض"> <i class="fas fa-eye"></i> </a>

                                <a href="{{ route('dashboard.products.edit', $product->id) }}"
                                    class="btn btn-warning btn-action" title="تعديل"> <i class="fas fa-edit"></i> </a>
                                {{-- <button class="btn btn-warning btn-action" title="تعديل"><i
                                        class="fas fa-edit"></i></button> --}}
                                {{-- <button class="btn btn-danger btn-action" title="حذف"><i class="fas fa-trash"></i></button>
                                --}}
                                <form action="{{ route('dashboard.products.destroy', $product->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-action" title="حذف"><i
                                            class="fas fa-trash"></i></button>

                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $products->links() }}
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
            window.location.href = '{{ route('dashboard.products.index') }}';
        });
    </script>
@endpush