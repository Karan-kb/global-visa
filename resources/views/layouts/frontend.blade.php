<html lang="en">

<head>
  <meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
  <meta content="IE=edge" http-equiv="X-UA-Compatible">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="discovery" name="description">
  <meta content="discovery" name="keywords">
  <meta content="discovery" name="author">
  <title>
  @yield('title')
    </title>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  
  
  <!-- Fav icon -->
  <link href="{{ asset('assets/images/logo/favicon.png')}}" rel="shortcut icon">
  <!-- Font Family-->
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
  <!--bootstrap css-->
  <link href="{{ asset('assets/css/bootstrap.css')}}" rel="stylesheet" type="text/css">
  <!-- color css -->
  <link href="{{ asset('assets/css/inner-page.css')}}" rel="stylesheet" type="text/css">
  <link href="{{ asset('assets/css/flaticon-set.css')}}" rel="stylesheet" />
  <link href="{{ asset('assets/css/color-6.css')}}" rel="stylesheet" type="text/css">
  <!--owl carousel css-->
  <link href="{{ asset('assets/css/owl.carousel.min.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/css/owl.theme.default.min.css')}}" rel="stylesheet">
  <!-- Icons -->
  
  <link href="{{ asset('assets/css/themify.css')}}" rel="stylesheet" type="text/css">
  <!-- AOS css-->
  <link href="{{ asset('assets/css/aos.css')}}" rel="stylesheet" type="text/css">
  <!-- flat Icons -->
  <link href="{{ asset('assets/css/flaticon.css')}}" rel="stylesheet" type="text/css">
  <!--magnific popup css-->
  <link href="{{ asset('assets/css/magnific-popup.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
  
   <!-- Toaster -->  
   <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">


  
</head>



