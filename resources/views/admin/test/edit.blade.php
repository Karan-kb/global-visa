@extends('layouts.admin')
@section('title')
{{$title}} Test    
@endsection
@section('content')

<!-- Content Header (Testimonials header) -->
<section class="content-header">
      <h1>
      {{$test->title}}
        <small>Edit {{$test->title}}</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">{{$title}} Test</a></li>
       
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
    <form action="/{{$method}}/{{$test->id}}" method="POST" class="form-container" enctype="multipart/form-data">
    @csrf
                        @method('PUT')

                        
                        <div class="modal-body"> 
                            <div class="form-group">
                                <label for="name">Title*</label>
                                <input type="text" class="form-control"  name="title" value="{{$test->title}}" required>
                            </div>
                           
                            <div class="form-group">
                                <label for="body">Body*</label>
                                <textarea name="body" cols="30" rows="10" id="editor"  class="form-control" > {{$test->body}}</textarea>
                            </div>
                             
                            <div class="form-group">
                                <label for="status">Status*</label>
                                <select class="form-control" name="status" id="status">
                                    <option value="Active" <?php if($test->status) echo'selected'?>>Active</option>
                                    <option value="Hidden" <?php if($test->status == 0) echo'selected'?>>Hidden</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                            <label for="order">Order*</label>
                            <input type="number" class="form-control" min="1" name="order" value="{{$test->order}}" placeholder="Enter Order of Appearance" required>
                        </div>
                            <div class="form-group">
                                <label for="image">Update Test Image*</label>
                                <input class="form-control" name="image" type="file" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                                <small class="form-text text-muted" >File must be an image</small> <br>
                                <small class="form-text text-muted" id="fileHelp">Leave for old image</small>
                            </div>
                        </div>
                        <div class="modal-footer">
                            
                            <button type="submit" class="btn btn-primary">Update {{$test->title}} </button>
                        </div>
                    </form> 
</div>
</div>
</section> 


@endsection