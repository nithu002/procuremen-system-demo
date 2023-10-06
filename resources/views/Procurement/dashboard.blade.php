@extends('layouts.main')


@section('css_files')




  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
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
            <a href={{ url('procurementPanel/dashboard') }} class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
            </a>
        </li>
        <li class="nav-item">
            <a href={{ url('procurementPanel/quotation') }} class="nav-link">
                @if($conts)
                <span class="position-absolute  translate-middle badge rounded-pill bg-danger" id="chat">
                  {{ $conts }}  <span class="admin-nav-text"></span></span>
                @endif
                <i class="fa fa-list-ul" aria-hidden="true"></i>
                &nbsp;&nbsp;&nbsp;
                <p>Add Quotation</p>
            </a>
        </li>

        <li class="nav-item">
            <a href={{ url('procurementPanel/create') }} class="nav-link">
                @if($cont)
                <span class="position-absolute  translate-middle badge rounded-pill bg-danger" id="chat">
                  {{ $cont }}  <span class="admin-nav-text"></span></span>
                @endif
                <i class="fa fa-list-alt" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;
                <p>Create PO</p>
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
                    <a href={{ url('procurementPanel/profile') }} class="nav-link">
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

    <div class="col-lg-3 col-6 shadow mb-8"">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3>{{ $cont }}</h3>

          <p>New Purchase Orders</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
      </div>
    </div>

    <!-- ./col -->
    <div class="col-lg-3 col-6 shadow mb-8"">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
          <h3>{{ $pen }}</h3>

          <p>Pending Works </p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6 shadow mb-8"">
      <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">
          <h3>{{ $total }}</h3>

          <p>Total Oders</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6 shadow mb-8">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>{{ $approved }}</h3>

            <p>Approved Quotations</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
        </div>
      </div>
    <!-- ./col -->
  </div>
  <br>
  <br>
  <div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-8 ">
        <!-- Profile Image -->

            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h3 class="card-title">Progress Details </h3>

            </div>
            <div class="card-body table-responsive p-12">
              <table class="table table-striped table-valign-middle">
                <thead>
                <tr>
                  <th style="width: 10%">Request ID</th>
                  <th style="width: 40%">Quotations/PO</th>
                  <th style="width: 10%">Status</th>
                  <th style="width: 40%">Reason</th>

                </tr>
                </thead>
                <tbody>
                    @foreach ($approvedName as $details)
                    <tr>


                        @if ($details->status_now =="quotation")
                        <td>{{ $details->reqno }} </td>
                        @else
                        <td><a href="{{ url("procurementPanel/details/$details->id") }}" >{{ $details->reqno }} </a></td>
                        @endif


                        @if ($details->seleded_quotation)
                             <td><span style="font-size: 12px;">{{ $details->seleded_quotation }} </span></td>
                        @elseif ($details->quotation1)

                          <td  class="project-state"><span style="font-size: 12px;">Quotation1-({{ $details->quotation1 }}) , Quotation2-({{ $details->quotation2 }})</span> <br>
                            <span style="font-size: 12px;">Quotation3-({{ $details->quotation3 }}) , Bid Analysis-({{ $details->bidAnalysis }})</span></td>
                        @endif


                        @if ($details->status_now =="quotation")

                        <td class="project-state"><span class="badge badge-success"><b>waiting for response</b></span></td>
                        <td style="color:rgb(80, 247, 29);">Awaiting supervisor response</td>
                        {{-- <td style="color:red;">Your PO has not been approved by the lead. It repeats that now</td> --}}

                        @elseif ($details->status_now =="PO_Rejected")
                        <td class="project-state"><span class="badge badge-danger blink_me"><b>purchase order rejected</b></span></td>
                        <td style="color:red;">This PO has been declined by a lead. You are expected to prepare it again.</td>
                        @endif

                        @if ($details->status_now =="Quo_Rejected")
                        <td class="project-state"><span class="badge badge-danger blink_me"><b>quotations rejected</b></span></td>
                        <td style="color:red;">This quotation has been declined by a supervisor. You are expected to prepare it again.</td>

                        @endif

                    </tr>

                    @endforeach

                </tbody>
              </table>
            </div>

        <!-- /.card -->

        <!-- /.card -->
    </div>
</div>





</div>
<br>
@endsection


@section('js_files')

<script type="text/javascript">
    (function blink() {
        $('.blink_me').fadeOut(1000).fadeIn(500, blink);
    })();
    </script>

@endsection
