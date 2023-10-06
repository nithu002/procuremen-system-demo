@extends('layouts.main')


@section('css_files')


 <style>

.alert {
            padding: 20px;
            background-color: #d6f7ff;
            color: black;
        }

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
            <a href={{ url('program/dashboard') }} class="nav-link ">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
            </a>
        </li>
        <li class="nav-item">
            <a href={{ url('program/final') }} class="nav-link ">
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
            <a href={{ url('program/report') }} class="nav-link active">
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
      <h1 class="m-0">Find Request Status</h1>
   </div>
   <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ url('program/dashboard') }}">Home</a></li>
      <li class="breadcrumb-item active">Request Status</li>
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
                                                    <a href="{{ url('program/report') }}" class="btn btn-primary reload float-right mb-3"><i class="fa fa-arrow-left" aria-hidden="true"></i>
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
                                                        <label class="vecfrm link-black">TOR File</label> <br>
                                                        <p>
                                                            <a href="{{ url("viocer/details/download1/$details->id") }} " target="new" class="link-black text-sm"><i class="fas fa-link mr-1"></i> Download {{ $details->file_tor }}</a>
                                                          </p>
                                                    </div>
                                                    <div>
                                                        <label class="vecfrm link-black">CN File</label> <br>
                                                        <p>
                                                            <a href="{{ url("viocer/details/download2/$details->id ") }}" target="new" class="link-black text-sm"><i class="fas fa-link mr-1"></i> Download {{ $details->file_cn }}</a>
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
                                                    <div class="col-md-6">
                                                        @if($details->status_now == "PR_Approved")
                                                        <b style="color:#0864f7;"><strong>Purchase Request Approved by:</strong></b><br>{{ $details->supervisor_name  }}

                                                        @else
                                                        <b style="color:#0864f7;"><strong>Purchase Request Rejected by:</strong></b><br>{{ $details->supervisor_name  }}
                                                        @endif
                                                    </div>
                                                    <div class="col-md-6">
                                                        <b style="color:#0864f7;"><strong> Remarks:</strong></b><p>{{$details->super_vioser_remarks}}</p>
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



@section('js_files')




<script type="text/javascript">
    (function blink() {
        $('.blink_me').fadeOut(1000).fadeIn(500, blink);
    })();



</script>
@endsection
