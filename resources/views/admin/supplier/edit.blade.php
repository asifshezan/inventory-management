@extends('layouts.admin')
@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Dashboard</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboards</a></li>
                    {{-- <li class="breadcrumb-item active">Dashboard</li> --}}
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-md-12">
        <form method="post" action="{{ route('supplier.update',$data->supplier_slug)}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card">
            <div class="card-header card_header">
            <div class="row">
                <div class="col-md-8 card_header_title">
                <i class="fab fa-gg-circle"></i>Update Supplier Information</div>
                <div class="col-md-4 card_header_btn">
                <a class="btn btn-primary waves-effect waves-light chb_btn" href="{{ route('supplier.index') }}"><i class="fas fa-th"></i> All Supplier</a>
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

                        <form method="POST" action="{{ route('supplier.update', $data->supplier_slug) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                        <p class="pera">The field labels marked with * are required input fields.</p>

                        <div class="row">

                            <div class="col-md-6 {{ $errors->has('supplier_name') ? 'has-error':'' }}">
                                <div class="mb-3">
                                    <input type="hidden" name="supplier_id" value="{{ $data->supplier_id }}">
                                    <label for="formrow-email-input" class="form-label form_label">Name<span class="req_star">*</span></label>
                                    <input type="text" class="form-control"  placeholder="Enter Your Name" name="supplier_name" value="{{ $data->supplier_name }}">
                                    @if ($errors->has('supplier_name'))
                                        <span class="error">{{ $errors->first('supplier_name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="formFile" class="form-label form_label">Photo</label>
                                    <input class="form-control" type="file" name="supplier_pic">
                                </div>
                            </div>
                            <div class="col-md-2 sp_pic">
                                @if( $data->supplier_image!='' )
                                <img src="{{ asset('uploads/suppliers/' . $data->supplier_image) }}" height="40" width="40" class="img-fluid" alt="">
                                @else
                                <img src="{{ asset('uploads/avater.png') }}" height="50">
                                @endif
                            </div>
                            </div>
                            <div class="col-md-6 {{ $errors->has('supplier_company') ? 'has-error':'' }}">
                                <div class="mb-3">
                                    <label for="formrow-email-input" class="form-label form_label">Company Name<span class="req_star">*</span></label>
                                    <input type="text" class="form-control"  placeholder="Enter Your Name" name="supplier_company" value="{{ $data->supplier_company }}">
                                    @if ($errors->has('supplier_company'))
                                        <span class="error">{{ $errors->first('supplier_company') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 {{ $errors->has('supplier_email') ? 'has-error':'' }}">
                                <div class="mb-3">
                                    <label for="formrow-email-input" class="form-label form_label">Email<span class="req_star">*</span></label>
                                    <input type="email" class="form-control" name="supplier_email" placeholder="Enter Your supplier_email ID" value="{{ $data->supplier_email }}">
                                    @if ($errors->has('supplier_email'))
                                        <span class="error">{{ $errros->first('supplier_email') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 {{ $errors->has('supplier_phone') ? 'has-error':'' }}">
                                <div class="mb-3">
                                    <label  class="form-label form_label">Phone Number<span class="req_star">*</span></label>
                                    <input type="text" class="form-control" name="supplier_phone" placeholder="Enter Your supplier_phone" value="{{ $data->supplier_phone }}">
                                    @if ($errors->has('supplier_phone'))
                                        <span class="error">{{ $errors->first('supplier_phone') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label form_label">Remarks</label>
                                    <input type="text" class="form-control" name="supplier_remarks" placeholder="Enter Your remarks" value="{{ $data->supplier_remarks }}">
                                </div>
                            </div>
                            <div class="col-md-6 {{ $errors->has('supplier_address' ? 'has-error':'') }}">
                                <div class="mb-3">
                                    <label class="form-label form_label">Address<span class="req_star">*</span></label>
                                    <input type="text" class="form-control" name="supplier_address" placeholder="Enter Your Address" value="{{ $data->supplier_address }}">
                                    @if ($errors->has('supplier_address'))
                                        <span class="error">{{ $errors->first('supplier_address') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 ">
                                <div class="mb-3">
                                    <label class="form-label form_label">City<span class="req_star">*</span></label>
                                    <input type="text" class="form-control" name="supplier_city" placeholder="Enter Your City" value="{{ $data->supplier_city }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label form_label">State<span class="req_star">*</span></label>
                                    <input type="text" class="form-control" name="supplier_state" placeholder="Enter Your State" value="{{ $data->supplier_state }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label form_label">Postal Code<span class="req_star">*</span></label>
                                    <input type="text" class="form-control" name="supplier_postal" placeholder="Enter Your Postal code" value="{{ $data->supplier_postal }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label form_label">Country<span class="req_star">*</span></label>
                                    <input type="text" class="form-control" name="supplier_country" placeholder="Enter Your country" value="{{$data->supplier_country }}">
                                </div>
                            </div>
                        </div>

                            <div>
                                <button type="submit" class="btn btn-primary w-md">Update</button>
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
