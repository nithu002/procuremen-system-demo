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
            <a href={{ url('financial/dashboard') }} class="nav-link  ">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
            </a>
        </li>
        <li class="nav-item">
            <a href={{ url('financial/request') }} class="nav-link  active">

                    <i class="nav-icon fas fa-file" aria-hidden="true"></i>
                    <p>Purchase Order Details</p>
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
                    <a href={{ url('financial/profile') }} class="nav-link">
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
      <h1 class="m-0">Purchase Orders</h1>
   </div>
   <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ url('financial/dashboard') }}">Home</a></li>
      <li class="breadcrumb-item active">Purchase Orders</li>
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
                    <h3 class="card-title">New Purchase Order List</h3>

                </div>

            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example2" class="table table-bordered table-hover data-table">
            <thead>
            <tr>
              <th>Purchase Order No</th>
              <th>PR Number</th>
              <th>Supplier Name</th>
              <th>Approved Quotation</th>
              <th>Price</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($filterRequest as $filterRequests )
                <tr>
                    <td><a href="{{ url("financial/view/$filterRequests->id") }} ">{{ $filterRequests->poID }}</a></td>

                    <td>{{ $filterRequests->prID  }} </td>

                    <td>{{ $filterRequests->supplierName }}</td>

                    <td> <a href={{ url("viocer/all/details/download7/$filterRequests->requestsID") }} class="text-muted">
                        <i class="fa fa-download" aria-hidden="true"></i> {{ $filterRequests->seleded_quotation }}</td>

                    <td>{{ $filterRequests->totalPO }}</td>

                    <td><a class="btn btn-primary " href="{{ url("financial/view/$filterRequests->id") }} ">
                        &nbsp;View</a>

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
