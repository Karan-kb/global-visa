@extends('basic_pages.layouts.master')


@section('meta_content')
    <!-- HTML Meta Tags -->
    <title>{{ $blog->title ?? '' }} - {{ App\Helpers\Helper::getInfoValue('name') ?? ' ' }}</title>
    <meta name="description" content="{{ $blog->seo_description ?? '' }}">
    <meta name="keywords" content="{{ $blog->seo_keyword ?? '' }}">
    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $blog->seo_title ?? '' }} - {{ App\Helpers\Helper::getInfoValue('name') ?? '' }}">
    <meta property="og:description" content="{{ $blog->seo_description ?? '' }}">
    <meta property="og:image"
        content="{{ $blog->seo_image ? asset('storage/blog/' . $blog->seo_image) : asset('storage/blog/' . $blog->image) }}">
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="630" />
    <meta property="og:image:alt"
        content="{{ $blog->seo_title }} - {{ App\Helpers\Helper::getInfoValue('name') ?? '' }} Logo">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="{{ url()->current() }}">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title"
        content="{{ $blog->seo_title ?? '' }} - {{ App\Helpers\Helper::getInfoValue('name') ?? '' }}">
    <meta name="twitter:description" content="{{ $blog->seo_description ?? '' }}">
    <meta name="twitter:image" content="{{ asset('storage/blog/' . $blog->seo_image) }}">
    <!--seo by susan paudel-->
@endsection

@push('css')
    <style>
        .breadcrumb-top h1 {
            font-weight: bold;
            font-size: 48px;
            margin: 0 0 22px;
            color: #fff;
            z-index: 9;
            position: relative;
        }

        .blog-details-top .blog-details-content-wrap h2 {
            font-size: 24px;
            font-weight: bold;
            margin: 8px 0 23px;
            color: #00a651;
        }
    </style>
@endpush



