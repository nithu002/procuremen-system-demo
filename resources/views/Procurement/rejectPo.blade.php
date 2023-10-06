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
            <a href={{ url('procurementPanel/quotation') }} class="nav-link ">
                @if($conts)
                <span class="position-absolute  translate-middle badge rounded-pill bg-danger" id="chat">
                  {{ $conts }}  <span class="admin-nav-text"></span></span>
                @endif
                <i class="fa fa-list-ul" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;
                <p>Add Quotation</p>
            </a>
        </li>

        <li class="nav-item">
            <a href={{ url('procurementPanel/create') }} class="nav-link active">
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
      <h1 class="m-0">Repurchase Order Form</h1>
   </div>
   <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ url('procurementPanel/dashboard') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ url('procurementPanel/create') }}">Create Purchase Order</a></li>
      <li class="breadcrumb-item active">Repurchase Order Form</li>
    </ol>
  </div>
@endsection

@section('main-content')

<div class="container">
    <!--Section: Contact v.2-->
    <section class="section">
        <div class="col-xl-12">
            <!--Section heading-->
            <section class="content card-default">
                <div class="container-fluid">
                    <div class="card glass ">

                        <div class="card-body">
                            <div class="alert">

                                <div class="row invoice-info">
                                    <div class="col-sm-6 invoice-col">
                                        <b>Status: </b><b class="lead">Purchase Order Rejected</b><br><br>
                                        <b>Why Order has Rejected:</b> <b class="lead">{{ $details->remarks_lead }}</b><br><br>

                                    </div>
                                    <!-- /.col -->
                                     <div class="col-sm-6 invoice-col">
                                        <b>By: </b><b class="lead">{{ $lead->name }}</b><br><br>
                                     </div>
                                    <!--
                                         /.col -->
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <br>
                    <form  action="{{ url('procurementPanel/insert/update') }}" method="POST" enctype="multipart/form-data">

                        <div class="card glass ">
                            @csrf
                            <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                          <h4>
                                            <small class="float-right lead">Date: {{ $date->format('d-m-Y') }}</small>
                                          </h4>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <div class="row invoice-info">
                                        <div class="col-sm-9 invoice-col">
                                            <b>Purchase order No: </b><b class="lead">{{ $details->poID }}</b><br><br>
                                            <b>PR Number:</b> <b class="lead">{{ $details->prID }}</b><br><br>
                                            <b>PR Generator:</b> <b class="lead">{{ $find->req_name }}</b> <br><br>
                                        </div>
                                        <!-- /.col -->
                                         <div class="col-sm-3 invoice-col">
                                         </div>
                                        <!-- /.col -->
                                    </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <br>
                        <!-- /.card -->
                        <!-- SELECT2 EXAMPLE -->
                        <div class="card card-default glass">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group">
                                            <label>Purchase order date </label>
                                            <input hidden  name="id" value="{{ $details->id }}" required />
                                            <input type="date" id="poDueDate" name="poDueDate" autocapitalize="true"
                                            class="form-control datetimepicker-input" required />
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group">
                                            <label>Delivery date </label>
                                            <input type="date" id="deliveryDate" name="deliveryDate"
                                                class="form-control datetimepicker-input" required />
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group">
                                            <label>Supplier Name</label>
                                            <input type="text" class="form-control" id="supplierName" name="supplierName"  autocapitalize="on" aria-autocomplete="list"
                                                placeholder="Enter Supplier Name" required />
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group">
                                            <label>Supplier contact no</label>
                                            <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                              </div>
                                            <input type="text" class="form-control" onkeypress="isInputNumber(event)" maxlength="13" id="supplierContact_no" name="supplierContact_no"  autocapitalize="on" aria-autocomplete="list"
                                                placeholder="Enter Supplier Contact No" required />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group">
                                            <label>Supplier address </label>
                                            <input  type="text" class="form-control" id="supplierAddress" name="supplierAddress"  autocapitalize="on" aria-autocomplete="list"
                                                placeholder="Enter Supplier Address" required />
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group">
                                            <label>Supplier email address</label>
                                            <input type="email" class="form-control" id="supplierEmail" name="supplierEmail" autocapitalize="on" aria-autocomplete="list"
                                                placeholder="Enter Supplier Email" required />
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <br>
                        <!-- /.card -->
                        <div class="card card-default glass">
                            <div class="card-header">
                                <h5 class="card-title">Goods & Service Details </h5>
                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <table class="table table-bordered" id="example2">
                                        <thead class="table-head">
                                        <tr>
                                            <th scope="col" style="width: 30%">Descriptions</th>
                                            <th scope="col" style="width: 30%">Detailed specifications</th>
                                            <th scope="col" style="width: 10%" class="text-end">Qty</th>
                                            <th scope="col" style="width: 15%" class="text-end">Rate</th>
                                            <th scope="col" style="width: 15%" class="text-end">Amount</th>
                                            <th class="NoPrint"></th>
                                        </tr>
                                        </thead>
                                        <tbody id="TBody">
                                        <tr id="TRow">
                                            <td><input type="text" class="form-control" name="description[]" @required(true)></td>
                                            <td><input type="text" class="form-control"  name="specification[]" @required(true) ></td>
                                            <td><input type="number" dir="rtl" class="form-control text-end" name="qty[]" onchange="Calc(this);" ></td>
                                            <td><input dir="rtl" class="form-control text-end" name="rate[]"  onchange="Calc(this);" ></td>
                                            <td><input type="number" class="form-control text-end" name="amt[]"  readonly></td>
                                            <td class="NoPrint"><button type="button" class="btn btn-sm btn-danger" onclick="BtnDel(this)">X</button></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="row">
                                    <div class="col-8">
                                        <button type="button" class="btn btn-success" onclick="BtnAdd()">Add Item</button>
                                    </div>
                                    <div class="col-2">
                                        <label>Total Amount</label>
                                    </div>
                                    <div class="col-2">
                                        <input type="number" class="form-control text-end" id="FTotal" name="FTotal" >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <!-- /.card-body -->
                        <br>
                        <div class="card card-default glass">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <label><strong>Officer Information</strong></label>
                                        <div class="form-group">
                                            <label>Procurement officer </label>
                                            <div >
                                                <input type="text" class="form-control"  @disabled(true) value="{{ $details->pocumerName }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label><strong class="text-white">&nbsp;</strong></label>
                                        <div class="form-group">
                                            <label>Date</label>
                                           <input type="text"  value="{{ $date->format('d-m-Y') }}" class="form-control"  @disabled(true) >
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <!-- /.card -->
                        <br>
                        <!-- /.card-body -->
                        <div class="card card-default glass">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit" style=" background: #084cdf;color: #fff;" class="btn btn-primary ">Submit</button>
                                        <button type="reset" class="btn btn-danger">Clear All</button>
                                        <a href="#" onclick="GetPrint()" rel="noopener"  class="btn btn-default float-right glass "><i class="fas fa-print"></i> Print</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                    </form>
                </div>
            </section>
