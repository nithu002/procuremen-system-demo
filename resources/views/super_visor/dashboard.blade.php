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
            <a href={{ url('viocer/dashboard') }} class="nav-link active ">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
            </a>
        </li>
        <li class="nav-item">
            <a href={{ url('viocer/request') }} class="nav-link  ">
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
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3>

            {{ $cont }}

          </h3>

          <p>New Purchase Request</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3>

            {{ $staffcont }}

          </h3>

          <p>Allocated Staffs</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
          <h3>

           {{ $accepted }}

          </h3></h3>

          <p>Accepted  requests</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">
          <h3>

            {{ $rejected }}

          </h3>

          <p>Rejected request</p>
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
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>

              {{ $Qaccepted }}

            </h3>

            <p>Accepted Quotation</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>

             {{ $Qrejected }}

            </h3></h3>

            <p>Rejected  Quotation</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
        </div>
      </div>
  </div>


@endsection


@section('js_files')

@endsection
