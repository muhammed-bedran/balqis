@extends('layouts.dashboard.index')

@section('title', 'Create role')

@section('content')
    @include('dashboard.pages.roles._styles')
    @php $namePrefix = config('role-permession.ui.route_name_prefix', 'role-permession.'); @endphp

    <div class="rp-card">
        <div class="rp-card-head">
            <h1>Create role</h1>
            <a class="rp-btn rp-btn-secondary" href="{{ route($namePrefix . 'roles.index') }}">Back</a>
        </div>
        <div class="rp-card-body">
            <form method="POST" action="{{ route($namePrefix . 'roles.store') }}">
                @csrf
                @include('dashboard.pages.roles._form')
                <div class="rp-footer-actions">
                    <button type="submit" class="rp-btn rp-btn-primary">Create role</button>
                    <a class="rp-btn rp-btn-secondary" href="{{ route($namePrefix . 'roles.index') }}">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
