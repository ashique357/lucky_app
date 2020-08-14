<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Lucky app</title>
      <!-- Google Font: Source Sans Pro -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
      <!-- icheck bootstrap -->
      <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
      <!-- Theme style -->
      <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
   </head>
   <body class="hold-transition login-page">
      <div class="login-box">
         <div class="login-logo">
            <a href=""><b>Lucky</b>App</a>
         </div>
         <!-- /.login-logo -->
         <div class="card">
            <div class="card-body login-card-body">
               <p class="login-box-msg">Sign in to start your session</p>
               <form method="POST" action="{{ route('login') }}">
                  @csrf
                  <div class="input-group mb-3">
                     <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email" autofocus>
                     <div class="input-group-append">
                        <div class="input-group-text">
                           <span class="fas fa-envelope"></span>
                        </div>
                     </div>
                  </div>
                  @error('email')
                  <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                  <div class="input-group mb-3">
                     <input type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                     <div class="input-group-append">
                        <div class="input-group-text">
                           <span class="fas fa-lock"></span>
                        </div>
                     </div>
                     @error('password')
                     <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                     </span>
                     @enderror
                  </div>
                  <div class="row">
                     <div class="col-8">
                        <div class="icheck-primary">
                           <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}
                           <label for="remember">
                           Remember Me
                           </label>
                        </div>
                     </div>
                     <!-- /.col -->
                     <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                     </div>
                     <!-- /.col -->
                  </div>
                  <!-- /.social-auth-links -->
                  @if (Route::has('password.request'))
                  <p class="mb-1">
                     <a href="{{ route('password.request') }}">I forgot my password</a>
                  </p>
                  @endif
               </form>
               <!-- <p class="mb-0">
                  <a href="" class="text-center">Register</a>
                  </p> -->
            </div>
            <!-- /.login-card-body -->
         </div>
      </div>
      <!-- /.login-box -->
      <!-- jQuery -->
      <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
      <!-- Bootstrap 4 -->
      <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
      <!-- AdminLTE App -->
      <script src="{{asset('dist/js/adminlte.min.js')}}"></script>
   </body>
</html>

