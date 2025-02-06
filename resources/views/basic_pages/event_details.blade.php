@extends('basic_pages.layouts.master')

@section('content')
    <div class="breadcrumb-area">
        <div class="breadcrumb-top default-overlay bg-img breadcrumb-overly-2 pt-100 pb-95"
            style="background-image:url({{ asset('storage/page/' . ($page->pagecontents[0]->image ?? 'frontend/img/icon-img/service-9.png')) }});">
            <div class="container">
                <h2>{{ $page->pagecontents[0]->title ?? 'Event Details' }}</h2>
                <p>{!! $page->pagecontents[0]->content ?? 'Event Details' !!}
                </p>
            </div>
        </div>
        <div class="breadcrumb-bottom">
            <div class="container">
                <ul>
                    <li><a href="#">Home</a> <span><i class="fa fa-angle-double-right"></i>Event Details</span></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="event-details-area pt-130">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-8">
                    <div class="event-left-wrap mr-40">
                        <div class="event-description">
                            <div class="description-date-social mb-45">
                                <div class="description-date-time">
                                    <div class="description-date">
                                        @php
                                            $eventDate = \Carbon\Carbon::parse($event->event_date);
                                            $day = $eventDate->format('j'); // Day without leading zero
                                            $daySuffix = $eventDate->format('S'); // Day suffix (st, nd, rd, th)
                                            $month = $eventDate->format('M'); // Abbreviated month name
                                        @endphp
                                        <span class="event-date">{{ $day }}{{ $daySuffix }}</span>
                                        <span>{{ $month }}</span>
                                    </div>

                                    <div class="description-meta-wrap">
                                        <div class="description-meta">
                                            <i class="fa fa-location-arrow"></i>
                                            <span>{{ $event->location }}</span>
                                        </div>
                                        <div class="description-meta">
                                            <i class="fa fa-clock-o"></i>
                                            <span>{{ \Carbon\Carbon::parse($event->event_time)->format('h:i a') }}</span>

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <img src="{{ asset('storage/event/' . $event->image) }}" alt="">
                            <h3>{{ $event->title }}</h3>
                            <p>{!! $event->body !!}</p>

                            {{-- <div class="seat-book-wrap bg-img mt-80 "
                                style="background-image:url({{ asset('frontend/img/event/seat-book.jpg') }});">
                                <div class="seat-book-title text-center">
                                    <h3>Book Your Seat Now</h3>
                                    <p> natus error sit voluptatem accu antium dolorem laudantium, totam rem aperiam, eaque
                                        entore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                                </div>
                                <div class="seat-book-form">
                                    <form>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <input placeholder="Name" type="text">
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <input placeholder="Email" type="email">
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <input name="name" placeholder="Date" type="text">
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <input placeholder="Time" type="text">
                                            </div>
                                            <div class="col-lg-12">
                                                <textarea placeholder="Message"></textarea>
                                                <button class="seat-book-btn" type="submit">BOOK NOW</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="location-area mt-80">
                                <div id="location"></div>
                            </div> --}}
                        </div>
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
                                                <a href="#"><img src="{{ asset('storage/blog/' . $blog->image) }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="recent-post-content">
                                                <h5><a href="#">{{ $blog->title }}</a></h5>
                                                <span>{{ $blog->category->name ?? '' }}</span>
                                                {{-- <p>Datat non proident qui offici.hafw adec qart.</p> --}}
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
                                                <a href="#"><img
                                                        src="{{ asset('storage/' . $course->banner_image) }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="sidebar-recent-course-content">
                                                <h4><a href="#">{{ $course->name }}</a></h4>
                                                <ul>
                                                    <li>Credits : {{ $course->credit_hour }}</li>
                                                    {{-- <li class="duration-color">Duration : 4yrs</li> --}}
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
@endsection
