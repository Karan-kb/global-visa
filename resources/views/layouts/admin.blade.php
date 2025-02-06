<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>@yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('backend/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('backend/bower_components/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('backend/bower_components/Ionicons/css/ionicons.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet"
        href="{{ asset('backend/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('backend/dist/css/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('backend/dist/css/skins/_all-skins.min.css') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Toaster -->
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    <link href="{{ asset('backend/dist/css/select2.min.css') }}" rel="stylesheet" />

    @stack('css')

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">


</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="/dashboard" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>D</b>E</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>{{ App\Helpers\Helper::getInfoValue('name') }}</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>

                <div class="navbar-custom-menu">

                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="{{ asset('storage/info/' . App\Helpers\Helper::getInfoValue('logo')) }}"
                            class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        {{-- <p>{{ Auth::user()->name }}</p> --}}
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <!-- search form -->
                <form action="#" method="get" class="sidebar-form">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i
                                    class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </form>
                <!-- /.search form -->
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MAIN NAVIGATION</li>
                    <li>
                        <a href="/dashboard">
                            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                        </a>

                    </li>


                    {{-- <li>
                        <a href="{{ route('menu.index') }}">
                            <i class="fa fa-list"></i> <span>Menu</span>
                        </a>
                    </li> --}}

                    <!-- <li>
          <a href="{{ route('institute.index') }}">
            <i class="fa fa-list"></i> <span>Institute</span>
        </a>
     </li>
  -->
                    <li>
                        <a href="{{ route('contact.index') }}">
                            <i class="fa fa-commenting"></i> <span>Contacts</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('message.index') }}">
                            <i class="fa fa-question-circle"></i>
                            <span>Inquiry</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('newsletter.index') }}">
                            <i class="fa fa-envelope"></i><span>Newsletter</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('page.index') }}">
                            <i class="fa fa-paper-plane-o"></i> <span>Custom Page</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('achievement.index') }}">
                            <i class="fa fa-trophy"></i>
                            <span>Achievements</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('album.index') }}">
                            <i class="fa fa-file-image-o"></i> <span>Gallery</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('scholarships.index') }}">
                            <i class="fa fa-certificate"></i>
                            <span>Scholarhsips</span>
                        </a>
                    </li>


                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-btc"></i> <span>Blog</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>

                        <ul class="treeview-menu">
                            <li><a href="{{ route('category.index') }}"><i class="fa fa-list"></i> Category</a></li>
                            <li class="active"><a href="{{ route('blog.index') }}"><i class="fa fa-btc"></i> Blog</a>
                            </li>


                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-tasks"></i> <span>Activities</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>

                        <ul class="treeview-menu">
                            {{-- <li class="active"><a href="{{ route('news.index') }}"><i class="fa fa-newspaper-o"></i>
                                    News</a></li> --}}
                            <li><a href="{{ route('event.index') }}"><i class="fa fa-mortar-board"></i> Events</a>
                            </li>
                            <li><a href="{{ route('questionaire.index') }}"><i class="fa fa-question"></i>
                                    Questionaires</a></li>
                            {{-- <li><a href="{{ route('package.index') }}"><i class="fa fa-rocket"></i> Program
                                    Information</a></li> --}}
                        </ul>
                    </li>

                    {{-- <li>
                        <a href="{{ route('comment.index') }}">
                            <i class="fa fa-comment-o"></i> <span>Comment</span>
                        </a>
                    </li> --}}



                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-language"></i> <span>Test Preparation</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>

                        <ul class="treeview-menu">
                            <li class="active"><a href="{{ route('englishtest.index') }}"><i
                                        class="fa fa-desktop"></i> English Test</a></li>
                            <li><a href="{{ route('languagetest.index') }}"><i class="fa fa-book"></i> Language
                                    Test</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="{{ route('testimonial.index') }}">
                            <i class="fa fa-quote-left"></i>
                            <span>Testimonials</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('universities.index') }}">
                            <i class="fa fa-university"></i><span>Institutes</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-book"></i><span>Study Courses</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>

                        <ul class="treeview-menu">
                            <li class="active"><a href="{{ route('courses.index') }}"><i class="fa fa-book"></i>
                                    Courses</a></li>

                            {{-- <li><a href="{{route('city.index')}}"><i class="fa fa-map-marker"></i> Popular Cities</a></li> --}}
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-plane"></i> <span>Study Destination</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>

                        <ul class="treeview-menu">
                            <li class="active"><a href="{{ route('destinations.index') }}">
                            <li><i class="fa fa-globe"></i> Destination</a></li>
                            <li><a href="{{ route('destination-tests.index') }}"><i class="fa fa-clipboard"></i>
                                    Destination Tests</a></li>

                            <li><a href="{{ route('destination-faqs.index') }}"><i class="fa fa-question-circle"></i>
                                    Destination FAQs</a></li>

                            <li><a href="{{ route('destination-facts.index') }}"><i class="fa fa-info-circle"></i>
                                    Destination Facts</a></li>

                            <li><a href="{{ route('destination-reason.index') }}"><i class="fa fa-balance-scale"></i>
                                    Destination Reason</a></li>


                            <li><a href="{{ route('destination-health.index') }}"><i class="fa fa-heartbeat"></i>
                                    Destination Health</a></li>

                            <li><a href="{{ route('destination-scholarship.index') }}"><i
                                        class="fa fa-graduation-cap"></i>
                                    Destination Scholarship</a></li>

                            <li><a href="{{ route('destination-visa.index') }}"><i
                                        class="fa fa-plane"></i>Destination Visa</a></li>

                            <li><a href="{{ route('destination-job.index') }}"><i class="fa fa-briefcase"></i>
                                    Destination Job</a></li>
                            <li><a href="{{ route('destination-costs.index') }}"><i class="fas fa-credit-card"></i>
                                    Destination Costs</a></li>

                            <li><a href="{{ route('destination-courses.index') }}"><i class="fa fa-book"></i>
                                    Destination Courses</a></li>

                            <li><a href="{{ route('destination-universities.index') }}"><i
                                        class="fa fa-university"></i>
                                    Destination Universities</a></li>
                            {{-- <li><a href="{{ route('destination-key-facts.index') }}"><i
                                        class="fa fa-info-circle"></i>
                                    Destination Key Facts</a></li> --}}
                            {{-- <li><a href="{{ route('highlight.index') }}"><i class="fa fa-star"></i>

                                    Highlights</a></li> --}}
                            {{-- <li><a href="{{route('city.index')}}"><i class="fa fa-map-marker"></i> Popular Cities</a></li> --}}
                        </ul>
                    </li>

                    <li>
                        <a href="{{ route('brand.index') }}">
                            <i class="fa fa-industry"></i>
                            <span>Partners</span>
                        </a>
                    </li>


                    <li>
                        <a href="{{ route('slider.index') }}">
                            <i class="fa fa-sliders"></i>
                            <span>Sliders</span>
                        </a>
                    </li>

                    {{-- <li>
                        <a href="{{ route('resource.index') }}">
                            <i class="fa fa-database"></i>
                            <span>Resource</span>
                        </a>
                    </li> --}}

                    {{-- <li class="treeview crm">
                        <a href="#">
                            <i class="fa fa-address-card-o"></i> <span>CRM</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="student document"><a href="{{ url('my-students') }}"><i
                                        class="fa fa-user"></i>Students Profile </a>
                            <li class="previous_course"><a href="{{ url('previous-courses') }}"><i
                                        class="fa fa-space-shuttle"></i>Score Result </a>
                            <li class="booking"><a href="{{ route('bookings.index') }}"><i
                                        class="fa fa-registered"></i>Registrations </a>
                        </ul>
                    </li> --}}

                    <li>
                        <a href="{{ route('service.index') }}">
                            <i class="fa fa-wrench"></i>
                            <span>Services</span>
                        </a>
                    </li>

                    {{-- <li>
                        <a href="{{ route('branch.index') }}">
                            <i class="fa fa-building"></i>
                            <span>Seconday Branches</span>
                        </a>
                    </li> --}}
                    @if (Auth::user()->role == 1)
                        <li>
                            <a href="{{ route('user.index') }}">
                                <i class="fa fa-user-plus"></i> <span>Add Users</span>
                            </a>
                        </li>
                    @endif
                    <li>
                        <a href="{{ route('info.index') }}">
                            <i class="fa fa-address-card"></i>
                            <span>Company Information</span>
                        </a>
                    </li>

                    <li class="has-treeview ">
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
                            <i class="fa fa-power-off text-danger"></i>
                            <span class="text-danger">Logout</span>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                        </a>
                    </li>

                </ul>

            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 2.4.0
            </div>
            <strong>Copyright &copy; 2021 <a href="https://www.facebook.com/bnodruined">Binod Kisi</a>.</strong> All
            rights
            reserved.
        </footer>


        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->
    <!--Toaster Notification -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <script>
        toastr.options = {
            "closeButton": true,
            "newestOnTop": true,
            "progressBar": true,
            "preventDuplicates": true,
        }
        @if (Session::has('success'))
            toastr.success("{{ Session::get('success') }}")
        @elseif (Session::has('error'))
            toastr.error("{{ Session::get('error') }}")
        @elseif (Session::has('info'))
            toastr.info("{{ Session::get('info') }}")
        @endif
    </script>
    <script>
        @if (count($errors) > 0)
            @foreach ($errors->all() as $error)
                toastr.error("{{ $error }}")
            @endforeach
        @endif
    </script>
    <!-- End of Toaster Notification -->
    <!-- ckeditor -->
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <!-- jQuery 3 -->
    <script src="{{ asset('backend/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset('backend/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- DataTables -->
    <script src="{{ asset('backend/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <!-- SlimScroll -->
    <script src="{{ asset('backend/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('backend/bower_components/fastclick/lib/fastclick.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('backend/dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('backend/dist/js/demo.js') }}"></script>
    <script src="{{ asset('backend/dist/js/select2.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            // Function to convert a string to a slug
            function toSlug(text) {
                return text
                    .toLowerCase() // Convert to lowercase
                    .replace(/[^\w\s-]/g, '') // Remove special characters
                    .trim() // Trim leading/trailing spaces
                    .replace(/\s+/g, '-') // Replace spaces with hyphens
                    .replace(/-+/g, '-'); // Remove consecutive hyphens
            }

            // Listen for input changes in the title field, or fallback to name field if title is not present
            $('input[name="title"], #name').on('input', function() {
                var title = $('input[name="title"]').val(); // Check the title field value
                var sourceText = title ? title : $('#name')
                    .val(); // Use title if present, otherwise fallback to name
                var slug = toSlug(sourceText); // Convert source text to slug
                $('input[name="slug"]').val(slug); // Update the slug field
            });
        });
    </script>

    <!-- page script -->
    <script>
        $(function() {

            $('#example1').DataTable({
                'paging': true,

                'lengthChange': true,
                'searching': true,
                'ordering': true,
                'info': true,
                'autoWidth': false
            })
        })
    </script>

    <script>
        CKEDITOR.replace('editor', {
            filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
            filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
            filebrowserWindowWidth: '1000',
            filebrowserWindowHeight: '700'
        });
    </script>
    @stack('js')
</body>

</html>
