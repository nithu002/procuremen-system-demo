

<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8" />
        <title>lock Screen</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->

        <link rel="icon" href="{{ url('public/assets/img/icons/Sri-Lanka-Skills-Logo.png') }}" type="image/x-icon" />
        <link rel="shortcut icon" type="image/x-icon" href="{{ url('public/assets/img/icons/Sri-Lanka-Skills-Logo.png') }}" />

        <!-- Bootstrap Css -->
        <link href="{{ url('public/assets/dist/css/custom/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ url('public/assets/dist/css/custom/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ url('public/assets/dist/css/custom/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
           <!-- Toastr -->
      <link rel="stylesheet" href="{{ url('public/assets/plugins/toastr/toastr.min.css') }}">
      {{-- <link rel="stylesheet" href="{{ url('public/assets/dist/css/adminlte.min.css') }}"> --}}


    </head>

    <body>

        <div class="auth-bg-basic d-flex align-items-center min-vh-100">
            <div class="bg-overlay bg-light"></div>
            <div class="container">
                @include('layouts.includes.alerts.toastr')
                <div class="d-flex flex-column min-vh-100 py-5 px-3">
                    <div class="row justify-content-center">
                        <div class="col-xl-5">
                            <div class="text-center text-muted mb-2">
                                <div class="pb-3">
                                    <a href="#">
                                        <span class="logo-lg">
                                            <img src="{{ asset('assets/img/logo/system logo.jpg') }}" alt="" height="75">
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center my-auto">
                        <div class="col-md-8 col-lg-6 col-xl-5">
                            <div class="card bg-transparent shadow-none border-0">
                                <div class="card-body">
                                    <div class="py-3 text-center">
                                        <div class="user-thumb mb-4 mb-md-5">
                                            <img src="{{ asset("/storage/$data->user_img") }}" class="rounded-circle img-thumbnail avatar-lg" alt="thumbnail">
                                            <h5 class="font-size-18 mt-3">{{ $data->name }}</h5>
                                        </div>

                                        <form method="POST" action="{{ url('voiser/lockscreen') }}">
                                            @csrf

                                            <div class="form-floating form-floating-custom mb-3">
                                                <input type="password" name="password" class="form-control" id="input-password" placeholder="Enter Password">
                                                <label for="input-password">Password</label>
                                                <div class="form-floating-icon">
                                                    <i class="uil uil-padlock"></i>
                                                </div>
                                            </div>
                                            <span class="text-danger">@error('password'){{ $message }}
                                                @enderror</span>

                                            <div class="mt-4">
                                                <button  class="btn btn-primary w-100" type="submit">Unlock</button>
                                            </div>

                                            <div class="mt-4 text-center">
                                                <p class="text-muted mb-0">Not you {{ $data->name }} ? return  <a href="{{ url('viocerlock') }}" class="fw-semibold text-decoration-underline"> Login </a> </p>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div><!-- end row -->

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="mt-4 mt-md-5 text-center">
                                <p class="mb-0">© <script>document.write(new Date().getFullYear())</script> All rights reserved.</p>
                            </div>
                        </div>
                    </div> <!-- end row -->
                </div>
            </div>
            <!-- end container fluid -->
        </div>
        <!-- end authentication section -->

        <!-- JAVASCRIPT -->
        <script src="{{ asset('assets/dist/js/pages/custom/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/dist/js/pages/custom/metismenujs.min.js') }}"></script>
        <script src="{{ asset('assets/dist/js/pages/custom/simplebar.min.js') }}"></script>
        <script src="{{ asset('assets/dist/js/pages/custom/feather.min.js') }}"></script>
        @include('layouts.includes.js.toastr-js')
        <script>
                $(function() {
            var Toast = Swal.mixin({
              toast: true,
              position: 'top-right',
              showConfirmButton: false,
              timer: 5000
            });

            $('.swalDefaultSuccess').show(function() {
              Toast.fire({
                icon: 'success',
                title: '{{ Session::get('success') }}'
              })
            });
            $('.swalDefaultInfo').show(function() {
              Toast.fire({
                icon: 'info',
                title: '{{ Session::get('info') }}'
              })
            });
            $('.swalDefaultError').show(function() {
              Toast.fire({
                icon: 'error',
                title: '{{ Session::get('error') }}'
              })
            });
            $('.swalDefaultWarning').show(function() {
              Toast.fire({
                icon: 'warning',
                title: '{{ Session::get('warning') }}'
              })
            });
            $('.swalDefaultQuestion').show(function() {
              Toast.fire({
                icon: 'question',
                title: '{{ Session::get('question') }}'
              })
            });
            $('.swalError').show(function() {
              Toast.fire({
                icon: 'error',
                title: 'Not Added The details! some errors from your created form please check manually.'
              })
            });
          });
        </script>
    </body>

</html>
