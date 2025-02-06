@extends('layouts.admin')

@section('title')
    {{ env('APP_NAME') }} | Edit Destination Scholarship
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
            Edit Destination Scholarship
            <small>Modify Destination Scholarship</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ route('destination-scholarship.index') }}">Edit Destination Scholarships</a></li>
            <li class="active">Edit Destination Scholarship</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Edit Destination Scholarship</h3>
                    </div>

                    <!-- Form Start -->
                    <form class="form" method="post"
                        action="{{ route('destination-scholarship.update', $scholarship->id) }}"
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
                                
                                <!-- Title and Slug fields -->
                                <div class="form-group col-md-6">
                                    <label for="title">Title*<span class="required">*</span></label>
                                    <input type="text" class="form-control" name="title"
                                        value="{{ old('title', $scholarship->title) }}" placeholder="Enter title" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="sub_title">Sub Title</label>
                                    <input type="text" class="form-control" name="sub_title"
                                        value="{{ old('sub_title', $scholarship->sub_title) }}"
                                        placeholder="Enter sub title">
                                </div>

                            </div>

                            <div class="row">
                                <!-- Sub Title and Country fields -->

                                <div class="form-group col-md-6">
                                    <label for="destination_id">Destination <span class="required">*</span></label>
                                    <select class="form-control" name="destination_id" required>
                                        @foreach ($destinations as $destination)
                                            <option value="{{ $destination->id }}"
                                                {{ old('destination_id', $scholarship->destination_id) == $destination->id ? 'selected' : '' }}>
                                                {{ $destination->nation->name ?? '' }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="link">Link</label>
                                    <input type="text" class="form-control" name="link"
                                        value="{{ old('link', $scholarship->link) }}" placeholder="Enter Link">
                                </div>
                            </div>

                            <div class="row">
                                <!-- Description and Banner Image -->
                                <div class="form-group col-md-6">
                                    <label for="description">Description</label>
                                    <textarea class="form-control ckeditor" name="description" placeholder="Enter description">{{ old('description', $scholarship->description) }}</textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="image">Image</label>
                                    <input type="file" class="form-control" name="image" accept="image/*">

                                    @if ($scholarship->image)
                                        <img src="{{ asset('storage/' . $scholarship->image) }}" alt="Image"
                                            width="100" class="mt-2">
                                        <small class="form-text text-muted"></small>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <!-- YouTube Link and Order -->


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
