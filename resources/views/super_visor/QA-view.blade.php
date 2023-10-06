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


  </style>
@endsection



@section('sidebar-menu')
 <!-- Sidebar Menu -->
 <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
           <li class="nav-item ">
            <a href={{ url('viocer/dashboard') }} class="nav-link ">
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
            <a href={{ url('viocer/quotation') }} class="nav-link active">
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
      <h1 class="m-0">Quotation Details</h1>
   </div>
   <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="{{ url('viocer/dashboard') }}">Home</a></li>
      <li class="breadcrumb-item"><a href="#">Quotation Approval (New)</a></li>
      <li class="breadcrumb-item active">View</li>
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
                                                    <a href="{{ url('viocer/quotation') }}" class="btn btn-primary reload float-right mb-3"><i class="fa fa-arrow-left" aria-hidden="true"></i>
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
                                                            <a href="{{ url("viocer/quotation/download1/$details->id") }} " target="new" class="link-black text-sm"><i class="fas fa-link mr-1"></i> TOR {{ $details->file_tor }}</a>
                                                          </p>
                                                          <p>
                                                            <a href="{{ url("viocer/quotation/download2/$details->id") }}" target="new" class="link-black text-sm"><i class="fas fa-link mr-1"></i> CN {{ $details->file_cn }}</a>
                                                        </p>
                                                    </div>

                                                    <div>
                                                        <label class="vecfrm link-black">Quotation files</label> <br>
                                                            <p>
                                                                <a href="{{ url("viocer/quotation/download3/$details->id") }}" target="new" class="link-black text-sm"><i class="fas fa-link mr-1"></i>Quotation 1 {{ $details->quotation1 }}</a>
                                                            </p>
                                                            <p>
                                                                <a href="{{ url("viocer/quotation/download4/$details->id") }}" target="new" class="link-black text-sm"><i class="fas fa-link mr-1"></i>Quotation 2 {{ $details->quotation2 }}</a>
                                                            </p><p>
                                                                <a href="{{ url("viocer/quotation/download5/$details->id") }}" target="new" class="link-black text-sm"><i class="fas fa-link mr-1"></i>Quotation 3 {{ $details->quotation3 }}</a>
                                                            </p>
                                                            <p>
                                                                <a href="{{ url("viocer/quotation/download6/$details->id") }}" target="new" class="link-black text-sm"><i class="fas fa-link mr-1"></i>Quotation 4 {{ $details->bidAnalysis }}</a>
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

                                            <div class="row">
                                                <tr class="expandable-body">
                                                    <td>
                                                        <table class="table table-hover">
                                                        <tbody>
                                                            <tr class="print" data-widget="expandable-table" aria-expanded="false">
                                                                <td>
                                                                    <button type="button" class="btn btn-primary p-0">
                                                                    <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                                                                    </button>
                                                                    <b style="color:#007bff;">Purchase Request Approval By</b>
                                                                </td>
                                                            </tr>
                                                            <tr class="expandable-body">
                                                                <td>
                                                                    <table class="table table-hover">
                                                                        <tbody>
                                                                            <div class="row">
                                                                                <div class="col-sm-4 invoice-col">
                                                                                  <b>Purchase Request Approval By:</b> {{ $details->supervisor_name }}<br>
                                                                                </div>
                                                                                <div class="col-sm-4 invoice-col">
                                                                                   <b>Date:</b> {{ $date->format('d-m-Y') }}<br>
                                                                                </div>
                                                                                <div class="col-sm-4 invoice-col">
                                                                                    <b>Procurement Officer:</b> {{ $details->procument_name }}<br>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row invoice-col">
                                                                                <div class="col-sm-12 invoice-col">
                                                                                <label><strong>Remarks</strong></label><br>
                                                                                <textarea name="remarks" id="remarks" cols="50" rows="3" disabled>{{ $details->super_vioser_remarks }}</textarea>
                                                                                </div>

                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-sm-12 invoice-col">
                                                                                    <button type="submit" id="button" class="btn btn-primary float-right" disabled>Update Approval </button>
                                                                                </div>
                                                                            </div>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            <br>
                                                            <br>
                                                            <tr class="print" data-widget="expandable-table" aria-expanded="false">
                                                                <td>

                                                                    @error('status')
                                                                    <button type="button" class="btn btn-danger p-0">
                                                                        <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                                                                        </button>
                                                                    <b style="color:#ff0000;">Quotation Request Approval By</b>
                                                                    @else
                                                                    <button type="button" class="btn btn-primary p-0">
                                                                        <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                                                                        </button>
                                                                    <b style="color:#007bff;">Quotation Request Approval By</b>
                                                                    @enderror

                                                                </td>
                                                            </tr>
                                                            <tr class="expandable-body">
                                                                <td>

                                                                    <table class="table table-hover">
                                                                        <tbody>
                                                                            <form action="{{ url('viocer/quotation/update') }}" method="POST" enctype="multipart/form-data">
                                                                                @csrf
                                                                            <div class="row">
                                                                                <div class="col-sm-4 invoice-col">
                                                                                    <input hidden name="id" value="{{ $details->id }}"/>
                                                                                  <b>Single Source :</b> &nbsp;
                                                                                  @if($details->single_source == 'Yes')

                                                                                    <div class="icheck-primary d-inline">
                                                                                        <input type="radio" id="radioPrimary1" name="r1" checked disabled >
                                                                                        <label for="radioPrimary1">YES
                                                                                        </label>
                                                                                    </div>
                                                                                    <div class="icheck-danger d-inline">
                                                                                        <input type="radio" name="r2" id="radioDanger1" disabled>
                                                                                        <label for="radioDanger1">NO
                                                                                        </label>
                                                                                    </div>

                                                                                  @else
                                                                                    <div class="icheck-primary d-inline">
                                                                                        <input type="radio" id="radioPrimary1" name="r1"  disabled >
                                                                                        <label for="radioPrimary1">YES
                                                                                        </label>
                                                                                    </div>
                                                                                    <div class="icheck-danger d-inline">
                                                                                        <input type="radio" name="r2" id="radioDanger1" checked disabled>
                                                                                        <label for="radioDanger1">NO
                                                                                        </label>
                                                                                    </div>

                                                                                  @endif


                                                                                  <br>
                                                                                </div>
                                                                                <div class="col-sm-4 invoice-col">
                                                                                    <textarea name="single_sourceText" id="single_sourceText" cols="30" rows="3" disabled>{{ $details->single_sourceText }}</textarea><br>
                                                                                    <div id="textHelp" class="text-black-50">Single Source – Justification</div>
                                                                                </div>
                                                                                <div class="col-sm-4 invoice-col">
                                                                                    <div class="form-group" >
                                                                                        <label><strong>Quotation Status :</strong></label>
                                                                                        <select class="form-control "  onchange="enableBrand(this)"  id='procument_name' required name="status" >
                                                                                                <option  selected disabled >Choose your decision</option>
                                                                                                <option  value="Quo_Approved">Quotation Approved</option>
                                                                                                <option  value="Quo_Rejected">Quotation Rejected</option>
                                                                                        </select>
                                                                                        <span class="text-danger">@error('status'){{ $message }}@enderror</span>
                                                                                    <div id="textHelp" class="text-black-50">Select the status</div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-sm-4 invoice-col">
                                                                                    <div id="officer" class="form-group d-none">
                                                                                            <label for="vecfrm">Attach Quotation files</label> <br>
                                                                                            <input type="file" class="link-black text-sm "  name="file" accept=".pdf, .docx" >
                                                                                            <div id="textHelp" class="text-black-50">Attach the your chosen quotation</div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-8 invoice-col">
                                                                                 <label><strong>Remarks</strong></label><br>
                                                                                  <textarea name="remarks" id="remarks" cols="50" rows="3" placeholder="remarks" required></textarea>
                                                                                </div>


                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-sm-9 invoice-col">
                                                                                    <a href="#" onclick="GetPrint()" rel="noopener"  class="btn btn-default float-left  "><i class="fas fa-print"></i> Print</a>
                                                                                </div>
                                                                                <div class="col-sm-3 invoice-col ">
                                                                                    <button type="submit" id="button" class="btn btn-primary float-right" >Submit Approval </button>
                                                                                </div>
                                                                            </div>
                                                                        </form>

                                                                        </tbody>
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


