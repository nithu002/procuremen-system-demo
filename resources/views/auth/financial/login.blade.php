@extends('layouts.auth')

@section('body')
@if(Session::has ('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif
@if (Session::has('fail'))
    <div class="alert alert-danger">
        {{ Session::get('fail') }}
    </div>
@endif
<div class="card">
    <div class="card-body login-card-body ">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="{{ url('financial/login') }}" method="POST">
        <div class="input-group mb-3">
            @csrf
          <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <span class="text-danger">@error('email'){{ $message }}
            @enderror</span>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password"  placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <span class="text-danger">@error('password'){{ $message }}
            @enderror</span>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
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
      </form>
      {{-- <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="{{ url('auth/google') }}" class="btn btn-block btn-primary">
            <div style=" position: absolute; margin-top: -6px; margin-left: 50px; width: 35px; height: 35px; border-radius: 2px;
            background-color: #ffffff;"> <img class="google-icon" style=" width: 25px;
            height: 35px;" src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg"/>
            </div> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>Sign in with google</b>

        </a>
      </div> --}}
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="{{ url('financial/forget-password') }}">I forgot my password</a>
      </p>

    </div>
    <!-- /.login-card-body -->
  </div>

@endsection
