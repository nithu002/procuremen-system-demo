@extends('layouts.main')


@section('css_files')


 <link href="{{ url('//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jquery-editable/css/jquery-editable.css') }}" rel="stylesheet"/>
 <style>
      abbr {
  font-style: italic;
  position: relative

}

abbr:hover::after {
  background: #236df4;
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
    .photo-img {
        width: 110px;
        height: 110px;
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        margin-right: 20px;
        border-radius: 50%;
    }


  .photo-row {
      margin-bottom: 30px;
  }

  .profile-content, .photo-row {
      display: center;
      align-items: center;
  }

.change-photo {
    cursor: pointer;
    color: #010101;
    font-size: 16px;
    font-weight: 400;
    font-family: 'Open Sans', sans-serif;
}
  .change-photo {
      font-size: 13px;
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
                    <a href={{ url('visor') }} class="nav-link ">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Supervisor</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href={{ url('procurement') }} class="nav-link ">
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
                <p>Time Line Reports</p>
            </a>
        </li>

        <li class="nav-item menu-open ">
            <a href="#" class="nav-link active ">
                <i class="fa fa-cogs" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;
                <p>
                    Settings
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href={{ url('email') }} class="nav-link ">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Email Settings</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href={{ url('profile') }} class="nav-link active">
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
      <h1 class="m-0">Profile</h1>
   </div>
   <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
      <li class="breadcrumb-item"><a href="#">Settings</a></li>
      <li class="breadcrumb-item active">Profile</li>
    </ol>
  </div>
@endsection

@section('main-content')

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Account</h5>
          <a data-bs-dismiss="modal"><i class="fa fa-times"></i></a>
        </div>
        <form action="{{ url('/profile/delete') }}" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="mb-3">
                    @csrf
                    <input hidden name="id" value="{{ $data->id }}">
                    <label for="exampleInputEmail1" class="form-label">Enter your Current Password.</label>
                    <input type="password" name="password" class="form-control" required value="{{ old('password') }}" aria-describedby="textHelp">
                    <span class="text-danger">@error('password'){{ $message }} @enderror</span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Delete</button>
            </div>
        </form>
      </div>
    </div>
  </div>
 <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
    <div class="container mx-auto px-6 py-1">
        <div class="bg-white shadow-md rounded my-6 p-5">
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                      <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                          <div class="card-body box-profile">
                            <form id="user_save_profile_form"  method="POST" enctype="multipart/form-data">
                                <div class="text-center">
                                    @csrf
                                    <input hidden name="id" value="{{ $data->id }}">
                                     <div class="photo-img" id="image_user"
                                      style="background-image:url('/storage/{{ $data->user_img }}');">
                                     </div>
                                    <label class="change-photo" for="profile_pic">Change Photo </label>
                                    <input onchange="doAfterSelectImage(this)" type="file" style="display:none;" name="picture" id="profile_pic" />

                                    <br>
                                </div>
                             </form>

                            <h3 class="profile-username text-center">{{$data->name}}</h3>



                            <ul class="list-group list-group-unbordered mb-3">
                              <li class="list-group-item">
                                <b>Approved</b> <a class="float-right">{{ $approved }}</a>
                              </li>
                              <li class="list-group-item">
                                <b style="color:rgb(0, 0, 255);">Total Staff</b> <a  style="color:rgb(0, 140, 255);" class="float-right">{{ $user }}</a>
                              </li>
                              <li class="list-group-item">
                                <b  style="color:green;">Pending</b> <a  style="color:green;" class="float-right">{{ $pedding }}</a>
                              </li>
                            </ul>


                          </div>
                          <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- /.card -->
                      </div>
                      <!-- /.col -->
                      <div class="col-md-9">
                        <div class="card">
                          <div class="card-header p-2">
                            <ul class="nav nav-pills">
                              <li class="nav-item"><a class="nav-link" href="#activity" data-toggle="tab">Account Settings</a></li>
                              <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Delete Account</a></li>
                            </ul>
                          </div><!-- /.card-header -->
                          <div class="card-body">
                            <div class="tab-content">
                              <div class="active tab-pane" id="activity">
                                <div>
                                    <span class="username">
                                      <a href="#"><h5><b>Account Information</b></h5></a>
                                    </span>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="form-group col-6 mb-2">
                                        <label>User Name</label><br>
                                        &nbsp;&nbsp;&nbsp;&nbsp; <a href="" class="editable editable1 link-black" data-type="text" data-name="name" data-pk="{{ $data->id }}">{{ $data->name }}</a>
                                    </div>
                                    <div class="form-group col-6 mb-2">
                                        <label>Email Address</label><br>
                                        &nbsp;&nbsp;&nbsp;&nbsp; <a href="" class="editable  editable2 link-black" data-type="email" data-name="email" data-pk="{{ $data->id }}">{{ $data->email }}</a>
                                    </div>
                                </div>
                                <br>
                                <br>
                                @if ($data->password)
                                    <div class="row">
                                        <tr class="expandable-body">
                                            <td>
                                                <table class="table table-hover">
                                                <tbody>
                                                    <tr data-widget="expandable-table" aria-expanded="false">
                                                    @error('password')
                                                        <td>
                                                            <button type="button" class="btn btn-danger p-0">
                                                            <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                                                            </button>
                                                            <b style="color:#ed1212;">Update Password</b>
                                                        </td>
                                                    @else
                                                        <td>
                                                            <button type="button" class="btn btn-primary p-0">
                                                            <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                                                            </button>
                                                            <b style="color:#007bff;">Update Password</b>
                                                        </td>
                                                    @enderror
                                                    </tr>
                                                    <tr class="expandable-body">
                                                    <td>
                                                        <table class="table table-hover">
                                                            <form action="{{ url('profile/password') }}" method="POST">
                                                                <tbody>
                                                                    <div class="row">
                                                                        <p class="text-black-50">Ensure your account is using a long, random password to stay secure.</p>
                                                                    </div>
                                                                    <div class="row">
                                                                        @csrf
                                                                        <div class="form-group col-6 mb-2">
                                                                            <input hidden name="id" value="{{ $data->id }}"/>
                                                                            <input type="password" name="old_password" class="form-control" value="{{ old('old_password') }}" required aria-describedby="textHelp">
                                                                            <span class="text-danger">@error('old_password'){{ $message }}@enderror</span>
                                                                            <div id="textHelp" class="text-black-50">Current Password.</div>
                                                                        </div>
                                                                        <div class="form-group col-6 mb-2">
                                                                            <input type="password" name="password" class="form-control" value="{{ old('password') }}" required aria-describedby="textHelp">
                                                                            <span class="text-danger">@error('password'){{ $message }}@enderror</span>
                                                                            <div id="textHelp" class="text-black-50">New Password.</div>
                                                                        </div>
                                                                        <div class="form-group col-6 mb-2">
                                                                            <input type="password" name="password_confirmation" class="form-control" value="{{ old('password_confirmation') }}" required aria-describedby="textHelp">
                                                                            <span class="text-danger">@error('password_confirmation'){{ $message }}@enderror</span>
                                                                            <div id="textHelp" class="text-black-50">Confirm Password.</div>
                                                                        </div>
                                                                    </div>
                                                                    <br>
                                                                    <div class="row">
                                                                        <div class="text-right">
                                                                            <div class="col-12">
                                                                                <button type="submit" class="btn btn-primary">Update</button>
                                                                            </div>
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

                                @else
                                <div class="row">
                                    <div class="time-label">
                                        <span class="bg-danger">
                                            &nbsp;    Note: &nbsp;
                                        </span>
                                      </div> <h6 class="text-black-50"> &nbsp;This account is signed in with Google email, so you don't have to change the password</h6>
                                </div>
                                @endif
                              </div>



                              <div class="tab-pane" id="settings">

                                    <p class="text-black-50">
                                        Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account,
                                    please download any data or information that you wish to retain.
                                    </p>
                                    <br>
                                    <br>


                                    <div class="form-group row">
                                        <div class="offset-sm-4 col-sm-10">
                                          <button type="button" class="btn btn-danger" disabled ><abbr title="You cannot delete your account, you can only update your profile as administrator">

                                            Delete Account </abbr></button>
                                        </div>
                                      </div>
                              </div>
                              <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                          </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                  </div><!-- /.container-fluid -->


            </section>
        </div>
    </div>
</main>



@endsection


@section('js_files')

<script src="{{ url('//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jquery-editable/js/jquery-editable-poshytip.min.js') }}"></script>


<script>
    $.fn.editable.defaults.mode ="inline";
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN':'{{ csrf_token() }}'
        }

    });
    $('.editable1').editable({
        url:'{{ url('/profile/update') }}',
        type:'text',
        pk:1,
        name:'name',
        title:'Enter name',
    })
    $('.editable2').editable({
        url:'{{ url('/profile/update/any') }}',
        type:'email',
        pk:1,
        name:'email',
        title:'Enter email',
    })
</script>

<script>
    function doAfterSelectImage(input) {
        readURL(input);
        uploadUserProfileImage();
    }

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#image_user').css('background-image', 'url(' + e.target.result + ')');
            };
            reader.readAsDataURL(input.files[0]);
        }
    }


    function uploadUserProfileImage() {
        let myForm = document.getElementById('user_save_profile_form');
        let formData = new FormData(myForm);
        $.ajax({
            type: 'POST',
            data: formData,
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            url: '{{url('/profile/img')}}',
            success: function (response) {
                if (response == 200) {
                    $('#notifDiv').fadeIn();
                    $('#notifDiv').css('background', 'green');
                    $('#notifDiv').text('Profile Saved Successfully.');
                    setTimeout(() => {
                        $('#notifDiv').fadeOut();
                    }, 3000);

                } else if (response == 700) {
                    $('#notifDiv').fadeIn();
                    $('#notifDiv').css('background', 'red');
                    $('#notifDiv').text('An error occured. Please try later');
                    setTimeout(() => {
                        $('#notifDiv').fadeOut();
                    }, 3000);
                }
            }.bind($(this))


        });
    }

</script>

@endsection
