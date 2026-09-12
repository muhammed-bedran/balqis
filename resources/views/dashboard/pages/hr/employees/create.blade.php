@extends('layouts.dashboard.index')

@section('title', 'الموارد البشرية - إضافة موظف جديد')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

@endif
    <div class="row mb-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">إضافة موظف جديد</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('dashboard.hr.employees.store') }}" method="POST">
                        @csrf
                        @include('dashboard.pages.hr.employees._form')
                        <button type="submit" class="btn btn-primary">حفظ الموظف</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection