@extends('layouts.main')


@section('css_files')

  <style>
      #chat {
        border-radius: 50%;
        position: relative;
        top: 1px;
        left: 10px;
        text-decoration: blink;
        animation-name: blinker;
        animation-duration: 0.6s;
        animation-iteration-count: infinite;
        animation-timing-function: ease-in-out;
        animation-direction: alternate;
    }
    @keyframes blinker {
        from {
            opacity: 1.0;
        }

        to {
            opacity: 0.0;
        }
    }
  </style>
@endsection



@section('sidebar-menu')
 <!-- Sidebar Menu -->
 <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
           <li class="nav-item ">
            <a href={{ url('viocer/dashboard') }} class="nav-link  ">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
            </a>
        </li>
        <li class="nav-item">
            <a href={{ url('viocer/request') }} class="nav-link  active">
                @if($cont)
                <span class="position-absolute  translate-middle badge rounded-pill bg-danger" id="chat">
                  {{ $cont }}  <span class="admin-nav-text"></span></span>
                @endif
                    <i class="nav-icon fas fa-file" aria-hidden="true"></i>
                    <p>PR Approval (New)</p>
            </a>
        </li>

        <li class="nav-item">
            <a href={{ url('viocer/quotation') }} class="nav-link ">
                @if($conts)
                <span class="position-absolute  translate-middle badge rounded-pill bg-danger" id="chat">
                    {{ $conts }}  <span class="admin-nav-text"></span></span>
                @endif
                   &nbsp; <i class="fa fa-newspaper"></i>

                    <p>Quotation Approval (New)</p>
            </a>
        </li>

        <li class="nav-item">
            <a href={{ url('viocer/all') }} class="nav-link ">
                &nbsp;  <i class="fa fa-list-ul" aria-hidden="true"></i> &nbsp;

                <p>All Requests</p>
            </a>
        </li>

        <li class="nav-item ">
            <a href="#" class="nav-link ">
                <i class="fa fa-cogs" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;
                <p>
                    Settings
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href={{ url('viocer/profile') }} class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>User Profile</p>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
  </nav>
  <!-- /.sidebar-menu -->
@endsection


<!--sub-heading -->
@section('sub-heading')

   <div class="col-sm-6">
      <h1 class="m-0">PR Approval</h1>
   </div>
   <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ url('viocer/dashboard') }}">Home</a></li>
      <li class="breadcrumb-item active">PR Aproval</li>
    </ol>
  </div>
@endsection

@section('main-content')

{{-- Main Table --}}
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    <h3 class="card-title">New Request Details </h3>

                </div>

            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example2" class="table table-bordered table-hover data-table">
            <thead>
            <tr>
              <th>PR Number</th>
              <th>Requester Name</th>
              <th>Date</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($filterRequest as $filterRequests )
                <tr>
                    <td><a href="{{ url("viocer/details/$filterRequests->id") }} ">{{ $filterRequests->reqno }}</a></td>

                    <td>{{ $filterRequests->req_name  }} </td>

                    <td>{{ $filterRequests->reqdate }}</td>

                    <td class="project-state"><span class="badge badge-info blink_me"><b>New Request</b></span></td>


                    <td><a class="btn btn-primary btn-sm" href="{{ url("viocer/details/$filterRequests->id") }}"> <i class="nav-icon fas fa-eye"></i> &nbsp; View</a>

                      </td>
                  </tr>
                @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
{{--End  Main Table --}}

@endsection


@section('js_files')


{{-- This for DataTable Config --}}
<script>
    $(function () {
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
</script>


<script type="text/javascript">
(function blink() {
	$('.blink_me').fadeOut(1000).fadeIn(500, blink);
})();
</script>


@endsection
