@extends('common.authmaster')

@section('title', 'Verify')

@section('content')
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a>
        </div>

        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Verify Your Email Address</p>
        </div>

        <div class="card-body">
            @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    A fresh verification link has been sent to your email address.
                </div>
            @endif

            Before proceeding, please check your email for a verification link.
            <br>If you did not receive the email, <a href="{{ route('verification.resend') }}">click here to request another</a>.
        </div>
    </div>
</body>
@endsection
