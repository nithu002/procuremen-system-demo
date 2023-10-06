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
                    <a href={{ url('procurement') }} class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Procurement Officer</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href={{ url('programme') }} class="nav-link active">
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
      <h1 class="m-0">Operation Officials</h1>
   </div>
   <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
      <li class="breadcrumb-item"><a href="#">Members</a></li>
      <li class="breadcrumb-item active">Operation Officials</li>
    </ol>
  </div>
@endsection

@section('main-content')



 <!-- EDIT Modal -->
  <div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Operation Lead Edit Form</h5>
          <a data-bs-dismiss="modal"><i class="fa fa-times"></i></a>
        </div>
        <form action="{{ url('/programme') }}" method="POST" id="editForm" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="mb-3">
                    @csrf
                    @method('PUT')
                    <label for="exampleInputEmail1" class="form-label">Operation Lead Name</label>
                    <input type="text" name="program_name" id="program_name" class="form-control" required  aria-describedby="textHelp">
                    <span class="text-danger">@error('program_name'){{ $message }} @enderror</span>
                    <div id="textHelp" class="text-black-50">Enter the Operation Lead name.</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Operation Lead Email</label>
                    <input type="text" name="email" id="email" class="form-control"  required aria-describedby="textHelp">
                    <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                    <div id="textHelp" class="text-black-50">Enter the vaild Operation lead email address.</div>
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
                    <div id="textHelp" class="text-black-50">Enter the operation lead address.</div>
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



{{-- Main Table --}}
<div class="row">


    <div class="col-12">
      <div class="card">
        <div class="card-header">
            <div class="col-6">
                <h3 class="card-title">Operation Lead Details List</h3>
                <br>
                <br>
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal" data-toggle="tooltip" data-bs-toggle="modal" data-placement="bottom" title="Because you have permission to create one lead, you cannot add another active lead" @disabled(true)>
                        Add Operation Lead
                    </button>

            </div>

        </div>
        <!-- /.card-header -->
        <div class="card-body">

            <table id="example1" class="table table-bordered table-hover data-table">
                <thead>
                <tr>
                  <th hidden>ID</th>
                  <th>Operation Lead Name</th>
                  <th>Email</th>
                  <th>Phone No</th>
                  <th>Address</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($programme as $programmes )
                    <tr>
                        <td hidden>{{ $programmes->id }}</td>
                        <td>{{ $programmes->name }}</td>

                        <td>{{ $programmes->email }} </td>

                        <td>{{ $programmes->phone_no  }}</td>

                        <td>{{ $programmes->address  }}</td>

                        <td>
                            <div class="dropdown" style="float:left;">
                                <button class="btn btn-secondary">Actions</button>
                                <div class="dropdown-content" style="bottom:0;">

                                    <a href="#" class="edit"><span class="fas fa-edit"></span>&nbsp;Edit Details</a>

                                    <a href={{ url("programme/mail/$programmes->id ")}}><span class="fa fa-share"></span>&nbsp;Share Access</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

              </table>
              <div class="time-label">
                <span class="btn btn-danger  p-0">
                     &nbsp;    Note: &nbsp;
                </span>
                <b class="text-black-50">&nbsp;&nbsp;&nbsp; You can edit this role details and cannot add another active role.</b>
            </div>


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
       "paging": false,
       "lengthChange": true,
       "searching": true,
       "ordering": false,
       "info": false,
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

        $('#program_name').val(data[1]);
        $('#email').val(data[2]);
        $('#phone_no').val(data[3]);
        $('#address').val(data[4]);

        $('#editForm').attr('action','/programme/'+data[0]);
        $('#editModal').modal('show');
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
