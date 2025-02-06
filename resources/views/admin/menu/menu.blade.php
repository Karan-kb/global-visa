@extends('layouts.admin')
@section('title')
Menus    
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Menu
        <small>Add/Modify Menu</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Menu</a></li>
       
      </ol>
    </section>

        

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">


          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Menu Details</h3>
            </div>

            <div class="text-right mb-3 mr-2">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addMenuModal" data-backdrop="static" data-keyboard="false">
                <i class="fa fa-plus"></i> &nbsp; Add Menu
                </button>
            </div>
            
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th>S.N.</th>
                    <th>Title</th>
                    <th>Order</th>
                    <th>Parent</th>
                    <th>Page</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($menuItems as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->title}}</td>
                            <td>{{$item->order}}</td>
                            <td>{{($item->parent_id==NULL)?'None':$item->parent_name($item->parent_id)->title}}</td>
                            <td>{{($item->page['title'])==NULL?'None':$item->page['title']}}</td>
                            <td>
                                <a href="/menu/{{$item->id}}/edit" class="btn btn btn-warning" style="border-radius:50%"><i class="fa fa-edit"></i></a>
                            </td>
                              <td>
                            <form method="post" action="/menu/{{$item->id}}">
                              @csrf
                              @method('DELETE')
                                <button style="border-radius:50%" onclick="return confirm('Are You Sure...Do you want to delete Menu?')" class="btn btn btn-danger"> <i class="fa fa-trash"></i></button>
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
                    <h3 class="modal-title text-center" id="exampleModalLabel">Add Menu Item</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('menu.store')}}" method="POST" class="form-container">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title*</label>
                            <input type="text" class="form-control" name="title" placeholder="Enter Menu Title" required>
                            <small class="form-text text-muted" id="fileHelp">Menu title must be unique</small>
                        </div>
                        <div class="form-group">
                            <label for="order">Order*</label>
                            <input type="number" class="form-control" min="1" name="order" placeholder="Enter Order of Appearance" required>
                        </div>
                        <div class="form-group">
                            <label>Parent Menu</label>
                            <select class="form-control" name="parent">
                                <option>None</option>
                                @foreach($menuItems as $item)
                                    <option value="{{$item->id}}">{{$item->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Page for Menu</label>
                            <select class="form-control" name="page">
                                <option>None</option>
                                @foreach($pages as $page)
                                    <option value="{{$page->id}}">{{$page->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add Menu</button>
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