@extends('layouts.dashboard.index')

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
                            <th>اسم التصنيف</th>
                            <td>{{ $category->name }}</td>
                        </tr>
                        <tr>
                            <th>وصف التصنيف</th>
                            <td>{{ $category->description }}</td>
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