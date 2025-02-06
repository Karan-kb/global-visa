@extends('basic_pages.layouts.master')

@section('content')
    <div class="breadcrumb-area">
        <div class="breadcrumb-top default-overlay bg-img breadcrumb-overly-2 pt-100 pb-95"
            style="background-image:url({{ asset('storage/page/' . ($page->pagecontents[0]->image ?? 'frontend/img/icon-img/service-9.png')) }});">
            <div class="container">
                <h2>{{ $page->pagecontents[0]->title ?? 'Course Details' }}</h2>
                <p>{!! $page->pagecontents[0]->content ?? 'Course Details' !!}
                </p>
            </div>
        </div>
        <div class="breadcrumb-bottom">
            <div class="container">
                <ul>
                    <li><a href="#">Home</a> <span><i class="fa fa-angle-double-right"></i>Course Grid</span></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="course-details-area pt-130">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-8">
                    <div class="course-left-wrap mr-40">
                        <div class="apply-area">
                            <img src="{{ asset('storage/' . $course->banner_image) }}" alt="">
                            {{-- <div class="course-apply-btn">
                                <a href="#" class="default-btn">APPLY NOW</a>
                            </div> --}}
                        </div>
                        <div class="course-tab-list nav pt-40 pb-25 mb-35">

                        </div>
                        <div class="tab-content jump">
                            <div class="tab-pane active" id="course-details-1">
                                <div class="over-view-content">
                                    <h4>COURSE DETAILS</h4>
                                    <h5>Course Name : {{ $course->name }}</h5>
                                    <p>{!! $course->description !!}</p>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="col-xl-3 col-lg-4">
                    <div class="sidebar-style sidebar-res-mrg-none">


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
    </div>
    {{-- <div class="brand-logo-area pt-45 pb-130">
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
