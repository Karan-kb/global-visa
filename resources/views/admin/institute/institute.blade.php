@extends('layouts.admin')
@section('title')
Institutes    
@endsection
@section('content')
    <!-- Content Header (Institute header) -->
    <section class="content-header">
      <h1>
      Institutes
        <small>Add/Modify Institute</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Institutes</a></li>
       
      </ol>
    </section>

        

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">


          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Institutes Details</h3>
            </div>

            <div class="text-right mb-3 mr-2">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addMenuModal" data-backdrop="static" data-keyboard="false">
                <i class="fa fa-plus"></i> &nbsp; Add Institute
                </button>
            </div>
            
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>S.N.</th>
                    <th>Institute Name</th>
                    <th>Cover</th>
                    <th>Description</th>
                    <th>Course List</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($institute as $institute)
                    <tr>
                        <td>{{$institute->id}}</td>
                        <td>{{$institute->name}}</td>
                        <td><img src="storage/institute/{{$institute->image}}" class="img-fluid" width="50px" height="50px"></td>
                        <td>{!! Str::limit($institute->body, 200) !!}</td>
                        <td>
                        <?php 
                            $c=$institute->course;
                            $c= explode(",", $c);
                            foreach($c as $crs){ ?>
                             <li><?php echo $crs; ?> </li>   
                          <?php  }

                         ?> 
                        </td>
                        <td>
                            <a href="/institute/{{$institute->id}}/edit" style="border-radius:50%" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                         </td>
                         <td>   
                            <form method="post" action="/institute/{{$institute->id}}">
                              @csrf
                              @method('DELETE')
                                <button style="border-radius:50%" onclick="return confirm('Are You Sure...Do you want to delete this institute?')" class="btn btn btn-danger"> <i class="fa fa-trash"></i></button>
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


       
<!--  START ADD Institute MODAL -->
<div class="modal fade" id="addMenuModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-center" id="exampleModalLabel">Add Institute</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form action="{{route('institute.store')}}" method="POST" class="form-container" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Name*</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter Institute Name" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Address*</label>
                            <input type="text" class="form-control" name="address" placeholder="Enter Full Address Name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email*</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter Valid  Email" required>
                        </div>
                        <div class="form-group">
                            <label for="Contact">Contact*</label>
                            <input type="text" class="form-control" name="contact" placeholder="Enter Contact Number" required>
                        </div>
                        <div class="form-group">
                            <label>Select Album</label>
                            <select class="form-control" name="album_id">
                                <option>None</option>
                                @foreach($album as $album)
                                    <option value="{{$album->id}}">{{$album->title}}</option>
                                @endforeach
                            </select>
                        </div>

                        
                    <div class="form-group">
                      <label for="title">Courses</label> <br>
                      
                          <input type="checkbox" name="course[]" value="MBA">  MBA&nbsp;
                          <input type="checkbox" name="course[]" value="BBA">  BBA&nbsp;
                          <input type="checkbox" name="course[]" value="CIT">  CIT&nbsp;
                          <input type="checkbox" name="course[]" value="BSC">  BSC&nbsp;
                          <input type="checkbox" name="course[]" value="BA">  BA&nbsp;
                          
                       
                   </div> 
                        <div class="form-group">
                            <label for="body">Description</label>
                            <textarea name="body" id="editor" class="form-control" id="" cols="30" rows="10" placeholder="Enter page content..."></textarea>
                        </div>
                        <div class="form-group">
                            <label for="file">Select Institute Image</label>
                            <input class="form-control-file form-control" name="banner" type="file" id="file" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*" >
                            <small class="form-text text-muted" id="fileHelp">File must be an image</small>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add Institute</button>
                        </div>
                    </form>  
                </div>
            </div>
        </div>
    </div>
<!-- END ADD Institute MODAL -->


 
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