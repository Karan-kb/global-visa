<header class="header-area">
    <div class="header-top bg-img" style="background-image:url(assets/img/icon-img/header-shape.png);">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-7 col-12 col-sm-8">
                    <div class="header-contact">
                        <ul>
                            <li><i class="fa fa-phone"></i> {{ App\Helpers\Helper::getInfoValue('phone') }}
                            </li>
                            <li><i class="fa fa-envelope-o"></i><a
                                    href="#">{{ App\Helpers\Helper::getInfoValue('email') }}</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="header-bottom sticky-bar clearfix">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-6 col-4">
                    <div class="logo">
                        <a href="/">
                            <img alt=""
                                src="{{ asset('storage/info/' . App\Helpers\Helper::getInfoValue('logo')) }}">
                        </a>
                    </div>
                </div>
                <div class="col-lg-10 col-md-6 col-8">
                    <div class="menu-cart-wrap">
                        <div class="main-menu">
                            <nav>
                                <ul>
                                    <li><a href="/"> HOME </a>

                                    </li>
                                    <li><a href="{{ route('about') }}"> ABOUT </a></li>

                                    <li><a href="#"> DESTINATIONS <i class="fa fa-angle-down"></i> </a>
                                        <ul class="submenu">

                                            @if (App\Helpers\Helper::getDestinations())
                                                @foreach (App\Helpers\Helper::getDestinations() as $study_destination)
                                                    <li><a
                                                            href="{{ route('destination-details', $study_destination->slug) }}">{{ $study_destination->title }}</a>
                                                    </li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </li>

                                    <li><a class="" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false"> TEST PREPARATIONS <i class="fa fa-angle-down"></i>
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

                                    <li><a href="{{ route('scholarship') }}"> SCHOLARSHIP </a></li>

                                    <li><a href="{{ route('allblogs') }}"> BLOG </a>

                                    </li>
                                    <li><a href="{{ route('contact') }}"> CONTACT </a></li>
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
                            <li><a href="/"> HOME </a>

                            </li>
                            <li><a href="{{ route('about') }}"> ABOUT </a></li>

                            <li><a href="{{ route('destination') }}"> DESTINATIONS <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="submenu">
                                    @if (App\Helpers\Helper::getDestinations())
                                        @foreach (App\Helpers\Helper::getDestinations() as $study_destination)
                                            <li><a
                                                    href="{{ route('destination-details', $study_destination->slug) }}">{{ $study_destination->title }}</a>
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

                            <li><a href="{{ route('scholarship') }}"> SCHOLARSHIP </a></li>

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
