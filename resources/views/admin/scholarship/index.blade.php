@extends('layouts.admin')
@section('title')
    Scholarships
@endsection
@section('content')
    <!-- Content Header (scholarship header) -->
    <section class="content-header">
        <h1>
            Scholarship
            <small>Add/Modify Scholarship</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Scholarship</a></li>

        </ol>
    </section>



    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">


                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Scholarship Details</h3>
                    </div>

                    <div class="text-right mb-3 mr-2">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addMenuModal"
                            data-backdrop="static" data-keyboard="false">
                            <i class="fa fa-plus"></i> &nbsp; Add Scholarship
                        </button>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>S.N.</th>

                                    <th>Title</th>

                                    <th>Short Description</th>
                                    <th>Featured</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($scholarship as $scholarships)
                                    <tr>
                                        <td>{{ $scholarships->id }}</td>
                                        <td>{{ $scholarships->title }}</td>

                                        <td>{!! Str::limit($scholarships->short_description, 200) !!}</td>
                                        <td>
                                            <?php
                                            if ($scholarships->status == '0') {
                                                echo 'not featured';
                                            } else {
                                                echo 'featured';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <a href="/scholarships/{{ $scholarships->id }}/edit" style="border-radius:50%"
                                                class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                        </td>
                                        <td>
                                            <form method="post" action="/scholarships/{{ $scholarships->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button style="border-radius:50%"
                                                    onclick="return confirm('Are You Sure...Do you want to delete this Scholarhsip?')"
                                                    class="btn btn btn-danger"> <i class="fa fa-trash"></i></button>
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
    <div class="modal fade" id="addMenuModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-center" id="exampleModalLabel">Add scholarship</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('scholarships.store') }}" method="POST" class="form-container"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title*</label>
                            <input type="text" class="form-control" name="title" placeholder="Enter Page Title"
                                required>
                        </div>

                        <div class="form-group">
                            <label for="slug">Slug*</label>
                            <input type="text" class="form-control" name="slug" placeholder="Enter Page Slug"
                                required>
                        </div>

                        <div class="form-group">
                            <label for="slug">Institute*</label>
                            <select class="form-control" name="university_id">
                                @foreach ($universities as $institute)
                                    <option value="{{ $institute->id }}">{{ $institute->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="slug">Course*</label>
                            <select class="form-control" name="course_id">
                                @foreach ($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="destination_id">Destination*</label>
                            <select class="form-control" name="destination_id">
                                @foreach ($destinations as $destination)
                                    <option value="{{ $destination->id }}">{{ $destination->nation->name ?? '' }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="body">Description</label>
                            <textarea name="description" id="editor" class="form-control" id="" cols="30" rows="10"
                                placeholder="Enter page content..."></textarea>
                        </div>

                        <div class="form-group">
                            <label for="body">Short Description</label>
                            <textarea name="short_description" class="form-control ckeditor" id="" cols="30" rows="10"
                                placeholder="Enter Short Description..."></textarea>
                        </div>

                        <div class="form-group">
                            <label for="file">Select Image</label>
                            <input class="form-control-file form-control" name="image" type="file" id="file"
                                accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                            <small class="form-text text-muted" id="fileHelp">File must be an image</small>
                        </div>




                        <div class="form-group">
                            <label for="status"> Status</label>
                            <select name="status" class="form-control">
                                <option value="0">Not Featured</option>
                                <option value="1">Featured</option>
                            </select>
                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add scholarship</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END ADD MENU MODAL -->



    <!-- page script -->
    <script>
        $(function() {

            $('#example1').DataTable({
                'paging': true,
                'lengthChange': true,
                'searching': true,
                'ordering': true,
                'info': true,
                'autoWidth': false
            })
        })
    </script>
@endsection
