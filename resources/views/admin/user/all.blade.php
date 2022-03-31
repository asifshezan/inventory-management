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
{{-- <div class="row">
    <div class="col-md-12">
        <form>
        <div class="card">
            <div class="card-header card_header bg-dark">
            <div class="row">
                <div class="col-md-8 card_header_title">
                <i class="fab fa-gg-circle"></i>All User Information
                </div>
                <div class="col-md-4 card_header_btn">
                <a class="btn btn-sm btn-secondary chb_btn" href="{{url('dashboard/user/add')}}"><i class="fas fa-plus-circle"></i> Add User</a>
                </div>
            </div>
            </div>
            <div class="card-body card_body">
            <div class="row">
                <div class="col-md-12">
                <table id="allDataTable" class="table table-bordered table-striped table-hover custom_table">
                    <thead class="table-dark">
                    <tr>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Photo</th>
                        <th>Manage</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($all as $data)
                    <tr>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->phone }}</td>
                        <td>{{ $data->email }}</td>
                        {{-- <td>{{ $data->roleInfo->role_name }}</td> --}}
                        {{-- <td>
                        @if($data->photo)
                            <img height="40" src="{{ asset('uploads/users/'.$data->photo) }}"/>
                        @else
                            <img height="40" src="{{ asset('uploads/avatar.png') }}"/>
                        @endif
                        </td>
                        <td>
                        <div class="btn-group">
                                                <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Manage
                            </button> --}}
                            {{-- <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{url('dashboard/user/view/'.$data->id)}}">View</a>
                                    <a class="dropdown-item" href="{{url('dashboard/user/edit/'.$data->id)}}">Edit</a>
                                    <a class="dropdown-item" href="#" id="delete" data-bs-toggle="modal" data-bs-target="#softDeleteModal" data-id="{{$data->id}}">Delete</a>
                            </div>
                        </div>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
            </div>
            </div>
            <div class="card-footer card_footer bg-dark">
            <a href="#" class="btn btn-sm btn-success">Print</a>
            <a href="#" class="btn btn-sm btn-secondary">PDF</a>
            <a href="#" class="btn btn-sm btn-primary">Excel</a>
            <a href="#" class="btn btn-sm btn-warning">CSV</a>
            </div>
        </div>
        </form> --}}
    {{-- </div>
    </div>
    <div class="modal fade" id="softDeleteModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <form method="post" action="{{url('dashboard/user/softdelete')}}">
        @csrf
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id=""><i class="fab fa-gg-circle"></i> Confirm Message</h5>
        </div>
        <div class="modal-body modal_body">
            Are you want to sure delete data?
            <input type="hidden" name="modal_id" id="modal_id">
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-dark">Confirm</button>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
        </div>
        </div>
        </form>
    </div>
    </div>  --}}

<div class="row">
    <div class="col-xl-12">

        <div class="card">
            <div class="card-header card_header bg-dark">
                <div class="row">
                    <div class="col-md-8 card_header_title">
                    <i class="fab fa-gg-circle"></i>All User Information
                    </div>
                    <div class="col-md-4 card_header_btn">
                    <a class="btn btn-sm btn-secondary chb_btn" href="{{url('dashboard/user/add')}}"><i class="fas fa-plus-circle"></i> Add User</a>
                    </div>
                </div>
                </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped mb-0">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Username</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>@twitter</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection
