@extends('layouts.admin')
@section('title')
Contact   
@endsection
@section('content')
    <!-- Content Header (Destination header) -->
    <section class="content-header">
      <h1>
        Contact
        <small>Contact Details</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Contact</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Contact Details</h3>
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
                    <th>Name </th>
                    <th>Email</th>
                    {{-- <th>Phone</th> --}}
                    <th>View</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($contacts as $contact)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $contact->first_name . ' ' . $contact->last_name }}</td>
                        <td>{{ $contact->email }}</td>
                        {{-- <td>{{ $contact->phone}}</td> --}}
                        <td>
                            <a href="{{ route('contact.show', $contact->id) }}" style="border-radius:50%" class="btn btn-sm btn-warning">
                                <i class="fa fa-eye"></i>
                            </a>
                        </td>
                        <td>   
                            <form method="post" action="{{ route('contact.destroy', $contact->id) }}">
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