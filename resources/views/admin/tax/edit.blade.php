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
                <i class="fab fa-gg-circle"></i>Add Tax</div>
                <div class="col-md-4 card_header_btn">
                <a class="btn btn-primary waves-effect waves-light chb_btn" href="{{ route('tax.index') }}"><i class="fas fa-th"></i> All Tax</a>
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
                        <form method="POST" action="{{ route('tax.update', $data->tax_slug) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                        <p class="pera">The field labels marked with * are required input fields.</p>
                            <div class="row d-flex justify-content-center">
                                <div class="col-md-6">
                                <div class="form-group pb-2 {{ $errors->has('tax_name') ? 'has-error':'' }}">
                                    <div class="mb-3">
                                        <label for="formrow-email-input" class="form-label form_label">Tax Name<span class="req_star">*</span></label>
                                        <input type="hidden" name="tax_id" value="{{ $data->tax_id }}">
                                        <input type="text" class="form-control"  placeholder="Enter Your tax_name" name="tax_name" value="{{ $data->tax_name }}">
                                        @if ($errors->has('tax_name'))
                                            <span class="error">{{ $errors->first('tax_name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group pb-2 {{ $errors->has('tax_percent') ? 'has-error':'' }}">
                                    <div class="mb-3">
                                        <label for="formrow-email-input" class="form-label form_label">Percentage<span class="req_star">*</span></label>
                                        <input type="text" class="form-control"  placeholder="Enter Your tax_percent" name="tax_percent" value="{{ $data->tax_percent }}">
                                        @if ($errors->has('tax_percent'))
                                            <span class="error">{{ $errors->first('tax_percent') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group pb-4">
                                    <label><strong>Remarks <span class="text-danger">*</span></strong> </label>
                                    <textarea class="form-control" name="tax_remarks" value="{{ $data->tax_remarks }}"></textarea>
                                </div>
                                <div class="form-group pb-2">
                                    <button type="submit" class="btn btn-primary w-md">Submit</button>
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
