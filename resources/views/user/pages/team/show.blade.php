@extends('layouts.dashboard.user')
@section('content')
<div class="row mb-4">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"> تفاصيل التصنيف </h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <tbody>
                        <tr>
                            <th>اسم العضو</th>
                            <td>{{ $member->name }}</td>
                        </tr>
                        <tr>
                            <th>وصف العضو</th>
                            <td>{{ $member->email }}</td>
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