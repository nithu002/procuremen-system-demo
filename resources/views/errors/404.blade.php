{{-- @extends('errors::minimal')

@section('title', __('Not Found'))
@section('code', '404')
@section('message', __('Not Found')) --}}


<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8" />
        <title>404 Error</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->


        <!-- Bootstrap Css -->
        <link href="{{ asset('assets/dist/css/custom/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('assets/dist/css/custom/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('assets/dist/css/custom/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />


    </head>

    <body>
        <div class="auth-bg-basic d-flex align-items-center min-vh-100">
            <div class="bg-overlay bg-light"></div>
            <div class="container">
                <div class="d-flex flex-column min-vh-100 py-5 px-3">
                    <div class="row justify-content-center">
                        <div class="col-xl-5">
                            <div class="text-center text-muted mb-2">
                                <div class="pb-3">
                                    <a href="#">
                                        <span class="logo-lg">
                                            <img src="{{ asset('/assets/img/logo/system logo.jpg') }}" alt="" height="75">
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center my-auto">
                        <div class="col-md-8 col-lg-6 col-xl-7">
                            <div class="card bg-transparent shadow-none border-0">
                                <div class="card-body">
                                    <div class="px-3 py-3 text-center">
                                        <h1 class="error-title"><span class="blink-infinite">404</span></h1>
                                        <h4 class="text-uppercase">Sorry, page not found</h4>
                                        <p class="font-size-15 mx-auto text-muted w-75 mt-4">Oops! 😖 The requested URL was not found on this server.</p>
                                        <div class="mt-5 text-center">
                                            <a href="javascript:history.back()" class="btn btn-primary waves-effect waves-light">Go Back</a>
                                        </div>
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
        <script src="{{ asset('public/assets/dist/js/pages/custom/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('public/assets/dist/js/pages/custom/metismenujs.min.js') }}"></script>
        <script src="{{ asset('public/assets/dist/js/pages/custom/simplebar.min.js') }}"></script>
        <script src="{{ asset('public/assets/dist/js/pages/custom/feather.min.js') }}"></script>

    </body>

</html>
