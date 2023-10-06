@extends('layouts.main')


@section('css_files')

  <link rel="stylesheet" href="{{ asset('assets/dist/css/custom/report.css') }}">
  <style>
    abbr {
  font-style: italic;
  position: relative

}

abbr:hover::after {
  background: #a8c0eb;
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

        <li class="nav-item">
            <a href={{ url('timeline') }} class="nav-link active">
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
      <h1 class="m-0">Progress Reports</h1>
   </div>
   <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item active">Progress Reports</li>
    </ol>
  </div>
@endsection

@section('main-content')

@foreach ($filterRequest as $key=> $filterRequestes )


{{-- THIS FOR NEW REQUEST  --}}

@if($filterRequestes->status_now == 'new')
<center>
    <div class="col-lg-11">
        <div class="card glass">
          <div class="card-body">
            <div class="float-left"><b class="card-title primary" style="color:#0864f7;"><strong>{{ $filterRequestes->reqno }}</strong></b><span class="badge bg-danger">NEW</span></div>
            <a href={{ url("timeline/report/new/$filterRequestes->id") }} class="card-link float-right">view</a>

            <p class="card-text">
                <div class="col">
                    <div class="timeline-steps aos-init aos-animate" data-aos="fade-up">
                        {{-- APPROVED --}}
                         <div class="timeline-step-green">
                            <div class="timeline-content" >
                                 <abbr title="Purchase Request Form Submitted Successfully">
                                    <div class="inner-circle-green"></div>
                                </abbr>
                                <p class="h6 text-muted mb-0 mb-lg-0">Successfully Submitted</p>
                            </div>
                        </div>
                         {{-- WAITING FOR UPDATE --}}
                         <div class="timeline-step-waiting">
                            <div class="timeline-content" >
                                <abbr title="Awaiting response from supervisor">
                                    <div class="inner-circle-waiting"></div>
                                </abbr>
                                <p class="h6 text-muted mb-0 mb-lg-0">Waiting</p>
                            </div>
                        </div>
                        <div class="timeline-step">
                            <div class="timeline-content" >
                                <div class="inner-circle"></div>
                            </div>
                        </div>
                        <div class="timeline-step mb-0">
                            <div class="timeline-content" >
                                <div class="inner-circle"></div>
                            </div>
                        </div>
                        <div class="timeline-step mb-0">
                            <div class="timeline-content" >
                                <div class="inner-circle"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </p>
          </div>
        </div>
      </div>
</center>

{{-- THIS FOR Supervioser Approved REQUEST  --}}
@elseif($filterRequestes->status_now == 'PR_Approved')
<center>
    <div class="col-lg-11">
        <div class="card glass">
          <div class="card-body">
            <div class="float-left"><b class="card-title primary" style="color:#0864f7;"><strong>{{ $filterRequestes->reqno }}</strong></b></div>
            <a href={{ url("timeline/report/pr/$filterRequestes->id") }} class="card-link float-right">view</a>

            <p class="card-text">
                <div class="col">
                    <div class="timeline-steps aos-init aos-animate" data-aos="fade-up">
                        <div class="timeline-step-green">
                            <div class="timeline-content" >
                                 <abbr title="Purchase Request Form Submitted Successfully">
                                    <div class="inner-circle-green"></div>
                                </abbr>
                                <p class="h6 text-muted mb-0 mb-lg-0">Successfully Submitted</p>
                            </div>
                        </div>
                        <div class="timeline-step-green">
                            <div class="timeline-content" >
                                <abbr title="The Purchase Request is accepted by the supervisor">
                                    <div class="inner-circle-green"></div>
                                </abbr>
                                <p class="h6 text-muted mb-0 mb-lg-0">Request Approved</p>
                            </div>
                        </div>
                        <div class="timeline-step-waiting">
                            <div class="timeline-content" >
                                <abbr title="Awaiting Official Response on procurement officer">
                                    <div class="inner-circle-waiting"></div>
                                </abbr>
                                <p class="h6 text-muted mb-0 mb-lg-0">Waiting</p>
                            </div>
                        </div>
                        <div class="timeline-step mb-0">
                            <div class="timeline-content" >
                                <div class="inner-circle"></div>
                            </div>
                        </div>

                        <div class="timeline-step mb-0">
                            <div class="timeline-content" >
                                <div class="inner-circle"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </p>

          </div>
        </div>
      </div>
</center>

@endif






@if($filterRequestes->status_now == 'PR_Rejected')
{{-- Reqest Reject by supervioser --}}

<center>
    <div class="col-lg-11 ">
        <div class="card glass">
          <div class="card-body">
            <div class="float-left"><b class="card-title primary" style="color:#0864f7;"><strong>{{ $filterRequestes->reqno }}</strong></b></div>
            <a href="{{ url("timeline/report/pr/$filterRequestes->id") }}" class="card-link float-right">view</a>

            <p class="card-text">
                <div class="col">
                    <div class="timeline-steps aos-init aos-animate" data-aos="fade-up">
                        <div class="timeline-step-green">
                            <div class="timeline-content" >
                                <abbr title="Purchase Request Form Submitted Successfully">
                                    <div class="inner-circle-green"></div>
                                </abbr>
                                <p class="h6 text-muted mb-0 mb-lg-0">Successfully Submitted</p>
                            </div>
                        </div>
                            {{-- REJECT --}}
                        <div class="timeline-step-red">
                            <div class="timeline-content" >
                                <abbr title="The Purchase Request was denied by the supervisor">
                                    <div class="inner-circle-red"></div>
                                </abbr>
                                <p class="h6 text-muted mb-0 mb-lg-0">Request Rejected</p>
                            </div>
                        </div>
                        <div class="timeline-step mb-0">
                            <div class="timeline-content" >
                                <div class="inner-circle"></div>
                            </div>
                        </div>
                        <div class="timeline-step mb-0">
                            <div class="timeline-content" >
                                <div class="inner-circle"></div>
                            </div>
                        </div>

                        <div class="timeline-step mb-0">
                            <div class="timeline-content" >
                                <div class="inner-circle"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </p>
          </div>
        </div>
      </div>
</center>

@elseif($filterRequestes->status_now == 'Quo_Approved')
{{-- Quo Approved  --}}
<center>
    <div class="col-lg-11">
        <div class="card glass">
          <div class="card-body">
            <div class="float-left"><b class="card-title primary" style="color:#0864f7;"><strong>{{ $filterRequestes->reqno }}</strong></b></div>
            <a href="{{ url("timeline/report/quotation/$filterRequestes->id") }}" class="card-link float-right">view</a>

            <p class="card-text">
                <div class="col">
                    <div class="timeline-steps aos-init aos-animate" data-aos="fade-up">
                        <div class="timeline-step-green">
                            <div class="timeline-content">
                                <abbr title="Purchase Request Form Submitted Successfully">
                                    <div class="inner-circle-green"></div>
                                </abbr>
                                <p class="h6 text-muted mb-0 mb-lg-0">Successfully Submitted</p>
                            </div>
                        </div>
                        <div class="timeline-step-green">
                            <div class="timeline-content">
                                <abbr title="The Purchase Request is accepted by the supervisor">
                                    <div class="inner-circle-green"></div>
                                </abbr>
                                <p class="h6 text-muted mb-0 mb-lg-0">Request Approved</p>
                            </div>
                        </div>
                        <div class="timeline-step-green">
                            <div class="timeline-content">
                                <abbr title="Quotation is accepted by supervisor, send requisition to procurement officer for creation of purchase order">
                                    <div class="inner-circle-green"></div>
                                </abbr>
                                <p class="h6 text-muted mb-0 mb-lg-0">Quotation Approved</p>
                            </div>
                        </div>
                        {{-- WAITING FOR UPDATE --}}
                        <div class="timeline-step-waiting">
                            <div class="timeline-content" >
                                <abbr title="awaiting for response in operation lead">
                                    <div class="inner-circle-waiting"></div>
                                </abbr>
                                <p class="h6 text-muted mb-0 mb-lg-0">Waiting </p>
                            </div>
                        </div>
                        <div class="timeline-step mb-0">
                            <div class="timeline-content" >
                                <div class="inner-circle"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </p>
          </div>
        </div>
      </div>
</center>


@endif


@if($filterRequestes->status_now == 'Quo_Rejected')

{{-- Quo Reject  --}}
<center>
    <div class="col-lg-11">
        <div class="card glass">
          <div class="card-body">
           <div class="float-left"><b class="card-title primary" style="color:#0864f7;"><strong>{{ $filterRequestes->reqno }}</strong></b></div>
            <a href="{{ url("timeline/report/quotation/$filterRequestes->id") }}" class="card-link float-right">view</a>
            <p class="card-text">
                <div class="col">
                    <div class="timeline-steps aos-init aos-animate" data-aos="fade-up">
                         <div class="timeline-step-green">
                            <div class="timeline-content">
                                <abbr title="Purchase Request Form Submitted Successfully">
                                    <div class="inner-circle-green"></div>
                                </abbr>
                                <p class="h6 text-muted mb-0 mb-lg-0">Successfully Submitted</p>
                            </div>
                        </div>
                        <div class="timeline-step-green">
                            <div class="timeline-content" >
                                <abbr title="The Purchase Request is accepted by the supervisor">
                                    <div class="inner-circle-green"></div>
                                </abbr>
                                <p class="h6 text-muted mb-0 mb-lg-0">Request Approved</p>
                            </div>
                        </div>
                            {{-- REJECT --}}
                        <div class="timeline-step-red">
                            <div class="timeline-content" >
                                <abbr title="Quotation was denied by the supervisor">
                                    <div class="inner-circle-red"></div>
                                </abbr>
                                <p class="h6 text-muted mb-0 mb-lg-0">Quotation Rejected</p>
                            </div>
                        </div>
                        <div class="timeline-step mb-0">
                            <div class="timeline-content">
                                <div class="inner-circle"></div>
                            </div>
                        </div>

                        <div class="timeline-step mb-0">
                            <div class="timeline-content">
                                <div class="inner-circle"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </p>
          </div>
        </div>
      </div>
</center>

@elseif($filterRequestes->status_now == 'PO_Rejected')
<center>
    <div class="col-lg-11">
        <div class="card glass">
          <div class="card-body">
           <div class="float-left"><b class="card-title primary" style="color:#0864f7;"><strong>{{ $filterRequestes->reqno }}</strong></b></div>
            <a href="{{ url("timeline/report/PO/$filterRequestes->reqno") }}" class="card-link float-right">view</a>
            <p class="card-text">
                <div class="col">
                    <div class="timeline-steps aos-init aos-animate" data-aos="fade-up">
                        <div class="timeline-step-green">
                            <div class="timeline-content">
                                <abbr title="Purchase Request Form Submitted Successfully">
                                    <div class="inner-circle-green"></div>
                                </abbr>
                                <p class="h6 text-muted mb-0 mb-lg-0">Successfully Submitted</p>
                            </div>
                        </div>
                        <div class="timeline-step-green">
                            <div class="timeline-content">
                                <abbr title="The Purchase Request is accepted by the supervisor">
                                    <div class="inner-circle-green"></div>
                                </abbr>
                                <p class="h6 text-muted mb-0 mb-lg-0">Request Approved</p>
                            </div>
                        </div>
                       <div class="timeline-step-green">
                            <div class="timeline-content" >
                                <abbr title="Quotation is accepted by supervisor, send requisition to procurement officer for creation of purchase order">
                                    <div class="inner-circle-green"></div>
                                </abbr>
                                <p class="h6 text-muted mb-0 mb-lg-0">Quotation Approved</p>
                            </div>
                        </div>
                        <div class="timeline-step-red">
                            <div class="timeline-content" >
                                <abbr title="Purchase order was denied by Lead">
                                    <div class="inner-circle-red"></div>
                                </abbr>
                                <p class="h6 text-muted mb-0 mb-lg-0">PO Rejected</p>
                            </div>
                        </div>
                        <div class="timeline-step mb-0">
                            <div class="timeline-content">
                                <div class="inner-circle"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </p>
          </div>
        </div>
      </div>
</center>

@endif

@if($filterRequestes->status_now == 'PO_Approved')

<center>
    <div class="col-lg-11">
        <div class="card glass">
          <div class="card-body">
           <div class="float-left"><b class="card-title primary" style="color:#0864f7;"><strong>{{ $filterRequestes->reqno }}</strong></b></div>
            <a href="{{ url("timeline/report/PO/$filterRequestes->reqno") }}" class="card-link float-right">view</a>
            <p class="card-text">
                <div class="col">
                    <div class="timeline-steps aos-init aos-animate" data-aos="fade-up">
                        <div class="timeline-step-green">
                            <div class="timeline-content">
                                <abbr title="Purchase Request Form Submitted Successfully">
                                    <div class="inner-circle-green"></div>
                                </abbr>
                                <p class="h6 text-muted mb-0 mb-lg-0">Successfully Submitted</p>
                            </div>
                        </div>
                        <div class="timeline-step-green">
                            <div class="timeline-content">
                                <abbr title="The Purchase Request is accepted by the supervisor">
                                    <div class="inner-circle-green"></div>
                                </abbr>
                                <p class="h6 text-muted mb-0 mb-lg-0">Request Approved</p>
                            </div>
                        </div>
                       <div class="timeline-step-green">
                            <div class="timeline-content" >
                                <abbr title="Quotation is accepted by supervisor, send requisition to procurement officer for creation of purchase order">
                                    <div class="inner-circle-green"></div>
                                </abbr>
                                <p class="h6 text-muted mb-0 mb-lg-0">Quotation Approved</p>
                            </div>
                        </div>
                        <div class="timeline-step-green">
                            <div class="timeline-content">
                                <abbr title="Purchase order has Approved by lead">
                                    <div class="inner-circle-green"></div>
                                </abbr>
                                <p class="h6 text-muted mb-0 mb-lg-0">PO Approved</p>
                            </div>
                        </div>
                        <div class="timeline-step-green">
                            <div class="timeline-content">
                                <abbr title="Purchase order has been forwarded to finance team. The process completed successfully">
                                    <div class="inner-circle-green"></div>
                                </abbr>
                                <p class="h6 text-muted mb-0 mb-lg-0">PO Has Send</p>
                            </div>
                        </div>
                    </div>
                </div>
            </p>
          </div>
        </div>
      </div>
</center>
@endif


{{-- Completed --}}
@endforeach

<div class="col-md-11">
    {!! $filterRequest->links() !!}
</div>




@endsection


@section('js_files')


@endsection
