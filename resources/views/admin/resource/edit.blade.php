@extends('layouts.admin')
@section('title')
Resource    
@endsection
@section('content')

<!-- Resource Header (Resource header) -->
<section class="content-header">
      <h1>
      Resource
        <small>Edit Resource</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Resource</a></li>
       
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
    <form action="/resource/{{$resource->id}}" method="POST" class="form-container" enctype="multipart/form-data">
    @csrf
                        @method('PUT')
                        <div class="modal-body"> 
                        <div class="form-group">
                            <label for="title">Title*</label>
                            <input type="text" class="form-control" name="title" value="{{$resource->title}}" placeholder="Enter Resource Title" required>
                        </div>
                         
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="editor" class="form-control" id="" cols="30" rows="10" placeholder="Enter Resource Description...">{{$resource->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="file">Select Resource Image</label>
                            <input class="form-control-file form-control" name="banner" type="file" id="file" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*" >
                            <small class="form-text text-muted" >File must be an image</small>
                                <small class="form-text text-muted" id="fileHelp">Leave for old image</small>
                        </div>

                        <div class="form-group">
                            <label for="file">Upload Resource Files</label>
                            <input class="form-control-file form-control" name="file" type="file" id="file" accept=".jpg, .png, .jpeg, .gif,.pdf, .docx|file/*" >
                            <small class="form-text text-muted" >File must be  jpg/pdf/docx</small>
                                <small class="form-text text-muted" id="fileHelp">Leave for old image</small>
                            
                        </div>


                        <div class="form-group">
                                <label for="status">Status*</label>
                                <select class="form-control" name="status" id="status">
                                    <option value="Active" <?php if($resource->status) echo'selected'?>>Active</option>
                                    <option value="Hidden" <?php if($resource->status == 0) echo'selected'?>>Hidden</option>
                                </select>
                            </div>
                        <div class="modal-footer">
                            
                            <button type="submit" class="btn btn-primary">Update Resource</button>
                        </div>
                    </form> 
</div>
</div>
</section> 


@endsection