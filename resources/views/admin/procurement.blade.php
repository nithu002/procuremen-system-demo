@extends('layouts.main')


@section('css_files')


 <style>
    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        right: 0;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    .dropdown-content a {
        color: black;
        padding: 10px 10px;
        text-decoration: none;
        display: block;
    }

    .dropdown-content a:hover {
        background-color: #f1f1f1;
    }
    .dropdown:hover .dropdown-content {
        display: block;
    }

    .dropdown:hover .dropbtn {
        background-color: #3e8e41;
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


        <li class="nav-item  menu-open">
            <a href="#" class="nav-link active ">
                <i class="fa fa-user-plus" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                <p>
                    Members
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">

                <li class="nav-item">
                    <a href={{ url('visor') }} class="nav-link ">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Supervisor</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href={{ url('procurement') }} class="nav-link active">
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
            <a href={{ url('timeline') }} class="nav-link">
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
      <h1 class="m-0">Procurement Details</h1>
   </div>
   <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
      <li class="breadcrumb-item"><a href="#">Members</a></li>
      <li class="breadcrumb-item active">Procurement Details</li>
    </ol>
  </div>
@endsection

@section('main-content')

<!-- VIEW MODEL -->
<!-- Button trigger modal -->
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Procurement Creat Form</h5>
          <a data-bs-dismiss="modal"><i class="fa fa-times"></i></a>
        </div>
        <form action="{{ url('/procurement') }}" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="mb-3">
                    @csrf
                    <label for="exampleInputEmail1" class="form-label">Procurement Name</label>
                    <input type="text" name="procurement_name" class="form-control" required value="{{ old('procurement_name') }}" aria-describedby="textHelp">
                    <span class="text-danger">@error('procurement_name'){{ $message }} @enderror</span>
                    <div id="textHelp" class="text-black-50">Enter the procurement name.</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Procurement Email</label>
                    <input type="text" name="email" class="form-control" value="{{ old('email') }}" required aria-describedby="textHelp">
                    <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                    <div id="textHelp" class="text-black-50">Enter the procurement email address.</div>
                </div>
                <div class="mb-3">
                    <div class="form-group">
                        <label>Phone Number</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                          </div>
                          <input type="phone" name="phone_no" class="form-control" value="{{ old('phone_no') }}" onkeypress="isInputNumber(event)" maxlength="13" required>
                        </div>
                      </div>
                    <span class="text-danger">@error('phone_no'){{ $message }}@enderror</span>
                    <div id="textHelp" class="text-black-50">Enter the vaild contact no</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Address</label>
                    <input type="text" name="address" class="form-control" value="{{ old('address') }}" required aria-describedby="textHelp">
                    <span class="text-danger">@error('address'){{ $message }}@enderror</span>
                    <div id="textHelp" class="text-black-50">Enter the super visor address.</div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
      </div>
    </div>
  </div>
<!-- END VIEW MODEL -->

 <!-- EDIT Modal -->
  <div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Procurement Edit Form</h5>
          <a data-bs-dismiss="modal"><i class="fa fa-times"></i></a>
        </div>
        <form action="{{ url('/procurement') }}" method="POST" id="editForm" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="mb-3">
                    @csrf
                    @method('PUT')
                    <label for="exampleInputEmail1" class="form-label">Procurement Name</label>
                    <input type="text" name="procurement_name" id="procurement_name" class="form-control" required  aria-describedby="textHelp">
                    <span class="text-danger">@error('procurement_name'){{ $message }} @enderror</span>
                    <div id="textHelp" class="text-black-50">Enter the procurement name.</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Procurement Email</label>
                    <input type="text" name="email" id="email" class="form-control"  required aria-describedby="textHelp">
                    <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                    <div id="textHelp" class="text-black-50">Enter the vaild procurement email address.</div>
                </div>
                <div class="mb-3">
                    <div class="form-group">
                        <label>Phone Number</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                          </div>
                          <input type="phone" name="phone_no" id="phone_no" class="form-control"  onkeypress="isInputNumber(event)" maxlength="13" required>
                        </div>
                      </div>
                    <span class="text-danger">@error('phone_no'){{ $message }}@enderror</span>
                    <div id="textHelp" class="text-black-50">Enter the vaild contact no</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Address</label>
                    <input type="text" name="address" class="form-control" id="address"  required aria-describedby="textHelp">
                    <span class="text-danger">@error('address'){{ $message }}@enderror</span>
                    <div id="textHelp" class="text-black-50">Enter the super visor address.</div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
      </div>
    </div>
  </div>
<!--END EDIT MODEL-->


<!--DELETE MODEL-->
    <div class="modal fade" id="deleteModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <p></p><a data-bs-dismiss="modal"><i class="fa fa-times"></i></a>
            </div>
            <form action="{{ url('procurement/delete') }}" method="POST"  enctype="multipart/form-data">
                <div class="modal-body">
                        <center>
                            <h3 class="text-black-50"> Are You Sure? </h3>
                            <h5 style="color:red;"><b>You will not be able to recover this!</b></h5>
                        </center>
                        @csrf
                        <input hidden  name="id" id="delete_id"  required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>&nbsp;&nbsp;
                    <button type="submit" class="btn btn-danger">Yes delete</button>
                </div>
            </form>
        </div>
        </div>
    </div>
<!--END DELETE MODEL-->


{{-- Main Table --}}
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
            <div class="col-6">
                <h3 class="card-title">Procurement Details List</h3>
                <br>
                <br>
                @error('email')
                    <button type="button" style=" box-shadow: 10px 10px 15px red; border-color: #f44336" class="btn btn-danger " data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Add Procurement officer
                    </button>
                @else
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Add Procurement officer
                    </button>
                @enderror
            </div>
                            {{-- FILDER OPTION TABLE  --
                    <tr class="expandable-body">
                        <td>
                            <table class="table">
                                <tbody>
                                    <tr data-widget="expandable-table" aria-expanded="false">
                                        <td>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-11"></div>
                                                    <div class="col-6 col-md-1">
                                                        &nbsp;&nbsp;&nbsp; <button style="text-align: right;" type="button" class="btn btn-primary">
                                                        <i class="fa fa-filter"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="expandable-body">
                                    <td>
                                        <table class="table">
                                            <tbody>
                                                <div class="row">
                                                    <form action="{{ url('filter') }}" method="get">
                                                            @csrf
                                                        <div class="col-4 mb-3">
                                                            <select name="date_filter" class="form-control"  aria-label=".form-select example"  >
                                                                <option value="">All Dates</option>
                                                                <option value="today" {{ Request::post('date_filter') == 'today' ? 'selected':'' }}>Today</option>
                                                                <option value="yesterday" {{ Request::post('date_filter') == 'yesterday' ? 'selected':'' }} >Yesterday</option>
                                                                <option value="this_week" {{ Request::post('date_filter') == 'this_week' ? 'selected':'' }}>This Week</option>
                                                                <option value="last_week" {{ Request::post('date_filter') == 'last_week' ? 'selected':'' }}>Last Week</option>
                                                                <option value="this_month" {{ Request::post('date_filter') == 'this_month' ? 'selected':'' }} >This Month</option>
                                                                <option value="last_month"{{ Request::post('date_filter') == 'last_month' ? 'selected':'' }} >Last Month</option>
                                                                <option value="this_year" {{ Request::post('date_filter') == 'this_year' ? 'selected':'' }}>This Year</option>
                                                                <option value="last_year"{{ Request::post('date_filter') == 'last_year' ? 'selected':'' }}>Last Year</option>
                                                            </select>
                                                            <div id="textHelp" class="text-black-50">Filter by date.</div>
                                                        </div>

                                                        <div class="col-4 mb-3">
                                                        </div>
                                                        <div class="col-4 mb-3">
                                                            <button type="submit" class="btn btn-info" value=""><i class="fa fa-filter"></i>
                                                                Filter </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </tbody>
                                        </table>
                                    </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                     {{-- END  FILDER OPTION TABLE  --}}
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-hover data-table">
            <thead>
            <tr>
              <th hidden>ID</th>
              <th>Procurement Name</th>
              <th>Email</th>
              <th>Phone No</th>
              <th>Address</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($procurement as $procurements )
                <tr>
                    <td hidden>{{ $procurements->id }}</td>
                    <td>{{ $procurements->name }}</td>

                    <td>{{ $procurements->email }} </td>

                    <td>{{ $procurements->phone_no  }}</td>

                    <td>{{ $procurements->address  }}</td>

                    <td>
                        <div class="dropdown" style="float:left;">
                            <button class="btn btn-secondary">Actions</button>
                            <div class="dropdown-content" style="bottom:0;">

                                <a href="#" class="edit"><span class="fas fa-edit"></span>&nbsp;Edit Details</a>
                                <a href="#" class="DeleteBtn"><span class="fas fa-trash-alt"></span>&nbsp;Delete Details</a>
                                <a href={{ url("procurement/mail/$procurements->id ")}}><span class="fa fa-share"></span>&nbsp;Share Access</a>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
{{--End  Main Table --}}

@endsection


@section('js_files')

{{-- This for DataTable Config --}}
 <script>
    $(function () {
     $('#example1').DataTable({
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
{{-- This for Fetch the data in table -> model --}}
<script type="text/javascript">
$(document).ready(function() {
    var table=$('.data-table').DataTable();

    //start edit record
    table.on('click','.edit',function(){
        $tr= $(this).closest('tr');
        if($($tr).hasClass('child')){
            $tr=$tr.prev('.parent');
        }

        var data =table.row($tr).data();
        console.log(data);

        $('#procurement_name').val(data[1]);
        $('#email').val(data[2]);
        $('#phone_no').val(data[3]);
        $('#address').val(data[4]);

        $('#editForm').attr('action','/procurement/'+data[0]);
        $('#editModal').modal('show');
    })
});
</script>

{{-- This for Fetch the data & delete the unique data --}}
<script type="text/javascript">
    $(document).ready(function() {
        var table=$('.data-table').DataTable();

        //start edit record
        table.on('click','.DeleteBtn',function(){
            $tr= $(this).closest('tr');
            if($($tr).hasClass('child')){
                $tr=$tr.prev('.parent');
            }

            var data =table.row($tr).data();
            console.log(data);

            $('#delete_id').val(data[0]);

            $('#deleteModel').modal('show');
        })
    });
</script>
{{-- Input number type only number --}}
<script>
    function isInputNumber(evt) {
        var ch = String.fromCharCode(evt.which);
        if (!(/[0-9]/.test(ch))) {
            evt.preventDefault();
        }
    }
</script>
@endsection
