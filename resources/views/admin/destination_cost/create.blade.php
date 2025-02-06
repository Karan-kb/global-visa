@extends('layouts.admin')

@section('title')
    {{ env('APP_NAME') }} | Create Destination Cost
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
            Create Destination Cost
            <small>Add/Modify Destination Cost</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ route('destination-tests.index') }}">Destination Costs</a></li>
            <li class="active">Create Destination Cost</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Create Destination Cost</h3>
                    </div>

                    <!-- Form Start -->
                    <form class="form" method="post" action="{{ route('destination-costs.store') }}"
                        enctype="multipart/form-data">
                        @csrf
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

                                <div class="form-group col-md-6">
                                    <label for="destination_id">Destination <span class="required">*</span></label>
                                    <select class="form-control" name="destination_id" value="{{ old('destination_id') }}"
                                        required>
                                        @foreach ($destinations as $destination)
                                            <option value="{{ $destination->id }}">{{ $destination->nation->name ?? '' }}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="form-group col-md-6">
                                    <label for="destination_id">Type <span class="required">*</span></label>
                                    <select class="form-control" name="type" value="{{ old('type') }}" required>

                                        <option value="living">Living</option>
                                        <option value="education">Education</option>

                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <!-- Title and Slug fields -->
                                <div class="form-group col-md-6">
                                    <label for="title">Title <span class="required">*</span></label>
                                    <input type="text" class="form-control" name="title" value="{{ old('title') }}"
                                        placeholder="Enter title" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="value">Value<span class="required">*</span></label>
                                    <textarea class="form-control ckeditor" name="value"
                                        placeholder="Enter value" required></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="image">Image</label>
                                    <input type="file" class="form-control" name="image" accept="image/*">
                                </div>

                                </row>





                            </div>

                            <!-- Form Footer -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save"></i> Submit
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

            // Auto-fill SEO Title and Keywords
            $('input[name="title"]').keyup(function() {
                var title = $(this).val();
                $('input[name="seo_title"]').val(title);
                $('input[name="seo_keyword"]').val(title);
            });
        });
    </script>
@endpush
