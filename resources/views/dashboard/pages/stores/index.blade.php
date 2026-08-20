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
                    <div class="stat-label">إجمالي المتاجر</div>
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
                قائمة المتاجر
            </h3>
            <div class="card-tools">
                <a href="{{ route('dashboard.stores.create') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus ml-1"></i> إضافة متجر جديدة
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
                        <th>اسم المتجر</th>
                        <th> الوصف</th>
                        <th>الحالة</th>
                        <th>تاريخ التسجيل</th>
                        <th>الإجراءات</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($stores as $store)
                        <tr>
                            <td>{{ $store->id }}</td>
                            <td><strong>{{ $store->name }}</strong></td>
                            <td>{{ $store->description }}</td>
                            <td>{{ $store->status }}</td>
                            <td>{{ $store->created_at }}</td>
                            <td style="justify-content: space-between;display:flex">
                                {{-- <button class="btn btn-primary btn-action" title="عرض"><i class="fas fa-eye"></i></button> --}}
                                <a href="{{ route('dashboard.stores.show', $store->id) }}" class="btn btn-primary btn-action" title="عرض"> <i
                                                                        class="fas fa-eye"></i> </a>

                                <a href="{{ route('dashboard.stores.edit', $store->id) }}" class="btn btn-warning btn-action" title="تعديل">  <i class="fas fa-edit"></i> </a>
                                {{-- <button class="btn btn-warning btn-action" title="تعديل" ><i class="fas fa-edit"></i></button> --}}
                                {{-- <button class="btn btn-danger btn-action" title="حذف"><i class="fas fa-trash"></i></button> --}}
                                <form action="{{ route('dashboard.stores.destroy', $store->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-action" title="حذف"><i class="fas fa-trash"></i></button>

                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection



@push('styles')
    <style>

    </style>
@endpush

@push('scripts')

    <script src="{{asset('dashboard/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('dashboard/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('dashboard/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
        <script>
            $(function () {
                $('#usersTable').DataTable({
                    responsive: true,
                    lengthChange: true,
                    autoWidth: false,
                    order: [[0, 'asc']],
                    language: {
                        search: 'بحث:',
                        lengthMenu: 'عرض _MENU_ سجل',
                        info: 'عرض _START_ إلى _END_ من _TOTAL_ سجل',
                        infoEmpty: 'لا توجد سجلات',
                        infoFiltered: '(تمت التصفية من _MAX_ سجل)',
                        zeroRecords: 'لم يتم العثور على نتائج',
                        paginate: {
                            first: 'الأول',
                            last: 'الأخير',
                            next: 'التالي',
                            previous: 'السابق'
                        }
                    }
                });
            });
        </script>
        <script>
            document.getElementById('resetBtn').addEventListener('click',function(){
                window.location.href = '{{ route('dashboard.stores.index') }}';
            });
        </script>
@endpush