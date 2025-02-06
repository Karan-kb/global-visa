@extends('layouts.admin')
@section('title')
    Destination Scholarship
@endsection
@section('content')
    <!-- Content Header (scholarship header) -->
    <section class="content-header">
        <h1>
            Destination Scholarship
            <small>Add/Modify Destination Scholarship</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">scholarship Scholarship</a></li>
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
                        <a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#addMenuModal">
                            <i class="fa fa-plus"></i> &nbsp; Add Scholarship
                        </a>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>S.N.</th>
                                    <th>Title</th>
                                    <th>Sub Title</th>
                                    <th>Description</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($scholarships as $scholarship)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $scholarship->title }}</td>
                                        <td>{{ $scholarship->sub_title }}</td>
                                        <td>{!! Str::limit($scholarship->description, 100) !!}</td>
                                        <td>
                                            <a href="{{ route('destination-scholarship.edit', $scholarship->id) }}"
                                                style="border-radius:50%" class="btn btn-sm btn-warning">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <form method="post"
                                                action="{{ route('destination-scholarship.destroy', $scholarship->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button style="border-radius:50%"
                                                    onclick="return confirm('Are You Sure...Do you want to delete this Scholarship?')"
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
    <!-- /.content -->

    <!-- START ADD MENU MODAL -->
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
                    <form action="{{ route('destination-scholarship.store') }}" method="POST" class="form-container"
                        enctype="multipart/form-data">
                        @csrf



                        <div class="form-group">
                            <label for="destination_id">Destination*<span class="required">*</span></label>
                            <select class="form-control" name="destination_id" value="{{ old('destination_id') }}" required>
                                @foreach ($destinations as $destination)
                                    <option value="{{ $destination->id }}">{{ $destination->nation->name ?? '' }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="title">Title*</label>
                            <input type="text" class="form-control" name="title" placeholder="Enter Title"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="sub_title">Sub Title</label>
                            <input type="text" class="form-control" name="sub_title" placeholder="Enter Sub Title"
                                >
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" class="form-control ckeditor" placeholder="Enter Description"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="country">Link</label>
                            <input type="text" class="form-control" name="link" placeholder="Enter Link"
                               >
                        </div>
                        <div class="form-group">
                            <label for="banner_image">Image</label>
                            <input type="file" class="form-control" name="image" accept="image/*">
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
            });
        });
    </script>
@endsection
