@extends('layouts.admin')
@section('title')
Highlights    
@endsection
@section('content')
    <!-- Content Header (Blog header) -->
    <section class="content-header">
      <h1>
      Highlights
        <small>Add/Modify Highlight</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Highlight</a></li>
       
      </ol>
    </section>

        

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">


          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Highlights Details</h3>
            </div>

            <div class="text-right mb-3 mr-2">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addMenuModal" data-backdrop="static" data-keyboard="false">
                <i class="fa fa-plus"></i> &nbsp; Add Highlights
                </button>
            </div>
            
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>S.N.</th>
                    <th>Destination</th>
                    <th>Founded</th>
                    <th>Capital</th>
                    <th>Area</th>
                    <th>Form of Government</th>
                    <th>Population</th>
                    <th>National Animal</th>
                    <th>Animal</th>
                    <th>Flag</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($highlight as $highlight)
                    <tr>
                        <td>{{$highlight->id}}</td>
                        <td>{{$highlight->destination['name']}}</td>
                        <td>{{$highlight->founded}}</td>
                        <td>{{$highlight->capital}}</td>
                        <td>{{$highlight->area}}</td>
                        <td>{{$highlight->form}}</td>
                        <td>{{$highlight->population}}</td>
                        <td>{{$highlight->animal_name}}</td>
                        <td><img src="storage/highlight/{{$highlight->animal_image}}" class="img-fluid" width="50px" height="50px"></td>
                        <td><img src="storage/highlight/{{$highlight->flag}}" class="img-fluid" width="50px" height="50px"></td>
                        
                        <td>
                            <a href="/highlight/{{$highlight->id}}/edit" style="border-radius:50%" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>

                         </td>
                         <td>   
                            <form method="post" action="/highlight/{{$highlight->id}}">
                              @csrf
                              @method('DELETE')
                                <button style="border-radius:50%" onclick="return confirm('Are You Sure...Do you want to delete this Highlights?')" class="btn btn btn-danger"> <i class="fa fa-trash"></i></button>
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
                    <h3 class="modal-title text-center" id="exampleModalLabel">Add Highlights</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form action="{{route('highlight.store')}}" method="POST" class="form-container" enctype="multipart/form-data">
                        @csrf
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
                            <label for="body">Founded</label>
                            <input type="date" class="form-control" name="founded" placeholder="Enter founded Date" required>
                        </div>

                        <div class="form-group">
                            <label for="body">Capital</label>
                            <input type="text" class="form-control" name="capital" placeholder="Enter Capital City" required>
                        </div>
                        <div class="form-group">
                            <label for="body">Area</label>
                            <input type="text" class="form-control" name="area" placeholder="Enter Total Area" required>
                        </div>
                        <div class="form-group">
                            <label for="body">Form of Government</label>
                            <input type="text" class="form-control" name="form" placeholder="Form of Government" required>
                        </div>

                        <div class="form-group">
                            <label for="body">National Animal</label>
                            <input type="text" class="form-control" name="animal_name" placeholder="Enter National Animal" required>
                        </div>

                        <div class="form-group">
                            <label for="body">Population</label>
                            <input type="text" class="form-control" name="population" placeholder="Enter Total Population" required>
                        </div>
                        <div class="form-group">
                            <label for="file">Select National Animal</label>
                            <input class="form-control-file form-control" name="animal_image" type="file" id="file" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*" >
                            <small class="form-text text-muted" id="fileHelp">File must be an image</small>
                        </div>
                        <div class="form-group">
                            <label for="file">Select Flag</label>
                            <input class="form-control-file form-control" name="flag" type="file" id="file" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*" >
                            <small class="form-text text-muted" id="fileHelp">File must be an image</small>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add Highlights</button>
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