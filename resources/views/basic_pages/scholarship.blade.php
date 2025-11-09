@extends('basic_pages.layouts.master')


@section('meta_content')
    <!-- HTML Meta Tags -->
  <title>{{ $page->title??'' }} - {{ App\Helpers\Helper::getInfoValue('name') ??" "}}</title>
  <meta name="description" content="{{ $page->seo_description??'' }}">
  <meta name="keywords" content="{{$page->seo_keyword??""}}">
  <!-- Facebook Meta Tags -->
  <meta property="og:url" content="{{ url()->current() }}">
  <meta property="og:type" content="website">
  <meta property="og:title" content="{{ $page->seo_title??"" }} - {{ App\Helpers\Helper::getInfoValue('name') ??''}}">
  <meta property="og:description" content="{{ $page->seo_description??"" }}">
  <meta property="og:image" content="{{ asset('storage/page/seo_' . $page->seo_image) }}">
  <meta property="og:image:alt" content="{{ $page->seo_title }} - {{ App\Helpers\Helper::getInfoValue('name') ??""}} Logo">

  <!-- Twitter Meta Tags -->
  <meta name="twitter:card" content="summary_large_image">
  <meta property="twitter:domain" content="{{ url()->current() }}">
  <meta property="twitter:url" content="{{ url()->current() }}">
  <meta name="twitter:title" content="{{ $page->seo_title??'' }} - {{ App\Helpers\Helper::getInfoValue('name') ??""}}">
  <meta name="twitter:description" content="{{ $page->seo_description??'' }}">
  <meta name="twitter:image" content="{{ asset('storage/page/seo_' . $page->seo_image) }}">
    <!--seo by susan paudel-->
@endsection

@section('content')
    <!-- Breadcrumb Section -->
    <div class="breadcrumb-area">
        <div class="breadcrumb-top default-overlay bg-img breadcrumb-overly-5 pt-100 pb-95"
            style="background-image:url({{ asset('storage/page/' . ($page->pagecontents[0]->image ?? 'frontend/img/icon-img/service-9.png')) }});">
            <div class="container">
                <h2>{{ $page->pagecontents[0]->title ?? 'Test Preparation' }}</h2>
                <p>{!! $page->pagecontents[0]->content ?? 'Prepare for your tests with expert guidance and resources.' !!}</p>
            </div>
        </div>
        <div class="breadcrumb-bottom">
            <div class="container">
                <ul>
                    <li><a href="/">Home</a> <span><i class="fa fa-angle-double-right"></i>Scholarships</span></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Scholarship List Area -->








    <section class="hellor">
        <div class="container">
            <!-- <div class="section-title mb-75">
                <h2>Scholarship</h2>
                <p>Unlock your future with our exclusive scholarship opportunities!</p>
            </div> -->
            @if ($scholarships && $scholarships->count())
                <div class="row hello-wrap">
                    @foreach ($scholarships as $scholarship)
                        <div class="col-md-4 hello-col">
                            <div class="hello-box">
                                @if ($scholarship->image)
                                    <div class="hello-img">
                                        <img src="{{ asset('storage/scholarship/' . $scholarship->image) }}"
                                            alt="{{ $scholarship->title }}">
                                    </div>
                                @endif
                                <div class="hello-content">
                                    <h4>{{ $scholarship->title ?? 'Scholarship' }}</h4>
                                    <p>{!! Str::limit($scholarship->short_description ?? 'Fill out the form to apply for the scholarship.', 178, '.') !!}</p>
                                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                                        <a href="{{ route('scholarship-details', $scholarship->slug) }}" class="btn btn-primary read-more-btn">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-center">No scholarships available at the moment. Please check back later.</p>
            @endif
        </div>
    </section>
   
@endsection

<!-- jQuery and Bootstrap Modal Script -->
@push('js')


    <script>
        // jQuery for toggling "Read More" functionality (Optional if using modal)
        $(document).ready(function() {
            $('.read-more-btn').click(function() {
                var scholarshipId = $(this).data('target');
                var fullDescription = $(scholarshipId).find('.modal-body');
                fullDescription.toggle();
            });
        });
    </script>
