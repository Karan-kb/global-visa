@extends('layouts.admin')
@section('title')
Students    
@endsection
@section('content')
    <!-- Content Header (Brand header) -->
    <section class="content-header">
      <h1>
      Students
        <small>Add/Modify Students</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Students</a></li>
       
      </ol>
    </section>

        

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">


          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Students Details</h3>
            </div>

            <div class="text-right mb-3 mr-2">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addMenuModal" data-backdrop="static" data-keyboard="false">
                <i class="fa fa-plus"></i> &nbsp; Add Students
                </button>
            </div>
            
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                        <th>S.N.</th>
                        <th>Name</th>
                        <th>PP</th>
                        <th>Result</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Nationality</th>
                        <th>State</th>
                        <th>Address</th>                      
                        <th>Docs</th>
                        <th>Edit</th>
                        <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @if($students)
                        @php($k=1)
                            @foreach($students as $item)
                                <tr>
                                    <td>{{$k++}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>
                                        @if($item->image)
                                        <img src="/storage/crm/{{$item->image}}" width="100">
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{url('student-previous-courses/'.$item->id)}}">view</a>
                                        
                                    </td>
                                    <td>{{$item->phone}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->nationality}}</td>
                                    <td>{{$item->state}}</td>
                                    <td>{{$item->address}}</td>                                   
                                    <td>
                                    <a href="{{url('multiple-documents/'.$item->id)}}">{{($item->documents->count())?"Doc":"Add Doc"}}</a>
                                    </td>
                                    <td>
                                    
                                        <a href="{{url('students/'.$item->id.'/edit')}}" style=" border-radius:50%;" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                    </td>

                                    <td>
                                        <form method="post" action="{{url('students/'.$item->id)}}">
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
                    <h3 class="modal-title text-center" id="exampleModalLabel">Add Students</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form action="{{route('students.store')}}" method="POST" class="form-container" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name" >Name: </label>
                            <input type="text" class="form-control" id='name' name="name" value="{{old('name')}}">
                           
                        </div>

                        <div class="form-group">
                            <label for="image" class="col-3">Image: </label>

                            <input type="file" name="banner" id="image" accept="image/*">
                            <img src="" id="img" width="50px"  alt=""/>
                        </div>

                        <div class="form-group">
                            <label for="phone" >Phone : </label>
                            <input type="text" class="form-control" id='phone' name="phone" value="{{old('phone')}}">
                           
                        </div>
                        <div class="form-group">
                            <label for="email">Email: </label>

                            <input class="form-control" id="email" name="email" type="email" value="{{old('email')}}">
                            

                        </div>

                        <div class="form-group">
                            <label for="nationality" >Nationality : </label>
                            
                            <input type="text" value="{{old('nationality')}}" name="nationality" id="nationality" class="form-control" required="">
                            
                        </div>
                        <div class="form-group">
                            <label for="state" >State : </label>
                            <input type="text" class="form-control" id='state' name="state" value="{{old('state')}}">
                            
                        </div>
                        <div class="form-group">
                            <label for="address" >Address : </label>
                            <input type="text" class="form-control" id='address' name="address" value="{{old('address')}}">
                            
                        </div>
                        <div class="form-group">
                            <label for="post_code" >Post code : </label>
                            <input type="text" class="form-control" id='post_code' name="post_code" value="{{old('post_code')}}">
                            
                        </div>
                        <div class="form-group">
                            <label for="dob" >Date of Birth : </label>
                            <input type="date" class="form-control" id='dob' name="dob" value="{{old('dob')}}">
                            
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