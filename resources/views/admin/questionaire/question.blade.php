@extends('layouts.admin')
@section('title')
Questionaire    
@endsection
@section('content')
    <!-- Content Header (Questionaire header) -->
    <section class="content-header">
      <h1>
      Questionaire
        <small>Add/Modify Questionaire</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Questionaire</a></li>
       
      </ol>
    </section>

        

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">


          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Questionaire Details</h3>
            </div>

            <div class="text-right mb-3 mr-2">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addMenuModal" data-backdrop="static" data-keyboard="false">
                <i class="fa fa-plus"></i> &nbsp; Add Questionaire
                </button>
            </div>
            
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>S.N.</th>
                    <th>Destination/Service</th>
                    
                    <th>Question</th>
                    <th>Answer</th>
                    <th>Status</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($questionaire as $questionaire)
                        <tr>
                            <td>{{$questionaire->id}}</td>
                            {{-- <td>
                                <?php if($questionaire->destination_id){?>
                                    {{$questionaire->destination['name']}} &nbsp; &nbsp;
                                <?php }  if($questionaire->service_id){ ?>
                                    {{$questionaire->service['title']}}
                                <?php } ?>    
                            </td> --}}
                            
                            <td>{{$questionaire->question}}</td>
                            <td>{!! Str::limit($questionaire->answer, 400) !!}</td>
                            <td>{{$questionaire->status?'Active':'Hidden'}}</td>
                            <td>
                                <a href="/questionaire/{{$questionaire->id}}/edit" style="border-radius:50%" class="btn btn-sm btn-warning"><i class="fa fa-edit "></i></a>
                             </td>
                             <td>   
                                <form method="post" action="/questionaire/{{$questionaire->id}}">
                              @csrf
                              @method('DELETE')
                                <button style="border-radius:50%" onclick="return confirm('Are You Sure...Do you want to delete this Questionaire?')" class="btn btn btn-danger"> <i class="fa fa-trash"></i></button>
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
<div class="modal fade" id="addMenuModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-center" id="exampleModalLabel">Create Questionaire</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form action="{{route('questionaire.store')}}" method="POST" class="form-container" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body"> 
                        <div class="form-group">
                            <label>Select Destination</label>
                            <select class="form-control" name="destination_id">
                                <option>None</option>
                                @foreach($destination as $destination)
                                    <option value="{{$destination->id}}">{{$destination->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Select Services</label>
                            <select class="form-control" name="service_id">
                                <option>None</option>
                                @foreach($service as $service)
                                    <option value="{{$service->id}}">{{$service->title}}</option>
                                @endforeach
                            </select>
                        </div>
                            <div class="form-group">
                                <label for="question">Question*</label>
                                <input type="text" class="form-control" name="question" placeholder="Enter Question" required>
                            </div>
                            <div class="form-group">
                                <label for="body">Answer*</label>
                                <textarea name="answer" cols="30" rows="10" placeholder="Enter Answers..." id="editor" class="form-control" required></textarea>
                            </div>
                           
                            <div class="form-group">
                                <label for="type">Status*</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" value="1" checked>
                                    <label class="form-check-label">
                                        Active
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" value="0">
                                    <label class="form-check-label">
                                        Hidden
                                    </label>
                                </div>
                            </div>
                            
                             <div class="form-group">
                            <label for="order">Order*</label>
                            <input type="number" class="form-control" min="1" name="order"  placeholder="Enter Order of Appearance" required>
                        </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add Questionaire</button>
                        </div>
                    </form>  
                </div>
            </div>
        </div>
    </div>
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
    })
  })
</script>

@endsection