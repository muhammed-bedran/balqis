@php
$current = $current ?? '';
@endphp

<div class="mb-3">
    <a href="{{ route('dashboard.hr.index') }}" class="btn {{ $current === 'overview' ? 'btn-primary' : 'btn-outline-primary' }}"> نظرة عامة</a>
    <a href="{{ route('dashboard.hr.departments.index') }}" class="btn {{ $current === 'departments' ? 'btn-primary' : 'btn-outline-primary' }}"> الأقسام</a>
    <a href="{{ route('dashboard.hr.employees.index') }}" class="btn {{ $current === 'employees' ? 'btn-primary' : 'btn-outline-primary' }}"> الموظفين</a>
</div>