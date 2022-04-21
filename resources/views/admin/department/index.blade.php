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
        <form>
        <div class="card">
            <div class="card-header card_header">
            <div class="row">
                <div class="col-md-8 card_header_title">
                <i class="fab fa-gg-circle"></i>All Department</div>
                <div class="col-md-4 card_header_btn">
                    <a class="btn btn-primary waves-effect waves-light chb_btn" href="{{ route('department.create' )}}"><i class="fas fa-plus-circle"></i> Add Department</a>
                    </div>
            </div>
            </div>
            <div class="card-body card_body">
            <div class="row">
                <div class="col-md-12">
                <table id="dataTable" class="table table-bordered table-striped table-hover custom_table custom_table">
                    <thead class="table-dark">
                    <tr>
                        <th>Department Name</th>
                        <th>Remarks</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($all as $data)
                    <tr>
                        <td>{{ $data->department_name }}</td>
                        <td>{{ $data->department_remarks }}</td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-outline-primary" data-bs-toggle="dropdown" aria-expanded="false">Manage <i class="mdi mdi-chevron-down"></i></button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item text-primary btn-link" href="{{ route('department.edit', $data->department_slug) }}"><i class="dripicons-document-edit"></i> Edit</a>
                                    <a class="dropdown-item text-primary btn-link" href="#" id="delete" data-bs-toggle="modal" data-bs-target="#softDeleteModal" data-id="{{$data->department_id}}"><i class="dripicons-trash"></i> Delete</a>
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
        </form>
        </div>
    </div>
    <div class="modal fade" id="softDeleteModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <form method="post" action="{{ route('department.softdelete')}}">
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
</div>
@endsection
