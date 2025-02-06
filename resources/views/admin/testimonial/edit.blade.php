@extends('layouts.admin')
@section('title')
    Testimonials
@endsection
@section('content')
    <!-- Content Header (Testimonials header) -->
    <section class="content-header">
        <h1>
            Testimonial
            <small>Edit Testimonial</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Testimonial</a></li>

        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <form action="/testimonial/{{ $testimonial->id }}" method="POST" class="form-container"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Name*</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $testimonial->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="about">About*</label>
                            <input type="text" class="form-control" id="about" name="about"
                                value="{{ $testimonial->about }}" required>
                        </div>
                        <div class="form-group">
                            <label for="body">Body*</label>
                            <textarea name="body" cols="30" rows="10" id="editor" class="form-control"> {{ $testimonial->body }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="status">Status*</label>
                            <select class="form-control" name="status" id="status">
                                <option value="Active" <?php if ($testimonial->status) {
                                    echo 'selected';
                                } ?>>Active</option>
                                <option value="Hidden" <?php if ($testimonial->status == 0) {
                                    echo 'selected';
                                } ?>>Hidden</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="image">Select Testimonial Image*</label>
                            <input class="form-control" name="image" type="file"
                                accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                            <small class="form-text text-muted">File must be an image</small>
                            <small class="form-text text-muted" id="fileHelp">Leave for old image</small>

                            @if ($testimonial->image)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/testimonials/' . $testimonial->image) }}" alt="Image"
                                        style="max-width: 100px;">
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">

                        <button type="submit" class="btn btn-primary">Update Testimonial</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
