<style>
    .header-contact .list-line .social-right {
        /* margin-right: 10px; */
    }
</style>
<header class="header-area">
    <div class="header-top bg-img" style="background-image:url();">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12 col-sm-8">
                    <div class="header-contact">
                        <ul class="">
                            <li>
                                <i class="fa fa-phone"></i>
                                {{ App\Helpers\Helper::getInfoValue('phone') }}
                            </li>
                            <li>
                                <i class="fa fa-envelope-o"></i>
                                <a href="#">{{ App\Helpers\Helper::getInfoValue('email') }}</a>
                            </li>
                            <li class="social-right ms-auto d-flex gap-2">
                                <a href="{{ App\Helpers\Helper::getInfoValue('facebook') ?: 'javascript:void(0)' }}" 
                                   target="{{ App\Helpers\Helper::getInfoValue('facebook') ? '_blank' : '_self' }}" 
                                  >
                                    <i class="fa fa-facebook"></i>
                                </a>
                                
                                <a href="{{ App\Helpers\Helper::getInfoValue('linkedIn') ?: 'javascript:void(0)' }}" 
                                   target="{{ App\Helpers\Helper::getInfoValue('linkedIn') ? '_blank' : '_self' }}" 
                                 >
                                    <i class="fa fa-linkedin"></i>
                                </a>
                                
                                <a href="{{ App\Helpers\Helper::getInfoValue('twitter') ?: 'javascript:void(0)' }}" 
                                   target="{{ App\Helpers\Helper::getInfoValue('twitter') ? '_blank' : '_self' }}" 
                                  >
                                    <i class="fa fa-twitter"></i>
                                </a>
                                
                                <a href="{{ App\Helpers\Helper::getInfoValue('instagram') ?: 'javascript:void(0)' }}" 
                                   target="{{ App\Helpers\Helper::getInfoValue('instagram') ? '_blank' : '_self' }}" 
                                   >
                                    <i class="fa fa-instagram"></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom sticky-bar clearfix">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-2 col-sm-6">
                    <div class="logo">
                        <a href="/">
                            <img alt=""
                                src="{{ asset('storage/info/' . App\Helpers\Helper::getInfoValue('logo')) }}">
                        </a>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-10 col-sm-6">
                    <div class="menu-cart-wrap">
                        <div class="main-menu">
                            <nav>
                                <ul>
                                    <li>
                                        <a href="/">Home</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('about') }}">About</a>
                                    </li>
                                    <li>
                                        <a href="#">Destination <i class="fa fa-angle-down"></i></a>
                                        <ul class="submenu">
                                            @php
                                                $destinations = collect(App\Helpers\Helper::getDestinations())->sortBy(
                                                    fn($destination) => strtolower($destination->title),
                                                );
                                            @endphp

                                            @if ($destinations->isNotEmpty())
                                                @foreach ($destinations as $study_destination)
                                                    <li>
                                                        <a
                                                            href="{{ route('destination-details', $study_destination->slug) }}">
                                                            {{ $study_destination->title }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </li>

                                    <li>
                                        <a class="" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">Test Preparations<i class="fa fa-angle-down"></i>
                                        </a>
                                        <ul class="submenu">
                                            <li class="sub-menu"><a href="/english-test">English Test</a>
                                                <ul>
                                                    @foreach ($english as $e)
                                                        <li><a href="/test/{{ $e->title }}">{{ $e->title }}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                            <li class="sub-menu"><a href="/language-test">Language Test</a>
                                                <ul>

                                                    @foreach ($language as $l)
                                                        <li><a href="/test/{{ $l->title }}">{{ $l->title }}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Services<i class="fa fa-angle-down"></i> </a>
                                        <ul class="submenu">

                                            @if (App\Helpers\Helper::getServices())
                                                @foreach (App\Helpers\Helper::getServices() as $service)
                                                    <li><a
                                                            href="{{ route('service-details', $service->slug) }}">{{ $service->title }}</a>
                                                    </li>
                                                @endforeach
                                            @endif

                                        </ul>
                                    </li>
                                    {{-- <li>
                                        <a href="{{ route('scholarship') }}">Scholarship</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('allblogs') }}">Blog</a>
                                    </li> --}}
                                    <li>
                                        <a href="{{ route('contact') }}">Contact</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>

                    </div>
                </div>
            </div>
            <div class="mobile-menu-area">
                <div class="mobile-menu">
                    <nav id="mobile-menu-active">
                        <ul class="menu-overflow">
                            <li>
                                <a href="/"> HOME </a>
                            </li>
                            <li><a href="{{ route('about') }}"> ABOUT </a></li>

                            <li>
                                <a href="#">Destination <i class="fa fa-angle-down"></i></a>
                                <ul class="submenu">
                                    @php
                                        $destinations = collect(App\Helpers\Helper::getDestinations())->sortBy(
                                            fn($destination) => strtolower($destination->title),
                                        );
                                    @endphp

                                    @if ($destinations->isNotEmpty())
                                        @foreach ($destinations as $study_destination)
                                            <li>
                                                <a href="{{ route('destination-details', $study_destination->slug) }}">
                                                    {{ $study_destination->title }}
                                                </a>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </li>

                            <li><a class="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    TEST PREPARATIONS <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="submenu">
                                    <li class="sub-menu"><a href="/english-test">ENGLISH TEST</a>
                                        <ul>
                                            @foreach ($english as $e)
                                                <li><a href="/test/{{ $e->title }}">{{ $e->title }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>

                                    <li class="sub-menu"><a href="/language-test">LANGUAGE TEST </a>
                                        <ul>

                                            @foreach ($language as $l)
                                                <li><a href="/test/{{ $l->title }}">{{ $l->title }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>

                                </ul>

                            </li>

                            <li><a href="#"> SERVICES <i class="fa fa-angle-down"></i> </a>
                                <ul class="submenu">
                                    @if (App\Helpers\Helper::getServices())
                                        @foreach (App\Helpers\Helper::getServices() as $service)
                                            <li><a
                                                    href="{{ route('service-details', $service->slug) }}">{{ $service->title }}</a>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </li>

                            {{-- <li><a href="{{ route('scholarship') }}"> SCHOLARSHIP </a></li> --}}

                            <li><a href="{{ route('allblogs') }}"> BLOG </a>

                            </li>
                            <li><a href="{{ route('contact') }}"> CONTACT </a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
