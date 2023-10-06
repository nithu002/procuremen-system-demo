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
            <a href={{ url('financial/dashboard') }} class="nav-link active ">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
            </a>
        </li>
        <li class="nav-item">
            <a href={{ url('financial/request') }} class="nav-link  ">

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
          <h3>

            {{ $totalPO }}

          </h3>

          <p>Total Approved Purchase Orders</p>
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
          <h3>

            {{ $new1 }}

          </h3>

          <p>New Oders</p>
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
          <h3>

           {{ $user }}

          </h3></h3>

          <p>All Staff</p>
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
            <h5>LKR {{ $expenses }}</h5>
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


    <div class="col-md-7 ">
        <div class="card shadow mb-8 ">
                <!-- Profile Image -->

            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h3 class="card-title">Approved Purchase Orders <span class="badge bg-info">New</span></h3>

            </div>
            <div class="card-body table-responsive p-12">
                <table class="table table-striped table-valign-middle">
                    <thead>
                        <tr>
                          <th>Purchase order No</th>
                          <th>Supplier Name</th>
                          <th>Quotation</th>
                          <th>Status</th>
                          <th>Price</th>
                          <th>More</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($new as $details)
                        <tr>
                            <td>

                                <strong style="color:#0864f7;">{{ $details->poID }}</strong>
                            </td>
                            <td>{{ $details->supplierName }}</td>
                            <td><a href={{ url("viocer/all/details/download7/$details->requestsID") }} class="text-muted">
                                <i class="fa fa-download" aria-hidden="true"></i>
                              </a></td>


                           <td class="project-state"><span class="badge badge-info blink_me"><b>New Purchase Orders</b></span></td>
                            <td>{{ $details->totalPO }}</td>

                            <td>
                                <a href='{{ url("financial/view/$details->id") }}' class="text-muted">
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


@endsection


@section('js_files')

<script type="text/javascript">
    (function blink() {
        $('.blink_me').fadeOut(1000).fadeIn(500, blink);
    })();
</script>




@endsection
