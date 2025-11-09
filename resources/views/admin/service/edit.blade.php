@extends('layouts.admin')
@section('title')
    Services
@endsection

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css">

    <style>
        .bootstrap-tagsinput {
            width: 100% !important;
            display: block !important;
        }

        .bootstrap-tagsinput input {
            border: none;
            outline: none;
            background: transparent;
            width: auto;
            max-width: 100%;
        }
    </style>
@endpush


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
                    <input type="number" class="form-control" min="1" name="order" value="{{ $ser->order }}"
                        placeholder="Enter Order of Appearance" required>
                </div>

                <div class="form-group col-md-6">
                    <label for="seo_title">SEO Title</label>
                    <input type="text" class="form-control" name="seo_title" value="{{ $ser->seo_title }}">
                </div>



                <div class="form-group col-md-6">
                    <label for="seo_description">SEO Description</label>
                    <textarea class="form-control" name="seo_description">{{ $ser->seo_description }}</textarea>
                </div>

                <div class="form-group col-md-6">
                    <label for="seo_keyword">SEO Keyword</label>
                    <input type="text" class="form-control" name="seo_keyword" id="bootstrap-tagsinput"
                        placeholder="Enter SEO tags" data-role="tagsinput" value="{{ $ser->seo_keyword }}">
                </div>

                <div class="form-group col-md-6">
                    <label for="seo_image">SEO Image</label>
                    <input type="file" class="form-control" name="seo_image" accept="image/*">
                    @if ($ser->seo_image)
                        {{-- <small class="text-muted">Current Image: {{ asset('storage/' .$dest->seo_image) }}</small> --}}
                        <img src="{{ asset('storage/service/' . $ser->seo_image) }}" style="height: 50px; width:70px"
                            alt="Image">
                    @endif
                    <small class="text-muted">
                        <strong>Recommended:</strong> JPG, JPEG, PNG | 1200px x 630px | ≤ 9MB
                    </small>
                </div>
                <div class="form-group col-md-6">
                    <label for="file">Select Service Image</label>
                    <input class="form-control-file form-control" name="banner" type="file" id="file"
                        accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                    <small class="form-text text-muted" id="fileHelp">File must be an image</small><br>
                    {{-- <small class="form-text text-muted" id="fileHelp">Leave for old image</small> --}}

                </div>
                <div class="form-group col-md-6">
                    <label for="file">Select Service Icon</label>
                    <input class="form-control-file form-control" name="icon" type="file" id="file"
                        accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                    <small class="form-text text-muted" id="fileHelp">File must be an image</small><br>
                    {{-- <small class="form-text text-muted" id="fileHelp">Leave for old image</small> --}}

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update Service</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>


@endpush
