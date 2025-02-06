@extends('layouts.admin')
@section('title')
Highlight    
@endsection
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Highlight
        <small>Edit Highlight</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Highlight</a></li>
       
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
    <form action="/highlight/{{$highlight->id}}" method="POST" class="form-container" enctype="multipart/form-data">
    @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label>Select Destination</label>
                            <select class="form-control" name="destination_id">
                                <option>None</option>
                                @foreach($destination as $destination)
                                    <option value="{{$destination->id}}"  <?php if($highlight->destination_id==$destination->id) echo'selected'?>>{{$destination->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="body">Founded</label>
                            <input type="date" class="form-control" name="founded" value="{{$highlight->founded}}" required>
                        </div>

                        <div class="form-group">
                            <label for="body">Capital</label>
                            <input type="text" class="form-control" name="capital" value="{{$highlight->capital}}" required>
                        </div>

                        <div class="form-group">
                            <label for="body">Area</label>
                            <input type="text" class="form-control" name="area" value="{{$highlight->area}}" required>
                        </div>
                        <div class="form-group">
                            <label for="body">Form of Government</label>
                            <input type="text" class="form-control" name="form" value="{{$highlight->form}}" required>
                        </div>

                        <div class="form-group">
                            <label for="body">National Animal</label>
                            <input type="text" class="form-control" name="animal_name" value="{{$highlight->animal_name}}" required>
                        </div>

                        <div class="form-group">
                            <label for="body">Population</label>
                            <input type="text" class="form-control" name="population" value="{{$highlight->population}}" required>
                        </div>
                        <div class="form-group">
                            <label for="file">Select National Animal</label>
                            <input class="form-control-file form-control" name="animal_image" type="file" id="file" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*" >
                            <small class="form-text text-muted" id="fileHelp">File must be an image</small><br>
                            <small class="form-text text-muted" id="fileHelp">Leave for old image</small>
                        </div>
                        <div class="form-group">
                            <label for="file">Select Flag</label>
                            <input class="form-control-file form-control" name="flag" type="file" id="file" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*" >
                            <small class="form-text text-muted" id="fileHelp">File must be an image</small><br>
                            <small class="form-text text-muted" id="fileHelp">Leave for old image</small>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Update Highlight</button>
                        </div>
                    </form> 
</div>
</div>
</section> 


@endsection