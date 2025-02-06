@extends('layouts.admin')

@section('title')
    {{ env('APP_NAME') }} | Pages
@endsection

@push('css')
    <style>
        .row-id {
            display: none;
        }

        .td-flex {
            display: inline-flex;
        }
    </style>
@endpush

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Pages
            <small>Add/Modify Pages</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Pages</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Page Details</h3>
                    </div>

                    <div class="text-right mb-3 mr-2">
                        <a href="{{ route('admin.page.create') }}">
                            <button type="button" class="btn btn-primary">
                                <i class="fa fa-plus"></i> &nbsp; Add Page
                            </button>
                        </a>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="page-table" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Title</th>
                                        <th>Slug</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 
                                    @foreach ($pages as $page)
                                        <tr>
                                            <td>{{ $page->id }}</td>
                                            <td>{{ $page->title }}</td>
                                            <td>{{ $page->slug }}</td>

                                            <td>
                                                <?php
                                                if ($page->status == '1') {
                                                    echo 'featured';
                                                } else {
                                                    echo 'featured';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <a href="/page/{{ $page->id }}/edit" style="border-radius:50%"
                                                    class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                            </td>
                                            <td>
                                                <form method="post" action="/page/{{ $page->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button style="border-radius:50%"
                                                        onclick="return confirm('Are You Sure...Do you want to delete this Page?')"
                                                        class="btn btn btn-danger"> <i class="fa fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
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

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">ARE YOU SURE?</h4>
                </div>
                <div class="modal-body">
                    <p>Do you really want to delete this item?</p>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('admin.page.delete') }}" method="post">
                        @csrf
                        <input type="hidden" id="id" name="id">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">NO</button>
                        <button type="submit" class="btn btn-primary">YES</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Delete Confirmation Modal -->

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
