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
    input[type=file]::file-selector-button {
      margin-right: 20px;
      border: none;
      background: #084cdf;
      padding: 10px 20px;
      border-radius: 10px;
      color: #fff;
      cursor: pointer;
      transition: background .2s ease-in-out;
    }

    input[type=file]::file-selector-button:hover {
      background: #0d45a5;

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
                                                    <a href="{{ url('financial/request') }}" class="btn btn-primary reload float-right mb-3"><i class="fa fa-arrow-left" aria-hidden="true"></i>
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
                                                          <p>{{ $details->created_at->format('m-d-Y') }}</p>

                                                      </table>
                                                </div>

                                                <div class="col-3 ">
                                                    <table class="table">
                                                        <p><b>Approved by:</b>
                                                            <p class="" id="lead">
                                                                {{ $lead->name }}
                                                                <p>{{ $details->date }}</p>

                                                            </p>

                                                        </p>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6 invoice-col">

                                                </div>

                                                <div class="col-sm-6 invoice-col">
                                                    <a href="#" onclick="GetPrint()" rel="noopener" id="button" class="btn btn-default float-right glass"><i class="fas fa-print"></i> Print</a>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    @if($details->remarks_lead)
                                        <div class="row print">
                                            <div class="col-xl-12">

                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Operation Lead Recommendations</h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="alert">
                                                            <div class="row">

                                                                <div class="col-md-6">
                                                                    <b style="color:#0864f7;"><strong> Recommendations:</strong></b><p>{{$details->remarks_lead}}</p>
                                                                </div>
                                                            </div>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    @endif
                                </div>
                        </div>
                        <!-- /.card -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content -->

@endsection

@section('js_files')

{{-- This for DataTable Config --}}
<script>

    function GetPrint()
{
    /*For Print*/
    window.print();
}
</script>


@endsection
