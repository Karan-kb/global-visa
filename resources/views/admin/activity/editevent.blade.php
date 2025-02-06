@extends('layouts.admin')
@section('title')
    Event
@endsection
@section('content')
    <!-- Content Header (Event header) -->
    <section class="content-header">
        <h1>
            Event
            <small>Edit Event</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Event</a></li>

        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <form action="/event/{{ $event->id }}" method="POST" class="form-container" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">Title*</label>
                        <input type="text" class="form-control" name="title" value="{{ $event->title }}" required>
                    </div>
                    <div class="form-group">
                        <label for="location">Location*</label>
                        <input type="text" class="form-control" name="location" value="{{ $event->location }}" required>
                    </div>

                    <div class="form-group">
                        <label for="event_date">Event Date*</label>
                        <input type="date" class="form-control" name="event_date" value="{{ $event->event_date }}"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="time">Event Time*</label>
                        <input type="time" class="form-control" name="event_time" value="{{ $event->event_time }}"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="body">Content</label>
                        <textarea name="body" id="editor" class="form-control" id="" cols="30" rows="10">{{ $event->body }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="file">Update Event's Image</label>
                        <input class="form-control-file form-control" name="banner" type="file" id="file"
                            accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                        @if (isset($event->image) && !empty($event->image))
                            <div class="mb-3">
                                <img src="{{ asset('storage/event/' . $event->image) }}" alt="Event Image"
                                    style="max-width: 200px; max-height: 200px; object-fit: cover; border: 1px solid #ddd; border-radius: 5px;">
                                <p class="form-text text-muted">Current Image</p>
                            </div>
                        @endif
                        <small class="form-text text-muted" id="fileHelp">File must be an image</small><br>
                        <small class="form-text text-muted" id="fileHelp">Leave for old image</small>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update Events</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
