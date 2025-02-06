@extends('layouts.admin')
@section('title')
    Blogs
@endsection
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
                <form action="/blog/{{ $blog->id }}" method="POST" class="form-container" enctype="multipart/form-data">
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
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update Blog</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
