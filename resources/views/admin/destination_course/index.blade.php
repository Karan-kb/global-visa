@extends('layouts.admin')
@section('title')
    Destination Course
@endsection
@section('content')
    <!-- Content Header (Destination header) -->
    <section class="content-header">
        <h1>
            Destination
            <small>Add/Modify Destination Course</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Destination Course</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Destination Course Details</h3>
                    </div>

                    <div class="text-right mb-3 mr-2">
                        <a href="{{ route('destination-courses.create') }}" class="btn btn-primary">
                            <i class="fa fa-plus"></i> &nbsp; Add Destination Course
                        </a>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>S.N.</th>
                                    <th>Destination</th>
                                    <th>Courses</th>

                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($destinationCourses as $course)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $course->destination->title ?? '' }}</td>
                                        <td>
                                            @if ($course->courses()->count() > 0)
                                                {{ $course->courses()->pluck('name')->implode(', ') }}
                                            @else
                                                No courses selected
                                            @endif
                                        </td>

                                        <td>
                                            <a href="{{ route('destination-courses.edit', $course->id) }}"
                                                style="border-radius:50%" class="btn btn-sm btn-warning">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <form method="post"
                                                action="{{ route('destination-courses.destroy', $course->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button style="border-radius:50%"
                                                    onclick="return confirm('Are You Sure...Do you want to delete this Destination?')"
                                                    class="btn btn btn-danger">
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

    <script>
        $(function() {
            $('#example1').DataTable({
                'paging': true,
                'lengthChange': true,
                'searching': true,
                'ordering': true,
                'info': true,
                'autoWidth': false
            });
        });
    </script>
@endsection