<body data-offset="50" data-spy="scroll" data-target=".navbar">
  <!--loader start-->
  <div class="loader-wrapper">
    <div class="loader">
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
    </div>
  </div>
  <!--loader end-->

  </div>
  <!-- Plug Bootstrap Nav Bar code here -->
  <header class="agency nav-abs custom-scroll">

    <div class="top-header" style="padding:10px 0px;">
      <div class="container top-header-custom">
        <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-xl-2 col-md-3 col-6 ">
                <a class="logo-light m-r-auto" href="/"><img alt="" class="img-fluid logo" src="/storage/info/{{$infos->logo}}"></a>
              </div>
              <div class="col-xl-8 col-md-6 col-0 address-bar m-auto">


                <div class="info box">
                  <ul>
                      
                    <li>
                      <span><i class="fas fa-map"></i>Head Office  <span style="margin-right:5px;"> :</span></span>
                      {{$infos->address}}
                    </li>

                    

                    <li>
                      <span><i class="fas fa-phone"></i> Contact <span style="margin-right:5px;"> :</span></span>
                      {{$infos->phone}}
                    </li>
                  </ul>
                </div>


              </div>

              <div class="col-xl-2 col-md-3 col-6 user-social m-auto">
                <ul class="text-right">
                  <li class="facebook">
                    <a href="{{$infos->facebook}}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                  </li>
                  <li class="twitter">
                    <a href="{{$infos->twitter}}" target="_blank"><i class="fab fa-twitter"></i></a>
                  </li>

                  <li class="linkedin">
                    <a href="{{$infos->linkedIn}}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                  </li>
                </ul>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
    <div class="secondary-menu">

      <div class="container menu-head">
        <div class="row">
          <div class="col">
    <nav>
      <div class="responsive-btn">
        <a class="toggle-nav" href="#"><i aria-hidden="true" class="fa fa-bars text-white"></i></a>
      </div>
      <div class="navbar p-0" id="togglebtn">
        <div class="responsive-btn">
          <h5 class="btn-back">back</h5>
        </div>
        <ul class="main-menu w-100">
                           
                  <?php echo $menus?>
        <li>
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                      aria-expanded="false">STUDY DESTINATION <i class='fas fa-angle-down'></i></a>
                    <ul class="dropdown-menu">
            @foreach($destination as $d)
              <li><a href="/study-destination/{{$d->slug}}">{{$d->name}}</a></li>
              
            @endforeach

            </ul>
        </li>

        <li>
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
              aria-expanded="false">TEST PREPARATION <i class='fas fa-angle-down'></i></a>
            <ul class="dropdown-menu">
                


              <li class="sub-menu"><a href="/english-test" style="display: block;">ENGLISH TEST <i class='fas fa-angle-right'></i></a>
                <ul>
                @foreach($english as $e)
                  <li><a href="/test/{{$e->title}}">{{$e->title}}</a></li>
                 @endforeach 
                </ul>
              </li>
              <li class="sub-menu"><a class="sub-menu-title" href="/language-test"  style="display: block;">LANGUAGE TEST <i class='fas fa-angle-right'></i></a>
                <ul>

                @foreach($language as $l)
                  <li><a href="/test/{{$l->title}}">{{$l->title}}</a></li>
                 @endforeach 
                </ul>
              </li>
            </ul>
          </li>

          <li>
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
              aria-expanded="false">SERVICES <i class='fas fa-angle-down'></i></a>
            <ul class="dropdown-menu">
              @foreach($servicess as $servicess)
                <li><a href="/services/{{$servicess->slug}}">{{$servicess->title}}</a></li>
              @endforeach    


              </ul>
            </li>
            <li><a class="nav-link" href="{{route('allblogs')}}" style="display: block;">BLOG</a>
            </li>
            <li><a class="nav-link" href="/contact" style="display: block;">CONTACT</a>
            </li>
            
             
        </ul>
      </div>
    </nav>
  </div>
        </div>
      </div>
    </div>
  </header>
 
  <!-- yield here -->
  @yield('content')
      <!-- yield ends -->

  <!--footer start-->
  <footer class="agency footer2">
    <div class="container">
      <div class="row">
        <div class="col-lg-2 col-md-4 col-sm-12 set-first">
          <div class="logo-sec">
            <div class="footer-title mobile-title">
              <h3 class="text-white">About Us</h3>
            </div>
            <div class="footer-contant">
                <a class="logo-light m-r-auto" href="/"><img alt="" class="img-fluid footer-logo" src="/storage/info/{{$infos->logo}}" style="height:50px; width:200px;"></a>
              
              <div class="footer-para">

                <h6 class="text-white para-address">{{$infos->address}}</h6>

              </div>
              <ul class="d-d-flex footer-social social">
                <li class="footer-social-list">
                  <a href="{{$infos->facebook}}" target="_blank"><i aria-hidden="true" class="fab fa-facebook-f"></i></a>
                </li>
                <li class="footer-social-list">
                  <a href="{{$infos->twitter}}" target="_blank"><i aria-hidden="true" class="fab fa-twitter"></i></a>
                </li>
                <li class="footer-social-list">
                  <a href="{{$infos->linkedIn}}" target="_blank"><i aria-hidden="true" class="fab fa-linkedin-in"></i></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-2 col-md-4 col-sm-12">
          <div class="footer-title mobile-title">
            <h3 class="text-white">services</h3>
          </div>
          <div class="footer-contant">
            <h5 class="footer-headings">services</h5>
            <div>
              <ul class="footer-lists op-text">
                  @foreach($service as $s)
                <li>
                  <a href="/services/{{$s->slug}}"><?php echo strtoupper($s->title); ?></a>
                </li>
                @endforeach
               
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-2 col-md-4 col-sm-12">
          <div class="footer-title mobile-title">
            <h3 class="text-white">Study Destination</h3>
          </div>
          <div class="footer-contant">
            <h5 class="footer-headings">Study Destination</h5>
            <div>
              <ul class="footer-lists op-text">
                  @foreach($destination as $d)
                <li>
                  <a href="/study-destination/{{$d->slug}}"><?php echo strtoupper($d->name); ?></a></a>
                </li>
                @endforeach
                
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-2 col-md-4 col-sm-12">
          <div class="footer-title mobile-title">
            <h3 class="text-white">Support</h3>
          </div>
          <div class="footer-contant">
            <h5 class="footer-headings">Support</h5>
            <div>
              <ul class="footer-lists op-text">
                <li>
                  <a href="/services/training-classes">For Training</a>
                </li>
                <li>
                  <a href="/scholarship">For Abroad Study</a>
                </li>
                <li>
                  <a href="/all-services">For Services</a>
                </li>
                <li>
                  <a href="/faqs">General Help</a>
                </li>
              </ul>
            </div>
          </div>
        </div>

        <div class="col-lg-2 col-md-4 col-sm-12">
            <div class="footer-title mobile-title">
              <h3 class="text-white">Program List</h3>
            </div>
            <div class="footer-contant">
              <h5 class="footer-headings">Program List</h5>
              <div>
                <ul class="footer-lists op-text">
                    @foreach($english as $english)
                  <li>
                    <a href="/test/{{$english->title}}">{{$english->title}}</a>
                  </li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
        <div class="col-lg-2 col-md-4 col-sm-12 set-last">
          <div class="footer-title mobile-title">
            <h3 class="text-white">Post Tags</h3>
          </div>
          <div class="footer-contant">
            <h5 class="footer-headings">Post Tags</h5>
            <div class="link-btns">
              <ul>
                <li class="buttons">
                  <a href="/our-pride">CREW</a>
                </li>
                <li class="buttons">
                  <a href="/all-services">SERVICES</a>
                </li>
                <!--
                <li class="buttons">
                  <a href="/our-team">OUR TEAM</a>
                </li>-->
                
                <li class="buttons">
                  <a href="/english-test">TEST PREPARATION</a>
                </li>
                <li class="buttons">
                  <a href="/">HOME</a>
                </li>
                <li class="buttons">
                  <a href="/allblogs">BLOG</a>
                </li>
                

              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!--footer end-->

  <!--copyright start-->
  <section class="copyright-custom">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-6">
              <label>
                © Copyright 2019. All Rights Reserved by
                <a href="#">Global Interface</a>
              </label>
            </div>
            <div class="col-md-6 link">
              <ul>
                <li>
                  <a href="#">Terms of user</a>
                </li>
                <li>
                  <a href="#">License</a>
                </li>
                <li>
                  <a href="#">Support</a>
                </li>
              </ul>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
  <!--copyright start-->

  <!-- Tap on Top-->
  <div class="tap-top">
    <div><i class='fas fa-angle-double-up'></i></div>
  </div>
  <!-- Tap on Ends-->

  <!--Toaster Notification -->
  <script src="{{ asset('assets/js/jquery-3.3.1.min.js')}}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script>
  toastr.options = {
    "closeButton": true,
    "newestOnTop": true,
    "progressBar": true,
    "preventDuplicates": true,
  }
    @if(Session::has('success'))
        toastr.success("{{Session::get('success')}}")
    @elseif(Session::has('error'))
        toastr.error("{{Session::get('error')}}")
    @elseif(Session::has('info'))
        toastr.info("{{Session::get('info')}}")
    @endif
    </script>
    <script>
    @if(count($errors)>0)
        @foreach($errors->all() as $error)
            toastr.error("{{$error}}")
        @endforeach
    @endif
  </script>
  <!-- End of Toaster Notification -->

  <!-- popper js-->
  <script src="{{ asset('assets/js/popper.min.js')}}"></script>

  <!-- Bootstrap js-->
  <script src="{{ asset('assets/js/bootstrap.js')}}"></script>

