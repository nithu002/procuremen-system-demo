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
        <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>

      <form action="{{ url('forget-password') }}" method="POST">
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

        <div class="row">
            <div class="col-12">
                 <button type="submit" class="btn btn-primary btn-block">Request new password</button>
            </div>
                <!-- /.col -->
        </div>
      </form>

      <!-- /.social-auth-links -->

      <p class="mt-3 mb-1">
        <a href="{{ url('/admin') }}">Login</a>
      </p>
      {{-- <p class="mb-0">
        <a href="{{ url('register') }}" class="text-center">Register a new membership</a>
      </p> --}}
    </div>
    <!-- /.login-card-body -->
  </div>

@endsection
