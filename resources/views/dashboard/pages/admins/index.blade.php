@extends('layouts.dashboard.index')

@section('content')

    <x-flash-message />

    <div class="card table-card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-list-alt ml-2"></i>
                قائمة الموظفين
            </h3>
            <div class="card-tools">
                <a href="{{ route('dashboard.admins.create') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus ml-1"></i> إضافة موظف جديد 
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
                        <th>اسم الموظف</th>
                            <th>البريد الإلكتروني</th>
                        <th>تاريخ التسجيل</th>
                        <th class="col-actions">الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($admins as $item)
                        <tr>
                            <td class="col-id">{{ $item->id }}</td>
                            <td><strong>{{ $item->name }}</strong></td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->created_at?->format('Y-m-d') }}</td>
                            <td class="col-actions">
                                <div class="action-btn-group">
                                    <a href="{{ route('dashboard.admins.show', $item->id) }}" class="btn btn-info btn-action" title="عرض">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('dashboard.admins.edit', $item->id) }}" class="btn btn-warning btn-action" title="تعديل">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('dashboard.admins.destroy', $item->id) }}" method="post">
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
                            <td colspan="8">لا توجد بيانات</td>
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