@section('content')
    <div class="breadcrumb-area">
        <div class="breadcrumb-top default-overlay bg-img breadcrumb-overly-3 pt-100 pb-95"
            style="background-image:url({{ asset('storage/page/' . ($page->pagecontents[0]->image ?? 'frontend/img/icon-img/service-9.png')) }});">
            <div class="container">
                <h1 style="line-height: 1.5">{{ $blog->title }}</h1>
                {{-- <p>{!! $page->pagecontents[0]->content ?? 'Blog Details' !!} --}}
                </p>
            </div>
        </div>
        <div class="breadcrumb-bottom">
            <div class="container">
                <ul>
                    <li><a href="/">Home</a> <span><i class="fa fa-angle-double-right"></i>Blog Details</span></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="event-area pt-130 pb-130">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-8">
                    <div class="blog-details-wrap mr-40">
                        <div class="blog-details-top">
                            <img src="{{ asset('storage/blog/' . $blog->image) }}" alt="">
                            <div class="blog-details-content-wrap">
                                <div class="b-details-meta-wrap">
                                    <div class="b-details-meta">
                                        <ul>
                                            <li><i class="fa fa-calendar-o"></i> {{ $blog->created_at->format('F, jS Y') }}
                                            </li>

                                        </ul>
                                    </div>
                                    <span>{{ $blog->category->name ?? '' }}</span>
                                </div>
                                <h2>{{ $blog->title }}</h2>
                                <p>{!! $blog->body !!}</p>


                            </div>
                        </div>

                        {{-- <div class="related-course pt-70">
                            <div class="related-title mb-45">
                                <h3>Related Blog</h3>
                                <p>Hempor incididunt ut labore et dolore mm, itation ullamco laboris <br>nisi ut aliquip.
                                </p>
                            </div>
                            <div class="related-slider-active related-blog-slide pb-80">
                                <div class="single-blog">
                                    <div class="blog-img">
                                        <a href="{{ route('blog.details') }}"><img src="{{ asset('frontend/img/blog/blog-15.jpg') }}" alt=""></a>
                                    </div>
                                    <div class="blog-content-wrap">
                                        <span>Education</span>
                                        <div class="blog-content">
                                            <h4><a href="{{ route('blog.details') }}">Testing is a great thing.</a></h4>
                                            <p>doloremque laudan tium, totam ersps uns iste natus</p>
                                            <div class="blog-meta">
                                                <ul>
                                                    <li><a href="{{ route('blog.details') }}"><i class="fa fa-user"></i>Apparel</a></li>
                                                    <li><a href="{{ route('blog.details') }}"><i class="fa fa-comments-o"></i> 10</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="blog-date">
                                            <a href="{{ route('blog.details') }}"><i class="fa fa-calendar-o"></i> June, 24th 2017</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-blog">
                                    <div class="blog-img">
                                        <a href="{{ route('blog.details') }}"><img src="{{ asset('frontend/img/blog/blog-16.jpg') }}" alt=""></a>
                                    </div>
                                    <div class="blog-content-wrap">
                                        <span>Alumini</span>
                                        <div class="blog-content">
                                            <h4><a href="{{ route('blog.details') }}">A variation of the ordinary.</a></h4>
                                            <p>doloremque laudan tium, totam ersps uns iste natus</p>
                                            <div class="blog-meta">
                                                <ul>
                                                    <li><a href="{{ route('blog.details') }}"><i class="fa fa-user"></i> Adrin Azra</a></li>
                                                    <li><a href="{{ route('blog.details') }}"><i class="fa fa-comments-o"></i> 10</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="blog-date">
                                            <a href="{{ route('blog.details') }}"><i class="fa fa-calendar-o"></i> June, 24th 2017</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-blog">
                                    <div class="blog-img">
                                        <a href="{{ route('blog.details') }}"><img src="{{ asset('frontend/img/blog/blog-14.jpg') }}" alt=""></a>
                                    </div>
                                    <div class="blog-content-wrap">
                                        <span>Convocation</span>
                                        <div class="blog-content">
                                            <h4><a href="#">In publishing and graphic.</a></h4>
                                            <p>doloremque laudan tium, totam ersps uns iste natus</p>
                                            <div class="blog-meta">
                                                <ul>
                                                    <li><a href="{{ route('blog.details') }}"><i class="fa fa-user"></i> Adrin Azra</a></li>
                                                    <li><a href="{{ route('blog.details') }}"><i class="fa fa-comments-o"></i> 10</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="blog-date">
                                            <a href="{{ route('blog.details') }}"><i class="fa fa-calendar-o"></i> June, 24th 2017</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-blog">
                                    <div class="blog-img">
                                        <a href="{{ route('blog.details') }}"><img src="{{ asset('frontend/img/blog/blog-15.jpg') }}" alt=""></a>
                                    </div>
                                    <div class="blog-content-wrap">
                                        <span>BBA</span>
                                        <div class="blog-content">
                                            <h4><a href="{{ route('blog.details') }}">Learn English in ease.</a></h4>
                                            <p>doloremque laudan tium, totam ersps uns iste natus</p>
                                            <div class="blog-meta">
                                                <ul>
                                                    <li><a href="{{ route('blog.details') }}"><i class="fa fa-user"></i> Adrin Azra</a></li>
                                                    <li><a href="{{ route('blog.details') }}"><i class="fa fa-comments-o"></i> 10</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="blog-date">
                                            <a href="{{ route('blog.details') }}"><i class="fa fa-calendar-o"></i> June, 24th 2017</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                    </div>
                </div>
                <div class="col-xl-3 col-lg-4">
                    <div class="sidebar-style">


                        <div class="sidebar-recent-post mb-35">
                            <div class="sidebar-title mb-40">
                                <h4>Recent Post</h4>
                            </div>
                            <div class="recent-post-wrap">
                                @if ($blogs)
                                    @foreach ($blogs as $blog)
                                        <div class="single-recent-post">
                                            <div class="recent-post-img">
                                                <a href="{{ route('blog-details', $blog->slug) }}"><img
                                                        src="{{ asset('/storage/blog/' . $blog->image) }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="recent-post-content">
                                                <h5><a
                                                        href="{{ route('blog-details', $blog->slug) }}">{{ $blog->title }}</a>
                                                </h5>
                                                <span>{{ $blog->category->name ?? '' }}</span>

                                            </div>
                                        </div>
                                    @endforeach
                                @endif

                            </div>
                        </div>

                        <div class="sidebar-recent-course-wrap mb-40">
                            <div class="sidebar-title mb-40">
                                <h4>Recent Courses</h4>
                            </div>
                            <div class="sidebar-recent-course">
                                @if ($courses)
                                    @foreach ($courses as $course)
                                        <div class="sin-sidebar-recent-course">
                                            <div class="sidebar-recent-course-img">
                                                <a href="{{ route('course-details', $course->slug) }}"><img
                                                        src="{{ asset('storage/' . $course->banner_image) }}" "
                                                                            alt=""></a>
                                                                </div>
                                                                <div class="sidebar-recent-course-content">
                                                                    <h4><a href="{{ route('course-details', $course->slug) }}">{{ $course->name }}</a></h4>
                                                                    <ul>
                                                                        <li>Credits : {{ $course->credit_hour }} Hours</li>
                                                                      
                                                                    </ul>
                                                                   
                                                                </div>
                                                            </div>
     @endforeach
                                    @endif

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="brand-logo-area pb-130">
        <div class="container">
            <div class="brand-logo-active owl-carousel">
                <div class="single-brand-logo">
                    <a href="#"><img src="assets/img/brand-logo/1.png" alt=""></a>
                </div>
                <div class="single-brand-logo">
                    <a href="#"><img src="{{ asset('frontend/img/brand-logo/2.png') }}" alt=""></a>
                </div>
                <div class="single-brand-logo">
                    <a href="#"><img src="{{ asset('frontend/img/brand-logo/3.png') }}" alt=""></a>
                </div>
                <div class="single-brand-logo">
                    <a href="#"><img src="{{ asset('frontend/img/brand-logo/4.png') }}" alt=""></a>
                </div>
                <div class="single-brand-logo">
                    <a href="#"><img src="{{ asset('frontend/img/brand-logo/5.png') }}" alt=""></a>
                </div>
                <div class="single-brand-logo">
                    <a href="#"><img src="{{ asset('frontend/img/brand-logo/6.png') }}" alt=""></a>
                </div>
                <div class="single-brand-logo">
                    <a href="#"><img src="{{ asset('frontend/img/brand-logo/2.png') }}" alt=""></a>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
