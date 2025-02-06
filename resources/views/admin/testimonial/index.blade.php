@extends('layouts.admin')
@section('title')
Testimonials    
@endsection
@section('content')
    <!-- Content Header (Testimonial header) -->
    <section class="content-header">
      <h1>
      Testimonial
        <small>Add/Modify Testimonial</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Testimonial</a></li>
       
      </ol>
    </section>

        

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">


          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Testimonial Details</h3>
            </div>

            <div class="text-right mb-3 mr-2">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addMenuModal" data-backdrop="static" data-keyboard="false">
                <i class="fa fa-plus"></i> &nbsp; Add Testimonials
                </button>
            </div>
            
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>S.N.</th>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>Content</th>
                    <th>Status</th>
                    <th>Image</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($testimonials as $testimonial)
                        <tr>
                            <td>{{$testimonial->id}}</td>
                            <td>{{$testimonial->name}}</td>
                            <td>{{$testimonial->about}}</td>
                            <td>{!!$testimonial->body!!}</td>
                            <td>{{$testimonial->status?'Active':'Hidden'}}</td>
                            <td><img src="/storage/testimonials/{{$testimonial->image}}" class="img-fluid" width="50px" width="50px"></td>
                            <td>
                                <a href="/testimonial/{{$testimonial->id}}/edit" style="border-radius:50%" class="btn btn-sm btn-warning"><i class="fa fa-edit "></i></a>
                             </td>
                             <td>   
                                <form method="post" action="/testimonial/{{$testimonial->id}}">
                              @csrf
                              @method('DELETE')
                                <button style="border-radius:50%" onclick="return confirm('Are You Sure...Do you want to delete this Testimonial?')" class="btn btn btn-danger"> <i class="fa fa-trash"></i></button>
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
                    <h3 class="modal-title text-center" id="exampleModalLabel">Create Testimonials</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form action="{{route('testimonial.store')}}" method="POST" class="form-container" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body"> 
                            <div class="form-group">
                                <label for="name">Name*</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter Person's name" required>
                            </div>
                            <div class="form-group">
                                <label for="name">About*</label>
                                <input type="text" class="form-control" name="about" placeholder="Enter Person's designation" required>
                            </div>
                            <div class="form-group">
                                <label for="body">Body*</label>
                                <textarea name="body" cols="30" rows="10" placeholder="Enter testimonial content..." id="editor" class="form-control" required></textarea>
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
                                <label for="image">Select Testimonial Image*</label>
                                <input class="form-control" name="image" type="file" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*" required>
                                <small class="form-text text-muted" >File must be an image</small>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add Testimonial</button>
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