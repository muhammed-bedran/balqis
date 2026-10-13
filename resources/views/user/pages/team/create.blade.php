@extends('layouts.dashboard.user')


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
                    <h3 class="card-title">إضافة عضو جديد</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('user.teams.store') }}" method="POST">
                        @csrf
                        @include('user.pages.team._form')
                        <button type="submit" class="btn btn-primary">حفظ العضو</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection