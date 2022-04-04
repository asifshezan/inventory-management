@extends('layouts.admin')
@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Dashboard</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboards</a></li>
                    {{-- <li class="breadcrumb-item active">Dashboard</li> --}}
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-md-12">

        <div class="card">
            <div class="card-header card_header">
            <div class="row">
                <div class="col-md-8 card_header_title">
                <i class="fab fa-gg-circle"></i>Add Customer Information</div>
                <div class="col-md-4 card_header_btn">
                <a class="btn btn-primary waves-effect waves-light chb_btn" href="{{ route('customer.index') }}"><i class="fas fa-th"></i> All Customer</a>
                </div>
            </div>
        </div>

            <div class="card-body card_body">
            @if(Session::has('success'))
                <script>
                swal({ title: "Success!", text: "{{Session::get('success')}}", icon: "success", timer: 7000});
                </script>
            @endif
            @if(Session::has('error'))
                <script>
                swal({ title: "Opps!", text: "{{Session::get('error')}}", icon: "error", timer: 10000});
                </script>
            @endif


            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">

                        <form method="POST" action="{{ route('customer.store') }}" enctype="multipart/form-data">
                            @csrf
                        <p class="pera">The field labels marked with * are required input fields.</p>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="formrow-inputState" class="form-label  form_label">Customer Group<span class="req_star">*</span></label>
                                        <select name="cg_id" class="form-select">
                                            <option selected disabled>Select Group</option></option>
                                            <option value="1">Admin</option>
                                            <option value="2">Customer</option>
                                            <option value="3">Visitor</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 {{ $errors->has('customer_name') ? 'has-error':'' }}">
                                    <div class="mb-3">
                                        <label for="formrow-email-input" class="form-label form_label">Name<span class="req_star">*</span></label>
                                        <input type="text" class="form-control"  placeholder="Enter Your Name" name="customer_name">
                                        @if ($errors->has('customer_name'))
                                            <span class="error">{{ $errors->first('customer_name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 {{ $errors->has('customer_company') ? 'has-error':'' }}">
                                    <div class="mb-3">
                                        <label for="formrow-email-input" class="form-label form_label">Company Name<span class="req_star">*</span></label>
                                        <input type="text" class="form-control"  placeholder="Enter Your Name" name="customer_company">
                                        @if ($errors->has('customer_company'))
                                            <span class="error">{{ $errors->first('customer_company') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 {{ $errors->has('customer_email') ? 'has-error':'' }}">
                                    <div class="mb-3">
                                        <label for="formrow-email-input" class="form-label form_label">Email<span class="req_star">*</span></label>
                                        <input type="email" class="form-control" name="customer_email" placeholder="Enter Your customer_email ID">
                                        @if ($errors->has('customer_email'))
                                            <span class="error">{{ $errros->first('customer_email') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 {{ $errors->has('customer_phone') ? 'has-error':'' }}">
                                    <div class="mb-3">
                                        <label  class="form-label form_label">Phone Number<span class="req_star">*</span></label>
                                        <input type="text" class="form-control" name="customer_phone" placeholder="Enter Your customer_phone">
                                        @if ($errors->has('customer_phone'))
                                            <span class="error">{{ $errors->first('customer_phone') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label form_label">Remarks</label>
                                        <input type="text" class="form-control" name="customer_remarks" placeholder="Enter Your remarks">
                                    </div>
                                </div>
                                <div class="col-md-6 {{ $errors->has('customer_address' ? 'has-error':'') }}">
                                    <div class="mb-3">
                                        <label class="form-label form_label">Address<span class="req_star">*</span></label>
                                        <input type="text" class="form-control" name="customer_address" placeholder="Enter Your Address">
                                        @if ($errors->has('customer_address'))
                                            <span class="error">{{ $errors->first('customer_address') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="mb-3">
                                        <label class="form-label form_label">City<span class="req_star">*</span></label>
                                        <input type="text" class="form-control" name="customer_city" placeholder="Enter Your City">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label form_label">State<span class="req_star">*</span></label>
                                        <input type="text" class="form-control" name="customer_state" placeholder="Enter Your State">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label form_label">Postal Code<span class="req_star">*</span></label>
                                        <input type="text" class="form-control" name="customer_postal" placeholder="Enter Your Phone Number">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label form_label">Country<span class="req_star">*</span></label>
                                        <input type="text" class="form-control" name="customer_country" placeholder="Enter Your Phone Number">
                                    </div>
                                </div>
                            </div>

                            <div>
                                <button type="submit" class="btn btn-primary w-md">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div>
            </div>
        </div>
        </form>
    </div>
</div>
@endsection
