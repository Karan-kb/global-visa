@extends('layouts.admin')
@section('title')
    Scholarships
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Scholarship
            <small>Edit Scholarship</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Scholarship</a></li>

        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <form action="{{ route('scholarships.update', $scholarship->id) }}}}" method="POST" class="form-container"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">Title*</label>
                        <input type="text" class="form-control" name="title" value="{{ $scholarship->title }}"
                            required>
                    </div>


                    <div class="form-group">
                        <label for="slug">Slug*</label>
                        <input type="text" class="form-control" name="slug" value="{{ $scholarship->slug }}" required>
                    </div>

                    <div class="form-group">


                        <label for="university_id">Institute*</label>
                        <select class="form-control" name="university_id">
                          
                            @foreach ($univs as $inst)
                                <option value="{{ $inst->id }}" @if (isset($scholarship) && $scholarship->uni_id == $inst->id) selected @endif>
                                    {{ $inst->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="course_id">Course*</label>
                        <select class="form-control" name="course_id">
                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}" @if (isset($scholarship) && $scholarship->corse_id == $course->id) selected @endif>
                                    {{ $course->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="destination_id">Destination*</label>
                        <select class="form-control" name="destination_id">
                            @foreach ($destnations as $destination)
                                <option value="{{ $destination->id }}" @if (isset($scholarship) && $scholarship->desti_id == $destination->id) selected @endif>
                                    {{ $destination->nation->name ?? '' }}
                                </option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="description">Content</label>
                        <textarea name="description" id="editor" class="form-control" id="" cols="30" rows="10">{{ $scholarship->description }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="short_description">Short Description</label>
                        <textarea name="short_description" class="form-control ckeditor" id="" cols="30" rows="10">{{ $scholarship->short_description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="file">Select scholarship Image</label>
                        <input class="form-control-file form-control" name="image" type="file" id="file"
                            accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">

                        @if ($scholarship->image)
                            <div class="mt-2">
                                <img src="{{ asset('storage/scholarship/' . $scholarship->image) }}" alt="Banner Image"
                                    style="max-width: 100px;">
                            </div>
                        @endif
                        <small class="form-text text-muted" id="fileHelp">File must be an image</small><br>
                        <small class="form-text text-muted" id="fileHelp">Leave for old image</small>

                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" class="form-control">
                            <option value="0" {{ $scholarship->status == '0' ? 'selected' : '' }}>
                                Not Featured
                            </option>
                            <option value="1" {{ $scholarship->status == '1' ? 'selected' : '' }}>
                                Featured
                            </option>
                        </select>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update scholarship</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
