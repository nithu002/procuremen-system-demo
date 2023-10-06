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
                    <a href={{ url('email') }} class="nav-link active">
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
      <h1 class="m-0">Mail Settings</h1>
   </div>
   <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
      <li class="breadcrumb-item"><a href="#">Settings</a></li>
      <li class="breadcrumb-item active">Mail Settings</li>
    </ol>
  </div>
@endsection

@section('main-content')
 <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
    <div class="container mx-auto px-6 py-1">
        <div class="bg-white shadow-md rounded my-6 p-5">
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-header">
                            <h3 class="card-title">Mail Configuration</h3>
                        </div>
                      <form method="POST" action="{{ url('email',$mail->id)}}">
                            @csrf
                            @method('put')
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-6 mb-2">
                                    <label for="mail_transport">Mail Transport</label>
                                    <input type="text" id="mail_transport"  name="mail_transport"
                                            value="{{ old('mail_transport',$mail->mail_transport) }}"
                                            class="form-control">
                                </div>
                                <div class="form-group col-6 mb-2">
                                    <label for="mail_host">Mail Host</label>
                                        <input type="text" id="mail_host"  name="mail_host"
                                             value="{{ old('mail_host',$mail->mail_host) }}"
                                             class="form-control"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6 mb-2">
                                    <label for="mail_port">Mail Port</label>
                                        <input type="text" id="mail_port"  name="mail_port"
                                            value="{{ old('mail_port',$mail->mail_port) }}"
                                            class="form-control">
                                </div>
                                <div class="form-group col-6 mb-2">
                                    <label for="mail_username">Mail username</label>
                                        <input type="text" id="mail_username"  name="mail_username"
                                                value="{{ old('mail_username',$mail->mail_username) }}"
                                                class="form-control"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6 mb-2">
                                    <label for="mail_password">Mail Password</label>
                                        <input type="text" id="mail_password"  name="mail_password"
                                                value="{{ old('mail_password',$mail->mail_password) }}"
                                                class="form-control">
                                </div>
                                <div class="form-group col-6 mb-2">
                                    <label for="mail_encryption">Mail Encryption</label>
                                        <input type="text" id="mail_encryption"  name="mail_encryption"
                                                value="{{ old('mail_encryption',$mail->mail_encryption) }}"
                                                class="form-control"/>
                                </div>
                                <div class="form-group col-6 mb-2">
                                    <label for="mail_from">Mail From</label>
                                        <input type="text" id="mail_from"  name="mail_from"
                                                value="{{ old('mail_from',$mail->mail_from) }}"
                                                class="form-control"/>
                                </div>
                            </div>
                            <br>

                            <div class="text-center">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-secondary">Update</button>
                                </div>
                            </div>
                        </div>
                      </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
</main>



@endsection



