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
                <i class="fab fa-gg-circle"></i>Edit WareHouse</div>
                <div class="col-md-4 card_header_btn">
                <a class="btn btn-primary waves-effect waves-light chb_btn" href="{{ route('warehouse.index') }}"><i class="fas fa-th"></i> All WareHouse</a>
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
                        <form method="POST" action="{{ route('warehouse.update', $data->wh_slug) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                        <p class="pera">The field labels marked with * are required input fields.</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group pb-2">
                                    <div class="mb-3 {{ $errors->has('wh_name') ? 'has-error':'' }}">
                                        <label for="formrow-email-input" class="form-label form_label">WareHouse Name<span class="req_star">*</span></label>
                                        <input type="hidden" name="wh_id" value="{{ $data->wh_id }}">
                                        <input type="text" class="form-control"  placeholder="Enter Your wh_name" name="wh_name" value="{{ $data->wh_name }}">
                                        @if ($errors->has('wh_name'))
                                            <span class="error">{{ $errors->first('wh_name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group pb-2">
                                    <div class="mb-3 {{ $errors->has('wh_email') ? 'has-error':'' }}">
                                        <label for="formrow-email-input" class="form-label form_label">Email<span class="req_star">*</span></label>
                                        <input type="email" class="form-control"  placeholder="Enter Your wh_email" name="wh_email" value="{{ $data->wh_email }}">
                                        @if ($errors->has('wh_email'))
                                            <span class="error">{{ $errors->first('wh_email') }}</span>
                                        @endif
                                    </div>
                                </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group pb-2">
                                        <div class="mb-3 {{ $errors->has('wh_phone') ? 'has-error':'' }}">
                                            <label for="formrow-email-input" class="form-label form_label">Phone<span class="req_star">*</span></label>
                                            <input type="text" class="form-control"  placeholder="Enter Your wh_phone" name="wh_phone" value="{{ $data->wh_phone }}">
                                            @if ($errors->has('wh_phone'))
                                                <span class="error">{{ $errors->first('wh_phone') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group pb-2">
                                        <div class="mb-3 {{ $errors->has('wh_address') ? 'has-error':'' }}">
                                            <label for="formrow-email-input" class="form-label form_label">Address<span class="req_star">*</span></label>
                                            <textarea type="text" class="form-control"  placeholder="Enter Your wh_address" name="wh_address" value="{{ $data->wh_address }}"></textarea>
                                            @if ($errors->has('wh_address'))
                                                <span class="error">{{ $errors->first('wh_address') }}</span>
                                            @endif
                                        </div>
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
