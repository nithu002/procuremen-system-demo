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
                                                <div class="col-12">
                                                  <h4>
                                                    <i class="fa fa-chain-broken" ></i>&nbsp; Request Item Details
                                                    <small class="float-right">Date: {{ $details->reqdate }}</small>
                                                  </h4>
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <div class="row invoice-info">
                                                <div class="col-sm-9 invoice-col">

                                                </div>
                                                <!-- /.col -->
                                                <div class="col-sm-3 invoice-col">
                                                  <b>Request No: {{ $details->reqno }}</b><br>

                                                  <b>Requester Name:</b> {{ $details->req_name }}<br>
                                                  <b>WBS Number:</b> {{ $details->wbsnumber }}<br>

                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <br>
                                            <br>
                                            <div class="row invoice-info">
                                                <div class="col-sm-6 invoice-col">
                                                    <div class="form-group">
                                                        <b>Budget Amount:</b> {{ $details->budget }}  <br><br>
                                                        <b>Particular Activity Spend (Actual): </b>{{ $details->actual }}
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 invoice-col">
                                                    <b>Budget Balance Available: </b>{{ $details->balance }}<br><br>
                                                    <b>Already scheduled(On process): </b> {{ $details->scheduled }}
                                                </div>

                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-12 col-sm-12">
                                                    <div class="form-group">
                                                        <b>Purpose of Item: </b>{{ $details->purpose }}

                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <!-- Table row -->
                                            <div class="row">
                                                <div class="col-12 table-responsive">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Descriptions</th>
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
                                                    <div>
                                                        <label class="vecfrm link-black">TOR/CN File &nbsp;<i class="fa fa-download" aria-hidden="true"></label></i>
                                                        <br>
                                                        <p>
                                                            <a href="{{ url("viocer/quotation/download1/$details->id ") }}" target="new" class="link-black text-sm"><i class="fas fa-link mr-1"></i> TOR {{ $details->file_tor }}</a>
                                                          </p>
                                                          <p>
                                                            <a href="{{ url("viocer/quotation/download2/$details->id ") }}" target="new" class="link-black text-sm"><i class="fas fa-link mr-1"></i> CN {{ $details->file_cn }}</a>
                                                        </p>
                                                    </div>

                                                    <div>
                                                        <label class="vecfrm link-black">Quotation files</label> <br>
                                                        <p>
                                                            <a href="{{ url("viocer/quotation/download3/$details->id ") }}" target="new" class="link-black text-sm"><i class="fas fa-link mr-1"></i>Quotation 1 {{ $details->quotation1 }}</a>
                                                        </p>
                                                        <p>
                                                            <a href="{{ url("viocer/quotation/download4/$details->id ") }}" target="new" class="link-black text-sm"><i class="fas fa-link mr-1"></i>Quotation 2 {{ $details->quotation2 }}</a>
                                                        </p>
                                                        <p>
                                                            <a href="{{ url("viocer/quotation/download5/$details->id ") }}" target="new" class="link-black text-sm"><i class="fas fa-link mr-1"></i>Quotation 3 {{ $details->quotation3 }}</a>
                                                        </p>
                                                        <p>
                                                            <a href="{{ url("viocer/quotation/download6/$details->id ") }}" target="new" class="link-black text-sm"><i class="fas fa-link mr-1"></i>Quotation 4 {{ $details->bidAnalysis }}</a>
                                                        </p>
                                                    </div>

                                                </div>
                                                <!-- /.col -->
                                                <div class="col-4">
                                                  <p class="lead">Need by {{ $details->need_date }}</p>

                                                  <div class="table-responsive">
                                                    <table class="table">
                                                      <tr>
                                                        <th>Total Amount:</th>
                                                        <td>{{ $details->FTotal }}</td>
                                                      </tr>
                                                    </table>
                                                  </div>
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-sm-4 invoice-col">
                                                    <b>Single Source :</b> {{ $details->single_source }}<br>
                                                </div>
                                                <div class="col-sm-4 invoice-col">
                                                    <b>Single Source – Justification:</b> <br><p>{{ $details->single_sourceText }}</p>
                                                </div>

                                            </div>

                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <div class="card ">

                                        <div class="card-header">
                                            <h5>Supervisor Approval State</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="alert">
                                                <div class="row">
                                                    @if($details->seleded_quotation)
                                                    <div class="col-md-6">
                                                        <b style="color:#0864f7;"><strong>Selected Quotation files(download and view that)</strong></b> <p>
                                                           <a href="{{ url("viocer/all/details/download7/ $details->id") }}" target="new" style="color:black;" class="link-black text-sm"><i class="fas fa-link mr-1"></i>Quotation {{ $details->seleded_quotation }}</a>
                                                       </p>
                                                       </div>
                                                    @endif

                                                    <div class="col-md-6">
                                                        <b style="color:#0864f7;"><strong>Name of Procurement Officer</strong></b><br>{{ $details->procument_name  }}
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        @if($details->status_now == "Quo_Approved")
                                                        <b style="color:#0864f7;"><strong>Quotation Approved by:</strong></b><br>{{ $details->supervisor_name  }}

                                                        @else
                                                        <b style="color:#0864f7;"><strong>Quotation Rejected by:</strong></b><br>{{ $details->supervisor_name  }}
                                                        @endif
                                                    </div>
                                                    <div class="col-md-6">
                                                        <b style="color:#0864f7;"><strong> Remarks:</strong></b><p>{{$details->quotation_remarks}}</p>
                                                    </div>
                                                </div>
                                           </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <!-- /.card -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content -->



@endsection



