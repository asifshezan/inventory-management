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
                <i class="fab fa-gg-circle"></i>Add Customer-Group</div>
                <div class="col-md-4 card_header_btn">
                <a class="btn btn-primary waves-effect waves-light chb_btn" href="{{ route('cg.index') }}"><i class="fas fa-th"></i> All Customer-Group</a>
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
                        <form method="POST" action="{{ route('cg.store') }}" enctype="multipart/form-data">
                            @csrf
                        <p class="pera">The field labels marked with * are required input fields.</p>
                            <div class="row">
                                <div class="col-md-6 {{ $errors->has('cg_name') ? 'has-error':'' }}">
                                    <div class="mb-3">
                                        <label for="formrow-email-input" class="form-label form_label">Customer Group Name<span class="req_star">*</span></label>
                                        <input type="text" class="form-control"  placeholder="Enter Your cg_name" name="cg_name" value="{{ old('cg_name') }}">
                                        @if ($errors->has('cg_name'))
                                            <span class="error">{{ $errors->first('cg_name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="formrow-email-input" class="form-label form_label">Remarks</label>
                                        <input type="text" class="form-control"  placeholder="Enter Your cg_remarks" name="cg_remarks" value="{{ old('cg_remarks') }}">
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
