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
                <i class="fab fa-gg-circle"></i>Edit Biller Information</div>
                <div class="col-md-4 card_header_btn">
                <a class="btn btn-primary waves-effect waves-light chb_btn" href="{{ route('biller.index') }}"><i class="fas fa-th"></i> All Biller</a>
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
                        <form method="POST" action="{{ route('biller.update', $data->biller_slug) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                        <p class="pera">The field labels marked with * are required input fields.</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group pb-2">
                                    <div class="mb-3 {{ $errors->has('biller_name') ? 'has-error':'' }}">
                                        <label class="form-label form_label">Name<span class="req_star">*</span></label>
                                        <input type="hidden" name="biller_id" value="{{ $data->biller_id }}">
                                        <input type="text" class="form-control"  placeholder="Enter Your Name" name="biller_name" value="{{ $data->biller_name }}">
                                        @if ($errors->has('biller_name'))
                                            <span class="error">{{ $errors->first('biller_name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group pb-2">
                                    <div class="mb-3 {{ $errors->has('biller_email') ? 'has-error':'' }}">
                                        <label class="form-label form_label">Email<span class="req_star">*</span></label>
                                        <input type="email" class="form-control" name="biller_email" placeholder="Enter Your biller_email ID" value="{{ $data->biller_email }}">
                                        @if ($errors->has('biller_email'))
                                            <span class="error">{{ $errros->first('biller_email') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group pb-2">
                                    <div class="mb-3 {{ $errors->has('biller_company') ? 'has-error':'' }}">
                                        <label class="form-label form_label">Company Name<span class="req_star">*</span></label>
                                        <input type="text" class="form-control"  placeholder="Enter Your Name" name="biller_company" value="{{ $data->biller_company }}">
                                        @if ($errors->has('biller_company'))
                                            <span class="error">{{ $errors->first('biller_company') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group pb-2">
                                    <div class="mb-3">
                                        <label class="form-label form_label">City<span class="req_star">*</span></label>
                                        <input type="text" class="form-control" name="biller_city" placeholder="Enter Your City" value="{{ $data->biller_city }}">
                                    </div>
                                </div>
                                <div class="form-group pb-2">
                                    <button type="submit" class="btn btn-primary w-md">Submit</button>
                                </div>
                            </div>

                                <div class="col-md-6">

                                <div class="form-group pb-2">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label form_label">Photo</label>
                                            <input class="form-control" type="file" name="biller_pic">
                                        </div>
                                    </div>
                                    <div class="col-md-2 sp_pic">
                                        @if( $data->biller_image!='' )
                                        <img src="{{ asset('uploads/billers/' . $data->biller_image) }}" height="40" width="40" class="img-fluid" alt="">
                                        @else
                                        <img src="{{ asset('uploads/default_user.png') }}" height="50">
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group pb-2">
                                    <div class="mb-3 {{ $errors->has('biller_address' ? 'has-error':'') }}">
                                        <label class="form-label form_label">Address<span class="req_star">*</span></label>
                                        <input type="text" class="form-control" name="biller_address" placeholder="Enter Your Address" value="{{ $data->biller_address }}">
                                        @if ($errors->has('biller_address'))
                                            <span class="error">{{ $errors->first('biller_address') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group pb-2">
                                    <div class="mb-3">
                                        <label class="form-label form_label">Country<span class="req_star">*</span></label>
                                        <input type="text" class="form-control" name="biller_country" value="{{ $data->biller_country }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
</div>
@endsection
