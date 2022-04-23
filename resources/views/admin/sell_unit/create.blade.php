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
                <i class="fab fa-gg-circle"></i>Create Sell-Unit Information</div>
                <div class="col-md-4 card_header_btn">
                <a class="btn btn-primary waves-effect waves-light chb_btn" href="{{ route('sell.unit.index') }}"><i class="fas fa-th"></i> All Sell Unit</a>
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
                        <form method="POST" action="{{ route('sell.unit.store') }}" enctype="multipart/form-data">
                            @csrf
                        <p class="pera">The field labels marked with * are required input fields.</p>
                            <div class="row d-flex justify-content-center">
                                <div class="col-md-6">
                                    <div class="form-group pb-2 {{ $errors->has('su_name') ? 'has-error':'' }}">
                                        <label><strong>Name <span class="text-danger">*</span></strong> </label>
                                        <input type="text" name="su_name" class="form-control @error('su_name') is-invalid @enderror" value="{{ old('su_name') }}">
                                        @if ($errors->has('su_name'))
                                            <span class="error">{{ $errors->first('su_name') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group pb-2">
                                        <label><strong>Remarks <span class="text-danger">*</span></strong> </label>
                                        <textarea class="form-control" name="su_remarks">{{ old('su_remakrs') }}</textarea>
                                    </div>

                                    <div class="form-group pb-2 {{ $errors->has('pu_id') ? 'has-error' : '' }}">
                                        <label><strong>Purchase Unit <span class="text-danger">*</span></strong> </label>
                                    @php
                                        $allsell=App\Models\PurchaseUnit::where('pu_status',1)->orderBy('pu_id','ASC')->get();
                                        @endphp
                                            <select class="form-select" name="pu_id">
                                                <option selected disabled>Select Unit</option>
                                                @foreach ($allsell as $sellunit)
                                                <option value="{{$sellunit->pu_id}}">{{$sellunit->pu_name}}</option>
                                                @endforeach
                                        </select>
                                        @if ($errors->has('pu_id'))
                                            <span class="error">{{ $errors->first('pu_id') }}</span>
                                        @endif
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
    </div>
</div>
@endsection
