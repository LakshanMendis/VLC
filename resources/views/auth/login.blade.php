@extends('common.authmaster')

@section('title', 'Login')

@section('content')
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="{{ url('/') }}"><img src="{{ asset('theme/dist/img/vlc_logo.png') }}" alt="{{ config('app.name', 'Laravel') }}"></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form action="{{ route('login') }}" method="post">
        @csrf

        <div class="form-group has-feedback">
            <input type="email" id="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email" value="{{ old('email') }}" required autofocus>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group has-feedback">
            <input type="password" id="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password" value="{{ old('password') }}" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>

            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>

        <div class="row">
            <div class="col-xs-8">
            <div class="checkbox icheck">
                <label>
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                </label>
            </div>
        </div>

        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    @if (Route::has('password.request'))
        <a href="{{ route('password.request') }}">I forgot my password</a><br>
    @endif

    @if (Route::has('register'))
        <a href="{{ route('register') }}" class="text-center">Register a new membership</a>
    @endif

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
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