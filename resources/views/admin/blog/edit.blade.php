@extends('layouts.admin')
@section('title')
    Blogs
@endsection


@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css">

    <style>
        .box {
            border: 2px solid #ccc;
            padding: 12px;
            margin-bottom: 20px;
            margin-top: 50px;
        }



        .bootstrap-tagsinput {
            width: 100%;
            display: block;
        }

        .bootstrap-tagsinput input {
            width: auto !important;
        }
    </style>
@endpush

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Blog
            <small>Edit Blog</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Blog</a></li>

        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <form action="/blog/{{ $blog->id }}" method="POST" class="form-container"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">Title*</label>
                        <input type="text" class="form-control" name="title" value="{{ $blog->title }}" required>
                    </div>
                    <div class="form-group">
                        <label for="category">Blog Category *</label>
                        <select name="category" class="form-control cat_dropdown" required>
                            @foreach ($category as $category)
                                <option value="{{ $category->id }}" <?php if ($blog->category_id == $category->id) {
                                    echo 'selected';
                                } ?>>
                                    {{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="featured"> Featured ??</label>

                        <select name="featured" class="form-control">
                            <option value="no" <?php if ($blog->featured == 'no') {
                                echo 'selected';
                            } ?>>
                                Not Featured</option>
                            <option value="yes" <?php if ($blog->featured == 'yes') {
                                echo 'selected';
                            } ?>>Featured
                            </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" class="form-control" name="location" value="{{ $blog->location }}">
                    </div>
                    <div class="form-group">
                        <label for="body">Content</label>
                        <textarea name="body" id="editor" class="form-control" id="" cols="30" rows="10">{{ $blog->body }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="short_description">Short Description</label>
                        <textarea name="short_description" class="form-control ckeditor" id="" cols="30" rows="10">{{ $blog->short_description }}</textarea>
                    </div>


                    <div class="form-group">
                        <label for="file">Select Blog Image</label>
                        <input class="form-control-file form-control" name="banner" type="file" id="file"
                            accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">

                        @if ($blog->image)
                            <div class="mt-2">
                                <img src="{{ asset('storage/blog/' . $blog->image) }}" alt="Banner Image"
                                    style="max-width: 100px;">
                            </div>
                        @endif
                        <small class="form-text text-muted" id="fileHelp">File must be an image</small><br>
                        <small class="form-text text-muted" id="fileHelp">Leave for old image</small>

                    </div>

                    <div class="form-group col-md-6">
                        <label for="seo_title">SEO Title</label>
                        <input type="text" class="form-control" name="seo_title" value="{{ $blog->seo_title }}">
                    </div>



                    <div class="form-group col-md-6">
                        <label for="seo_description">SEO Description</label>
                        <textarea class="form-control" name="seo_description">{{ $blog->seo_description }}</textarea>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="seo_keyword">SEO Keyword</label>
                        <input type="text" class="form-control" name="seo_keyword" id="bootstrap-tagsinput"
                            placeholder="Enter SEO tags" data-role="tagsinput" value="{{ $blog->seo_keyword }}">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="seo_image">SEO Image</label>
                        <input type="file" class="form-control" name="seo_image" accept="image/*">
                        @if ($blog->seo_image)
                            {{-- <small class="text-muted">Current Image: {{ asset('storage/' .$dest->seo_image) }}</small> --}}
                            <img src="{{ asset('storage/blog/' . $blog->seo_image) }}" style="height: 50px; width:70px"
                                alt="Image">
                        @endif
                        <small class="text-muted">
                            <strong>Recommended:</strong> JPG, JPEG, PNG | 1200px x 630px | ≤ 9MB
                        </small>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update Blog</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection



@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>

    <script>
        $(document).ready(function() {




            $('#seo_keyword').tagsinput({
                confirmKeys: [13, 44],
                trimValue: true
            });
        });
    </script>
@endpush
