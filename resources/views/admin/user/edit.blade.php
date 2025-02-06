@extends('layouts.admin')
@section('title')
Edit User    
@endsection
@section('content')

<!-- Content Header (Testimonials header) -->
<section class="content-header">
      <h1>
      User
        <small>Edit User</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">User</a></li>
       
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
    <form action="/user/{{$user->id}}" method="POST" class="form-container" enctype="multipart/form-data">
    @csrf
                        @method('PUT')
                        <div class="modal-body"> 
                        <div class="form-group">
                                <label for="name">Name*</label>
                                <input type="text" class="form-control" name="name" value="{{$user->name}}" placeholder="Enter User's name" required>
                            </div>
                            <div class="form-group">
                                <label for="name">Email*</label>
                                <input id="email" class="form-control" type="email" name="email" value="{{$user->email}}" :value="old('email')" required />
                            </div>
                            <div class="form-group">
                                <label for="body">password*</label>
                                <input id="password" class="form-control"
                                type="password"
                                name="password"
                                 autocomplete="new-password" />
                            </div>
                            <div class="form-group">
                                <label for="body">Confirm password*</label>
                                <input id="password_confirmation" class="form-control"
                                type="password"
                                name="password_confirmation"  />
                            </div>
                        </div>
                        <div class="modal-footer">
                            
                            <button type="submit" class="btn btn-primary">Update User</button>
                        </div>
                    </form> 
</div>
</div>
</section> 


@endsection