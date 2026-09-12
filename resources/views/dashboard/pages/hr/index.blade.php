@extends('layouts.dashboard.index')

@section('title', 'الموارد البشرية')

@section('content')
        <x-flash-message />
    @include('dashboard.pages.hr._menu', ['current' => 'overview'])        <!-- إحصائيات سريعة -->
            <div class="row mb-4">
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="stat-box">
                        <div class="stat-icon">
                            <i class="fas fa-list"></i>
                        </div>
                        <div class="stat-content">
                            <div class="stat-number">{{ $stats['departments_count'] }}</div>
                            <div class="stat-label">إجمالي الأقسام</div>
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


@endsection



@push('styles')
    <style>

    </style>
@endpush

@push('scripts')

@endpush