@extends('layouts.admin')
@section('title')
Gallery    
@endsection
@section('content')
    <!-- Content Header (Blog header) -->
    <section class="content-header">
      <h1>
      Gallery
        <small>Add/Modify Gallery</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Gallery</a></li>
       
      </ol>
    </section>

        

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">


          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Gallery Details</h3>
            </div>

            <div class="text-right mb-3 mr-2">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addMenuModal" data-backdrop="static" data-keyboard="false">
                <i class="fa fa-plus"></i> &nbsp; Add Album
                </button>
            </div>
            
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>S.N.</th>
                    <th>Album Name</th>
                    <th>Type</th>
                    <th>Cover Image</th>
                    <th>Actions</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($albums as $album)
                    <tr>
                        <td>{{$album->id}}</td>
                        <td>{{$album->title}}</td>
                        <td>{{$album->type}}</td>
                        <td><img src="/storage/gallery/{{$album->cover}}" class="img-fluid" width="50px" width="50px"></td>
                        <td>
                            <a href="/album/{{$album->id}}/edit" style="border-radius:50%" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                            
                            @if($album->type=='Picture')
                            <a href="/album/addphotos/{{$album->id}}" style="border-radius:50%" class="btn btn-sm btn-success"><i class="fa fa-plus"></i></a>                                
                            @else
                            <a href="#" class="text-dark"><i class="fas fa-plus"></i></a>                             
                            @endif
                            <a href="/media/{{$album->id}}" style="border-radius:50%" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a> 
                            
                            </td>
                            <td>
                            <form method="post" action="/album/{{$album->id}}">
                              @csrf
                              @method('DELETE')
                                <button style="border-radius:50%" onclick="return confirm('Are You Sure...Do you want to delete this Album?')" class="btn btn-sm btn-danger"> <i class="fa fa-trash"></i></button>
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
                    <h3 class="modal-title text-center" id="exampleModalLabel">Create Album</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form action="{{route('album.store')}}" method="POST" class="form-container" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title*</label>
                            <input type="text" class="form-control" name="title" placeholder="Enter Album Title" required>
                        </div>
                        <div class="form-group">
                            <label for="type">Album type*</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="type" value="Picture" checked>
                                <label class="form-check-label">
                                    Picture
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="type" value="Video">
                                <label class="form-check-label">
                                    Video
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cover">Select Cover Image*</label>
                            <input class="form-control-file" name="cover" type="file" id="file" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*" required>
                            <small class="form-text text-muted" id="fileHelp">File must be an image</small>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add Album</button>
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