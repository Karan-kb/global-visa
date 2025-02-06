@extends('layouts.admin')
@section('title')
Media    
@endsection
@section('content')

<!-- Content Header (Media header) -->
<section class="content-header">
      <h1>
      Media
        <small>Edit Media</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Media</a></li>
       
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
                <form action="/media/{{$media->id}}" method="POST" class="form-container"  enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Name*</label>
                            <input type="text" class="form-control"  name="name" value="{{$media->name}}" >
                        </div>
                        <div class="form-group">
                            <label for="designation">Designation*</label>
                            <input type="text" class="form-control"  name="designation" value="{{$media->designation}}" >
                        </div>
                        
                        
                        <div class="modal-footer">
                            
                            <button type="submit" class="btn btn-primary">Update Media</button>
                        </div>
                </form>
</div>
</div>
</section> 


@endsection