@extends('layouts.admin')
@section('title')
    Achievements
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Achievement
            <small>Edit achievement</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Achievement</a></li>

        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                {{-- @dd($achievement) --}}
                <form action="{{ route('achievement.update', $achievement->id) }}" method="POST" class="form-container"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title"> Name*</label>
                        <input type="text" class="form-control" name="title" value="{{ $achievement->title }}"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="order">Count*</label>
                        <input type="count" class="form-control" min="1" name="count"
                            value="{{ $achievement->count }}" placeholder="Enter Count" required>
                    </div>

                    <div class="form-group">
                        <label for="file">Select Achievement Image</label>
                        <input class="form-control-file form-control" name="image" type="file" id="file"
                            accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*" onchange="previewImage(event)">

                        @if ($achievement->image)
                            <img src="{{ asset($achievement->image) }}" alt="Banner Image" width="100" class="mt-2">
                            <small class="form-text text-muted"></small>
                        @endif

                        <small class="form-text text-muted" id="fileHelp">File must be an image</small>
                        <small class="form-text text-muted" id="fileHelp">Leave blank to keep the old image</small>



                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update achievement</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
