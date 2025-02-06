@extends('layouts.admin')
@section('title')
    Services
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Service
            <small>Edit Service</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Service</a></li>

        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">

               {{-- @dd($service) --}}
                <form action="{{ route('service.update', $ser->id) }}" method="POST" class="form-container"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">Service Name*</label>
                        <input type="text" class="form-control" name="title" value="{{ $ser->title }}" required>
                    </div>
                    <div class="form-group">
                        <label for="body">Descriptions</label>
                        <textarea name="body" id="editor" class="form-control" id="" cols="30" rows="10">{{ $ser->body }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="order">Order*</label>
                        <input type="number" class="form-control" min="1" name="order"
                            value="{{ $ser->order }}" placeholder="Enter Order of Appearance" required>
                    </div>
                    <div class="form-group">
                        <label for="file">Select Service Image</label>
                        <input class="form-control-file form-control" name="banner" type="file" id="file"
                            accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                        <small class="form-text text-muted" id="fileHelp">File must be an image</small><br>
                        <small class="form-text text-muted" id="fileHelp">Leave for old image</small>

                    </div>
                    <div class="form-group">
                        <label for="file">Select Service Icon</label>
                        <input class="form-control-file form-control" name="icon" type="file" id="file"
                            accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                        <small class="form-text text-muted" id="fileHelp">File must be an image</small><br>
                        <small class="form-text text-muted" id="fileHelp">Leave for old image</small>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update Service</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
