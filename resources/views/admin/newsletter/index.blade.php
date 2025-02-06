@extends('layouts.admin')
@section('title')
Newsletter  
@endsection
@section('content')
    <!-- Content Header (Destination header) -->
    <section class="content-header">
      <h1>
        Newsletter
        <small>Newsletter Details</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Newsletter</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Newsletter Details</h3>
            </div>

            {{-- <div class="text-right mb-3 mr-2">
              <a href="{{ route('destinations.create') }}" class="btn btn-primary"  >
                <i class="fa fa-plus"></i> &nbsp; Add Destination
              </a>
            </div> --}}
            
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>S.N.</th>
                 
                    <th>Email</th>
                   
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($newsletters as $newsletter)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $newsletter->email }}</td>
                     
                   
                        <td>   
                            <form method="post" action="{{ route('newsletter.destroy', $newsletter->id) }}">
                              @csrf
                              @method('DELETE')
                              <button style="border-radius:50%" onclick="return confirm('Are You Sure...Do you want to delete this contact?')" class="btn btn btn-danger">
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