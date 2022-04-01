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
        <form method="post" action="{{url('dashboard/user/submit')}}" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-header card_header">
            <div class="row">
                <div class="col-md-8 card_header_title">
                <i class="fab fa-gg-circle"></i>Add User Information</div>
                <div class="col-md-4 card_header_btn">
                <a class="btn btn-primary waves-effect waves-light chb_btn" href="{{url('dashboard/user')}}"><i class="fas fa-th"></i> All User</a>
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

            <div class="row">
                <div class="col-lg-6">
                    <div>
                        <div class="form-group mb-4">
                            <label class="col-sm-3 col-form-label col_form_label">UserName<span class="req_star">*</span></label>
                            <input type="text" class="form-control form_control" name="name" value="{{ old('name') }}">
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-sm-3 col-form-label col_form_label">Password<span class="req_star">*</span></label>
                            <input type="password" class="form-control form_control" name="password" value="{{ old('password') }}">
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-sm-3 col-form-label col_form_label">Phone<span class="req_star">*</span></label>
                            <input type="text" class="form-control form_control" name="phone" value="{{ old('phone') }}">

                        </div>
                        <div class="form-group mb-0">
                            <label class="col-sm-3 col-form-label col_form_label">Photo</label>
                            <input class="form-control form_control" type="file" name="pic">
                        </div>
                        <div class="form-check form-check-primary mb-3 check_input">
                            <input class="form-check-input" type="checkbox" name="active" value="1">
                            <label class="form-check-label check_label">Active</label>
                        </div>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mt-4 mt-lg-0">
                        <div class="form-group mb-4">
                            <label class="col-sm-3 col-form-label col_form_label">Email<span class="req_star">*</span></label>
                            <input type="email" class="form-control form_control" name="email" value="{{ old('email') }}">

                        </div>
                        <div class="form-group mb-4">
                            <label class="col-sm-3 col-form-label col_form_label">Confirm Password<span class="req_star">*</span></label>
                            <input type="password" class="form-control form_control" name="password_confirmation" value="{{ old('password_confirmation') }}">

                        </div>

                    </div>
                </div>
            </div>
            </div>
        </div>
        </form>
    </div>
</div>
@endsection
