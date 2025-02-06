@extends('layouts.admin')

@section('title')
    {{ env('APP_NAME') }} | Create University
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
            Create University
            <small>Add/Modify University</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ route('universities.index') }}">Universitys</a></li>
            <li class="active">Create University</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Create University</h3>
                    </div>

                    <!-- Form Start -->
                    <form class="form" method="post" action="{{ route('universities.store') }}"
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
                                <!-- Title and Slug fields -->
                                <div class="form-group col-md-6">
                                    <label for="title">Name <span class="required">*</span></label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        value="{{ old('name') }}" placeholder="Enter name" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="slug">Slug <span class="required">*</span></label>
                                    <input type="text" class="form-control" name="slug" value="{{ old('slug') }}"
                                        placeholder="Enter slug" required>
                                </div>
                            </div>

                            <div class="row">
                                <!-- Sub Title and Country fields -->

                                <div class="form-group col-md-6">
                                    <label for="country">Country <span class="required">*</span></label>
                                    <select class="form-control" name="country" value="{{ old('country') }}"
                                        placeholder="Enter country" required>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->code }}">{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="sub_title">City</label>
                                    <input type="text" class="form-control" name="city" value="{{ old('city') }}"
                                        placeholder="Enter City">
                                </div>
                            </div>

                            <div class="row">
                                <!-- Description and Banner Image -->

                                <div class="form-group col-md-6">
                                    <label for="state">State</label>
                                    <input type="text" class="form-control" name="state" value="{{ old('state') }}"
                                        placeholder="Enter state">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="image">Image</label>
                                    <input type="file" class="form-control" name="image" accept="image/*">
                                </div>


                            </div>

                            <div class="row">
                                <!-- YouTube Link and Order -->
                                <div class="form-group col-md-6">
                                    <label for="youtube_link">Ranking</label>
                                    <input type="number" class="form-control" name="ranking" value="{{ old('ranking') }}"
                                        placeholder="Enter Ranking">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="is_active">Is Active</label>
                                    <select class="form-control" name="is_active">
                                        <option value="1" {{ old('is_active') == 1 ? 'selected' : '' }}>Active
                                        </option>
                                        <option value="0" {{ old('is_active') == 0 ? 'selected' : '' }}>Inactive
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="description">Description</label>
                                    <textarea class="form-control ckeditor" name="description" placeholder="Enter description">{{ old('description') }}</textarea>
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
