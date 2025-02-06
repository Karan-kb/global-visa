@extends('layouts.admin')
@section('title')
News    
@endsection
@section('content')

<!-- Content Header (News header) -->
<section class="content-header">
      <h1>
      News
        <small>Edit News</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">News</a></li>
       
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
    <form action="/news/{{$news->id}}" method="POST" class="form-container" enctype="multipart/form-data">
    @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Title*</label>
                            <input type="text" class="form-control" name="title"  value="{{$news->title}}" required>
                        </div>
                        <div class="form-group">
                            <label for="location">Location*</label>
                            <input type="text" class="form-control" name="location"  value="{{$news->location}}" required>
                        </div>
                        <div class="form-group">
                            <label for="body">Content</label>
                            <textarea name="body" id="editor" class="form-control" id="" cols="30" rows="10" >{{$news->body}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="file">Update News Image</label>
                            <input class="form-control-file form-control" name="banner" type="file" id="file" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                            <small class="form-text text-muted" id="fileHelp">File must be an image</small><br>
                            <small class="form-text text-muted" id="fileHelp">Leave for old image</small>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Update News</button>
                        </div>
                    </form> 
</div>
</div>
</section> 


@endsection