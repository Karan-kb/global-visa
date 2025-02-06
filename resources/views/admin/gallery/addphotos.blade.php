@extends('layouts.admin')
@section('title')
Add Photos    
@endsection
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
      {{$album->title}}
        <small>Add Photos</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Album</a></li>
        <li><a href="#">Add Photos</a></li>
       
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-6">
                <form action="/album/storephotos/{{$album->id}}" method="POST" class="form-container"  enctype="multipart/form-data">
                @csrf
                        <div class="modal-body"> 
                            <div class="form-group">
                                <label for="title">Choose photos*</label>
                                <input type="file" class="form-control" name="file[]" multiple>
                            </div>               
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                </form>
</div>
</div>
</section> 


@endsection