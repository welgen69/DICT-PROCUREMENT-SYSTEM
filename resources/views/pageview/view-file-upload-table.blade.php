
@extends('layouts.master')
@section('style')

<style>
 
    .page-item.active .page-link:hover{
        background-color:#FF0013;
        }
        
</style>

@endsection

@section('content')
    {{-- message --}}
    {!! Toastr::message() !!}
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Form Report File Upload</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Form Report  File Upload</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table mb-0 datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Upload By</th>
                                    <th>Date Time</th>
                                    <th>File Name</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th class="text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($fileUpload as $key=>$items )
                                <tr>
                                    <td class="id">{{ $items->id }}</td>
                                    <td>
                                        <strong>{{ $items->upload_by }}</strong>
                                    </td>
                                    <td>{{ $items->date_time }}</td>
                                    <td><a href="{{ url('download/file/'.$items->file_name ) }} "target="_blank"  class="file_name">{{ $items->file_name }}</a></td>
                                    <td><strong>{{ $items->description }}</strong></td>
                                    <td><strong>{{ $items->status }}</strong></td>
                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                <i class="material-icons">more_vert</i>
                                            </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="{{ url('form/input/edit/'.$items->id) }}">
                                                    <i class="fa fa-pencil m-r-5"></i>Edit
                                                </a>
                                                <a class="dropdown-item delete" href="#" data-toggle="modal" data-target="#delete_record">
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

    <!-- Delete Record From Modal -->
    <div class="modal custom-modal fade" id="delete_record" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-header">
                        <h3>Delete File Record</h3>
                        <p>Are you sure want to delete?</p>
                    </div>
                    <div class="modal-btn delete-action">
                        <form action="{{ route('download/file/delete') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" class="e_id" value="">
                            <input type="hidden" name="file_name" class="e_file_name" value="">
                            <div class="row">
                                <div class="col-6">
                                    <button type="submit" class="btn btn-primary continue-btn submit-btn">Delete</button>
                                </div>
                                <div class="col-6">
                                    <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Delete Record From Modal -->

@section('script')
{{-- delete js --}}
<script>
    $(document).on('click','.delete',function()
    {
        var _this = $(this).parents('tr');
        $('.e_id').val(_this.find('.id').text());
        $('.e_file_name').val(_this.find('.file_name').text());
    });
</script>
@endsection
@endsection
