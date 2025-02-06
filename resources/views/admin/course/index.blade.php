@extends('layouts.admin')
@section('title')
Course    
@endsection
@section('content')
    <!-- Content Header (course header) -->
    <section class="content-header">
      <h1>
      Course
        <small>Add/Modify Course</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Course</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Course Details</h3>
            </div>

            <div class="text-right mb-3 mr-2">
              <a href="{{ route('courses.create') }}" class="btn btn-primary"  >
                <i class="fa fa-plus"></i> &nbsp; Add Course
              </a>
            </div>
            
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>S.N.</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Credit Hour</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($courses as $course)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $course->name }}</td>
                        <td>{{ $course->slug }}</td>
                        <td>{{$course->credit_hour}}</td>
                        <td>
                            <a href="{{ route('courses.edit', $course->id) }}" style="border-radius:50%" class="btn btn-sm btn-warning">
                                <i class="fa fa-edit"></i>
                            </a>
                        </td>
                        <td>   
                            <form method="post" action="{{ route('courses.destroy', $course->id) }}">
                              @csrf
                              @method('DELETE')
                              <button style="border-radius:50%" onclick="return confirm('Are You Sure...Do you want to delete this course?')" class="btn btn btn-danger">
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