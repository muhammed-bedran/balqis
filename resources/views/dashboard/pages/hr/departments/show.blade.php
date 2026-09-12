@extends('layouts.dashboard.index')
@section('title', 'الموارد البشرية - تفاصيل القسم')
@section('content')
    <div class="row mb-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> تفاصيل القسم </h3>
                    <a href="{{ route('dashboard.hr.departments.index') }}" class="btn btn-primary btn-sm">قائمة القسم</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <tbody>
                            <tr>
                                <th>اسم القسم</th>
                                <td>{{ $department->name }}</td>
                            </tr>
                            <tr>
                                <th>وصف القسم</th>
                                <td>{{ $department->description }}</td>
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