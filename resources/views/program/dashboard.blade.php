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
            <a href={{ url('program/dashboard') }} class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
            </a>
        </li>
        <li class="nav-item">
            <a href={{ url('program/final') }} class="nav-link">
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
          <h5>LKR {{ $expenses }}.00</h5>
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
                            <td> {{ $details->totalPO }}</td>
                            <td>
                                <a href={{ url("program/report/PO/$details->prID") }} class="text-muted">
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

<script src={{url('public/assets/dist/js/pages/custom/Chart.min.js')}}></script>

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
<script src={{url('public/assets/dist/js/pages/custom/chart-area-demo.js')}}></script>
<script src={{url('public/assets/dist/js/pages/custom/chart-pie-demo.js')}}></script>
@endsection
