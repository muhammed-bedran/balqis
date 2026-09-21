@extends('layouts.dashboard.index')

@section('title', 'الموارد البشرية -    إضافة طلب مكافأة جديد')
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
                    <h3 class="card-title">إضافة طلب مكافأة جديد</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('dashboard.hr.bonuses.store') }}" method="POST">
                        @csrf
                        @include('dashboard.pages.hr.bonuses._form')
                        <button type="submit" class="btn btn-primary">حفظ طلب المكافآت</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection