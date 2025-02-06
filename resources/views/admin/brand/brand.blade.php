@extends('layouts.admin')
@section('title')
Brand    
@endsection
@section('content')
    <!-- Content Header (Brand header) -->
    <section class="content-header">
      <h1>
      Brand
        <small>Add/Modify Brand</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Brand</a></li>
       
      </ol>
    </section>

        

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">


          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Brand Details</h3>
            </div>

            <div class="text-right mb-3 mr-2">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addMenuModal" data-backdrop="static" data-keyboard="false">
                <i class="fa fa-plus"></i> &nbsp; Add Brand
                </button>
            </div>
            
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th>S.N.</th>
                
                    <th>Name</th>
                    <th>Logo</th>
                    <th>url</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($brand as $brand)
                    <tr>
                        <td>{{$brand->id}}</td>
                        <td>{{$brand->name}}</td>
                        <td><img src="storage/brand/{{$brand->image}}" class="img-fluid" width="50px" height="50px"></td>
                        <td>{{$brand->url}}</td>
                        <td>
                           <a href="/brand/{{$brand->id}}/edit" style="border-radius:50%" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                         </td>
                         <td>  
                           <form method="post" action="/brand/{{$brand->id}}">
                              @csrf
                              @method('DELETE')
                                <button style="border-radius:50%" onclick="return confirm('Are You Sure...Do you want to delete this Brand?')" class="btn btn btn-danger"> <i class="fa fa-trash"></i></button>
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
                    <h3 class="modal-title text-center" id="exampleModalLabel">Add Brand</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form action="{{route('brand.store')}}" method="POST" class="form-container" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Name*</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter Brand Name" required>
                        </div>
                        <div class="form-group">
                            <label for="body">url</label>
                            <input type="text" class="form-control" name="url" placeholder="enter url">
                        </div>
                        <div class="form-group">
                            <label for="file">Select Brand Logo</label>
                            <input class="form-control-file form-control" name="banner" type="file" id="file" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*" >
                            <small class="form-text text-muted" id="fileHelp">File must be an image</small>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add Brand</button>
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