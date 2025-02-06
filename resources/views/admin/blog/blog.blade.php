@extends('layouts.admin')
@section('title')
Blogs    
@endsection
@section('content')
    <!-- Content Header (Blog header) -->
    <section class="content-header">
      <h1>
        Blog
        <small>Add/Modify Blog</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Blog</a></li>
       
      </ol>
    </section>

        

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">


          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Blog Details</h3>
            </div>

            <div class="text-right mb-3 mr-2">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addMenuModal" data-backdrop="static" data-keyboard="false">
                <i class="fa fa-plus"></i> &nbsp; Add Blog
                </button>
            </div>
            
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th>S.N.</th>
                
                    <th>Title</th>
                    <th>Category</th>
                    <th>Location</th>
                    <th>Content</th>
                    <th>Featured</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($blog as $blogs)
                    <tr>
                        <td>{{$blogs->id}}</td>
                        <td>{{$blogs->title}}</td>
                        <td>{{$blogs->category->name}}</td>
                        <td>{{$blogs->location}}</td>
                        <td>{!! Str::limit($blogs->body, 200) !!}</td>
                        <td>
                            <?php 
                                  if($blogs->featured=='no')
                                  {
                                    echo 'not featured';
                                  }  
                                  else
                                  {
                                    echo 'featured';
                                  } 
                              ?>
                        </td>
                        <td>
                            <a href="/blog/{{$blogs->id}}/edit" style="border-radius:50%" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                          </td>
                          <td>  
                            <form method="post" action="/blog/{{$blogs->id}}">
                              @csrf
                              @method('DELETE')
                                <button style="border-radius:50%" onclick="return confirm('Are You Sure...Do you want to delete this Blog?')" class="btn btn btn-danger"> <i class="fa fa-trash"></i></button>
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
                    <h3 class="modal-title text-center" id="exampleModalLabel">Add Blog</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form action="{{route('blog.store')}}" method="POST" class="form-container" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title*</label>
                            <input type="text" class="form-control" name="title" placeholder="Enter Page Title" required>
                        </div>
                         
                      <div class="form-group">
                        <label for="title">Blog Category *</label> <br>
                        <select name="category" class="form-control cat_dropdown" style="width:100%; height:34px" required>
                        @foreach($category as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                        </select>
                      </div>
                    
                   
                    
                      <div class="form-group">
                        <label for="featured"> Featured ??</label>
                        <select name="featured" class="form-control">
                          <option value="no">Not Featured</option>
                          <option value="yes">Featured</option>
                        </select>
                      </div>
                    
                        <div class="form-group">
                            <label for="location">Location</label>
                            <input type="text" class="form-control" name="location" placeholder="Enter location" >
                        </div>
                        <div class="form-group">
                            <label for="body">Content</label>
                            <textarea name="body" id="editor" class="form-control" id="" cols="30" rows="10" placeholder="Enter page content..."></textarea>
                        </div>

                        <div class="form-group">
                          <label for="body">Short Description</label>
                          <textarea name="short_description" class="form-control ckeditor" id="" cols="30" rows="10" placeholder="Enter Short Description..."></textarea>
                      </div>

                        <div class="form-group">
                            <label for="file">Select Blog Image</label>
                            <input class="form-control-file form-control" name="banner" type="file" id="file" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*" >
                            <small class="form-text text-muted" id="fileHelp">File must be an image</small>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add Blog</button>
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