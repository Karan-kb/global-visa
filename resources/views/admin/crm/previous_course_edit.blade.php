@extends('layouts.admin')
@section('title')
Previous Course Edit    
@endsection
@section('content')
<div class="container">
<div class="row">
        <div class="col-md-11">
            <div class="box">
                <h4 class="text-center">Edit Score :</h4>
                <hr>
            </div>

            <div class="box">
                <div class="box-body">
                    <form method="post" action="{{ url('previous-courses/'.$previous_course->id)}}" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf

                        <div class="form-group col-md-6">
                            <label for="student_id" >Select Student : </label>
                            @error('student_id')
                            <span>{{$message}}</span>
                            @enderror
                            <select name="student_id" id="student_id" class="form-control form-control-sm">
                                @foreach($students as $student)
                                <option value="{{$student->id}}" {{($student->id == old('student_id',$previous_course->student->id))?'selected':''}}>{{$student->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="name" >Course Name: </label>
                            <input type="text" class="form-control form-control-sm" id='name' name="name" value="{{old('name',$previous_course->name)}}">
                            @error('name')
                            <span>{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="reading" >Reading : </label>
                            <input type="text" class="form-control form-control-sm" id='reading' name="reading" value="{{old('reading',$previous_course->reading)}}">
                            @error('reading')
                            <span>{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="writing" >Writing : </label>
                            <input type="text" class="form-control form-control-sm" id='writing' name="writing" value="{{old('writing',$previous_course->writing)}}">
                            @error('writing')
                            <span>{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="listening" >Listening : </label>
                            <input type="text" class="form-control form-control-sm" id='listening' name="listening" value="{{old('listening',$previous_course->listening)}}">
                            @error('listening')
                            <span>{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="speaking" >Speaking : </label>
                            <input type="text" class="form-control form-control-sm" id='speaking' name="speaking" value="{{old('speaking',$previous_course->speaking)}}">
                            @error('speaking')
                            <span>{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="attempts" >Attempts : </label>
                            <input type="text" class="form-control form-control-sm" id='attempts' name="attempts" value="{{old('attempts',$previous_course->attempts)}}">
                            @error('attempts')
                            <span>{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="result" >Result : </label>
                            <input type="file" class="form-control form-control-sm" id='result' name="result" accept="image/*">
                            @error('result')
                            <span>{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="remarks" >Remarks : </label>
                            <input type="text" class="form-control form-control-sm" id='remarks' name="remarks" row="3" value="{{old('remarks',$previous_course->remarks)}}">
                            @error('remarks')
                            <span>{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="publish" >Publish : </label>
                            <div class="form-control">                                
                            <input type="radio" id="publish_false" name="publish"  value="0" {{(0==old('publish',$previous_course->publish))?'checked':''}}>
                             <label for="publish_false" >No  </label>
                            <input type="radio" id="publish_true" name="publish"  value="1" {{(1==old('publish',$previous_course->publish))?'checked':''}}>
                             <label for="publish_true" >Yes </label>
                            </div>
                            @error('publish')
                            <span>{{$message}}</span>
                            @enderror
                        </div>


                        <div class="form-group col-md-12">
                            <button class="btn btn-success" type="submit">Submit</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    

    <script>

        $('.crm').addClass('active');
        $('.previous_course').addClass('active');

    </script>


@endsection
