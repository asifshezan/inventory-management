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
                <i class="fab fa-gg-circle"></i>Add Expense Category Information</div>
                <div class="col-md-4 card_header_btn">
                <a class="btn btn-primary waves-effect waves-light chb_btn" href="{{ route('expense.category.index') }}"><i class="fas fa-th"></i> All Expense Category</a>
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

                        <form method="POST" action="{{ route('expense.category.store') }}" enctype="multipart/form-data">
                            @csrf
                        <p class="pera">The field labels marked with * are required input fields.</p>

                            {{--
                                <div class="col-md-6 {{ $errors->has('supplier_name') ? 'has-error':'' }}">
                                    <div class="mb-3">
                                        <label for="formrow-email-input" class="form-label form_label">Name<span class="req_star">*</span></label>
                                        <input type="text" class="form-control"  placeholder="Enter Your Name" name="supplier_name">
                                        @if ($errors->has('supplier_name'))
                                            <span class="error">{{ $errors->first('supplier_name') }}</span>
                                        @endif
                                    </div>
                                </div> --}}

                            <div class="row d-flex justify-content-center">
                                <div class="col-md-6 {{ $errors->has('expcate_code') ? 'has-error':'' }}">
                                    <div class="form-group pb-2">
                                        <label><strong>Code <span class="text-danger">*</span></strong> </label>
                                        <div class="input-group mb-3">
                                            <input type="number"  name="expcate_code" class="form-control" value="{{ old('expcate_code') }}">
                                            <button class="btn btn-outline-primary" type="button" >Generate</button>
                                        </div>
                                        @if ($errors->has('expcate_code'))
                                            <span class="error">{{ $errors->first('expcate_code') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group pb-2 {{ $errors->has('expcate_name') ? 'has-error':'' }}">
                                        <label><strong>Name <span class="text-danger">*</span></strong> </label>
                                        <input type="text" name="expcate_name" class="form-control @error('expcate_name') is-invalid @enderror" value="{{ old('expcate_name') }}">
                                        @if ($errors->has('expcate_name'))
                                            <span class="error">{{ $errors->first('expcate_name') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group pb-2">
                                        <label><strong>Remarks <span class="text-danger">*</span></strong> </label>
                                        <textarea class="form-control" name="expcate_remarks" value="{{ old('expcate_remarks') }}"></textarea>

                                    </div>
                                    <div class="form-group pb-2">
                                        <input type="submit" value="Submit" class="btn btn-primary">
                                    </div>
                                </div>
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
