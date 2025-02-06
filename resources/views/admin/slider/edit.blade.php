@extends('layouts.admin')
@section('title')
    {{ env('APP_NAME') }} | Edit Slider
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Edit Slider
            <small>Modify Slider Details</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ route('slider.index') }}">Sliders</a></li>
            <li class="active">Edit Slider</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Edit Slider Information</h3>
                    </div>

                    <!-- Form Start -->
                    <form class="form" method="post" action="/slider/{{ $slider->id }}" enctype="multipart/form-data">

                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $slider->id }}">
                        <div class="box-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li style="font-size: smaller;">{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <!-- General Section -->
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="heading">Heading <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="heading"
                                            value="{{ old('heading', $slider->heading) }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="title">Title <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="title"
                                            value="{{ old('title', $slider->title) }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="youtube_url">Youtube URL</label>
                                        <input type="url" class="form-control" name="youtube_url"
                                            value="{{ old('youtube_url', $slider->youtube_url) }}">
                                    </div>
                                </div>

                                <!-- Status Toggle -->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="status">Status</label><br>
                                        <label class="switch">
                                            <input type="checkbox" name="status"
                                                {{ $slider->status == 1 ? 'checked' : '' }}>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Image Upload -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="image">Banner Image</label>
                                        <input type="file" class="form-control" name="image" accept="image/*">
                                        @if ($slider->image)
                                            <small class="text-muted">Current Image: {{ $slider->image }}</small>
                                        @endif
                                        <small class="text-muted">
                                            <strong>Recommended:</strong> JPG, JPEG, PNG | 1000px x 667px | ≤ 9MB
                                        </small>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <input type="file" class="form-control" name="image_1" accept="image/*">
                                        @if ($slider->image_1)
                                            <small class="text-muted">Current Image: {{ $slider->image_1 }}</small>
                                        @endif
                                        <small class="text-muted">
                                            <strong>Recommended:</strong> JPG, JPEG, PNG | 1000px x 667px | ≤ 9MB
                                        </small>
                                    </div>
                                </div>
                            </div>

                            <!-- Button Information -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Button Information</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="button_text">Button Text</label>
                                                <input type="text" class="form-control" name="button_text"
                                                    value="{{ old('button_text', $slider->button_text) }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="button_url">Button URL</label>
                                                <input type="url" class="form-control" name="button_url"
                                                    value="{{ old('button_url', $slider->button_url) }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Form Footer -->
                        <div class="box-footer text-right">
                            <a href="{{ route('slider.index') }}">
                                <button type="button" class="btn btn-danger">Cancel</button>
                            </a>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection
