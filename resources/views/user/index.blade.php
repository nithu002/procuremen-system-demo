
@include('user.layouts.includes.header')

<section class="content card-default">
    <div class="container-fluid">
        <form action="requestForm" method="POST" enctype="multipart/form-data">
            <div class="card glass ">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label>Request No:</label>
                                <input type="text" class="form-control" id="reqno" value="{{ $data['reqno'] }}" name="reqno" readonly>
                            </div>
                        </div>
                        <div class="col-4">
                            <label>Request Date :</label>
                            <input type="text" class="form-control" id="reqdate" value="{{ $data['date']->format('d-m-Y') }}" name="reqdate" readonly>
                        </div>
                        <div class="col-4">
                            <label>Requester Name:</label>
                            <select class="form-control" style="width: 100%;" id='staff_name'
                                name="staff_name" required>
                                <option selected disabled>Choose Requester </option>
                                @foreach ($staff as $staffs )
                                <option value="{{ $staffs->name }}"> {{ $staffs->name }}</option>
                                @endforeach

                            </select>

                        </div>
                        <div id="super_voiser">

                        </div>
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
                                <label>WBS Number</label>
                                <input  dir="rtl" type="text" class="form-control" id="wbsnumber" name="wbsnumber"
                                    placeholder="Enter WBS" required />
                            </div>
                        </div>

                        <div class="col-12 col-sm-4">
                            <div class="form-group">
                                <label>Budget Amount</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Rs.</span>
                                    </div>
                                    <input dir="rtl" type="number" class="form-control" id="budget" name="budget"
                                    placeholder="Enter Amount" required />
                                  </div>

                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="form-group">
                                <label>Particular Activity Spend (Actual)</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Rs.</span>
                                    </div>
                                <input  dir="rtl" type="number" class="form-control" id="actual" name="actual"
                                    placeholder="Enter Actual Amount" required />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Already scheduled(On process)</label>
                                <input type="text" class="form-control" id="process" name="scheduled"
                                    placeholder="Enter Scheduled" required />
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Budget Balance Available </label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Rs.</span>
                                    </div>
                                <input dir="rtl" type="number" class="form-control" id="balance" name="balance"
                                    placeholder="Enter Balance Amount" required />
                                </div>
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
                    <h5 class="card-title">Request Item Details</h5>
                </div>
                <div class="card-body ">
                    <div class="row">
                        <div class="col-12 col-sm-12">
                            <div class="form-group">
                                <label>Purpose of Item</label>
                                <input type="text" class="form-control" id="purpose" name="purpose"
                                    required>
                            </div>
                        </div>
                    </div>
                    <br>
                    <h5 class="card-title"><strong>Request Items</strong> </h5>
                    <br>
                    <br>

                    <div class="row">
                        <table class="table table-bordered">
                            <thead class="table-head">
                            <tr>
                                <th scope="col" style="width: 30%">Descriptions</th>
                                <th scope="col" style="width: 30%">Specifications</th>
                                <th scope="col" style="width: 10%" class="text-end">Qty</th>
                                <th scope="col" style="width: 15%" class="text-end">Rate</th>
                                <th scope="col" style="width: 15%" class="text-end">Amount</th>
                                <th class="NoPrint"></th>
                            </tr>
                            </thead>
                            <tbody id="TBody">
                            <tr id="TRow">
                                <td><input type="text" class="form-control" name="description[]" ></td>
                                <td><input type="text" class="form-control"  name="specification[]"  ></td>
                                <td><input type="number" dir="rtl" class="form-control text-end" name="qty[]" onchange="Calc(this);" ></td>
                                <td><input dir="rtl" type="number" class="form-control text-end" name="rate[]"  onchange="Calc(this);" ></td>
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
                            <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">Rs.</span>
                                </div>
                            <input type="number" class="form-control text-end" id="FTotal" name="FTotal" readonly >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <!-- /.card-body -->
            <!-- /.card -->
            <!-- SELECT2 EXAMPLE -->
            <div class="card card-default glass">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label>Need by</label>
                                <input type="date" id="need_date" name="need_date"
                                    class="form-control datetimepicker-input" required />
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <div>
                                    <label for="vecfrm">Upload TOR</label> <br>
                                    <input type="file" class="link-black text-sm" id="file_tor" name="file_tor" required accept=".pdf, .docx">
                                    <span class="text-danger">@error('file_tor'){{ $message }}@enderror</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <div>
                                    <label for="vecfrm">Upload CN</label> <br>
                                    <input type="file" class="link-black text-sm" id="file_cn" name="file_cn" required accept=".pdf, .docx">
                                    <span class="text-danger">@error('file_cn'){{ $message }}@enderror</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="card card-default glass">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label><strong>Request By :</strong></label>
                            <div class="form-group">
                                <label>Name</label>
                                <div id="fack_name">
                                    <input type="text" class="form-control"  @disabled(true) value="Processing...">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <label><strong class="text-white">&nbsp;</strong></label>
                            <div class="form-group">
                                <label>Date</label>
                                <input type="text" value="{{ $data['date']->format('d-m-Y') }}" class="form-control"  @disabled(true) >
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
                            <button type="submit" style=" background: #084cdf;color: #fff;" class="btn btn-primary ">Request Purchase</button>
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




@include('user.layouts.includes.footer')

