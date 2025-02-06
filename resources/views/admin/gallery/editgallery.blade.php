@extends('layouts.admin')
@section('title')
Album    
@endsection
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
      Album
        <small>Edit Album</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Album</a></li>
       
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
                <form action="/album/{{$album->id}}" method="POST" class="form-container"  enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Title*</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{$album->title}}" required>
                        </div>
                        <div class="form-group">
                            <label for="status">Media Type*</label>
                            <select class="form-control" name="type" id="type">
                                <option value="Picture">Picture</option>
                                <option value="Video">Video</option>
                            </select>
                            <small class="form-text text-muted" id="fileHelp">Do not change if album is not empty!!</small>
                        </div>
                        <div class="form-group">
                            <label for="cover">Select Cover Image*</label>
                            <input class="form-control-file" name="cover" type="file" id="cover" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                            <small class="form-text text-muted" id="fileHelp">Leave for old image</small>
                            <small class="form-text text-muted" id="fileHelp">File must be an image</small>
                        </div>
                        <div class="modal-footer">
                            
                            <button type="submit" class="btn btn-primary">Update Album</button>
                        </div>
                </form>
</div>
</div>
</section> 


@endsection