</div>
</section>
</div>



@endsection


@section('js_files')

{{-- This for DataTable Config --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script>
$('#myselect').on('change', function() {
$('#myinput').val($(this).val());
})

// init
$('#myselect').change();




function GetPrint()
{
    /*For Print*/
    window.print();
}

function BtnAdd()
{
    /*Add Button*/
    var v = $("#TRow").clone().appendTo("#TBody") ;
    $(v).find("input").val('');
    $(v).removeClass("d-none");
    $(v).find("th").first().html($('#TBody tr').length - 1);
}

function BtnDel(v)
{
    /*Delete Button*/
       $(v).parent().parent().remove();
       GetTotal();

        $("#TBody").find("tr").each(
        function(index)
        {
           $(this).find("th").first().html(index);
        }

       );
}

function Calc(v)
{
    /*Detail Calculation Each Row*/
    var index = $(v).parent().parent().index();

    var qty = document.getElementsByName("qty[]")[index].value;
    var rate = document.getElementsByName("rate[]")[index].value;

    var amt = qty * rate;
    document.getElementsByName("amt[]")[index].value = amt;

    GetTotal();
}

function GetTotal()
{
    /*Footer Calculation*/

    var sum=0;
    var amts =  document.getElementsByName("amt[]");

    for (let index = 0; index < amts.length; index++)
    {
        var amt = amts[index].value;
        sum = +(sum) +  +(amt) ;
    }

    document.getElementById("FTotal").value = sum;



}

</script>

<script>
    function isInputNumber(evt) {
        var ch = String.fromCharCode(evt.which);
        if (!(/[0-9]/.test(ch))) {
            evt.preventDefault();
        }
    }
</script>


@endsection
