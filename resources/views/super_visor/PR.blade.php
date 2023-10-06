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
    #chat1 {
      border-radius: 100%;
      position: relative;
      top: 11.8px;
      left: 21.5px;
      width: 15px;
      height: 15px;
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
            <a href={{ url('viocer/dashboard') }} class="nav-link ">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
            </a>
        </li>
        <li class="nav-item">
            <a href={{ url('viocer/request') }} class="nav-link ">
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
            <a href={{ url('viocer/all') }} class="nav-link active">
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
      <h1 class="m-0">All Approval</h1>
   </div>
   <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ url('viocer/dashboard') }}">Home</a></li>
      <li class="breadcrumb-item active">All Details</li>
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
                    <h3 class="card-title">Request History Details</h3>

                </div>
                 {{-- FILDER OPTION TABLE--}}
                 <tr class="expandable-body">
                    <td>
                        <table class="table">
                            <tbody>
                                <tr data-widget="expandable-table" aria-expanded="false">
                                    <td>
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-11"></div>
                                                <div class="col-6 col-md-1">
                                                   <button  type="button" class="btn btn-primary float-right mb-3">
                                                    <i class="fa fa-filter"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="expandable-body">
                                <td>
                                    <table class="table">
                                        <tbody>
                                            <div class="row">
                                                <form action="{{ url('viocer/filter') }}" method="GET">
                                                    <div class="col-3 mb-3">
                                                        {{-- @csrf --}}
                                                        <select name="staff_name" class="form-control"  aria-label=".form-select example"  >
                                                            <option value="all">All Staff</option>
                                                            @foreach ($staff as $staffs )
                                                            <option value="{{ $staffs->name }}"{{ Request::get('staff_name') == $staffs->name ? 'selected':'' }} >{{ $staffs->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <div id="textHelp" class="text-black-50">Filter by staff name.</div>
                                                    </div>
                                                    <div class="col-3 mb-3">
                                                        {{-- @csrf --}}
                                                        <select name="status" class="form-control"  aria-label=".form-select example"  >

                                                            <option value="all">All</option>
                                                            <optgroup label="PR Request">
                                                                <option value="PR_Approved" {{ Request::get('status') == 'PR_Approved' ? 'selected':'' }} >Request Approved</option>
                                                                <option value="PR_Rejected" {{ Request::get('status') == 'PR_Rejected' ? 'selected':'' }} >Request Rejected</option>
                                                            </optgroup>
                                                            <optgroup label="Quotation Request">
                                                                <option value="Quo_Approved" {{ Request::get('status') == 'Quo_Approved' ? 'selected':'' }} >Quotation Approved</option>
                                                                <option value="Quo_Rejected" {{ Request::get('status') == 'Quo_Rejected' ? 'selected':'' }}>Quotation Rejected</option>
                                                            </optgroup>
                                                        </select>
                                                        <div id="textHelp" class="text-black-50">Filter by progress.</div>
                                                    </div>

                                                    <div class="col-3 mb-3">
                                                        <select name="date_filter" class="form-control"  aria-label=".form-select example"  >
                                                            <option value="">All Dates</option>
                                                            <option value="today" {{ Request::get('date_filter') == 'today' ? 'selected':'' }}>Today</option>
                                                            <option value="yesterday" {{ Request::get('date_filter') == 'yesterday' ? 'selected':'' }} >Yesterday</option>
                                                            <option value="this_week" {{ Request::get('date_filter') == 'this_week' ? 'selected':'' }}>This Week</option>
                                                            <option value="last_week" {{ Request::get('date_filter') == 'last_week' ? 'selected':'' }}>Last Week</option>
                                                            <option value="this_month" {{ Request::get('date_filter') == 'this_month' ? 'selected':'' }} >This Month</option>
                                                            <option value="last_month"{{ Request::get('date_filter') == 'last_month' ? 'selected':'' }} >Last Month</option>
                                                            <option value="this_year" {{ Request::get('date_filter') == 'this_year' ? 'selected':'' }}>This Year</option>
                                                            <option value="last_year"{{ Request::get('date_filter') == 'last_year' ? 'selected':'' }}>Last Year</option>
                                                        </select>
                                                        <div id="textHelp" class="text-black-50">Filter by date.</div>
                                                    </div>

                                                    <div class="col-3 mb-6">
                                                        <button type="submit" class="btn btn-info float-right mb-3" value=""><i class="fa fa-filter"></i>
                                                            Filter </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </tbody>
                                    </table>
                                </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                 {{-- END  FILDER OPTION TABLE  --}}

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
                    <td><a href="{{ url("viocer/all/details/$filterRequests->id") }}">{{ $filterRequests->reqno }}</a></td>

                    <td>{{ $filterRequests->req_name  }} </td>

                    <td>{{ $filterRequests->reqdate }}</td>

                    @if($filterRequests->status_now == 'PR_Rejected')
                    <td class="project-state"><span class="badge badge-danger"><b>Purchase Order Rejected</b></span></td>
                    @elseif ($filterRequests->status_now == 'Quo_Rejected')
                    <td class="project-state"><span class="badge badge-danger"><b>Quotation has Rejected </b></span></td>
                    @else
                    <td class="project-state"><span class="badge badge-info"><b>{{ $filterRequests->status_now }} </b></span></td>
                    @endif

                    <td><a class="btn btn-primary btn-sm" href="{{ url("viocer/all/details/$filterRequests->id") }}"> <i class="nav-icon fas fa-eye"></i> &nbsp; View</a>

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
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
</script>





@endsection
