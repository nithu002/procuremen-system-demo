@extends('layouts.main')


@section('css_files')


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
            <a href={{ url('staff') }} class="nav-link active">
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
        {{-- <li class="nav-item ">
            <a href="#" class="nav-link">
                <i class="fa fa-file" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <p>
                    Reports
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item ">
                    <a href={{ url('by_user') }} class="nav-link ">
                        <i class="far fa-circle nav-icon"></i>
                        <p>By User</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href={{ url('by_vehicle') }} class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>By Vehicle</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href={{ url('by_department') }} class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>By Department</p>
                    </a>
                </li>
            </ul>
        </li> --}}
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
      <h1 class="m-0">Staff Details</h1>
   </div>
   <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      {{-- <li class="breadcrumb-item"><a href="#">Users</a></li> --}}
      <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
      <li class="breadcrumb-item active">Staff Details</li>
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
          <h5 class="modal-title" id="exampleModalLabel">Staff Form</h5>
          <a data-bs-dismiss="modal"><i class="fa fa-times"></i></a>
        </div>
        <form action="{{ url('/staff') }}" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="mb-3">
                    @csrf
                    <label for="exampleInputEmail1" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" required value="{{ old('name') }}" aria-describedby="textHelp">
                    <span class="text-danger">@error('user_name'){{ $message }} @enderror</span>
                    <div id="textHelp" class="text-black-50">Enter the staff name.</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" required aria-describedby="textHelp">
                    <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                    <div id="textHelp" class="text-black-50">Enter the vaild email address</div>
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
                <div class="mb-3 form-group">
                    <label for="exampleInputEmail1" class="form-label">Supervisor Name</label><br>
                    <select name="super_name" id="supervoicer_name" class="form-control super_name" style="width: 100%;" required>
                         <option value="0" disabled selected>Select the supervisor</option>
                        @foreach ($super as $supers )
                          <option value="{{ $supers->name }}" >{{ ucfirst($supers->name) }}</option>
                        @endforeach
                    </select>
                    <span class="text-danger">@error('super_name'){{ $message }} @enderror</span>
                    <div id="textHelp" class="text-black-50">choose the supervisor.</div>
                </div>
                <div class="mb-3 form-group">
                    <label for="exampleInputEmail1" class="form-label">Supervisor Email address</label>
                    <select ty name="super_email" class="form-control" id="super_email" style="width: 100%;" @readonly(true)>

                    </select>
                    <span class="text-danger">@error('super_email'){{ $message }}@enderror</span>
                    <div id="textHelp" class="text-black-50">This field is auto complete with supervisor name.</div>
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
          <h5 class="modal-title" id="staticBackdropLabel">Edit Details</h5>
          <a data-bs-dismiss="modal"><i class="fa fa-times"></i></a>
        </div>
            <form action="{{ url('/staff') }}" method="POST" id="editForm" enctype="multipart/form-data">
                 <div class="modal-body">
                    <div class="mb-3">
                        @csrf
                        @method('PUT')
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" required id="name" aria-describedby="textHelp">
                        <span class="text-danger">@error('user_name'){{ $message }} @enderror</span>
                        <div id="textHelp" class="text-black-50">Enter the staff name.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" name="email" id="email" class="form-control" required aria-describedby="textHelp">
                        <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                        <div id="textHelp" class="text-black-50">Enter the vaild email address</div>
                    </div>
                    <div class="mb-3">
                        <div class="form-group">
                            <label>Phone Number</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                              </div>
                              <input type="phone" id="phone_no" name="phone_no" class="form-control" onkeypress="isInputNumber(event)" maxlength="13" required>
                            </div>
                          </div>
                        <span class="text-danger">@error('phone_no'){{ $message }}@enderror</span>
                        <div id="textHelp" class="text-black-50">Enter the vaild contact no</div>
                    </div>
                    <div class="mb-3 form-group">
                        <label for="exampleInputEmail1" class="form-label">Supervisor Name</label><br>
                        <select name="super_name" id="supervoicer" class="form-control super_name" style="width: 100%;" required>
                             <option value="0" disabled selected>Select the supervisor</option>
                            @foreach ($super as $supers )
                              <option value="{{ $supers->name }}" >{{ ucfirst($supers->name) }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">@error('super_name'){{ $message }} @enderror</span>
                        <div id="textHelp" class="text-red">Please select supervisor name again.</div>
                    </div>
                    <div class="mb-3 form-group">
                        <label for="exampleInputEmail1" class="form-label">Supervisor Email address</label>
                        <select ty name="super_email" class="form-control" id="super_email1" style="width: 100%;" @readonly(true)>

                        </select>
                        <span class="text-danger">@error('super_email'){{ $message }}@enderror</span>
                        <div id="textHelp" class="text-black-50">This field is auto complete with supervisor name.</div>
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
            <form action="{{ url('staff/delete') }}" method="POST"  enctype="multipart/form-data">
                <div class="modal-body">
                        <center>
                            <h3 class="text-black-50"> Are You Sure? </h3>
                            <h5 style="color:red;"><b>You will not be able to recover this!</b></h5>
                        </center>
                        @csrf
                         <input hidden name="id" id="delete_id" >
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
            <div class="row">
                <div class="col-6">
                    <h3 class="card-title">Staff Details List</h3>
                    <br>
                    <br>
                    @error('email')
                    <button type="button" style=" box-shadow: 10px 10px 15px red; border-color: #f44336" class="btn btn-danger " data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Add Staff
                    </button>

                    @else
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Add Staff
                        </button>
                    @enderror

                </div>
                {{-- FILDER OPTION TABLE--}}
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
                                                    <form action="{{ url('filter') }}" method="GET">
                                                        <div class="col-4 mb-3">
                                                            {{-- @csrf --}}
                                                            <select name="super_name" class="form-control"  aria-label=".form-select example"  >
                                                                <option value="all">All Super VoiserName</option>
                                                                @foreach ($super as $supers )
                                                                <option value="{{ $supers->name }}"{{ Request::post('super_name') == $supers->name ? 'selected':'' }} >{{ $supers->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            <div id="textHelp" class="text-black-50">Filter by supervisors.</div>
                                                        </div>

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

                                                        <div class="col-1 mb-3">
                                                        </div>
                                                        <div class="col-3 mb-3">
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
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example2" class="table table-bordered table-hover data-table">
            <thead>
            <tr>
              <th hidden>ID</th>

              <th>Name</th>
              <th>Email address</th>
              <th>Phone Number</th>
              <th>Supervisor Name</th>
              <th>Supervisor Email address</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($staff as $staffs )
                <tr>
                    <td hidden>{{ $staffs->id }}</td>

                    <td>{{ $staffs->name }}</td>

                    <td>{{ $staffs->email  }} </td>

                    <td>{{ $staffs->phone_no }}</td>

                    <td>{{ $staffs->supervisor_name  }}</td>

                    <td>{{ $staffs->supervisor_email }}</td>

                    <td><a class="btn btn-primary btn-xs edit" href="#"> <i class="fas fa-edit"></i>
                      Edit </a>
                      <button type="button" class="btn btn-danger btn-xs DeleteBtn" ><i class="fas fa-trash"></i>
                          Delete </button>
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

        $('#name').val(data[1]);
        $('#email').val(data[2]);
        $('#phone_no').val(data[3]);



        $('#editForm').attr('action','/staff/'+data[0]);
        $('#editModal').modal('show');
    })
});
</script>

