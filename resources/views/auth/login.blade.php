@include('layouts.header')
<div class="login-box">
    <div class="login-box-body">
      <p class="login-box-msg">Login Form</p>
      <form action="{{ route('login') }}" method="post">
          @csrf
        <div class="form-group has-feedback">
          <input type="email" class="form-control  @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" />
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          @error('email')
            <span class="invalid-feedback" role="alert">
                <strong class="text-danger">{{ $message }}</strong>
            </span>
            @enderror

        </div>

        <div class="form-group has-feedback">
          <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required />
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong class="text-danger">{{ $message }}</strong>
                </span>
            @enderror
        </div>




        <div class="form-group row">
            <div class="col-md-6 offset-md-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
      </form>
      <a href="{{ url('student-register') }}" class="text-center">Register a new StudentShip</a>

    </div><!-- /.login-box-body -->
  </div><!-- /.login-box -->
@include('layouts.footer')

{{--
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
