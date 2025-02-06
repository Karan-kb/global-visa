@extends('layouts.admin')
@section('title')
Questionaire    
@endsection
@section('content')

<!-- Content Header (Questionaire header) -->
<section class="content-header">
      <h1>
      Questionaire
        <small>Edit Questionaire</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Questionaire</a></li>
       
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
    <form action="/questionaire/{{$questionaire->id}}" method="POST" class="form-container" enctype="multipart/form-data">
    @csrf
                        @method('PUT')
                        <div class="modal-body"> 
                        <div class="form-group">
                            <label>Select Destination</label>
                            <select class="form-control" name="destination_id">
                                <option>None</option>
                                @foreach($destination as $destination)
                                    <option value="{{$destination->id}}"  <?php if($questionaire->destination_id==$destination->id) echo'selected'?>>{{$destination->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Select Services</label>
                            <select class="form-control" name="service_id">
                                <option>None</option>
                                @foreach($service as $service)
                                    <option value="{{$service->id}}" <?php if($questionaire->service_id==$service->id) echo'selected'?>>{{$service->title}}</option>
                                @endforeach
                            </select>
                        </div>
                            <div class="form-group">
                                <label for="question">Question*</label>
                                <input type="text" class="form-control" name="question" value="{{$questionaire->question}}" required>
                            </div>
                            <div class="form-group">
                                <label for="body">Answer*</label>
                                <textarea name="answer" cols="30" rows="10"  id="editor" class="form-control" required>
                                {{ $questionaire->answer}}
                                </textarea>
                            </div>
                             
                            <div class="form-group">
                                <label for="status">Status*</label>
                                <select class="form-control" name="status" id="status">
                                    <option value="Active" <?php if($questionaire->status) echo'selected'?>>Active</option>
                                    <option value="Hidden" <?php if($questionaire->status == 0) echo'selected'?>>Hidden</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                            <label for="order">Order*</label>
                            <input type="number" class="form-control" min="1" name="order" value="{{$questionaire->order}}" placeholder="Enter Order of Appearance" required>
                        </div>
                            
                        </div>
                        <div class="modal-footer">
                            
                            <button type="submit" class="btn btn-primary">Update Questionaire</button>
                        </div>
                    </form> 
</div>
</div>
</section> 


@endsection