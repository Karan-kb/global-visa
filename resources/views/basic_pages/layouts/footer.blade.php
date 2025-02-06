<footer class="footer-area">
    <div class="footer-top bg-img default-overlay pt-130 pb-80"
        style="background-image:url(({{ asset('frontend/img/bg/bg-4.jpg') }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer-widget mb-40">
                        <div class="footer-title">
                            <h4>ABOUT US</h4>
                        </div>
                        <div class="footer-about">
                            <p>{{ App\Helpers\Helper::getInfoValue('footer_about') }}</p>
                            <div class="f-contact-info">
                                <div class="single-f-contact-info">
                                    <i class="fa fa-home"></i>
                                    <span>{{ App\Helpers\Helper::getInfoValue('address') }}</span>
                                </div>
                                <div class="single-f-contact-info">
                                    <i class="fa fa-envelope-o"></i>
                                    <span><a href="#">{{ App\Helpers\Helper::getInfoValue('email') }}</a></span>
                                </div>
                                <div class="single-f-contact-info">
                                    <i class="fa fa-phone"></i>
                                    <span> {{ App\Helpers\Helper::getInfoValue('mobile') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="footer-widget mb-40">
                        <div class="footer-title">
                            <h4>QUICK LINK</h4>
                        </div>
                        <div class="footer-list">
                            <ul>
                                <li><a href="{{ route('index') }}">Home</a></li>
                                <li><a href="{{ route('about') }}">About Us</a></li>
                                <li><a href="{{ route('allblogs') }}">Blogs</a></li>
                                <li><a href="{{ route('scholarship') }}">Scholarship</a></li>
                                <li><a href="{{ route('contact') }}">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="footer-widget negative-mrg-30 mb-40">
                        <div class="footer-title">
                            <h4>COURSES</h4>
                        </div>
                        <div class="footer-list">
                            <ul>
                                @if (App\Helpers\Helper::getCourse())
                                    @foreach (App\Helpers\Helper::getCourse() as $course)
                                        <li><a href="{{ route('course-details', $course->slug) }}">{{ $course->name }}
                                            </a></li>
                                    @endforeach
                                @endif

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="footer-widget mb-40">
                        <div class="footer-title">
                            <h4>GALLERY</h4>
                        </div>
                        <div class="footer-gallery">
                            <ul>
                                @if (App\Helpers\Helper::getGallery())
                                    @foreach (App\Helpers\Helper::getGallery() as $images)
                                        <li><a href="#"><img
                                                    src="{{ asset('storage/gallery/' . $images->title) }}"
                                                    alt=""></a></li>
                                    @endforeach
                                @endif

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="footer-widget mb-40">
                        <div class="footer-title">
                            <h4>News Latter</h4>
                        </div>
                        <div class="subscribe-style">
                            <p>Dugiat nulla pariatur. Edeserunt mollit anim id est laborum. Sed ut perspiciatis unde</p>
                            <div id="mc_embed_signup" class="subscribe-form">
                                <form method="post" action="{{ route('newsletter-subscription') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div id="mc_embed_signup_scroll" class="mc-form">
                                        <input class="email" type="email" required=""
                                            placeholder="Your E-mail Address" name="email" value="">

                                    </div> &nbsp;
                                    <div class="clear">
                                        <button id="mc-embedded-subscribe" class="button" type="submit"
                                            name="subscribe">
                                            SUBMIT
                                        </button>
                                    </div>

                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="footer-bottom pt-15 pb-15">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-12">
                    <div class="copyright">
                        <p>
                            Copyright ©
                            <a href="#">{{ App\Helpers\Helper::getInfoValue('name') }}</a>
                            . All Right Reserved.
                        </p>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12">
                    <div class="footer-menu-social">
                        <div class="footer-menu">
                            <ul>
                                <li><a href="#">Privacy & Policy</a></li>
                                <li><a href="#">Terms & Conditions of Use</a></li>
                            </ul>
                        </div>
                        <div class="footer-social">
                            <ul>
                                <li><a class="facebook" href="{{ App\Helpers\Helper::getInfoValue('facebook') }}"
                                        target="_blank"><i class="fa fa-facebook"></i></a></li>
                                <li><a class="youtube"
                                        href="{{ App\Helpers\Helper::getInfoValue('study_destination_video') }}"
                                        target="_blank"><i class="fa fa-youtube-play"></i></a></li>
                                <li><a class="twitter" href="{{ App\Helpers\Helper::getInfoValue('twitter') }}"
                                        target="_blank"><i class="fa fa-twitter"></i></a></li>
                                <li><a class="linkedin" href="{{ App\Helpers\Helper::getInfoValue('linkedin') }}"
                                        target="_blank"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
