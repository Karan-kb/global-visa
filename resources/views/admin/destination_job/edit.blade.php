@extends('layouts.admin')
@section('title')
    Destination Jobs
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Destination Job
            <small>Edit Destination Job</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Destination Job</a></li>

        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                {{-- @dd($health) --}}
                <form action="{{ route('destination-job.update', $job->id) }}" method="POST" class="form-container"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="destination_id">Destination <span class="required">*</span></label>
                        <select class="form-control" name="destination_id" required>
                            @foreach ($destinations as $destination)
                                <option value="{{ $destination->id }}"
                                    {{ old('destination_id', $job->destination_id) == $destination->id ? 'selected' : '' }}>
                                    {{ $destination->nation->name ?? '' }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="title">Title*</label>
                        <input type="text" class="form-control" name="title" value="{{ $job->title }}" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description*</label>
                        <input type="description" class="form-control" min="1" name="description"
                            value="{{ $job->description }}" placeholder="Enter Description">
                    </div>



                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update Job</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
