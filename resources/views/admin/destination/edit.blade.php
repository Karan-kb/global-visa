@extends('layouts.admin')

@section('title')
    {{ env('APP_NAME') }} | Edit Destination
@endsection

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css">
    
    <style>
        .box {
            border: 2px solid #ccc;
            padding: 12px;
            margin-bottom: 20px;
            margin-top: 50px;
        }



        .bootstrap-tagsinput {
            width: 100%;
            display: block;
        }

        .bootstrap-tagsinput input {
            width: auto !important;
        }
    </style>
@endpush

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Edit Destination
            <small>Modify Destination</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ route('destinations.index') }}">Destinations</a></li>
            <li class="active">Edit Destination</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Edit Destination</h3>
                    </div>

                    <!-- Form Start -->
                    <form class="form" method="post" action="{{ route('destinations.update', $dest->id) }}"
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
                                    <label for="title">Title <span class="required">*</span></label>
                                    <input type="text" class="form-control" name="title"
                                        value="{{ old('title', $dest->title) }}" placeholder="Enter title" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="slug">Slug <span class="required">*</span></label>
                                    <input type="text" class="form-control" name="slug"
                                        value="{{ old('slug', $dest->slug) }}" placeholder="Enter slug" required>
                                </div>
                            </div>

                            <div class="row">
                                <!-- Sub Title and Country fields -->
                                <div class="form-group col-md-6">
                                    <label for="sub_title">Sub Title</label>
                                    <input type="text" class="form-control" name="sub_title"
                                        value="{{ old('sub_title', $dest->sub_title) }}" placeholder="Enter sub title">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="country">Country <span class="required">*</span></label>
                                    <select class="form-control" name="country" required>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->code }}"
                                                {{ old('country', $dest->country) == $country->code ? 'selected' : '' }}>
                                                {{ $country->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- New Fields: Section Subtitles -->
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="why_subtitle">Why Section Sub Title</label>
                                    <input type="text" class="form-control" name="why_subtitle"
                                        value="{{ old('why_subtitle', $dest->why_subtitle) }}"
                                        placeholder="Enter Why Sub title">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="fact_subtitle">Fact Section Sub Title</label>
                                    <input type="text" class="form-control" name="fact_subtitle"
                                        value="{{ old('fact_subtitle', $dest->fact_subtitle) }}"
                                        placeholder="Enter Fact Sub title">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="reason_subtitle">Reason Section Sub Title</label>
                                    <input type="text" class="form-control" name="reason_subtitle"
                                        value="{{ old('reason_subtitle', $dest->reason_subtitle) }}"
                                        placeholder="Enter Reason Sub title">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="city_subtitle">City Section Sub Title</label>
                                    <input type="text" class="form-control" name="city_subtitle"
                                        value="{{ old('city_subtitle', $dest->city_subtitle) }}"
                                        placeholder="Enter City Sub title">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="health_subtitle">Health Section Sub Title</label>
                                    <input type="text" class="form-control" name="health_subtitle"
                                        value="{{ old('health_subtitle', $dest->health_subtitle) }}"
                                        placeholder="Enter Health Sub title">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="job_subtitle">Job Section Sub Title</label>
                                    <input type="text" class="form-control" name="job_subtitle"
                                        value="{{ old('job_subtitle', $dest->job_subtitle) }}"
                                        placeholder="Enter Job Sub title">
                                </div>
                            </div>

                            <!-- YouTube Link and Best Cities -->
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="youtube_link">YouTube Link</label>
                                    <input type="text" class="form-control" name="youtube_link"
                                        value="{{ old('youtube_link', $dest->youtube_link) }}"
                                        placeholder="Enter YouTube link">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="best_cities">Best Cities</label>
                                    <input type="text" class="form-control" id="best_cities" name="best_cities"
                                        value="{{ old('best_cities', implode(',', json_decode($dest->best_cities ?? '[]'))) }}"
                                        placeholder="Eg: city1, city2, city3">
                                </div>

                            </div>

                            <!-- Banner Image and Other Image Fields -->
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="description">Description</label>
                                    <textarea class="form-control ckeditor" name="description">{{ old('description', $dest->description) }}</textarea>
                                </div>


                            </div>

                            <!-- Requirement and Scholarship (CKEditor) -->
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="requirement">Requirement</label>
                                    <textarea class="form-control ckeditor" name="requirement">{{ old('requirement', $dest->requirement) }}</textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="in_take">In-Take</label>
                                    <textarea class="form-control ckeditor" name="in_take">{{ old('in_take', $dest->in_take) }}</textarea>
                                </div>

                            </div>


                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="banner_image">Banner Image</label>
                                    <input type="file" class="form-control" name="banner_image" accept="image/*">

                                    @if ($dest->banner_image)
                                        <img src="{{ asset('storage/' . $dest->banner_image) }}" alt="Banner Image"
                                            width="100" class="mt-2">
                                        <small class="form-text text-muted">Current banner image</small>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="why_image">Why Section Image</label>
                                    <input type="file" class="form-control" name="why_image" accept="image/*">

                                    @if ($dest->why_image)
                                        <img src="{{ asset('storage/' . $dest->why_image) }}" alt="Why Section Image"
                                            width="100" class="mt-2">
                                        <small class="form-text text-muted">Current why section image</small>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="video_image">Video Banner Image</label>
                                    <input type="file" class="form-control" name="video_image" accept="image/*">

                                    @if ($dest->video_image)
                                        <img src="{{ asset('storage/' . $dest->video_image) }}" alt="Video Banner Image"
                                            width="100" class="mt-2">
                                        <small class="form-text text-muted">Current video banner image</small>
                                    @endif
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="is_active">Is Active</label>
                                    <select class="form-control" name="is_active">
                                        <option value="1"
                                            {{ old('is_active', $dest->is_active) == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0"
                                            {{ old('is_active', $dest->is_active) == 0 ? 'selected' : '' }}>Inactive
                                        </option>
                                    </select>
                                </div>

                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="seo_title">SEO Title</label>
                                    <input type="text" class="form-control" name="seo_title"
                                        value="{{ $dest->seo_title }}">
                                </div>



                                <div class="form-group col-md-6">
                                    <label for="seo_description">SEO Description</label>
                                    <textarea class="form-control" name="seo_description">{{ $dest->seo_description }}</textarea>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="seo_keyword">SEO Keyword</label>
                                    <input type="text" class="form-control" name="seo_keyword"
                                        id="bootstrap-tagsinput" placeholder="Enter SEO tags" data-role="tagsinput"
                                        value="{{ $dest->seo_keyword }}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="seo_image">SEO Image</label>
                                    <input type="file" class="form-control" name="seo_image" accept="image/*">
                                    @if ($dest->seo_image)
                                        {{-- <small class="text-muted">Current Image: {{ asset('storage/' .$dest->seo_image) }}</small> --}}
                                        <img src="{{ asset('storage/' . $dest->seo_image) }}" style="height: 50px; width:70px" alt="Image">

                                    @endif
                                    <small class="text-muted">
                                        <strong>Recommended:</strong> JPG, JPEG, PNG | 1200px x 630px | ≤ 9MB
                                    </small>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>


    <script>
        $(document).ready(function() {
            $('#best_cities').tagsinput({
                confirmKeys: [13, 44], // Enter (13) or Comma (44) to add
                trimValue: true
            });
        });
    </script>

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
