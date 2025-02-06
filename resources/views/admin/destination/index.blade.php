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
              <a href="{{ route('destinations.create') }}" class="btn btn-primary"  >
                <i class="fa fa-plus"></i> &nbsp; Add Destination
              </a>
            </div>
            
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>S.N.</th>
                    <th>Title</th>
                    <th>Country</th>
                    <th>Description</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($destinations as $destination)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $destination->title }}</td>
                        <td>{{ $destination->nation->name ?? 'N/A' }}</td>
                        <td>{!! Str::limit($destination->description, 100) !!}</td>
                        <td>
                            <a href="{{ route('destinations.edit', $destination->id) }}" style="border-radius:50%" class="btn btn-sm btn-warning">
                                <i class="fa fa-edit"></i>
                            </a>
                        </td>
                        <td>   
                            <form method="post" action="{{ route('destinations.destroy', $destination->id) }}">
                              @csrf
                              @method('DELETE')
                              <button style="border-radius:50%" onclick="return confirm('Are You Sure...Do you want to delete this Destination?')" class="btn btn btn-danger">
                                <i class="fa fa-trash"></i>
                              </button>
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

    <!-- START ADD MENU MODAL -->
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
                    <form action="{{ route('destinations.store') }}" method="POST" class="form-container" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title*</label>
                            <input type="text" class="form-control" name="title" placeholder="Enter Destination Title" required>
                        </div>
                        <div class="form-group">
                            <label for="country">Country*</label>
                            <input type="text" class="form-control" name="country" placeholder="Enter Country" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" class="form-control" placeholder="Enter Description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="banner_image">Banner Image</label>
                            <input type="file" class="form-control" name="banner_image" accept="image/*">
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
        });
      });
    </script>
@endsection