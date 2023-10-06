<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="{{ asset('assets/img/icons/Sri-Lanka-Skills-Logo.png') }}" type="image/x-icon" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/icons/Sri-Lanka-Skills-Logo.png') }}" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Procurement System</title>

    <!-- Fonts -->
    @yield('css_files')

    <!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href={{ url('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback') }}>
  <!-- Font Awesome Icons -->
<link rel="stylesheet" href={{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}>
  <!-- Theme style -->
  <link rel="stylesheet" href={{ asset('assets/dist/css/adminlte.min.css') }}>
   <!-- DataTables -->
 <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
 <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
 <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
 <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
 <link rel="stylesheet" href="{{ asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
      <!-- SweetAlert2 -->
 <link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
      <!-- Toastr -->
        {{-- Custom css --}}
 <link rel="stylesheet" href={{ asset('assets/dist/css/custom/invoiceprint.css') }}>
 <link rel="stylesheet" href="{{ asset('assets/plugins/toastr/toastr.min.css') }}">
         <!-- iCheck for checkboxes and radio inputs -->
 <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
      <style>
            .loading {
            z-index: 20;
            position: absolute;
            top: 0;
            left:-5px;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.4);
        }
        .loading-content {
            position: absolute;
            border: 16px solid #f3f3f3; /* Light grey */
            border-top: 16px solid #3498db; /* Blue */
            border-radius: 50%;
            width: 50px;
            height: 50px;
            top: 40%;
            left:35%;
            animation: spin 2s linear infinite;
            }

            @keyframes spin {
                0% { transform: rotate(0deg); }
                100% { transform: rotate(360deg); }
            }


      </style>

    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">

    <section id="loading">
        <div id="loading-content"></div>
      </section>

    <div class="wrapper">

    @if($data->user_role =='Admin')
       @include('layouts.includes.admin-navbar')

    @endif

    @if($data->user_role =='Financial')
       @include('layouts.includes.financial-navbar')

    @endif

    @if($data->user_role =='Super_voicer')
      @include('layouts.includes.super-navbar')
    @endif

    @if ($data->user_role =='Procurement')
        @include('layouts.includes.procurement-navbar')

    @elseif($data->user_role =='programeLead')
        @include('layouts.includes.programe-navbar')

    @endif



    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="#" class="brand-link">
          <img src="{{ asset('assets/dist/img/AdminLTELogo.png') }}"  class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">Procurement System</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">

                 @if($data->user_img )
                 <div class="image">
                  <img src="/storage/{{ $data->user_img }}" class="img-circle elevation-2">
                </div>
                 @endif

                <div class="info">
                  <a href="#" class="d-block">{{ $data->name }}</a>
                </div>
              </div>

              <!-- SidebarSearch Form -->

              @yield('sidebar-menu')
        </div>
    </aside>
    <div class="content-wrapper">
          <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <!-- /.col -->
            @yield('sub-heading')<!-- /.col -->

            <!--ALERTS FILES HERE-->
            @include('layouts.includes.alerts.toastr')
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <div class="content">
        <div class="container-fluid">
             @yield('main-content')
        </div>
      </div>

    </div>

      @include('layouts.includes.admin-footer')

      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
    </div>


    {{-- This dependent dropdown javascript --}}
<script src="{{ url('http://code.jquery.com/jquery-3.4.1.js') }}"></script>

    <script src={{ asset('assets/plugins/jquery/jquery.min.js') }}></script>
    <!-- Bootstrap 4 -->
    <script src={{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}></script>
    <!-- AdminLTE App -->
    <script src={{ asset('assets/dist/js/adminlte.min.js') }}></script>
    <!-- DataTables  & Plugins -->
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>

<script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('assets/plugins/inputmask/jquery.inputmask.min.js') }}"></script>



    @yield('js_files')



    @include('layouts.includes.js.toastr-js')
    <script>

            function showLoading() {
            document.querySelector('#loading').classList.add('loading');
            document.querySelector('#loading-content').classList.add('loading-content');
            }

            function hideLoading() {
            document.querySelector('#loading').classList.remove('loading');
            document.querySelector('#loading-content').classList.remove('loading-content');
            }


    </script>
</body>
</html>
