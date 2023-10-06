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
    <div class="card-body login-card-body">
      <p class="login-box-msg">You are only one step a way from your new password, recover your password now.</p>

      <form action="{{ url('program/reset-password') }}" method="POST">
        <div class="input-group mb-3">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
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
            <div class="input-group mb-3">
                <input type="password" class="form-control" name="password_confirmation"  placeholder="Confirm Password">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
              <span class="text-danger">@error('password_confirmation'){{ $message }}
                  @enderror</span>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Change password</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- /.social-auth-links -->

      <p class="mt-3 mb-1">
        <a href="{{ url('/lead') }}">Login</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>

@endsection
