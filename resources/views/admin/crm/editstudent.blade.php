@extends('layouts.admin')
@section('title')
Student    
@endsection
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
      Student
        <small>Edit Student</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Student</a></li>
       
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
    <form action="/students/{{$student->id}}" method="POST" class="form-container" enctype="multipart/form-data">
    @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name" >Name: </label>
                            <input type="text" class="form-control" id='name' name="name" value="{{old('name',$student->name)}}">
                           
                        </div>

                        <div class="form-group">
                            <label for="image" class="col-3">Image: </label>

                            <input type="file" name="banner" id="image" accept="image/*">
                            <img src="" id="img" width="50px"  alt=""/>
                        </div>

                        <div class="form-group">
                            <label for="phone" >Phone : </label>
                            <input type="text" class="form-control" id='phone' name="phone" value="{{old('name',$student->phone)}}">
                           
                        </div>
                        <div class="form-group">
                            <label for="email">Email: </label>

                            <input class="form-control" id="email" name="email" type="email" value="{{old('name',$student->email)}}">
                            

                        </div>

                        <div class="form-group">
                            <label for="nationality" >Nationality : </label>
                            
                            <input type="text" value="{{old('name',$student->nationality)}}" name="nationality" id="nationality" class="form-control" required="">
                            
                        </div>
                        <div class="form-group">
                            <label for="state" >State : </label>
                            <input type="text" class="form-control" id='state' name="state" value="{{old('name',$student->state)}}">
                            
                        </div>
                        <div class="form-group">
                            <label for="address" >Address : </label>
                            <input type="text" class="form-control" id='address' name="address" value="{{old('name',$student->address)}}">
                            
                        </div>
                        <div class="form-group">
                            <label for="post_code" >Post code : </label>
                            <input type="text" class="form-control" id='post_code' name="post_code" value="{{old('name',$student->post_code)}}">
                            
                        </div>
                        <div class="form-group">
                            <label for="dob" >Date of Birth : </label>
                            <input type="date" class="form-control" id='dob' name="dob" value="{{old('name',$student->dob)}}">
                            
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Update Student</button>
                        </div>
                    </form> 
</div>
</div>
</section> 


@endsection