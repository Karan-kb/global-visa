@extends('layouts.admin')
@section('title')
Inquiry About Destinations 
@endsection
@section('content')
    <!-- Content Header (Message header) -->
    <section class="content-header">
      <h1>
        Inquiry
        <small>Inquiry Details</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Inquiry</a></li>
       
      </ol>
    </section>

        

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">


          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Inquiry Details</h3>
            </div>

            
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>S.N.</th>
                    <th>Name</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>View</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($message as $message)
                        <tr>
                            <td>{{$message->id}}</td>
                            <td>{{$message->name}}</td>
                            <td>{{$message->subject}}</td>
                            <td>{{$message->message}}</td>
                            <td>{{$message->email}}</td>
                            <td>{{$message->phone}}</td>
                            <td>
                                <a href="/message/{{$message->id}}" style="border-radius:50%" class="btn btn-sm btn-warning"><i class="fa fa-eye "></i></a>
                             </td>
                             <td>   
                                <form method="post" action="/message/{{$message->id}}">
                              @csrf
                              @method('DELETE')
                                <button style="border-radius:50%" onclick="return confirm('Are You Sure...Do you want to delete this Message?')" class="btn btn btn-danger"> <i class="fa fa-trash"></i></button>
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
    })
  })
</script>

@endsection