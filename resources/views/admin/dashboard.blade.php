@extends('layouts.main')


@section('css_files')



@endsection



@section('sidebar-menu')
 <!-- Sidebar Menu -->
 <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
           <li class="nav-item ">
            <a href={{ url('#') }} class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
            </a>
        </li>
        <li class="nav-item">
            <a href={{ url('staff') }} class="nav-link">
                <i class="fa fa-users" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;
                <p>Staff Details</p>
            </a>
        </li>

        <li class="nav-item ">
            <a href="#" class="nav-link ">
                <i class="fa fa-user-plus" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                <p>
                    Members
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">

                <li class="nav-item">
                    <a href={{ url('visor') }} class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Supervisor </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href={{ url('procurement') }} class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Procurement Officer</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href={{ url('programme') }} class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Operation Lead</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href={{ url('financialadd') }} class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Financial Officer</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href={{ url('timeline') }} class="nav-link">
                <i class="fa fa-tasks" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;
                <p>Progress Reports</p>
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
                    <a href={{ url('email') }} class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Email Settings</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href={{ url('profile') }} class="nav-link">
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
      <h1 class="m-0">Dashboard</h1>
   </div>
   <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item active">Dashboard</li>
    </ol>
  </div>
@endsection

@section('main-content')
<div class="row">
    <div class="col-lg-3 col-6 shadow mb-8">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3>{{ $user }}</h3>
          <p>Total Staff</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6 shadow mb-8">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3>{{ $final }}</h3>

          <p>Total User Requests</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6 shadow mb-8">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
          <h3>{{ $super }}</h3>

          <p>Supervisors</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6 shadow mb-8">
      <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">
          <h5>LKR {{ $expenses }}</h4>
          &nbsp;
          <p>Total PO expenses</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
      </div>
    </div>
    <!-- ./col -->
</div>
<br>

<div class="row">
    <div class="col-xl-6 col-lg-12">
        <div class="card shadow mb-8">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">PR Request By Staffs</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                </div>

            </div>
        </div>
    </div>

    <div class="col-xl-6 col-lg-12">
        <div class="card shadow mb-8">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Monthly PO expenses</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="myAreaChart1"></canvas>
                </div>

            </div>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-md-5 ">
        <div class="card shadow mb-8">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Request Progress Details</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart"></canvas>
                </div>

            </div>
        </div>
    </div>



    <div class="col-md-7 ">
        <div class="card shadow mb-8 ">
                <!-- Profile Image -->

            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h3 class="card-title">Approved Purchase Request <span class="badge bg-info">4</span></h3>

            </div>
            <div class="card-body table-responsive p-12">
                <table class="table table-striped table-valign-middle">
                    <thead>
                        <tr>
                          <th>Purchase order No</th>
                          <th>Supervisor</th>
                          <th>Supplier Name</th>
                          <th>Price</th>
                          <th>More</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($new as $details)
                        <tr>
                            <td>
                                <img src="{{ asset('assets/img/611.9-orders-icon-iconbunny.jpg') }}" alt="Product 1" class="img-circle img-size-32 mr-2">
                                <strong style="color:#0864f7;">{{ $details->poID }}</strong>
                            </td>
                            <td>{{ $details->supervioserName }}</td>
                            <td>{{ $details->supplierName }}</td>
                            <td> {{ $details-> 	totalPO }}</td>
                            <td>
                                <a href={{ url("timeline/report/PO/$details->prID") }} class="text-muted">
                                <i class="fas fa-search"></i>
                                </a>
                            </td>
                        </tr>

                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<br>

@endsection


@section('js_files')


<script type="text/javascript">
    var _labels={!! json_encode($staff) !!};
    var _data={!! json_encode($monthcount) !!};

    var _plabels={!! json_encode($status) !!};
    var _pdata={!! json_encode($count) !!};
</script>

<script type="text/javascript">
    var _label={!! json_encode($year) !!};
    var _datas={!! json_encode($result) !!};
</script>
<!-- Page level custom scripts -->
<script src={{asset('assets/dist/js/pages/custom/Chart.min.js')}}></script>
<script src={{asset('assets/dist/js/pages/custom/chart-area-demo.js')}}></script>
<script src={{asset('assets/dist/js/pages/custom/chart-pie-demo.js')}}></script>

@endsection
