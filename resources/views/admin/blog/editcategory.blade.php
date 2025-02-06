@extends('layouts.admin')
@section('title')
Category    
@endsection
@section('content')

<!-- Content Header (Category header) -->
<section class="content-header">
      <h1>
      Category
        <small>Edit Category</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Category</a></li>
       
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
    <form action="/category/{{$cat->id}}" method="POST" class="form-container" enctype="multipart/form-data">
    @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Name*</label>
                            <input type="text" class="form-control" name="name"  value="{{$cat->name}}" required>
                        </div>
                        
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Update Category</button>
                        </div>
                    </form> 
</div>
</div>
</section> 


@endsection