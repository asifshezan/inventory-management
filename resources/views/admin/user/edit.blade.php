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
        <form method="post" action="{{ route('user.update',$data->slug)}}" enctype="multipart/form-data">
        @csrf
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

                        <form method="POST" action="{{ url('dashboard/user/update') }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                        <p class="pera">The field labels marked with * are required input fields.</p>

                            <div class="row">
                                <div class="col-md-6 {{ $errors->has('name') ? 'has-error':'' }}">
                                    <div class="mb-3">
                                        <input type="hidden" name="id" value="{{ $data->id }}"/>
                                        <label for="formrow-email-input" class="form-label form_label">UserName<span class="req_star">*</span></label>
                                        <input type="text" class="form-control"  placeholder="Enter Your Name" name="name" value="{{ $data->name }}">
                                        @if ($errors->has('name'))
                                            <span class="error">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6 {{ $errors->has('email') ? 'has-error':'' }}">
                                    <div class="mb-3">
                                        <label for="formrow-email-input" class="form-label form_label">Email<span class="req_star">*</span></label>
                                        <input type="email" class="form-control" name="email" placeholder="Enter Your Email ID" value="{{ $data->email }}" >
                                        @if ($errors->has('email'))
                                            <span class="error">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="formrow-password-input" class="form-label form_label">Phone Number<span class="req_star">*</span></label>
                                        <input type="text" class="form-control" name="phone" placeholder="Enter Your Phone Number" value="{{ $data->phone }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="formrow-inputState" class="form-label  form_label">Role<span class="req_star">*</span></label>
                                        <select name="role" class="form-select" value="{{ $data->role }}">
                                            <option selected disabled>Select User Role</option></option>
                                            <option value="1" {{ $data->role == 1 ? 'selected':''}}>Admin</option>
                                            <option value="2" {{ $data->role == 2 ? 'selected':''}}>Customer</option>
                                            <option value="3" {{ $data->role == 3 ? 'selected':''}}>Visitor</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label form_label">Photo</label>
                                            <input class="form-control" type="file" name="pic">
                                        </div>
                                    </div>
                                    <div class="col-md-2 sp_pic">
                                        @if( $data->photo!='' )
                                        <img src="{{ asset('uploads/users/' . $data->photo) }}" height="40" width="40" class="img-fluid" alt="">
                                        @else
                                        <img src="{{ asset('uploads/avater.png') }}" height="50">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" name="active" {{ $data->active == 1 ? 'checked':'' }}>
                                    <label class="form-check-label check_input" for="gridCheck">
                                         <strong>Active</strong>
                                    </label>
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
        </form>
    </div>
</div>
@endsection
