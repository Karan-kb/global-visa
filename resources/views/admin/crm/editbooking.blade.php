@extends('layouts.admin')
@section('title')
Registration    
@endsection
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
      Registration
        <small>Edit Registration</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Registration</a></li>
       
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
    <form action="/bookings/{{$bookings->id}}" method="POST" class="form-container" enctype="multipart/form-data">
    @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="student_id" >Select Student : </label>
                            
                            <select name="student_id" id="student_id" class="form-control">
                                @foreach($students as $student)
                                <option value="{{$student->id}}" <?php if($bookings->student_id==$student->id) echo'selected'?>>{{$student->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="course_id" >Select  Course: </label>
                            
                            <select name="course_id" id="course_id" class="form-control">
                                @foreach($courses as $course)
                                <option value="{{$course->id}}" <?php if($bookings->course_id==$course->id) echo'selected'?>>{{$course->title}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="start_date" >Start Date : </label>
                            <input type="date" class="form-control" id='start_date' name="start_date" value="{{old('start_date',$bookings->start_date)}}">
                            
                        </div>

                        <div class="form-group">
                            <label for="package" >Select Package : </label>
                            
                            <select name="package" id="package" class="form-control">   
                                @foreach($package as $package)
                                <option value="{{$package->id}}" <?php if($bookings->package_id==$package->id) echo'selected'?>>{{$package->title}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="previous_score" >Previous Score : </label>
                            <input type="text" class="form-control" id='previous_score' name="previous_score" value="{{old('previous_score',$bookings->previous_score)}}">
                            
                        </div>

                        <div class="form-group">
                            <label for="attempts" >Attempts : </label>
                            <input type="text" class="form-control" id='attempts' name="attempts" value="{{old('previous_score',$bookings->attempts)}}">
                            
                        </div>                        

                        <div class="form-group">
                            <label for="comment" >Comment : </label>
                            <input type="text" class="form-control" id='comment' name="comment" value="{{old('previous_score',$bookings->comment)}}">
                           
                        </div>

                        <div class="form-group">
                            <label for="status" >Status : </label>
                            
                            <select name="status" id="status" class="form-control">   
                                <option value="pending" {{('pending' == old('status',$bookings->status))?'selected':''}}>pending</option>
                                <option value="confirmed" {{('confirmed' == old('status',$bookings->status))?'selected':''}}>confirmed</option>
                                <option value="completed" {{('completed' == old('status',$bookings->status))?'selected':''}}>completed</option>
                                <option value="canceled" {{('canceled' == old('status',$bookings->status))?'selected':''}}>canceled</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Update booking</button>
                        </div>
                    </form> 
</div>
</div>
</section> 


@endsection