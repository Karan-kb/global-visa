@extends('layouts.admin')
@section('title')
Services    
@endsection
@section('content')
    <!-- Content Header (Blog header) -->
    <section class="content-header">
      <h1>
        Service
        <small>Add/Modify Service</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Service</a></li>
       
      </ol>
    </section>

        

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">


          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Service Details</h3>
            </div>

            <div class="text-right mb-3 mr-2">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addMenuModal" data-backdrop="static" data-keyboard="false">
                <i class="fa fa-plus"></i> &nbsp; Add Service
                </button>
            </div>
            
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th>S.N.</th>
                
                    <th>Service Name</th>
                    <th>Image</th>
                    <th>Description</th>
                    {{-- <th>Icon</th> --}}
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($service as $service)
                    <tr>
                        <td>{{$service->id}}</td>
                        <td>{{$service->title}}</td>
                        <td><img src="storage/services/{{$service->image}}" class="img-fluid" width="50px" height="50px"></td>
                        <td>{!! Str::limit($service->body, 200) !!}</td>
                        {{-- <th><img src="storage/services/icon/{{$service->icon}}" class="img-fluid" width="50px" height="50px"></th> --}}
                        
                        <td>
                            <a href="/service/{{$service->id}}/edit" style="border-radius:50%" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                         </td>
                         <td>   
                            <form method="post" action="/service/{{$service->id}}">
                              @csrf
                              @method('DELETE')
                                <button style="border-radius:50%" onclick="return confirm('Are You Sure...Do you want to delete this Service?')" class="btn btn btn-danger"> <i class="fa fa-trash"></i></button>
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
                    <h3 class="modal-title text-center" id="exampleModalLabel">Add Services</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form action="{{route('service.store')}}" method="POST" class="form-container" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Service Name*</label>
                            <input type="text" class="form-control" name="title" placeholder="Enter Page Title" required>
                        </div>
                        <div class="form-group">
                            <label for="body">Description</label>
                            <textarea name="body" id="editor" class="form-control" id="" cols="30" rows="10" placeholder="Enter page content..."></textarea>
                        </div>
                        <div class="form-group">
                            <label for="order">Order*</label>
                            <input type="number" class="form-control" min="1" name="order"  placeholder="Enter Order of Appearance" required>
                        </div>
                        <div class="form-group">
                            <label for="file">Select Service Image</label>
                            <input class="form-control-file form-control" name="banner" type="file" id="file" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*" >
                            <small class="form-text text-muted" id="fileHelp">File must be an image</small>
                        </div>
                        {{-- <div class="form-group">
                            <label for="file">Select Service Icon</label>
                            <input class="form-control-file form-control" name="icon" type="file" id="file" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*" >
                            <small class="form-text text-muted" id="fileHelp">File must be an image</small>
                        </div> --}}
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add Services</button>
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