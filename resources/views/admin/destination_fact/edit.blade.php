@extends('layouts.admin')

@section('title')
    {{ env('APP_NAME') }} | Edit Destination Fact
@endsection

@push('css')
    <style>
        .box {
            border: 2px solid #ccc;
            padding: 12px;
            margin-bottom: 20px;
            margin-top: 50px;
        }
    </style>
@endpush

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Edit Destination Fact
            <small>Modify Destination Fact</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ route('destination-facts.index') }}">Destination Facts</a></li>
            <li class="active">Edit Destination Fact</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Edit Destination Fact</h3>
                    </div>

                    <!-- Form Start -->
                    <form class="form" method="post" action="{{ route('destination-facts.update', $destination_fact->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="box-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li style="font-size: smaller;">{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <!-- General Section -->

                            <div class="row">

                                <div class="form-group col-md-12">
                                    <label for="destination_id">Destination <span class="required">*</span></label>
                                    <select class="form-control" name="destination_id" required>
                                        @foreach ($destinations as $destination)
                                            <option value="{{ $destination->id }}"
                                                {{ old('destination_id', $destination_fact->destination_id) == $destination->id ? 'selected' : '' }}>
                                                {{ $destination->nation->name ?? '' }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <!-- Title and Slug fields -->
                                <div class="form-group col-md-6">
                                    <label for="title">Title <span class="required">*</span></label>
                                    <input type="text" class="form-control" name="title"
                                        value="{{ old('title', $destination_fact->title) }}" placeholder="Enter title" >
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="slug">Description <span class="required">*</span></label>
                                    <textarea class="form-control" name="description"
                                         placeholder="Enter Description" >{{ $destination_fact->description }}</textarea>
                                </div>
                            </div>

                        </div>

                        <!-- Form Footer -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-save"></i> Update
                            </button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection

@push('js')
    <!-- CKEditor Script -->

    <script>
        $(document).ready(function() {
            // Initialize CKEditor for Requirement, Scholarship, and In-Take
            CKEDITOR.replace('requirement', {
                toolbar: [{
                        name: 'basicstyles',
                        items: ['Bold', 'Italic', 'Underline', 'Strike', 'RemoveFormat']
                    },
                    {
                        name: 'paragraph',
                        items: ['NumberedList', 'BulletedList', 'Blockquote']
                    },
                    {
                        name: 'styles',
                        items: ['Format', 'FontSize']
                    },
                    {
                        name: 'links',
                        items: ['Link', 'Unlink']
                    },
                    {
                        name: 'insert',
                        items: ['Image', 'Table']
                    },
                    {
                        name: 'tools',
                        items: ['Maximize']
                    }
                ]
            });
            CKEDITOR.replace('scholarship');
            CKEDITOR.replace('in_take');
        });
    </script>
@endpush
