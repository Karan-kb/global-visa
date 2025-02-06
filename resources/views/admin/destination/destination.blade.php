@extends('layouts.admin')
@section('title')
Destination    
@endsection
@section('content')
    <!-- Content Header (Destination header) -->
    <section class="content-header">
      <h1>
      Destination
        <small>Add/Modify Destination</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Destination</a></li>
       
      </ol>
    </section>

        

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">


          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Destination Details</h3>
            </div>

            <div class="text-right mb-3 mr-2">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addMenuModal" data-backdrop="static" data-keyboard="false">
                <i class="fa fa-plus"></i> &nbsp; Add Destination
                </button>
            </div>
            
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>S.N.</th>
                    <th>Name</th>
                    <th>About</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($destination as $destination)
                    <tr>
                        <td>{{$destination->id}}</td>
                        <td>{{$destination->name}}</td>
                        
                        <td>{!! Str::limit($destination->body, 200) !!}</td>
                        <td>
                            <a href="/destination/{{$destination->id}}/edit" style="border-radius:50%" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                         </td>
                         <td>   
                            <form method="post" action="/destination/{{$destination->id}}">
                              @csrf
                              @method('DELETE')
                                <button  style="border-radius:50%" onclick="return confirm('Are You Sure...Do you want to delete this Destination?')" class="btn btn btn-danger"> <i class="fa fa-trash"></i></button>
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
                    <h3 class="modal-title text-center" id="exampleModalLabel">Add Destination</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form action="{{route('destination.store')}}" method="POST" class="form-container" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Name*</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter Destination Name" required>
                        </div>
                        <div class="form-group">
                            <label for="body">About</label>
                            <textarea name="body" id="editor" class="form-control" id="" cols="30" rows="10" placeholder="Enter page content..."></textarea>
                        </div>
                        <div class="form-group">
                            <label for="order">Order*</label>
                            <input type="number" class="form-control" min="1" name="order" placeholder="Enter Order of Appearance" required>
                        </div>
                        <div class="form-group">
                            <label for="file">Select Destination Image</label>
                            <input class="form-control-file form-control" name="banner" type="file" id="file" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*" >
                            <small class="form-text text-muted" id="fileHelp">File must be an image</small>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add Destination</button>
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