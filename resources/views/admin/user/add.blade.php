@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <form method="post" action="{{url('dashboard/user/submit')}}" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-header card_header bg-dark">
            <div class="row">
                <div class="col-md-8 card_header_title">
                <i class="fab fa-gg-circle"></i>Add User Information</div>
                <div class="col-md-4 card_header_btn">
                <a class="btn btn-sm btn-secondary chb_btn" href="{{url('dashboard/user')}}"><i class="fas fa-th"></i> All User</a>
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
            <div class="row mb-3 {{$errors->has('name') ? ' has-error':''}}">
                <label class="col-sm-3 col-form-label col_form_label">Name<span class="req_star">*</span>:</label>
                <div class="col-sm-7">
                <input type="text" class="form-control form_control" id="" name="name" value="{{old('name')}}">
                @if ($errors->has('name'))
                    <span class="error">{{ $errors->first('name') }}</span>
                @endif
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label col_form_label">Phone:</label>
                <div class="col-sm-7">
                <input type="text" class="form-control form_control" id="" name="phone" value="{{old('phone')}}">
                </div>
            </div>
            <div class="row mb-3 {{$errors->has('email') ? ' has-error':''}}">
                <label class="col-sm-3 col-form-label col_form_label">Email<span class="req_star">*</span>:</label>
                <div class="col-sm-7">
                <input type="email" class="form-control form_control" id="" name="email" value="{{old('email')}}">
                @if ($errors->has('email'))
                    <span class="error">{{ $errors->first('email') }}</span>
                @endif
                </div>
            </div>
            <div class="row mb-3 {{$errors->has('password') ? ' has-error':''}}">
                <label class="col-sm-3 col-form-label col_form_label">Password<span class="req_star">*</span>:</label>
                <div class="col-sm-7">
                <input type="password" class="form-control form_control" id="" name="password" value="">
                @if ($errors->has('password'))
                    <span class="error">{{ $errors->first('password') }}</span>
                @endif
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label col_form_label">Confirm-password<span class="req_star">*</span>:</label>
                <div class="col-sm-7">
                <input type="password" class="form-control form_control" id="" name="password_confirmation" value="">
                </div>
            </div>
            <div class="row mb-3 {{$errors->has('role') ? ' has-error':''}}">
                <label class="col-sm-3 col-form-label col_form_label">User Role<span class="req_star">*</span>:</label>
                <div class="col-sm-7">
                @php
                    $allRole=App\Models\Role::where('role_status',1)->orderBy('role_id','ASC')->get();
                @endphp
                <select class="form-control form_control" name="role">
                    <option value="">select user role</option>
                    @foreach($allRole as $urole)
                    <option value="{{$urole->role_id}}">{{$urole->role_name}}</option>
                    @endforeach
                </select>
                @if ($errors->has('role'))
                    <span class="error">{{ $errors->first('role') }}</span>
                @endif
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label col_form_label">Photo:</label>
                <div class="col-sm-7">
                <input type="file" name="pic">
                </div>
            </div>
            </div>
            <div class="card-footer card_footer bg-dark text-center">
            <button class="btn btn-secondary" type="submit">REGISTRATION</button>
            </div>
        </div>
        </form>
    </div>
</div>
@endsection
