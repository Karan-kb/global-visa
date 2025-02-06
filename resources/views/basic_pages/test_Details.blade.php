@extends('basic_pages.layouts.master')

@section('content')
    <div class="breadcrumb-area">
        <div class="breadcrumb-top default-overlay bg-img breadcrumb-overly-5 pt-100 pb-95"
            style="background-image:url({{ asset('storage/page/' . ($page->pagecontents[0]->image ?? 'frontend/img/icon-img/service-9.png')) }});">
            <div class="container">
                <h2>{{ $page->pagecontents[0]->title ?? '' }}</h2>
                <p>{{ $detail->title }}</p>
            </div>
        </div>
        <div class="breadcrumb-bottom">
            <div class="container">
                <ul>
                    <li><a href="/">Home</a> <span><i class="fa fa-angle-double-right"></i> {{ $detail->title }}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="contact-area pt-20 pb-20">
        <div class="container">
            <div class="row gap-10 lg:gap-0">
                <div class="col-lg-9">
                    <div class="blog-block bg-white p-6 shadow-md rounded-md">
                        <h3 class="text-2xl font-semibold text-gray-800">{{ $detail->title }}</h3>
                        <hr class="my-4 border-gray-300">
                        <div class="blog-description text-gray-700 leading-relaxed">
                            {!! $detail->body !!}
                        </div>
                    </div> &nbsp;&nbsp;
                    <div class="contact-form-area pt-20 pb-20 bg-gray-100">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="contact-form bg-white p-6 shadow-md rounded-md">
                                        <div class="contact-title mb-6 text-center">
                                            <h2 class="text-2xl font-bold text-gray-800">Connect With Us</h2>
                                        </div>
                                        <form action="{{ route('contact-us') }}" method="post" class="space-y-4"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="test_id" value="{{ $detail->id }}" type="text"
                                                class="w-full p-3 border rounded-md focus:ring focus:ring-blue-300"
                                                required>
                                            <input name="name" placeholder="Enter Your Name*" type="text"
                                                class="w-full p-3 border rounded-md focus:ring focus:ring-blue-300"
                                                required>
                                            <input name="phone" placeholder="Enter Contact Number*" type="text"
                                                class="w-full p-3 border rounded-md focus:ring focus:ring-blue-300">
                                            <input name="email" placeholder="Enter Your Email*" type="email"
                                                class="w-full p-3 border rounded-md focus:ring focus:ring-blue-300"
                                                required>
                                            <textarea name="messege" placeholder="Leave a Message*" rows="4"
                                                class="w-full p-3 border rounded-md focus:ring focus:ring-blue-300"></textarea>
                                            <div class="text-center">
                                                <button
                                                    class="submit btn-style bg-blue-500 text-green px-6 py-3 rounded-md shadow-md hover:bg-blue-600 transition"
                                                    type="submit">SEND MESSAGE</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="sidebar-container bg-gray-50 p-4 rounded-md shadow-md">
                        <h5 class="text-center text-xl font-medium text-gray-800 mb-4">OTHER TESTS</h5>
                        <div class="space-y-4">
                            @foreach ($others as $other)
                                <div class="post-container flex items-center gap-4">
                                    <div class="w-1/3">
                                        <a href="/test/{{ $other->title }}">
                                            <img alt="" class="rounded-md shadow-md"
                                                src="/storage/test/{{ $other->image }}" />
                                        </a>
                                    </div>
                                    <div>
                                        <a href="/test/{{ $other->title }}">
                                            <h5 class="text-lg font-semibold text-gray-700 hover:text-blue-500">
                                                {{ $other->title }}
                                            </h5>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
