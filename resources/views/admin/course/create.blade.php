@extends('layouts.admin')

@section('title')
    {{ env('APP_NAME') }} | Create Course
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
            Create Course
            <small>Add/Modify Course</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ route('courses.index') }}">Courses</a></li>
            <li class="active">Create Course</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Create Course</h3>
                    </div>

                    <!-- Form Start -->
                    <form class="form" method="post" action="{{ route('courses.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <!-- Display validation errors -->
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
                                <!-- Name Field -->
                                <div class="form-group col-md-6">
                                    <label for="name">Name <span class="required">*</span></label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        value="{{ old('name') }}" placeholder="Enter name" required>
                                    @error('name')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                    
                                <!-- Slug Field -->
                                <div class="form-group col-md-6">
                                    <label for="slug">Slug <span class="required">*</span></label>
                                    <input type="text" class="form-control" name="slug" id="slug"
                                        value="{{ old('slug') }}" placeholder="Enter slug" required>
                                    @error('slug')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                    
                            <div class="row">
                                <!-- Credit Hour Field -->
                                <div class="form-group col-md-6">
                                    <label for="credit_hour">Credit Hour</label>
                                    <input type="number" class="form-control" name="credit_hour"
                                        value="{{ old('credit_hour') }}" placeholder="Enter Credit Hour">
                                    @error('credit_hour')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                    
                                <!-- Banner Image Field -->
                                <div class="form-group col-md-6">
                                    <label for="banner_image">Banner Image</label>
                                    <input type="file" class="form-control" name="banner_image" id="banner_image" accept="image/*">
                                    @error('banner_image')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                    
                            <div class="row">
                                <!-- Description Field -->
                                <div class="form-group col-md-6">
                                    <label for="description">Description</label>
                                    <textarea class="form-control ckeditor" name="description" id="description" placeholder="Enter description">{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                    
                                <!-- Is Active Field -->
                                <div class="form-group col-md-6">
                                    <label for="is_active">Is Active</label>
                                    <select class="form-control" name="is_active" id="is_active">
                                        <option value="1" {{ old('is_active') == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ old('is_active') == 0 ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                    @error('is_active')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
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
