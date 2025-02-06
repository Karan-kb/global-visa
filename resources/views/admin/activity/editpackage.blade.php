@extends('layouts.admin')
@section('title')
Program    
@endsection
@section('content')

<!-- Content Header (Program header) -->
<section class="content-header">
      <h1>
      Program
        <small>Edit Program</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Program</a></li>
       
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
    <form action="/package/{{$package->id}}" method="POST" class="form-container" enctype="multipart/form-data">
    @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Title*</label>
                            <input type="text" class="form-control" name="title"  value="{{$package->title}}" required>
                        </div>
                        <div class="form-group">
                            <label for="location">Location*</label>
                            <input type="text" class="form-control" name="location"  value="{{$package->location}}" required>
                        </div>
                        <div class="form-group">
                            <label for="body">Content</label>
                            <textarea name="body" id="editor" class="form-control" id="" cols="30" rows="10" >{{$package->body}}</textarea>
                        </div>
                        
                        <div class="form-group">
                                <label for="status">Status*</label>
                                <select class="form-control" name="status" id="status">
                                    <option value="Active" <?php if($package->status) echo'selected'?>>Active</option>
                                    <option value="Hidden" <?php if($package->status == 0) echo'selected'?>>Hidden</option>
                                </select>
                            </div>
                        <div class="form-group">
                            <label for="file">Update Program's Image</label>
                            <input class="form-control-file form-control" name="banner" type="file" id="file" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                            <small class="form-text text-muted" id="fileHelp">File must be an image</small><br>
                            <small class="form-text text-muted" id="fileHelp">Leave for old image</small>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Update Program</button>
                        </div>
                    </form> 
</div>
</div>
</section> 


@endsection