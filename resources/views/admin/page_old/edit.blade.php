@extends('layouts.admin')
@section('title')
Pages    
@endsection
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Page
        <small>Edit Page</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Page</a></li>
       
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
    <form action="/page/{{$page->id}}" method="POST" class="form-container" enctype="multipart/form-data">
    @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Title*</label>
                            <input type="text" class="form-control" name="title"  value="{{$page->title}}" required>
                        </div>
                        <div class="form-group">
                            <label for="body">Content</label>
                            <textarea name="body" id="editor" class="form-control" id="" cols="30" rows="10" >{{$page->body}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="file">Select Banner Image</label>
                            <input class="form-control-file form-control" name="banner" type="file" id="file" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                            <small class="form-text text-muted" id="fileHelp">File must be an image</small><br>
                            <small class="form-text text-muted" id="fileHelp">Leave for old image</small>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Update Page</button>
                        </div>
                    </form> 
</div>
</div>
</section> 


@endsection