@section('js_files')


{{-- This for DataTable Config --}}
<script>
    $(function () {
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
</script>


<script type="text/javascript">
(function blink() {
	$('.blink_me').fadeOut(1000).fadeIn(500, blink);
})();

function GetPrint()
{
    /*For Print*/
    window.print();
}
</script>

{{-- This dependent dropdown javascript --}}
<script type="text/javascript">
    $(document).ready(function () {
                    $('#procument_name').on('change', function () {
                         let id = $(this).val();
                         $('#procument_email').empty();
                         $('#procument_email').append(`<option value="0" disabled  >Processing...</option>`);
                          $.ajax({
                          type: 'GET',
                          url: 'filder/' + id,
                          success: function (response) {
                         var response = JSON.parse(response);
                         console.log(response);

                         response.forEach(element => {
                        $('#procument_email').append(`<option selected value="${element['email']}">${element['email']}</option>`);

                        });
                       }
                   });
            });
        });
</script>
<script type="text/javascript">
function enableBrand(answer){
    console.log(answer.value);
    if(answer.value == 'Quo_Approved'){
        document.getElementById('officer').classList.remove('d-none');
        document.getElementById('button').classList.remove('disabled');
    }else{
        document.getElementById('officer').classList.add('d-none');
        document.getElementById('button').classList.remove('disabled');

    }

}

</script>

@endsection
