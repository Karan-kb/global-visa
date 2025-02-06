@extends('layouts.admin')

@section('title')
    {{ env('APP_NAME') }} | Create Destination Key Fact
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
            Create Destination
            <small>Add/Modify Destination Key Fact</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ route('destinations.index') }}">Destination Key Facts</a></li>
            <li class="active">Create Destination Key Fact</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Create Destination Key Fact</h3>
                    </div>

                    <!-- Form Start -->
                    <form class="form" method="post" action="{{ route('destination-key-facts.store') }}"
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
                                    <label for="destination_id">Destination <span class="required">*</span></label>
                                    <select class="form-control" name="destination_id" value="{{ old('destination_id') }}"
                                        required>
                                        @foreach ($destinations as $destination)
                                            <option value="{{ $destination->id }}">{{ $destination->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="title">Language <span class="required">*</span></label>
                                    <input type="text" class="form-control" name="language" value="{{ old('language') }}"
                                        placeholder="Enter language" required>
                                </div>

                            </div>





                            <div class="row">
                                <!-- YouTube Link and Order -->
                                <div class="form-group col-md-6">
                                    <label for="required_exams">Required Exams</label>
                                    <input type="text" class="form-control" name="required_exams"
                                        value="{{ old('required_exams') }}" placeholder="Enter Required Exams">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="order">Degrees</label>
                                    <input type="text" class="form-control" name="degrees" value="{{ old('degrees') }}"
                                        placeholder="Enter Degree">
                                </div>
                            </div>



                            <div class="row">
                                <!-- In-Take and Is Active -->
                                <div class="form-group col-md-6">
                                    <label for="in_take">In-Take</label>
                                    <input type="text" class="form-control" name="intakes" value="{{ old('intakes') }}"
                                        placeholder="Enter Intake">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="visa">Visas</label>
                                    <input type="text" class="form-control" name="visa" value="{{ old('visa') }}"
                                        placeholder="Enter Visa">
                                </div>
                            </div>

                            <div class="row">
                                <!-- Sub Title and Country fields -->
                                <div class="form-group col-md-6">
                                    <label for="cost_of_study">Cost of Study</label>
                                    <textarea class="form-control ckeditor" name="cost_of_study" value="{{ old('cost_of_study') }}"></textarea>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="source_of_funding">Source of Funding</label>
                                    <input type="text" class="form-control" name="source_of_funding"
                                        value="{{ old('source_of_funding') }}" placeholder="Enter Source of Funding">
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
