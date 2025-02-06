@extends('layouts.admin')
@section('title')
Program    
@endsection
@section('content')
    <!-- Content Header (Package header) -->
    <section class="content-header">
      <h1>
      Program
        <small>Add/Modify Program</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Program</a></li>
       
      </ol>
    </section>

        

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">


          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Program Details</h3>
            </div>

            <div class="text-right mb-3 mr-2">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addMenuModal" data-backdrop="static" data-keyboard="false">
                <i class="fa fa-plus"></i> &nbsp; Add Program
                </button>
            </div>
            
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>S.N.</th>
                    <th>Title</th>
                    <th>Location</th>
                    <th>Content</th>
                    <th>Status</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($package as $package)
                    <tr>
                        <td>{{$package->id}}</td>
                        <td>{{$package->title}}</td>
                        <td>{{$package->location}}</td>
                        <td>{!! Str::limit($package->body, 200) !!}</td>
                        <td>{{$package->status?'Active':'Hidden'}}</td>
                        <td>
                            <a href="/package/{{$package->id}}/edit" style="border-radius:50%"  class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
                         </td>
                         <td>   
                            <form method="post" action="/package/{{$package->id}}">
                              @csrf
                              @method('DELETE')
                                <button style="border-radius:50%" onclick="return confirm('Are You Sure...Do you want to delete the package?')" class="btn btn btn-danger"> <i class="fa fa-trash"></i></button>
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
                    <h3 class="modal-title text-center" id="exampleModalLabel">Add Program</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form action="{{route('package.store')}}" method="POST" class="form-container" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title*</label>
                            <input type="text" class="form-control" name="title" placeholder="Enter Program Title" required>
                        </div>
                        <div class="form-group">
                            <label for="location">Location*</label>
                            <input type="text" class="form-control" name="location" placeholder="Enter Location" required>
                        </div>
                        <div class="form-group">
                            <label for="body">Content</label>
                            <textarea name="body" id="editor" class="form-control" id="" cols="30" rows="10" placeholder="Enter Program content..."></textarea>
                        </div>
                         <div class="form-group">
                                <label for="type">Status*</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" value="1" checked>
                                    <label class="form-check-label">
                                        Active
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" value="0">
                                    <label class="form-check-label">
                                        Hidden
                                    </label>
                                </div>
                            </div>
                        <div class="form-group">
                            <label for="file">Select Program Image</label>
                            <input class="form-control-file form-control" name="banner" type="file" id="file" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*" >
                            <small class="form-text text-muted" id="fileHelp">File must be an image</small>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add Program</button>
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