{{-- This for Fetch the data & delete the unique id --}}
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
            // $('#editForm').attr('action','/staff/delete/');
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

{{-- This dependent dropdown javascript --}}
<script type="text/javascript">
$(document).ready(function () {
                $('#supervoicer_name').on('change', function () {
                     let id = $(this).val();
                     $('#super_email').empty();
                     $('#super_email').append(`<option value="0" disabled selected >Processing...</option>`);
                      $.ajax({
                      type: 'GET',
                      url: 'staff/super/' + id,
                      success: function (response) {
                     var response = JSON.parse(response);
                     console.log(response);
                     $('#super_email').empty();
                     response.forEach(element => {
                    $('#super_email').append(`<option value="${element['email']}">${element['email']}</option>`);
                    });
                   }
               });
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
                    $('#supervoicer').on('change', function () {
                         let id = $(this).val();
                         $('#super_email').empty();
                         $('#super_email').append(`<option value="0" disabled selected >Processing...</option>`);
                          $.ajax({
                          type: 'GET',
                          url: 'staff/super/' + id,
                          success: function (response) {
                         var response = JSON.parse(response);
                         console.log(response);
                         $('#super_email1').empty();
                         response.forEach(element => {
                        $('#super_email1').append(`<option value="${element['email']}">${element['email']}</option>`);
                        });
                       }
                   });
            });
        });
</script>

@endsection
