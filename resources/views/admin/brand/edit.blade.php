@extends('layouts.admin')
@section('title')
Brand    
@endsection
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
      Brand
        <small>Edit Brand</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Brand</a></li>
       
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
    <form action="/brand/{{$brand->id}}" method="POST" class="form-container" enctype="multipart/form-data">
    @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Name*</label>
                            <input type="text" class="form-control" name="name"  value="{{$brand->name}}" required>
                        </div>
                        <div class="form-group">
                            <label for="body">url</label>
                            <input type="text" name="url" class="form-control" value="{{$brand->url}}">
                        </div>
                        <div class="form-group">
                            <label for="file">Select Brand Logo</label>
                            <input class="form-control-file form-control" name="banner" type="file" id="file" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                            <small class="form-text text-muted" id="fileHelp">File must be an image</small><br>
                            <small class="form-text text-muted" id="fileHelp">Leave for old image</small>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Update Brand</button>
                        </div>
                    </form> 
</div>
</div>
</section> 


@endsection