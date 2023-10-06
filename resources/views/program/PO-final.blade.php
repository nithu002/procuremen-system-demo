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
    .alert {
            padding: 20px;
            background-color: #f5b2b2;
            color: black;
        }
  </style>
@endsection



@section('sidebar-menu')
 <!-- Sidebar Menu -->
 <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
           <li class="nav-item ">
            <a href={{ url('program/dashboard') }} class="nav-link ">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
            </a>
        </li>
        <li class="nav-item">
            <a href={{ url('program/final') }} class="nav-link active">
                @if($alert)
                <span class="position-absolute  translate-middle badge rounded-pill bg-danger" id="chat">
                  {{ $alert }}  <span class="admin-nav-text"></span></span>
                @endif
                <i class="far fa-file" aria-hidden="true"></i>
                    &nbsp;&nbsp;&nbsp;
                <p>PO Approval</p>
            </a>
        </li>
        <li class="nav-item">
            <a href={{ url('program/report') }} class="nav-link">
                <i class="fa fa-tag" aria-hidden="true"></i>
                &nbsp;&nbsp;
                <p>Request Status</p>
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
                    <a href={{ url('program/profile') }} class="nav-link">
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
      <h1 class="m-0">PO Approval</h1>
   </div>
   <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ url('program/dashboard') }}">Home</a></li>
      <li class="breadcrumb-item active">PO Approval</li>
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
                    <h3 class="card-title">PO Approval Details Table</h3>

                </div>

            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example2" class="table table-bordered table-hover data-table">
            <thead>
            <tr>
              <th>PO Number</th>
              <th>PR Number</th>
              <th>Delivery date</th>
              <th>Supplier</th>
              <th>Total PO Amount</th>
              <th>Approved Supervisor</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($filterRequest as $filterRequests )
                <tr>

                    @if ($filterRequests->poStatus =='PO_Rejected')
                    <td><a href="final/{{$filterRequests->id }}">{{ $filterRequests->poID }}</a>(old)</td>

                    @else
                    <td><a href="final/{{$filterRequests->id }}">{{ $filterRequests->poID }}</a></td>
                    @endif


                    <td>{{ $filterRequests->prID  }} </td>

                    <td>{{ $filterRequests->deliveryDate  }} </td>

                    <td>{{ $filterRequests->supplierName }}</td>

                    <td>{{ $filterRequests->totalPO }}</td>

                    <td>{{ $filterRequests->supervioserName  }}</td>

                    @if ($filterRequests->poStatus =='final')
                    <td class="project-state"><span class="badge badge-info blink_me"><b>Pending</b></span></td>
                    @elseif ($filterRequests->poStatus =='PO_Approved')
                    <td class="project-state"><span class="badge badge-success"><b>Approved</b></span></td>
                    @else
                    <td class="project-state"><span class="badge badge-danger"><b>Declined</b></span></td>
                    @endif

                    @if($filterRequests->poStatus =='final')
                    <td><a class="btn btn-primary btn-sm " href="final/{{$filterRequests->id }}" > <i class="nav-icon fas fa-edit"></i>&nbsp;Edit</a>
                    @else
                    <td><a class="btn btn-primary btn-sm" href="final/{{$filterRequests->id }}"> <i class="nav-icon fas fa-eye"></i>&nbsp;View</a>
                    @endif


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
        "lengthChange": false,
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
