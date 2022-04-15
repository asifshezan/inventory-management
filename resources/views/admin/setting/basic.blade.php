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
                <i class="fab fa-gg-circle"></i>Update Basic Information</div>
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
                            <form method="POST" action="{{ route('basic.update') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group pb-2">
                                            <label><strong>Company Name <span class="text-danger">*</span></strong>
                                            </label>
                                            <input type="hidden" name="basic_id" value="{{ $data->basic_id }}">
                                            <input type="text" name="basic_company"
                                                class="form-control @error('basic_company') is-invalid @enderror"
                                                value="{{ $data->basic_company }}">
                                            @error('basic_company')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group pb-2">
                                            <label><strong>Main Logo Upload <span
                                                        class="text-danger">*</span></strong></label>
                                            <input type="file" id="mainlogo-fileinput" name="basic_logo"
                                                class="form-control @error('basic_logo') is-invalid @enderror">
                                            @error('basic_logo')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="form-group pb-2">
                                            <label><strong>Footer Logo Upload </strong></label>
                                            <input type="file" id="footerlogo-fileinput" name="basic_flogo"
                                                class="form-control @error('basic_flogo') is-invalid @enderror">
                                            @error('basic_flogo')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="form-group pb-2">
                                            <label><strong>Favicon Upload </strong></label>
                                            <input type="file" id="favicon-fileinput" name="basic_favicon"
                                                class="form-control @error('basic_favicon') is-invalid @enderror">
                                            @error('basic_favicon')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="form-group pb-2">
                                            <input type="submit" value="Update Setting" class="btn btn-primary">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group pb-2">
                                            <label><strong>Title</strong></label>
                                            <input type="text" name="basic_title"
                                                class="form-control @error('basic_title') is-invalid @enderror"
                                                value="{{ $data->basic_title }}">
                                            @error('basic_title')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group pb-2 text-center">
                                            @if ($data->basic_logo)
                                            <img id="main-preview-image"
                                                src="{{ asset('uploads/basic_setting/'.$data->basic_logo) }}"
                                                alt="image" class="img-fluid rounded" width="80">
                                            @else
                                            <img id="main-preview-image" src="{{ asset('uploads/default_user.png') }}"
                                                alt="basic_logo" class="img-fluid rounded" width="70" />
                                            @endif
                                        </div>
                                        <div class="form-group pb-2 text-center">
                                            @if ($data->basic_flogo)
                                            <img id="footer-preview-image"
                                                src="{{ asset('uploads/basic_setting/'.$data->basic_flogo) }}"
                                                alt="image" class="img-fluid rounded" width="80">
                                            @else
                                            <img id="footer-preview-image" src="{{ asset('uploads/default_user.png') }}"
                                                alt="basic_flogo" class="img-fluid rounded" width="70" />
                                            @endif
                                        </div>

                                        <div class="form-group pb-2 text-center">
                                            @if ($data->basic_favicon)
                                            <img id="favicon-preview-image"
                                                src="{{ asset('uploads/basic_setting/'.$data->basic_favicon) }}"
                                                alt="image" class="img-fluid rounded" width="50">
                                            @else
                                            <img id="favicon-preview-image"
                                                src="{{ asset('uploads/default_user.png') }}" alt="basic_favicon"
                                                class="img-fluid rounded" width="70" />
                                            @endif
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
