@extends('layouts.admin')

@section('title')
    {{ env('APP_NAME') }} | View Contact
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
            View Contact</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ route('contact.index') }}">Contacts</a></li>
            <li class="active">View Contacts</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">View Contact</h3>
                    </div>

                    <!-- Form Start -->
                    <form class="form" method="post" action="{{ route('contact.show', $contact->id) }}"
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
                                    <label for="title">Name <span class="required">*</span></label>
                                    <input type="text" class="form-control" name="title"
                                        value="{{ old('name', $contact->first_name . ' ' . $contact->last_name) }}"
                                        placeholder="Name" readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">Email <span class="required">*</span></label>
                                    <input type="text" class="form-control" name="email"
                                        value="{{ old('email', $contact->email) }}" readonly>
                                </div>
                            </div>

                            <div class="row">
                                <!-- Sub Title and Country fields -->
                                <div class="form-group col-md-6">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control" name="phone"
                                        value="{{ old('phone', $contact->phone) }}" readonly>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="test_id">Test<span class="required">*</span></label>
                                    <input type="text" class="form-control" name="test_id"
                                        value="{{ old('email', $contact->test->title ?? '') }}" readonly>
                                </div>

                            </div>


                            <div class="row">
                                <!-- YouTube Link and Order -->
                                <div class="form-group col-md-6">
                                    <label for="subject">Subject</label>
                                    <input type="text" class="form-control" name="subject"
                                        value="{{ old('subject', $contact->subject) }}" placeholder="Subject" readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="messege">Message</label>
                                    <input type="text" class="form-control" name="messege"
                                        value="{{ old('messege', $contact->messege) }}" placeholder="Message" readonly>
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
