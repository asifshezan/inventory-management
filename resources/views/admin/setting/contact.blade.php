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
                <i class="fab fa-gg-circle"></i>Update Contact Information</div>
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
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <p class="pera">The field labels marked with * are required input fields.</p>
                            <form method="POST" action="{{ route('contact.update') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group pb-2">
                                            <label><strong>Phone 1 <span class="text-danger">*</span></strong>
                                            </label>
                                            <input type="hidden" name="cont_id" value="{{ $data->cont_id }}">
                                            <input type="text" name="cont_phone1" class="form-control @error('cont_phone1') is-invalid @enderror" placeholder="Enter Phone Number" aria-label="Enter Phone Number" aria-describedby="basic-addon1"
                                            value="{{ $data->cont_phone1 }}">
                                            @error('cont_phone1')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="form-group pb-2">
                                            <label><strong>Email 1 </strong></label>
                                            <input type="text" name="cont_email1" class="form-control @error('cont_email1') is-invalid @enderror" placeholder="Enter Email Address" aria-label="Enter Email Address" aria-describedby="basic-addon1"
                                                value="{{ $data->cont_email1 }}">
                                                @error('cont_email1')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                        </div>

                                        <div class="form-group pb-2">
                                            <label><strong>Address </strong></label>
                                            <textarea name="cont_add1" class="form-control" name="" id="" rows="2" placeholder="Enter Your Address">{{ $data->cont_add1 }}</textarea>
                                                @error('cont_add1')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                        </div>

                                        <div class="form-group pb-2">
                                            <input type="submit" value="Update" class="btn btn-primary">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group pb-2">
                                            <label><strong>Phone 2</strong></label>
                                            <input type="text" name="cont_phone2" class="form-control @error('cont_phone2') is-invalid @enderror" placeholder="Enter Phone Number" aria-label="Enter Phone Number" aria-describedby="basic-addon1"
                                                value="{{ $data->cont_phone2 }}">
                                                @error('cont_phone2')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                        </div>

                                        <div class="form-group pb-2">
                                            <label><strong>Email 2 </strong></label>
                                            <input type="text" name="cont_email2" class="form-control @error('cont_email2') is-invalid @enderror" placeholder="Enter Email Address" value="{{ $data->cont_email2 }}">
                                                @error('cont_email2')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                        </div>

                                        <div class="form-group pb-2">
                                            <label><strong>Address </strong></label>
                                            <textarea name="cont_add2" class="form-control" name="" id="" rows="2" placeholder="Enter Your Address">{{ $data->cont_add2 }}</textarea>
                                                @error('cont_add2')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                        </div>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
