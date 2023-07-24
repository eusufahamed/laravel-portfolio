<!doctype html>
<html lang="en" class="fixed accounts sign-in">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>

  <title>Helsinki</title>

  <link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
  <link rel="icon" type="image/png" sizes="192x192" href="favicon/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">

  <!--BASIC css-->
  <!-- ========================================================= -->
  <link rel="stylesheet" href="{{ asset('css/admin/css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('css/admin/css/font-awesome.css') }}">
  <link rel="stylesheet" href="{{ asset('css/admin/css/animate.css') }}">

  <!--TEMPLATE css-->
  <!-- ========================================================= -->
  <link rel="stylesheet" href="{{ asset('css/admin/css/style.css') }}">
</head>

<body>
  <div class="wrap">
    <div class="page-body animated slideInDown">
      <div class="logo">
        <img alt="logo" src="{{ asset('images/logo/eusuf-(1).png') }}"/>
      </div>

      <div class="box">
        <div class="panel mb-none">
          @include('admin.layouts.partials.message')
          <div class="panel-content bg-scale-0">

            <form action="{{ route('processLogin') }}" method="post">
              @csrf
              <div class="form-group mt-md">
                <span class="input-with-icon">
                  <input type="email" class="form-control" id="email" placeholder="Email" required name="email" value="{{ old('email') }}">
                  <i class="fa fa-envelope"></i>
                </span>
              </div>

              <div class="form-group">
                <span class="input-with-icon">
                  <input type="password" class="form-control" id="password" placeholder="Password" required name="password">
                  <i class="fa fa-key"></i>
                </span>
              </div>

              <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit">Login</button>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--BASIC scripts-->
  <!-- ========================================================= -->
  <script src="{{ asset('js/admin/js/jquery-1.12.3.min.js') }}"></script>
  <script src="{{ asset('js/admin/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/admin/js/nano-scroller.js') }}"></script>

  <!--TEMPLATE scripts-->
  <!-- ========================================================= -->
  <script src="{{ asset('js/admin/js/template-script.min.js') }}"></script>
  <script src="{{ asset('js/admin/js/template-init.min.js') }}"></script>
</body>
</html>



<!-- <div class="container">
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
</div> -->
