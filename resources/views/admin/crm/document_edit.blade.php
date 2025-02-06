@extends('layouts.admin')
@section('title')
Edit Document    
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <h4 class="text-center">Add Document :</h4>
                <hr>
            </div>

            <div class="box">
                <div class="box-body">
                    <form method="post" action="{{ url('documents/'.$document->id)}}" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <div class="form-group col-md-12">
                            <label for="student_id" >Student : </label>
                            @error('student_id')
                            <span>{{$message}}</span>
                            @enderror
                            <select name="student_id" id="student_id" class="form-control form-control-sm">
                                @foreach($students as $student)
                                <option value="{{$student->id}}" {{($student->id == old('student_id',$document->student->id))?'selected':''}}>{{$student->name}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group col-md-6">
                            <label for="filename" class="col-3">File: </label>
                            <input type="file" name="filename" id="filename" accept="file/*" value="{{old('filename',$document->filename)}}">
                            @error('filename')
                            <span>{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="description" >Description : </label>
                            <input type="text" class="form-control form-control-sm" id='description' name="description" value="{{old('description',$document->description)}}">
                            @error('description')
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

    <script>

        $('.crm').addClass('active');
        $('.document').addClass('active');

    </script>


@endsection
