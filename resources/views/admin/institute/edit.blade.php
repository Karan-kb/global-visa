@extends('layouts.admin')
@section('title')
Institute    
@endsection
@section('content')

<!-- Content Header (Institute header) -->
<section class="content-header">
      <h1>
      {{$institute->name}}
        <small>Edit Institute</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Institute</a></li>
       
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
    <form action="/institute/{{$institute->id}}" method="POST" class="form-container" enctype="multipart/form-data">
    @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Name*</label>
                            <input type="text" class="form-control" name="name" value="{{$institute->name}}">
                        </div>
                        <div class="form-group">
                            <label for="address">Address*</label>
                            <input type="text" class="form-control" name="address" value="{{$institute->address}}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email*</label>
                            <input type="email" class="form-control" name="email" value="{{$institute->email}}">
                        </div>
                        <div class="form-group">
                            <label for="Contact">Contact*</label>
                            <input type="text" class="form-control" name="contact" value="{{$institute->contact}}">
                        </div>
                        <div class="form-group">
                            <label>Select Album</label>
                            <select class="form-control" name="album_id">
                                <option>None</option>
                                @foreach($album as $album)
                                <option value="{{$album->id}}"  <?php if($institute->album_id==$album->id) echo'selected'?>>{{$album->title}}</option>
                                @endforeach
                            </select>
                        </div>

                        
                    <div class="form-group">
                      <label for="title">Courses</label> <br>
                      
                          <input type="checkbox" name="course[]" value="MBA">  MBA&nbsp;
                          <input type="checkbox" name="course[]" value="BBA">  BBA&nbsp;
                          <input type="checkbox" name="course[]" value="CIT">  CIT&nbsp;
                          <input type="checkbox" name="course[]" value="BSC">  BSC&nbsp;
                          <input type="checkbox" name="course[]" value="BA">  BA&nbsp;
                          
                       
                   </div> 
                   <div class="form-group">
                            <label for="body">Description</label>
                            <textarea name="body" id="editor" class="form-control" id="" cols="30" rows="10" >{{$institute->body}}</textarea>
                        </div>
                      
                        <div class="form-group">
                            <label for="file">Select Institute Image</label>
                            <input class="form-control-file form-control" name="banner" type="file" id="file" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                            <small class="form-text text-muted" id="fileHelp">File must be an image</small><br>
                            <small class="form-text text-muted" id="fileHelp">Leave for old image</small>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Update Institute</button>
                        </div>
                    </form> 
</div>
</div>
</section> 


@endsection