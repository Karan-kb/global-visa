@extends('layouts.admin')
@section('title')
Menus    
@endsection
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Menu
        <small>Edit Menu</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Menu</a></li>
       
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
    <form action="/menu/{{$menu->id}}" method="POST" class="form-container">
    @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Title*</label>
                            <input type="text" class="form-control" name="title" value="{{$menu->title}}" required>
                            <small class="form-text text-muted" id="fileHelp">Menu title must be unique</small>
                        </div>
                        <div class="form-group">
                            <label for="order">Order*</label>
                            <input type="number" class="form-control" min="1" name="order" value="{{$menu->order}}" required>
                        </div>
                        <div class="form-group">
                            <label>Parent Menu</label>
                            <select class="form-control" name="parent">
                                <option>None</option>

                                @foreach($menuItems as $item)
                                    <option value="{{$item->id}}"
                                        <?php if($menu->parent_id==$item->id) echo'selected'?>>
                                            {{$item->title}}</option>
                                @endforeach
                               
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Page for Menu</label>
                            <select class="form-control" name="page">
                                <option>None</option>
                                @foreach($pages as $pages)
                                 
                                <option value="{{$pages->id}}"
                                        <?php if($menu->page_id==$pages->id) echo'selected'?>>
                                            {{$pages->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="modal-footer">
                            
                            <button type="submit" class="btn btn-primary">Update Menu</button>
                        </div>
                    </form> 
</div>
</div>
</section> 


@endsection