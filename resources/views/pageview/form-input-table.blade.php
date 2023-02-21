

@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Form Report</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Form Report</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row filter-row">
            <div class="col-sm-6 col-md-3">
                <div class="form-group form-focus select-focus">
                    <input class="form-control floating" type="text">
                    <label class="focus-label">Full Name By</label>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="form-group form-focus">
                    <div class="cal-icon">
                        <input class="form-control floating datetimepicker" type="text">
                    </div>
                    <label class="focus-label">From</label>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="form-group form-focus">
                    <div class="cal-icon">
                        <input class="form-control floating datetimepicker" type="text">
                    </div>
                    <label class="focus-label">To</label>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <a href="#" class="btn btn-success btn-block"> Search </a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table mb-0 datatable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Full Name</th>
                                <th>Gender</th>
                                <th>Blood Group</th>
                                <th>Address</th>
                                <th>State</th>
                                <th>City</th>
                                <th>Country</th>
                                <th>Postal Code</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataFormInput as $key=>$items )
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>
                                    <strong>{{ $items->full_name }}</strong>
                                </td>
                                <td>{{ $items->gender }}</td>
                                <td>{{ $items->blood_group }}</td>
                                <td>{{ $items->address }}</td>
                                <td>{{ $items->state }}</td>
                                <td>{{ $items->city }}</td>
                                <td>{{ $items->country }}</td>
                                <td>{{ $items->postal_code }}</td>
                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                            <i class="material-icons">more_vert</i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="{{ url('form/input/edit/'.$items->id) }}">
                                                <i class="fa fa-pencil m-r-5"></i>Edit
                                            </a>
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_approve">
                                                <i class="fa fa-trash-o m-r-5"></i>Delete
                                            </a>
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
    </div>

</div>
@endsection
