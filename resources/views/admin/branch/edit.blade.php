@extends('layouts.admin')
@section('title')
Branche    
@endsection
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        {{$branch->name}}
        <small>Edit {{$branch->name}} Branch</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Branch</a></li>
       
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
    <form action="/branch/{{$branch->id}}" method="POST" class="form-container" enctype="multipart/form-data">
    @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Name*</label>
                            <input type="text" class="form-control" name="name"  value="{{$branch->name}}">
                        </div>
                        <div class="form-group">
                            <label for="address">Address*</label>
                            <input type="text" class="form-control" name="address" value="{{$branch->address}}" >
                        </div>
                        <div class="form-group">
                            <label for="contact">Contact*</label>
                            <input type="text" class="form-control" name="contact" value="{{$branch->contact}}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email*</label>
                            <input type="email" class="form-control" name="email" value="{{$branch->email}}">
                        </div>

                        <div class="form-group">
                            <div class="col-lg-4 col-12 mb-2  map custom-shadow">
                                <div class="iframe-container">
                                {!! $branch->map!!}
                                </div>
                            </div>
                            
                            <input type="text" class="form-control" name="map" value="{{$branch->map}}">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Update Branch</button>
                        </div>
                    </form> 
</div>
</div>
</section> 


@endsection