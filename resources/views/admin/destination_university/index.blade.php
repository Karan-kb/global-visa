@extends('layouts.admin')
@section('title')
    Destination University
@endsection
@section('content')
    <!-- Content Header (Destination header) -->
    <section class="content-header">
        <h1>
            Destination
            <small>Add/Modify Destination University</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Destination University</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Destination University </h3>
                    </div>

                    <div class="text-right mb-3 mr-2">
                        <a href="{{ route('destination-universities.create') }}" class="btn btn-primary">
                            <i class="fa fa-plus"></i> &nbsp; Add Destination University
                        </a>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>S.N.</th>
                                    <th>Destination</th>
                                    <th>Universities</th>

                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($destinationUniversities as $university)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $university->destination->title ?? '' }}</td>
                                        <td>
                                            @if ($university->universities()->count() > 0)
                                                {{ $university->universities()->pluck('name')->implode(', ') }}
                                            @else
                                                No Universities selected
                                            @endif
                                        </td>

                                        <td>
                                            <a href="{{ route('destination-universities.edit', $university->id) }}"
                                                style="border-radius:50%" class="btn btn-sm btn-warning">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <form method="post"
                                                action="{{ route('destination-universities.destroy', $university->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button style="border-radius:50%"
                                                    onclick="return confirm('Are You Sure...Do you want to delete this University?')"
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
