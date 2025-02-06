@extends('layouts.admin')
@section('title')
Documents    
@endsection
@section('content')
<div class="container">
<div class="row">
            <div class="box">
                <h4 class="text-center">Documents of {{$student->name}}:</h4>
                <hr>
            </div>
        <div class="col-md-5">
            <div class="box">
                <div class="box-body">
                    <table id="table_list" class="table table-bordered">
                        <thead>
                        <th>S.N.</th>
                        <th>Flename</th>
                        <th>Type</th>
                        <th>Description</th>
                        <th>Edit</th>
                        <th>Delete</th>

                        </thead>
                        <tbody>

                        @foreach($student->documents as $key=>$item)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>
                                    @if($item->filename)
                                    @if($item->type == "image")
                                     <img src="{{asset('/storage/crm/docs/'.$item->filename)}}" width="100" alt="image">
                                     @else
                                     <a href="{{asset('/storage/crm/docs/'.$item->filename)}}" target="_blank"> View File</a>
                                     @endif
                                     @endif
                                    
                                </td>
                                <td>{{$item->type}}</td>
                                <td>{{$item->description}}</td>

                                <td><a href="{{url('documents/'.$item->id.'/edit')}}" style="border-radius:50%" class="btn btn-success"><i class="fa fa-edit"></i></a></td>

                                <td>
                                    <form method="post" action="{{url('documents/'.$item->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button style="border-radius:50%" onclick="return confirm('Do you want to delete this?')" class="btn btn-danger"> <i class="fa fa-trash"></i></button>
                                    </form>
                                </td>

                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-5">

            <div class="box">
                <div class="box-body">
                    <h4 class="text-center">Add Document for {{$student->name}}:</h4>
                    <form method="post" action="{{ url('documents')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group col-md-12">
                           
                            <input type="integer" hidden="true" name="student_id" id="student_id" value={{$student->id}}>
                        </div>


                        <div class="form-group col-md-6">
                            <label for="filename" class="col-3">File: </label>
                            <input type="file" name="filename" id="filename" value="{{old('filename')}}" accept="file/*">
                            
                        </div>

                        <div class="form-group col-md-6">
                            <label for="description" >Description : </label>
                            <input type="text" class="form-control form-control-sm" id='description' name="description" value="{{old('description')}}">
                            
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
        $('.document').addClass('active');

    </script>


@endsection
