@extends('common.authmaster')

@section('title', 'Register')

@section('content')
<body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
        <a href="{{ url('/') }}"><img src="{{ asset('theme/dist/img/vlc_logo.png') }}" alt="{{ config('app.name', 'Laravel') }}"></a>
        </div>

        <div class="register-box-body">
            <p class="login-box-msg">Register a new membership</p>

            <form action="{{ route('register') }}" method="post">
                @csrf

                <div class="form-group has-feedback">
                    <input type="text" id="name" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Full name" value="{{ old('name') }}" required autofocus>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>

                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group has-feedback">
                    <input type="email" id="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email" required>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group has-feedback">
                    <input type="password" id="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group has-feedback">
                    <input type="password" id="password-confirm" name="password_confirmation" class="form-control" placeholder="Retype password" required>
                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                </div>

                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                            <input type="checkbox"> I agree to the <a href="#">terms</a>
                            </label>
                        </div>
                    </div>

                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            @if (Route::has('login'))
                <a href="{{ route('login') }}" class="text-center">I already have a membership</a>
            @endif
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->
</body>
@endsection

@section('script')
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
        });
    });
</script>
@endsection