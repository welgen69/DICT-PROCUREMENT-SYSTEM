
@extends('layouts.master')
@section('content')
    {{-- message --}}
    {!! Toastr::message() !!}
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Form View</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Form Information View</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Edit Form</h4>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Personal Information</h4>
                            <form action="{{ route('form/input/update') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $fileInputView->id }}">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Upload By</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control @error('upload_by') is-invalid @enderror" name="upload_by" value="{{ $fileInputView->upload_by }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Description</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ $fileInputView->description }}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Status</label>
                                            <div class="col-lg-9">
                                                <select class="select @error('status') is-invalid @enderror" name="status">
                                                    <option value="PENDING" {{ $fileInputView->status == 'PENDING' ? "selected" :""}}>PENDING</option>
                                                    <option value="IN PROGRESS" {{ $fileInputView->status == 'IN PROGRESS' ? "selected" :""}}>IN PROGRESS</option>
                                                    <option value="COMPLETE" {{ $fileInputView->status == 'COMPLETE' ? "selected" :""}}>COMPLETE</option>
                                                </select>
                                            </div>
                                        </div>
                                <div class="text-left">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
