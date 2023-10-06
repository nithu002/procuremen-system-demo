@if(Session::has ('success'))
  <div class="swalDefaultSuccess"></div>
@endif


@if(Session::has ('info'))
  <div class="swalDefaultInfo"></div>
@endif


@if(Session::has ('error'))
  <div class="swalDefaultError"></div>
@endif


@if (Session::has('warning'))
  <div class="swalDefaultWarning"></div>
@endif


@if (Session::has('question'))
  <div class="swalDefaultQuestion"></div>
@endif


@error('vehicle_no')
<div class="swalError"></div>
@enderror
@error('kmph')
<div class="swalError"></div>
@enderror
@error('status')
<div class="swalError"></div>
@enderror
@error('email')
<div class="swalError"></div>
@enderror
@error('phone_no')
<div class="swalError"></div>
@enderror
@error('department')
<div class="swalError"></div>
@enderror
@error('budget_name')
<div class="swalError"></div>
@enderror

@error('password')
<div class="swalError"></div>
@enderror