<!-- SmartMenus jQuery plugin -->

  <!--owl js-->
  <script src="{{ asset('assets/js/owl.carousel.min.js')}}"></script>

  <!-- AOS JS -->
  <script src="{{ asset('assets/js/aos.js')}}"></script>

  <!-- tilt JS -->
  <script src="{{ asset('assets/js/vanilla-tilt.min.js')}}"></script>



  <!-- counter js-->
  <script src="{{ asset('assets/js/jquery.counterup.min.js')}}"></script>
  <script src="{{ asset('assets/js/jquery.waypoints.min.js')}}"></script>

  <!--magnific popup js-->

  <script src="{{ asset('assets/js/bootsnav.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>


  <!-- common js-->
  <script src="{{ asset('assets/js/main.js')}}"></script>
  <script src="{{ asset('assets/js/study-destination.js')}}"></script>
  <script src="{{ asset('assets/js/aos-init.js')}}"></script>

  <script src="{{ asset('assets/js/script6.js')}}"></script>
  
  <script src="https://kit.fontawesome.com/a26d9146a0.js" crossorigin="anonymous"></script>


  <script>
    const mx=document.querySelector('.video-btn');
    const dbtn=document.querySelector('.destination-btn');

    const topVideo=document.querySelector('.top-video');
    const botVideo=document.querySelector('.bottom-video');
    const popVideo=document.querySelector('.popup-video');

    const closeVideo1=document.querySelector('.close-video1');
    const closeb=document.querySelector('.close-bottom');
    console.log(closeb);


    mx.addEventListener("click",function(){
      topVideo.style.display="flex";
    });
    dbtn.addEventListener("click",function(){
      botVideo.style.display="flex";
    });

    closeVideo1.addEventListener("click",function(){
      popVideo.style.display="none";
    });

    closeb.addEventListener("click",function(){
      console.log("hi");
      botVideo.style.display="none";
    });
  </script>

<!-- Brand Partners Carousel -->
<script type="text/javascript">
      $(document).ready(function () {
           @if(\Request::get('admission')==="true")
            $('#modal2').modal('show');
            @endif
        $('.customer-logos').slick({
          slidesToShow: 6,
          slidesToScroll: 1,
          autoplay: true,
          autoplaySpeed: 1500,
          arrows: false,
          dots: false,
          pauseOnHover: false,
          responsive: [{
            breakpoint: 768,
            settings: {
              slidesToShow: 4
            }
          }, {
            breakpoint: 520,
            settings: {
              slidesToShow: 3
            }
          }]
        });

        $('.hot-selling-section').slick({
          slidesToShow: 4,
          slidesToScroll: 1,
          autoplay: true,
          autoplaySpeed: 2500,
          arrows: false,
          dots: false,
          pauseOnHover: false,
          responsive: [{
            breakpoint: 992,
            settings: {
              slidesToShow: 3
            }
          }, {
            breakpoint: 768,
            settings: {
              slidesToShow: 2
            }
          }, {
            breakpoint: 520,
            settings: {
              slidesToShow: 1
            }
          },
          {
            breakpoint: 300,
            settings: {
              slidesToShow: 1
            }
          }
          ]
        });
      });
    </script>
    
    <!-- Load Facebook SDK for JavaScript -->
      <div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v10.0'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>

      <!-- Your Chat Plugin code -->
      <div class="fb-customerchat"
        attribution="setup_tool"
        page_id="629208467715951">
      </div>

    
 
    <!-- Brand Partners Carousel Ends -->
</body>



</html>
