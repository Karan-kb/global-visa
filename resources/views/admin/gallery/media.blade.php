@extends('layouts.admin')
@section('title')
All Photos  
@endsection
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
      {{$album->title}}
        <small>All Photos</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Album</a></li>
        <li><a href="#">All Photos</a></li>
       
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-6"> 
        
            <a href="/album"  class="btn btn-primary"> <i class="fa  fa-arrow-left"></i> Album</a>
            <br>
              
        <table  class="table  table-hover text-center">
            <thead>
                <tr>
                    <th>S.N.</th>
                    
                    @if($album->type=='Picture')
                    <th>Image</th>
                    @endif
                    <th>Name</th>
                    <th>Designation</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                    <tr>
                        <td>{{$item['id']}}</td>
                        
                        @if($album->type=='Picture')
                        <td>
                            <img src="/storage/gallery/{{$item['title']}}" class="img-fluid" width="50px" width="50px">
                        </td>
                        @endif
                        <td>{{$item['name']}}</td>
                        <td>{{$item['designation']}}</td>
                        
                        <td>
                        <a href="/media/{{$item->id}}/edit" style="border-radius:50%" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                        <form method="post" action="/media/{{$item->id}}">
                              @csrf
                              @method('DELETE')
                                <button style="border-radius:50%" onclick="return confirm('Are You Sure...Do you want to delete this Image?')" class="btn btn btn-danger"> <i class="fa fa-trash"></i></button>
                              </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
</div>
</div>
</section> 


@endsection