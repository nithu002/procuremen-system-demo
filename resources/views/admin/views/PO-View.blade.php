@extends('layouts.main')


@section('css_files')

  <style>
    abbr {
  font-style: italic;
  position: relative

}

abbr:hover::after {
  background: #a8c0eb;
  border-radius: 4px;
  bottom: 100%;
  content: attr(title);
  display: block;
  bottom: 100%;
  padding: 1em;
  position: absolute;
  width: 280px;
  z-index: 1;
}
.alert {
            padding: 20px;
            background-color: #d6f7ff;
            color: black;
        }

 </style>

@endsection



@section('sidebar-menu')
 <!-- Sidebar Menu -->
 <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
           <li class="nav-item ">
            <a href={{ url('dashboard') }} class="nav-link ">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
            </a>
        </li>
        <li class="nav-item">
            <a href={{ url('staff') }} class="nav-link ">
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
            <a href={{ url('timeline') }} class="nav-link active">
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
      <h1 class="m-0">Progress Reports</h1>
   </div>
   <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
      <li class="breadcrumb-item active">Progress Reports</li>
    </ol>
  </div>
@endsection

@section('main-content')
@section('main-content')
             <!-- Main content -->
             <div class="content">
                <div class="container">
                    <!--Section: Contact v.2-->
                    <section class="section">
                        <div class="col-xl-12">

                            <section class="content card-default">
                                <div class="container-fluid">
                                    <div class="card col-xl-12">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <a href="{{ url('timeline') }}" class="btn btn-primary reload float-right mb-3"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                                                        Back</a>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="card ">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <img src="{{ url('public/storage/logo/log1.png') }}"></img>
                                                    <img src="{{ url('public/storage/logo/log.png') }}" align="right"></img>
                                                    <div class="col-xl-8 offset-xl-2 py-5">
                                                        <!--Section heading-->
                                                        <h5 align="center">PURCHASE ORDER</h5>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row invoice-info">
                                                <div class="col-sm-9 invoice-col">

                                                </div>
                                                <!-- /.col -->
                                                <div class="col-sm-3 invoice-col">
                                                  <b>Purchase Order No: {{ $details->poID }}</b><br>

                                                  <b>Purchase Order Date:</b> {{ $details->poDueDate }}<br>
                                                  <b>Delevery Date:</b> {{ $details->deliveryDate }}<br>

                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <br>
                                            <br>
                                            <div class="row invoice-info">
                                                <div class="col-sm-6 invoice-col">
                                                    <div class="form-group">
                                                        <b>Supplier Name:</b> {{ $details->supplierName }}  <br><br>
                                                        <b>Supplier contact no: </b>{{ $details->supplierContact_no }}
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 invoice-col">
                                                    <b>Supplier address: </b>{{ $details->supplierAddress }}<br><br>
                                                    <b>Supplier email address: </b> {{ $details->supplierEmail }}
                                                </div>

                                            </div>
                                            <br>
                                            <h5>Goods & Service details</h5>
                                            <!-- Table row -->
                                            <div class="row">
                                                <div class="col-12 table-responsive">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Descriptions(Goods and Services)</th>
                                                            <th>Specifications</th>
                                                            <th>Qty</th>
                                                            <th>Rate</th>
                                                            <th>Amount</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($tables as $table )
                                                        <tr>
                                                            <td>{{ $table->description }}</td>
                                                            <td>{{ $table->specification }}</td>
                                                            <td>{{ $table->qty }}</td>
                                                            <td>{{ $table->rate }}</td>
                                                            <td>{{ $table->amt }}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.row -->
                                            <div class="row">
                                                <!-- accepted payments column -->
                                                <div class="col-8">
                                                   <h5>Conditions</h5>
                                                   <p>Payment Terms 100% upon complete delivery of goods.</p>
                                                   <p>Cancellation of PO/Contract if the delivery/completion is delayed by agreed date.</p>

                                                </div>
                                                <!-- /.col -->
                                                <div class="col-4">
                                                  <div class="table-responsive">
                                                    <table class="table">
                                                      <tr>
                                                        <th>Total PO Amount:</th>
                                                        <td>{{ $details->totalPO }}</td>
                                                      </tr>
                                                    </table>
                                                  </div>
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-9">
                                                    <table class="table">
                                                          <p><b>Prepared by:</b></p>
                                                          <p>{{ $details->pocumerName }}</p>
                                                          <p>{{ $details->created_at }}</p>
                                                    </table>
                                                </div>

                                                <div class="col-3 ">
                                                    @if($details->poStatus == "PO_Approved")
                                                    <table class="table">
                                                        <p><b>Purchase Order Approved by:</b>
                                                            <p>
                                                                {{ $pro->name }}
                                                                <p>{{ $date->format('d-m-Y') }}</p>

                                                            </p>

                                                        </p>
                                                    </table>
                                                    @endif
                                                    @if($details->poStatus == "finacial")
                                                    <table class="table">
                                                        <p><b>Purchase Order Approved by:</b>
                                                            <p>
                                                                {{ $pro->name }}
                                                                <p>{{ $date->format('d-m-Y') }}</p>

                                                            </p>

                                                        </p>
                                                    </table>
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                </div>
                        </div>
                        <!-- /.card -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content -->



@endsection


