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
                <i class="fab fa-gg-circle"></i>Update User Information</div>
                <div class="col-md-4 card_header_btn">
                <a class="btn btn-primary waves-effect waves-light chb_btn" href="{{ route('user.index') }}"><i class="fas fa-th"></i> All User</a>
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
                        <form method="POST" action="{{ route('brand.update', $data->brand_slug) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                        <p class="pera">The field labels marked with * are required input fields.</p>

                            <div class="row">
                                <div class="col-md-6 {{ $errors->has('brand_name') ? 'has-error':'' }}">
                                    <div class="mb-3">
                                        <input type="hidden" name="brand_id" value="{{ $data->brand_id }}"/>
                                        <label for="formrow-email-input" class="form-label form_label">Brand Name<span class="req_star">*</span></label>
                                        <input type="text" class="form-control"  placeholder="Enter Your Name" name="brand_name" value="{{ $data->brand_name }}">
                                        @if ($errors->has('brand_name'))
                                            <span class="error">{{ $errors->first('brand_name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label form_label">Photo</label>
                                        <input class="form-control" type="file" name="brand_image">
                                    </div>
                                </div>
                                <div class="col-md-2 sp_pic">
                                    @if( $data->brand_image!='' )
                                    <img src="{{ asset('uploads/brands/' . $data->brand_image) }}" height="40" width="40" class="img-fluid" alt="">
                                    @else
                                    <img src="{{ asset('uploads/avater.png') }}" height="50">
                                    @endif
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
    </div>
</div>
@endsection
