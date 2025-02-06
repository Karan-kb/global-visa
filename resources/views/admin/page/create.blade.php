@extends('layouts.admin')

@section('title')
    {{ env('APP_NAME') }} | Create Page
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
    </style>
@endpush

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Create Page
            <small>Add/Modify Page</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ route('admin.page.index') }}">Pages</a></li>
            <li class="active">Create Page</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Create Page</h3>
                    </div>

                    <!-- Form Start -->
                    <form class="form" method="post" action="{{ route('admin.page.store') }}"
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
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="title">Title <span class="required">*</span></label>
                                        <input type="text" class="form-control" name="title"
                                            value="{{ old('title') }}" placeholder="Enter title" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="slug">Slug <span class="required">*</span></label>
                                        <input type="text" class="form-control" name="slug"
                                            value="{{ old('slug') }}" placeholder="Enter slug" required>
                                    </div>

                                    <div class="form-group">
                                        <button type="button" class="add-new-option btn btn-primary btn-sm"
                                            style="float: right;">
                                            <i class="fa fa-plus"></i> Add New Page Section
                                        </button>
                                    </div>

                                    <input type="hidden" name="counter" value="1">
                                    <div class="content-group">
                                        <div class="box">
                                            <div class="form-group">
                                                <label for="section_title">Section Title</label>
                                                <input type="text" class="form-control" name="section_title[]"
                                                    placeholder="Enter section title">
                                            </div>

                                            <div class="form-group">
                                                <label for="section_subtitle">Sub Title</label>
                                                <input type="text" class="form-control" name="section_subtitle[]"
                                                    placeholder="Enter sub title">
                                            </div>

                                            <div class="form-group">
                                                <label for="content">Content <span class="required">*</span></label>
                                                <textarea class="summernote" name="content[]" required></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="text">Text</label>
                                                <input type="text" class="form-control" name="text[]"
                                                    placeholder="Enter text">
                                            </div>

                                            <div class="form-group">
                                                <label for="link">Link</label>
                                                <input type="text" class="form-control" name="link[]"
                                                    placeholder="Enter link">
                                            </div>

                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label for="image">Image</label>
                                                        <input type="file" class="form-control" name="image[]"
                                                            accept="image/*" onchange="loadFile(event)">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="image_div">
                                                        <img id="preview_1" class="display_image" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- SEO Section -->
                                <div class="col-md-4">
                                    <div class="card card-default">
                                        <div class="card-header">
                                            <h3 class="card-title">SEO</h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="seo_title">SEO Title</label>
                                                <input type="text" class="form-control" name="seo_title"
                                                    value="{{ old('seo_title') }}" placeholder="Enter SEO title">
                                            </div>

                                            <div class="form-group">
                                                <label for="seo_keyword">SEO Keyword</label>
                                                <input type="text" class="form-control" name="seo_keyword"
                                                    id="bootstrap-tagsinput" placeholder="Enter SEO tags"
                                                    data-role="tagsinput" value="{{ old('seo_keyword') }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="seo_description">SEO Description</label>
                                                <textarea class="form-control" name="seo_description">{{ old('seo_description') }}</textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="seo_image">SEO Image</label>
                                                <input type="file" class="form-control" name="seo_image"
                                                    accept="image/*">
                                                <small class="text-muted">
                                                    <strong>Recommended:</strong> JPG, JPEG, PNG | 600px x 625px | ≤ 9MB
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Status Toggle -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="status">Status</label><br>
                                        <label class="switch">
                                            <input type="checkbox" name="status" checked>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>

    <script>
        $(document).ready(function() {
            // Add New Section
            $('.add-new-option').click(function() {
                var old_value = parseInt($('input[name="counter"]').val());
                var new_value = ++old_value;
                $('input[name="counter"]').val(new_value);

                var newOption = `
        <div class="box">
          <div class="form-group">
            <label for="section_title">Section Title</label>
            <input type="text" class="form-control" name="section_title[]" placeholder="Enter section title">
          </div>

          <div class="form-group">
            <label for="section_subtitle">Sub Title</label>
            <input type="text" class="form-control" name="section_subtitle[]" placeholder="Enter sub title">
          </div>

          <div class="form-group">
            <label for="content">Content <span class="required">*</span></label>
            <textarea class="summernote" name="content[]" required></textarea>
          </div>

          <div class="form-group">
            <label for="text">Text</label>
            <input type="text" class="form-control" name="text[]" placeholder="Enter text">
          </div>

          <div class="form-group">
            <label for="link">Link</label>
            <input type="text" class="form-control" name="link[]" placeholder="Enter link">
          </div>

          <div class="row">
            <div class="col-md-8">
              <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control" name="image[]" accept="image/*" onchange="loadFile(event, ${new_value})">
              </div>
            </div>
            <div class="col-md-4">
              <div class="image_div">
                <img id="preview_${new_value}" class="display_image" />
              </div>
            </div>
          </div>
        </div>
      `;

                $('.content-group').append(newOption);

                // Initialize Summernote for the new textarea
                $('.summernote').last().summernote({
                    height: 200,
                    toolbar: [
                        ['style', ['bold', 'italic', 'underline', 'clear']],
                        ['font', ['strikethrough', 'superscript', 'subscript']],
                        ['fontsize', ['fontsize']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['insert', ['picture', 'link', 'video', 'table', 'hr']],
                        ['height', ['height']],
                        ['view', ['fullscreen', 'codeview']]
                    ]
                });
            });

            // Initialize Summernote for existing textareas
            $('.summernote').summernote({
                height: 200,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['picture', 'link', 'video', 'table', 'hr']],
                    ['height', ['height']],
                    ['view', ['fullscreen', 'codeview']]
                ]
            });

            // Image Preview
            var loadFile = function(event, counter) {
                var reader = new FileReader();
                reader.onload = function() {
                    var output = document.getElementById('preview_' + counter);
                    output.src = reader.result;
                    $(output).css({
                        'height': '70px',
                        'width': '100px'
                    });
                };
                reader.readAsDataURL(event.target.files[0]);
            };

            // Auto-fill SEO Title and Keywords
            $('input[name="title"]').keyup(function() {
                var title = $(this).val();
                $('input[name="seo_title"]').val(title);
                $('input[name="seo_keyword"]').val(title);
            });
        });
    </script>
@endpush
