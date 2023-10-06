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
    <div class="card-body register-card-body">

      <p class="login-box-msg">Register a new membership</p>

      <form action="{{ url('register') }}" method="post">

        <div class="input-group mb-3">
            @csrf
          <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Full name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <span class="text-danger">@error('name'){{ $message }}
        @enderror</span>
        <div class="input-group mb-3">
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
        <span class="text-danger">@error('password'){{$message}}
            @enderror</span>
            <div class="input-group mb-3">
                <input type="password" class="form-control" name="password_confirmation"  placeholder="Retrypassword">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
              <span class="text-danger">@error('password_confirmation'){{$message}}
                  @enderror</span>


        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree" required>
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <a href="{{ url('/admin') }}" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div>

@endsection
