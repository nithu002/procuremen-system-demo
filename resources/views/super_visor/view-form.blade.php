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
            <a href={{ url('viocer/dashboard') }} class="nav-link ">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
            </a>
        </li>
        <li class="nav-item">
            <a href={{ url('viocer/request') }} class="nav-link active ">
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
      <h1 class="m-0">PR Details</h1>
   </div>
   <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="{{ url('viocer/dashboard') }}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{ url('viocer/request') }}">PR Aproval</a></li>
      <li class="breadcrumb-item active">PR Details</li>
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
                                                    <a href="{{ url('viocer/request') }}" class="btn btn-primary reload float-right mb-3"><i class="fa fa-arrow-left" aria-hidden="true"></i>
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
                                                            <a href="download1/{{ $details->id }}" target="new" class="link-black text-sm"><i class="fas fa-link mr-1"></i> Download {{ $details->file_tor }}</a>
                                                          </p>
                                                    </div>
                                                    <div>
                                                        <label class="vecfrm link-black">CN File</label> <br>
                                                        <p>
                                                            <a href=" download2/{{ $details->id }}" target="new" class="link-black text-sm"><i class="fas fa-link mr-1"></i> Download {{ $details->file_cn }}</a>
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
                                                            <tr data-widget="expandable-table" aria-expanded="false">
                                                                <td>
                                                                    @error('status')
                                                                    <button type="button" class="btn btn-danger p-0">
                                                                        <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                                                                        </button>
                                                                        <b style="color:#ff0000;">Purchase Request Approval By</b>

                                                                    @else
                                                                    <button type="button" class="btn btn-primary p-0">
                                                                        <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                                                                        </button>
                                                                        <b style="color:#007bff;">Purchase Request Approval By</b>

                                                                    @enderror



                                                                </td>
                                                            </tr>
                                                            <tr class="expandable-body">
                                                            <td>
                                                                <table class="table table-hover">
                                                                    <form action="{{ url('viocer/details/update') }}" method="POST">
                                                                        <tbody>
                                                                            @csrf
                                                                            <div class="row invoice-col">
                                                                                <div class="col-sm-6 invoice-col">
                                                                                    <div hidden>
                                                                                        <input type='text' name="user_email" value="{{ $details->email }}"/>
                                                                                     </div>
                                                                                    <input hidden name="id" value="{{ $details->id }}" />
                                                                                    <b><strong>Purchase Request Approval By:</strong></b><br>
                                                                                    &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; <b class="lead">{{ $details->supervisor_name }}</b>

                                                                                </div>
                                                                                <div class="col-sm-6 invoice-col">
                                                                                    <b><strong class="text">Date: </strong></b><b class="lead">{{ $date->format('d-m-Y') }}</b><br>

                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-lg-12">
                                                                                    <div class="alert">
                                                                                        <div class="row">
                                                                                            <div class="col-12 col-sm-6">
                                                                                                <div class="form-group">
                                                                                                    <label><strong>Choose PR Status :
                                                                                                       </strong></label>
                                                                                                    <select class="form-control " id="status" onchange="enableBrand(this)" name="status" required>
                                                                                                            <option  selected disabled>Choose Status </option>
                                                                                                            <option  value="PR_Approved">Approved</option>
                                                                                                            <option  value="PR_Rejected">Rejected</option>
                                                                                                    </select>

                                                                                               <div id="textHelp" class="text-black-50">Approved/Rejected</div>
                                                                                               <span class="text-danger">@error('status'){{ $message }} @enderror</span>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-12 col-sm-6 ">
                                                                                                <div class="form-group d-none" id="officer">
                                                                                                    <label><strong>Choose Procurement Officer:</strong></label>
                                                                                                    <select class="form-control "  id='procument_name' name="procument_name" required>
                                                                                                            <option  selected disabled>Choose Procurement Officer Name </option>
                                                                                                            @foreach ($procument as $name )
                                                                                                            <option  value="{{ $name->name }}">{{ $name->name }}</option>
                                                                                                            @endforeach
                                                                                                    </select>
                                                                                                   <div id="textHelp" class="text-black-50">PR details send to this officer</div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div hidden>
                                                                                                <select class="form-control "  id='procument_email' name="procument_email">

                                                                                                </select>
                                                                                            </div>


                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-12 col-sm-8">
                                                                                                <div class="form-group">
                                                                                                    <label><strong>Remarks</strong></label><br>
                                                                                                    <textarea name="remarks" id="remarks" cols="70" rows="3"></textarea>
                                                                                                </div>
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-12">
                                                                                    <button type="submit" id="button" class="btn btn-primary disabled " >Submit Approval </button>
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
    if(answer.value == 'PR_Approved'){
        document.getElementById('officer').classList.remove('d-none');
        document.getElementById('button').classList.remove('disabled');
    }else{
        document.getElementById('officer').classList.add('d-none');
        document.getElementById('button').classList.remove('disabled');

    }

}

</script>

@endsection
