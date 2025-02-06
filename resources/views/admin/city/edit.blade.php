@extends('layouts.admin')
@section('title')
City    
@endsection
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
      City
        <small>Edit City</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">City</a></li>
       
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
    <form action="/city/{{$city->id}}" method="POST" class="form-container" enctype="multipart/form-data">
    @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label>Select Destination</label>
                            <select class="form-control" name="destination_id">
                                <option>None</option>
                                @foreach($destination as $destination)
                                    <option value="{{$destination->id}}"  <?php if($city->destination_id==$destination->id) echo'selected'?>>{{$destination->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="body">City Name</label>
                            <input type="text" class="form-control" name="city" value="{{$city->city}}" required>
                        </div>

                        <div class="form-group">
                            <label for="file">Select City Image</label>
                            <input class="form-control-file form-control" name="image" type="file" id="file" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*" >
                            <small class="form-text text-muted" id="fileHelp">File must be an image</small><br>
                            <small class="form-text text-muted" id="fileHelp">Leave for old image</small>
                        </div>

                        
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Update City</button>
                        </div>
                    </form> 
</div>
</div>
</section> 


@endsection