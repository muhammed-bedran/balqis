@extends('layouts.dashboard.index')


@section('content')

    <div class="row mb-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">التحقق بخطوتين</h3>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (!$user->two_factor_secret)
                        <p>لم يتم تفعيل التحقق بخطوتين</p>
                        <form action="{{ route('two-factor.enable') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary">تفعيل التحقق بخطوتين</button>
                        </form>
                    @else
                        <p>تم تفعيل التحقق بخطوتين</p>
                        <div class="row">
                            <div class="col-md-6">

                                <div class="mb-3">
                                    {!! $user->twoFactorQrCodeSvg()  !!}
                                </div>

                            </div>
                            <div class="col-md-6">
                                <h5>رمز الاسترداد</h5>
                                <ul class="list-group">
                                    @foreach ($user->recoveryCodes() as $code)
                                        <li class="list-group-item">{{ $code }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <form action="{{ route('two-factor.disable') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">تعطيل التحقق بخطوتين</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection