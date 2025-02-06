@extends('layouts.admin')
@section('title')
{{$student->name}} Result   
@endsection
@section('content')

<div class="container">
<div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body text-center">                    
                    <h3>Student : {{$student->name}}</h3>                                  
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-7">
            <div class="box">
                <div class="box-body">
                    <table id="table_list" class="table table-bordered">
                        <thead>
                        <th>S.N.</th>
                        <th>Course Name</th>
                        <th>R</th>
                        <th>W</th>
                        <th>L</th>
                        <th>S</th>
                        <th>Total</th>
                        <th>Try</th>
                        <th>Result</th>
                        <th>Publish</th>
                        <th>Remarks</th>
                        <th>Edit</th>
                        <th>Delete</th>

                        </thead>
                        <tbody>


                        @if($previous_courses)
                            @foreach($previous_courses as $key=>$item)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->reading}}</td>
                                    <td>{{$item->writing}}</td>
                                    <td>{{$item->listening}}</td>
                                    <td>{{$item->speaking}}</td>
                                    <td>{{$item->reading + $item->writing + $item->listening + $item->speaking}}</td>
                                    <td>{{$item->attempts}}</td>
                                    <td>
                                        @if($item->result)
                                        <img src="{{url('storage/crm/result/'.$item->result)}}" style="height:50px; width:50px;" alt="image">
                                        @endif
                                    </td>
                                    <td>{{($item->publish)?"Yes":"No"}}</td>
                                    <td>{{$item->remarks}}</td>

                                    <td><a href="{{url('previous-courses/'.$item->id.'/edit')}}" style="border-radius:50%" class="btn btn-success"><i class="fa fa-edit"></i></a></td>

                                    <td>
                                        <form method="post" action="{{url('previous-courses/'.$item->id)}}">
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
            </div>
        </div>
        <div class="col-md-4">
            <div class="box">                
            <div class="box-body">
                <h4>Add Course Score</h4>
                    <form method="post" action="{{ url('previous-courses')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            @error('student_id')
                            <span>{{$message}}</span>
                            @enderror
                            <input name="student_id" id="student_id" value="{{$student->id}}" hidden>
                        </div>

                        <div class="form-group">
                            <label for="name" >Course Name: </label>
                            <input type="text" class="form-control form-control-sm" id='name' name="name" value="{{old('name')}}">
                            @error('name')
                            <span>{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-3">
                            <label for="reading" >Reading</label>
                            <input type="text" class="form-control form-control-sm" id='reading' name="reading" value="{{old('reading')}}">
                            @error('reading')
                            <span>{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-3">
                            <label for="writing" >Writing</label>
                            <input type="text" class="form-control form-control-sm" id='writing' name="writing" value="{{old('writing')}}">
                            @error('writing')
                            <span>{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-3">
                            <label for="listening" >Listening</label>
                            <input type="text" class="form-control form-control-sm" id='listening' name="listening" value="{{old('listening')}}">
                            @error('listening')
                            <span>{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-3">
                            <label for="speaking" >Speaking</label>
                            <input type="text" class="form-control form-control-sm" id='speaking' name="speaking" value="{{old('speaking')}}">
                            @error('speaking')
                            <span>{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="attempts" >Attempts : </label>
                            <input type="text" class="form-control form-control-sm" id='attempts' name="attempts" value="{{old('attempts')}}">
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
                            <input type="text" class="form-control form-control-sm" id='remarks' name="remarks" row="3" value="{{old('remarks')}}">
                            @error('remarks')
                            <span>{{$message}}</span>
                            @enderror
                        </div>                        

                        <div class="form-group col-md-6">
                            <label for="publish" >Publish : </label>
                            <div class="form-control">                                
                            <input type="radio" id="publish_false" name="publish"  value="0">
                             <label for="publish_false" >No  </label>
                            <input type="radio" id="publish_true" name="publish"  value="1">
                             <label for="publish_true" >Yes  </label>
                            </div>
                            @error('publish')
                            <span>{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <button class="btn btn-success" type="submit">Submit</button>
                            <button class="btn btn-danger" type="reset">Reset</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
    


    <script>
        $(document).ready(function() {
            $('#table_list').DataTable( {
                "scrollX": true
            } );
        } );
        $('.crm').addClass('active');
        $('.student').addClass('active');
    </script>
@endsection
