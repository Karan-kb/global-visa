@extends('layouts.admin')
@section('title')
All Users    
@endsection
@section('content')
    <!-- Users Header (Users header) -->
    <section class="content-header">
      <h1>
      Users
        <small>Add/Modify Users</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Users</a></li>
       
      </ol>
    </section>

        

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">


          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Users Details</h3>
            </div>

            <div class="text-right mb-3 mr-2">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addMenuModal" data-backdrop="static" data-keyboard="false">
                <i class="fa fa-plus"></i> &nbsp; Add Users
                </button>
            </div>
            
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>S.N.</th>
                    <th>Name</th>
                    <th>Email</th>
                    
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($user as $users)
                        <tr>
                            <td>{{$users->id}}</td>
                            <td>{{$users->name}}</td>
                            <td>{{$users->email}}</td>
                            
                            <td>
                                <a href="/user/{{$users->id}}/edit" style="border-radius:50%" class="btn btn-sm btn-warning"><i class="fa fa-edit "></i></a>
                             </td>
                             <td>   
                                <form method="post" action="/user/{{$users->id}}">
                              @csrf
                              @method('DELETE')
                                <button style="border-radius:50%" onclick="return confirm('Are You Sure...Do you want to delete this User?')" class="btn btn btn-danger"> <i class="fa fa-trash"></i></button>
                              </form>
                            </td>
                        </tr>
                    @endforeach
                
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
                    <h3 class="modal-title text-center" id="exampleModalLabel">Create Users</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form action="{{route('user.store')}}" method="POST" class="form-container" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body"> 
                            <div class="form-group">
                                <label for="name">Name*</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter User's name" required>
                            </div>
                            <div class="form-group">
                                <label for="name">Email*</label>
                                <input id="email" class="form-control" type="email" name="email" :value="old('email')" required />
                            </div>
                            <div class="form-group">
                                <label for="body">password*</label>
                                <input id="password" class="form-control"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
                            </div>
                            <div class="form-group">
                                <label for="body">Confirm password*</label>
                                <x-input id="password_confirmation" class="form-control"
                                type="password"
                                name="password_confirmation" required />
                            </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add Users</button>
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