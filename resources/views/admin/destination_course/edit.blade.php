@extends('layouts.admin')

@section('title')
    {{ env('APP_NAME') }} | Edit Destination Course
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
            Edit Destination Course
            <small>Modify Destination Course</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ route('destination-courses.index') }}">Destination Courses</a></li>
            <li class="active">Edit Destination Course</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Edit Destination Course</h3>
                    </div>

                    <!-- Form Start -->
                    <form class="form" method="post"
                        action="{{ route('destination-courses.update', $destinationCourse->id) }}"
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

                                <div class="form-group col-md-6">
                                    <label for="destination_id">Destination <span class="required">*</span></label>
                                    <select class="form-control" name="destination_id" required>
                                        @foreach ($destinations as $destination)
                                            <option value="{{ $destination->id }}"
                                                {{ old('destination_id', $destinationCourse->destination_id) == $destination->id ? 'selected' : '' }}>
                                                {{ $destination->nation->name ?? '' }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="course_id">Course <span class="required">*</span></label>
                                    <select class="form-control js-example-basic-single" name="course_id[]"
                                        multiple="multiple" required>
                                        @foreach ($courses as $course)
                                            <option value="{{ $course->id }}"
                                                {{ in_array($course->id, $selectedCourseIds) ? 'selected' : '' }}>
                                                {{ $course->name }}
                                            </option>
                                        @endforeach
                                    </select>
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

    <script>
        $(document).ready(function() {
            console.log("cool");
            $('.js-example-basic-single').select2();
        });
    </script>
@endpush
