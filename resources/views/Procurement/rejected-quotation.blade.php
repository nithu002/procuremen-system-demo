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
    input[type=file]::file-selector-button {
      margin-right: 5px;
      border: none;
      background: #084cdf;
      padding: 5px 10px;
      border-radius: 10px;
      color: #fff;
      cursor: pointer;
      transition: background .2s ease-in-out;
    }

    input[type=file]::file-selector-button:hover {
      background: #0d45a5;

    }
    .alert {
            padding: 20px;
            background-color: #f5b2b2;
            color: black;
        }


  </style>
@endsection



@section('sidebar-menu')
 <!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
           <li class="nav-item ">
            <a href={{ url('procurementPanel/dashboard') }} class="nav-link ">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
            </a>
        </li>
        <li class="nav-item">
            <a href={{ url('procurementPanel/quotation') }} class="nav-link active">
                <i class="fa fa-list-ul" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;
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
      <h1 class="m-0">Reprogers of Rejected Questions</h1>
   </div>
   <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ url('procurementPanel/dashboard') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Add Quotation</a></li>
        <li class="breadcrumb-item active">Reprogers of Rejected Questions</li>
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
                                                    <a href="{{ url('procurementPanel/quotation') }}" class="btn btn-primary reload float-right mb-3"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                                                        Back</a>

                                                </div>

                                            </div>
                                            <div class="alert">

                                                <div class="row invoice-info">
                                                    <div class="col-sm-6 invoice-col">
                                                        <b>Status: </b><b class="lead">Quotation Rejected</b><br><br>
                                                        <b>Why Quotation has Rejected:</b> <b class="lead">{{ $find->super_vioser_remarks }}</b><br><br>

                                                    </div>
                                                    <!-- /.col -->
                                                     <div class="col-sm-6 invoice-col">
                                                        <b>By: </b><b class="lead">{{ $find->supervisor_name }}</b><br><br>
                                                        <b> Quotation1:({{ $find->quotation1 }}), Quotation2:({{ $find->quotation2 }}) <br>
                                                            Quotation3:({{ $find->quotation3 }}), BidAnalysis:({{ $find->bidAnalysis }})</b> <br>
                                                     </div>
                                                    <!--
                                                         /.col -->
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
                                                    <small class="float-right">Date: {{ $find->reqdate }}</small>
                                                  </h4>
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <div class="row invoice-info">
                                                <div class="col-sm-9 invoice-col">

                                                </div>
                                                <!-- /.col -->
                                                <div class="col-sm-3 invoice-col">
                                                  <b>Request No: {{ $find->reqno }}</b><br>

                                                  <b>Requester Name:</b> {{ $find->req_name }}<br>
                                                  <b>WBS Number:</b> {{ $find->wbsnumber }}<br>

                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <br>
                                            <br>
                                            <div class="row invoice-info">
                                                <div class="col-sm-6 invoice-col">
                                                    <div class="form-group">
                                                        <b>Budget Amount:</b> {{ $find->budget }}  <br><br>
                                                        <b>Particular Activity Spend (Actual): </b>{{ $find->actual }}
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 invoice-col">
                                                    <b>Budget Balance Available: </b>{{ $find->balance }}<br><br>
                                                    <b>Already scheduled(On process): </b> {{ $find->scheduled }}
                                                </div>

                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-12 col-sm-12">
                                                    <div class="form-group">
                                                        <b>Purpose of Item: </b>{{ $find->purpose }}

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
                                                        <label class="vecfrm link-black">TOR/CN File &nbsp;<i class="fa fa-download" aria-hidden="true"></i></label>
                                                        <br>
                                                        <p>
                                                            <a href={{ url("viocer/quotation/download1/$find->id") }}  target="new" class="link-black text-sm"><i class="fas fa-link mr-1"></i> TOR {{ $find->file_tor }}</a>
                                                          </p>
                                                          <p>
                                                            <a href={{ url("viocer/quotation/download2/$find->id")}}   target="new" class="link-black text-sm"><i class="fas fa-link mr-1"></i> CN {{ $find->file_cn }}</a>
                                                        </p>
                                                    </div>
                                                </div>
                                                <!-- /.col -->
                                                <div class="col-4">
                                                  <p class="lead">Need by <b style="color:red">{{ $find->need_date }}</b></p>

                                                  <div class="table-responsive">
                                                    <table class="table">
                                                      <tr>
                                                        <th>Total Amount:</th>
                                                        <td>{{ $find->FTotal }}</td>
                                                      </tr>
                                                    </table>
                                                  </div>
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <div class="row">
                                                <div class="col-12">

                                                    <label class="vecfrm link-black"> <i class="far fa-commenting" aria-hidden="true"></i> Supervisor Recommendations</label>
                                                    <b style="text-align: center">:- {{ $find->super_vioser_remarks }}</b>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <tr class="expandable-body">
                                                    <td>
                                                        <table class="table table-hover">
                                                        <tbody>
                                                            <tr data-widget="expandable-table" aria-expanded="false">
                                                                <td>
                                                                    <button type="button" class="btn btn-primary p-0">
                                                                    <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                                                                    </button>
                                                                    <b style="color:#007bff;">Link the quotation find below</b>
                                                                </td>
                                                            </tr>
                                                            <tr class="expandable-body">
                                                            <td>
                                                                <table class="table table-hover">
                                                                    <form action="{{ url('procurementPanel/quotation/find/update') }}" method="POST" enctype="multipart/form-data">
                                                                        <tbody>
                                                                            @csrf
                                                                            <br>

                                                                            <div class="row">
                                                                                <div class="col-sm-3 invoice-col">
                                                                                    <input hidden name="id" value="{{ $find->id }}" />
                                                                                    <label class="link-black">Supportive Documents(Quotation1) </label> <br>
                                                                                    <input type="file" class="link-black text-sm" id="quotation1" name="quotation1" accept=".pdf, .docx, .xlsx" required>
                                                                                </div>
                                                                                <div class="col-sm-3 invoice-col">
                                                                                    <label class="link-black">Supportive Documents(Quotation2) </label> <br>
                                                                                    <input type="file" class="link-black text-sm" id="quotation2" name="quotation2" accept=".pdf, .docx, .xlsx" required>
                                                                                </div>
                                                                                <div class="col-sm-3 invoice-col">
                                                                                    <label class="link-black">Supportive Documents(Quotation3) </label> <br>
                                                                                    <input type="file" class="link-black text-sm" id="quotation3" name="quotation3" accept=".pdf, .docx, .xlsx" required>
                                                                                </div>
                                                                                <div class="col-sm-3 invoice-col">
                                                                                    <label class="link-black">Supportive Documents(Bid Analysis)</label> <br>
                                                                                    <input type="file" class="link-black text-sm" id="bidanalysis" name="bidanalysis" accept=".pdf, .docx, .xlsx" required>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <p class="link-black"><b style="color:red;">Note: </b>Please Insert files into all files. because they are all required fields</p>
                                                                            </div>

                                                                            <div class="row">
                                                                                <div class="col-4 col-sm-4 ">
                                                                                    <label><strong>Single Source &nbsp;: </strong></label>
                                                                                        <div class="form-check form-check-inline">
                                                                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="Yes">
                                                                                            <label class="form-check-label" for="inlineRadio1">Yes</label>
                                                                                        </div>
                                                                                        <div class="form-check form-check-inline">
                                                                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="No">
                                                                                            <label class="form-check-label" for="inlineRadio2">No</label>
                                                                                        </div>
                                                                                        <span class="text-danger">@error('inlineRadioOptions'){{ $message }}@enderror</span>
                                                                                </div>
                                                                                <div class="col-6 col-sm-6">
                                                                                    <div class="form-group">
                                                                                        <label><strong>Justification</strong></label><br>
                                                                                        <textarea name="single_sourceText" id="remarks" placeholder="Enter the justification information for source" cols="80" rows="3" required></textarea>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-12">
                                                                                    <button type="submit" id="button" class="btn btn-primary" >Submit</button>
                                                                                    <button type="reset" class="btn btn-danger">Clear</button>
                                                                                </div>
                                                                            </div>
                                                                        </tbody>
                                                                    </form>
                                                                </table>
                                                            </td>
                                                            </tr>
                                                        </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
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


