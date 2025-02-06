@extends('layouts.admin')

@section('title')
    {{ env('APP_NAME') }} | Edit Page
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
        Edit Page
        <small>Modify Page Details</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('admin.page.index') }}">Pages</a></li>
        <li class="active">Edit Page</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Edit Page</h3>
            </div>

            <!-- Form Start -->
            <form class="form" method="post" action="{{ route('admin.page.update') }}" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="id" value="{{ $page->id }}">
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
                      <input type="text" class="form-control" name="title" value="{{ $page->title }}" required>
                    </div>

                    <div class="form-group">
                      <label for="slug">Slug <span class="required">*</span></label>
                      <input type="text" class="form-control" name="slug" value="{{ $page->slug }}" required>
                    </div>

                    <!-- Page Sections -->
                    @foreach ($page->contents as $page_content)
                      <input type="hidden" name="content_id[]" value="{{ $page_content->id }}">
                      <div class="box">
                        <div class="form-group">
                          <label for="section_title">Section Title <span class="required">*</span></label>
                          <input type="text" class="form-control" name="section_title[]" value="{{ $page_content->title }}" required>
                        </div>

                        <div class="form-group">
                          <label for="section_subtitle">Sub Title</label>
                          <input type="text" class="form-control" name="section_subtitle[]" value="{{ $page_content->subtitle }}">
                        </div>

                        <div class="form-group">
                          <label for="content">Content</label>
                          <textarea class="summernote" name="content[]">{{ $page_content->content }}</textarea>
                        </div>

                        <div class="form-group">
                          <label for="text">Text</label>
                          <input type="text" class="form-control" name="text[]" value="{{ $page_content->text }}">
                        </div>

                        <div class="form-group">
                          <label for="link">Link</label>
                          <input type="text" class="form-control" name="link[]" value="{{ $page_content->link }}">
                        </div>

                        <div class="row">
                          <div class="col-md-8">
                            <div class="form-group">
                              <label for="image">Image</label>
                              <input type="file" class="form-control" name="image[]" accept="image/*" onchange="loadFile(event, '{{ $page_content->id }}')">
                            </div>
                          </div>
                          <div class="col-md-4">
                            @if ($page_content->image)
                              <img src="{{ asset('storage/page/' . $page_content->image) }}" class="previous_image_{{ $page_content->id }} display_image" height="80" width="100">
                            @endif
                            <div class="image_div_{{ $page_content->id }}" style="display: none;">
                              <img id="image_preview_{{ $page_content->id }}" class="display_image" height="80" width="100">
                            </div>
                          </div>
                        </div>
                      </div>
                    @endforeach
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
                          <input type="text" class="form-control" name="seo_title" value="{{ $page->seo_title }}">
                        </div>

                        <div class="form-group">
                          <label for="seo_keyword">SEO Keyword</label>
                          <input type="text" class="form-control" name="seo_keyword" id="bootstrap-tagsinput" placeholder="Enter SEO tags" data-role="tagsinput" value="{{ $page->seo_keyword }}">
                        </div>

                        <div class="form-group">
                          <label for="seo_description">SEO Description</label>
                          <textarea class="form-control" name="seo_description">{{ $page->seo_description }}</textarea>
                        </div>

                        <div class="form-group">
                          <label for="seo_image">SEO Image</label>
                          <input type="file" class="form-control" name="seo_image" accept="image/*">
                          @if ($page->seo_image)
                            <small class="text-muted">Current Image: {{ $page->seo_image }}</small>
                            <img src="{{ asset('storage/page/seo_' . $page->seo_image) }}" style="height: 50px; width:70px" alt="Image">

                          @endif
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
                        <input type="checkbox" name="status" @if ($page->status) checked @endif>
                        <span class="slider round"></span>
                      </label>
                    </div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>

<script>
  $(document).ready(function() {
    // Initialize Summernote
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
    var loadFile = function(event, id) {
      var reader = new FileReader();
      reader.onload = function() {
        var output = document.getElementById('image_preview_' + id);
        output.src = reader.result;
        $('.image_div_' + id).css('display', 'block');
        $('.previous_image_' + id).css('display', 'none');
      };
      reader.readAsDataURL(event.target.files[0]);
    };
  });
</script>
@endpush