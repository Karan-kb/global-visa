@extends('layouts.admin')
@section('title')
    Destination Reason
@endsection
@section('content')
    <!-- Content Header (Blog header) -->
    <section class="content-header">
        <h1>
            Destination Reason
            <small>Add/Modify Destination Reason</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Destination Reason</a></li>

        </ol>
    </section>



    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">


                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Destination Reason Details</h3>
                    </div>

                    <div class="text-right mb-3 mr-2">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addMenuModal"
                            data-backdrop="static" data-keyboard="false">
                            <i class="fa fa-plus"></i> &nbsp; Add Destination Reason
                        </button>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>S.N.</th>

                                    <th>Title</th>

                                    <th>Description</th>
                                    {{-- <th>Icon</th> --}}
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reasons as $reason)
                                    <tr>
                                        <td>{{ $reason->id }}</td>
                                        <td>{{ $reason->title }}</td>
                                        {{-- <td><img src="storage/reasons/{{$reason->image}}" class="img-fluid" width="50px" height="50px"></td> --}}
                                        <td>{{ $reason->description }}</td>
                                        {{-- <th><img src="storage/reasons/icon/{{$reason->icon}}" class="img-fluid" width="50px" height="50px"></th> --}}

                                        <td>
                                            <a href="{{ route('destination-reason.edit', $reason->id) }}"
                                                style="border-radius:50%" class="btn btn-sm btn-warning"><i
                                                    class="fa fa-edit"></i></a>
                                        </td>
                                        <td>
                                            <form method="post"
                                                action="{{ route('destination-reason.destroy', $reason->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button style="border-radius:50%"
                                                    onclick="return confirm('Are You Sure...Do you want to delete this reason?')"
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
                    <h3 class="modal-title text-center" id="exampleModalLabel">Add reasons</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('destination-reason.store') }}" method="POST" class="form-container"
                        enctype="multipart/form-data">
                        @csrf


                        <div class="form-group">
                            <label for="destination_id">Destination <span class="required">*</span></label>
                            <select class="form-control" name="destination_id" value="{{ old('destination_id') }}" required>
                                @foreach ($destinations as $destination)
                                    <option value="{{ $destination->id }}">{{ $destination->nation->name ?? '' }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="title">Title*</label>
                            <input type="text" class="form-control" name="title" placeholder="Enter Page Title"
                                required>
                        </div>

                        <div class="form-group">
                            <label for="text">Description*</label>
                            <input type="text" class="form-control" min="1" name="description"
                                placeholder="Enter Description">
                        </div>
                        <div class="form-group">
                            <label for="iconSelect">Select Reason Icon</label>
                            <select class="form-control" id="iconSelect" name="icon" required>
                                <option value="" selected disabled>Select an option</option>
                                @foreach (config('svgs.icons') as $key => $icon)
                                    <option value="{{ $key }}" data-icon="{{ $icon['icon'] }}">
                                        {{ $icon['title'] }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        
                        <!-- SVG Preview Section -->
                        <div id="iconPreview" class="mt-3" style="display: none; height:30px; width:40px;">
                            {{-- <label>Selected Icon Preview:</label> --}}
                            <div id="selectedIcon"></div>
                        </div>

                        {{-- <div class="form-group">
                            <label for="file">Select reason Icon</label>
                            <input class="form-control-file form-control" name="icon" type="file" id="file" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*" >
                            <small class="form-text text-muted" id="fileHelp">File must be an image</small>
                        </div> --}}
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add reasons</button>
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

@push('js')
    <script>
        document.getElementById('iconSelect').addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            var iconHtml = selectedOption.getAttribute('data-icon');

            if (iconHtml) {
                document.getElementById('selectedIcon').innerHTML = iconHtml;
                document.getElementById('iconPreview').style.display = 'block';
            } else {
                document.getElementById('iconPreview').style.display = 'none';
            }
        });
    </script>
@endpush
