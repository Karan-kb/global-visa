@extends('layouts.admin')
@section('title')
Registration    
@endsection
@section('content')
    <!-- Content Header (Brand header) -->
    <section class="content-header">
      <h1>
      Registration
        <small>Add/Modify Registration</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Registration</a></li>
       
      </ol>
    </section>

        

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">


          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Registration Details</h3>
            </div>

            <div class="text-right mb-3 mr-2">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addMenuModal" data-backdrop="static" data-keyboard="false">
                <i class="fa fa-plus"></i> &nbsp; Add Registration
                </button>
            </div>
            
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                        <th>S.N.</th>
                        <th>Student Name</th>
                        <th>Course Name</th>
                        <th>Start_at</th>
                        <th>Package</th>
                        <th>Comment</th>
                        <th>Previous Score</th>
                        <th>Attempts</th>
                        <th>Status</th>
                        <th>Edit</th>
                        <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @if($bookings)
                            @foreach($bookings as $key=>$item)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$item->student->name}}</td>
                                    <td>{{$item->course->title}}</td>
                                    <td>{{$item->start_date}}</td>
                                    <td>{{$item->package->title}}</td>
                                    <td>{{$item->comment}}</td>
                                    <td>{{$item->previous_score}}</td>
                                    <td>{{$item->attempts}}</td>
                                    <td>{{$item->status}}</td>

                                    <td><a href="{{url('bookings/'.$item->id.'/edit')}}" style="border-radius:50%" class="btn btn-success"><i class="fa fa-edit"></i></a></td>

                                    <td>
                                        <form method="post" action="{{url('bookings/'.$item->id)}}">
                                            @csrf
                                            @method('DELETE')
                                            <button style="border-radius:50%" onclick="return confirm('Do you want to delete this?')" class="btn btn-danger"> <i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>

                                </tr>
                            @endforeach
                        @endif
                
                </tbody>
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->


       
<!--  START ADD MENU MODAL -->
<div class="modal fade" id="addMenuModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-center" id="exampleModalLabel">Add Registration</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form action="{{route('bookings.store')}}" method="POST" class="form-container" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="student_id" >Select Student : </label>
                            
                            <select name="student_id" id="student_id" class="form-control">
                                @foreach($students as $student)
                                <option value="{{$student->id}}" {{($student->id == old('student_id'))?'selected':''}}>{{$student->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="course_id" >Select  Course: </label>
                            
                            <select name="course_id" id="course_id" class="form-control">
                                @foreach($courses as $course)
                                <option value="{{$course->id}}" {{($course->id == old('course_id'))?'selected':''}}>{{$course->title}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="start_date" >Start Date : </label>
                            <input type="date" class="form-control" id='start_date' name="start_date" value="{{old('start_date')}}">
                            
                        </div>

                        <div class="form-group">
                            <label for="package" >Select Package : </label>
                            
                            <select name="package" id="package" class="form-control">   
                               <option value="">--Select Package--</option>
                            @foreach ($package as $item)
                                          <option value="{{ $item->id }}">{{ $item->title }}</option>
                            @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="previous_score" >Previous Score : </label>
                            <input type="text" class="form-control" id='previous_score' name="previous_score" value="{{old('previous_score')}}">
                            
                        </div>

                        <div class="form-group">
                            <label for="attempts" >Attempts : </label>
                            <input type="text" class="form-control" id='attempts' name="attempts" value="{{old('attempts')}}">
                            
                        </div>                        

                        <div class="form-group">
                            <label for="comment" >Comment : </label>
                            <input type="text" class="form-control" id='comment' name="comment" value="{{old('comment')}}">
                           
                        </div>

                        <div class="form-group">
                            <label for="status" >Status : </label>
                            
                            <select name="status" id="status" class="form-control">   
                                <option value="pending" {{('pending' == old('status'))?'selected':''}}>pending</option>
                                <option value="confirmed" {{('confirmed' == old('status'))?'selected':''}}>confirmed</option>
                                <option value="completed" {{('completed' == old('status'))?'selected':''}}>completed</option>
                                <option value="canceled" {{('canceled' == old('status'))?'selected':''}}>canceled</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-success" type="submit">Submit</button>
                            <button class="btn btn-danger" type="reset">Reset</button>

                        </div>
                    </form>  
                </div>
            </div>
        </div>
    </div>
<!-- END ADD MENU MODAL -->


 
<!-- page script -->
<script>
  $(function () {
    
    $('#example1').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

@endsection