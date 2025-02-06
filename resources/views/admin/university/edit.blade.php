@extends('layouts.admin')

@section('title')
    {{ env('APP_NAME') }} | Edit University
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
            Edit University
            <small>Modify University</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ route('universities.index') }}">University</a></li>
            <li class="active">Edit University</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Edit University</h3>
                    </div>

                    <!-- Form Start -->
                    <form class="form" method="post" action="{{ route('universities.update', $university->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT') <!-- Method spoofing for PUT request -->
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
                                        value="{{ old('name', $university->name) }}" placeholder="Enter name" required>
                                    @error('name')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Slug Field -->
                                <div class="form-group col-md-6">
                                    <label for="slug">Slug <span class="required">*</span></label>
                                    <input type="text" class="form-control" name="slug" id="slug"
                                        value="{{ old('slug', $university->slug) }}" placeholder="Enter slug" required>
                                    @error('slug')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <!-- Country Field -->
                                <div class="form-group col-md-6">
                                    <label for="country">Country <span class="required">*</span></label>
                                    <select class="form-control" name="country" id="country" required>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->code }}"
                                                {{ old('country', $university->country) == $country->code ? 'selected' : '' }}>
                                                {{ $country->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('country')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- City Field -->
                                <div class="form-group col-md-6">
                                    <label for="city">City</label>
                                    <input type="text" class="form-control" name="city" id="city"
                                        value="{{ old('city', $university->city) }}" placeholder="Enter City">
                                    @error('city')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <!-- State Field -->
                                <div class="form-group col-md-6">
                                    <label for="state">State</label>
                                    <input type="text" class="form-control" name="state" id="state"
                                        value="{{ old('state', $university->state) }}" placeholder="Enter state">
                                    @error('state')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Banner Image Field -->
                                <div class="form-group col-md-6">
                                    <label for="image">Image</label>
                                    <input type="file" class="form-control" name="image" id="image"
                                        accept="image/*">
                                    @error('image')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                    <!-- Display existing banner image -->
                                    @if ($university->image)
                                        <div class="mt-2">
                                            <img src="{{ asset('storage/' . $university->image) }}" alt="Banner Image"
                                                style="max-width: 100px;">
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <!-- Ranking Field -->
                                <div class="form-group col-md-6">
                                    <label for="ranking">Ranking</label>
                                    <input type="number" class="form-control" name="ranking" id="ranking"
                                        value="{{ old('ranking', $university->ranking) }}" placeholder="Enter Ranking">
                                    @error('ranking')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Is Active Field -->
                                <div class="form-group col-md-6">
                                    <label for="is_active">Is Active</label>
                                    <select class="form-control" name="is_active" id="is_active">
                                        <option value="1"
                                            {{ old('is_active', $university->is_active) == 1 ? 'selected' : '' }}>Active
                                        </option>
                                        <option value="0"
                                            {{ old('is_active', $university->is_active) == 0 ? 'selected' : '' }}>Inactive
                                        </option>
                                    </select>
                                    @error('is_active')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <!-- Description Field -->
                                <div class="form-group col-md-12">
                                    <label for="description">Description</label>
                                    <textarea class="form-control ckeditor" name="description" id="description" placeholder="Enter description">{{ old('description', $university->description) }}</textarea>
                                    @error('description')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
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
