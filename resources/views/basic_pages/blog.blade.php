@extends('basic_pages.layouts.master')

@section('content')
    <div class="breadcrumb-area">
        <div class="breadcrumb-top default-overlay bg-img breadcrumb-overly-3 pt-100 pb-95"
            style="background-image:url({{ asset('storage/page/' . ($page->pagecontents[0]->image ?? 'frontend/img/icon-img/service-9.png')) }});">
            <div class="container">
                <h2>{{ $page->pagecontents[0]->title ?? 'Blog' }}</h2>
                <p>{!! $page->pagecontents[0]->content ?? 'Blogs' !!}
                </p>
            </div>
        </div>
        <div class="breadcrumb-bottom">
            <div class="container">
                <ul>
                    <li><a href="/">Home</a> <span><i class="fa fa-angle-double-right"></i>Blog Grid</span></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="event-area pt-130 pb-130">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-8">
                    <div class="blog-all-wrap mr-40">
                        <div class="row">
                            @if ($blogs)
                                @foreach ($blogs as $blog)
                                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="single-blog mb-30">
                                            <div class="blog-img">
                                                <a href="{{ route('blog-details', $blog->slug) }}"><img
                                                        src="{{ asset('storage/blog/' . $blog->image) }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="blog-content-wrap">
                                                <span>{{ $blog->category->name ?? '' }}</span>
                                                <div class="blog-content">
                                                    <h4><a
                                                            href="{{ route('blog-details', $blog->slug) }}">{{ $blog->title }}</a>
                                                    </h4>
                                                    <p>{!! $blog->short_description !!}</p>

                                                </div>
                                                <div class="blog-date">
                                                    <a href="{{ route('blog-details', $blog->slug) }}"><i
                                                            class="fa fa-calendar-o"></i>
                                                        {{ $blog->created_at->format('F Y,d') }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="pro-pagination-style text-center mt-25">
                            <ul>
                                <!-- Previous page link -->
                                @if ($blogs->onFirstPage())
                                    <li><a class="prev disabled" href="#"><i class="fa fa-angle-double-left"></i></a>
                                    </li>
                                @else
                                    <li><a class="prev" href="{{ $blogs->previousPageUrl() }}"><i
                                                class="fa fa-angle-double-left"></i></a></li>
                                @endif

                                <!-- Page number links -->
                                @for ($i = 1; $i <= $blogs->lastPage(); $i++)
                                    <li>
                                        <a class="{{ $i == $blogs->currentPage() ? 'active' : '' }}"
                                            href="{{ $blogs->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor

                                <!-- Next page link -->
                                @if ($blogs->hasMorePages())
                                    <li><a class="next" href="{{ $blogs->nextPageUrl() }}"><i
                                                class="fa fa-angle-double-right"></i></a></li>
                                @else
                                    <li><a class="next disabled" href="#"><i class="fa fa-angle-double-right"></i></a>
                                    </li>
                                @endif
                            </ul>
                        </div>

                    </div>
                </div>
                <div class="col-xl-3 col-lg-4">
                    <div class="sidebar-style">
                        <div class="sidebar-search mb-40">
                            <div class="sidebar-title mb-40">
                                <h4>Search</h4>
                            </div>
                            <form action="{{ route('search-blogs') }}" method="get" enctype="multipart/form-data">
                                @csrf
                                <input type="text" name ="title" placeholder="Search">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>

                        <div class="sidebar-recent-post mb-35">
                            <div class="sidebar-title mb-40">
                                <h4>Recent Post</h4>
                            </div>
                            <div class="recent-post-wrap">
                                @if ($latest_blogs)
                                    @foreach ($latest_blogs as $blog)
                                        <div class="single-recent-post">
                                            <div class="recent-post-img">
                                                <a href="{{ route('blog-details', $blog->slug) }}"><img
                                                        src="{{ asset('storage/blog/' . $blog->image) }}"
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
                                                        src="{{ asset('storage/' . $course->banner_image) }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="sidebar-recent-course-content">
                                                <h4><a
                                                        href="{{ route('course-details', $course->slug) }}">{{ $course->name }}</a>
                                                </h4>
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
        {{-- <div class="brand-logo-area pb-130">
        <div class="container">
            <div class="brand-logo-active owl-carousel">
                <div class="single-brand-logo">
                    <a href="#"><img src="{{ asset('frontend/img/brand-logo/1.png') }}" alt=""></a>
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
