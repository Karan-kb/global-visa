<!doctype html>
<html class="no-js" lang="zxx">

<head>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:locale" content="en_US"> 
    <meta property="og:site_name" content="{{ App\Helpers\Helper::getInfoValue('name') }}"> 
    @yield('meta_content')

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('storage/info/' . App\Helpers\Helper::getInfoValue('favicon')) }}">

    <!-- CSS
 ============================================ -->
    @include('basic_pages.layouts.css')
    <script src="{{ asset('frontend/js/vendor/modernizr-3.11.7.min.js') }}"></script>
</head>

<body>

    @include('basic_pages.layouts.header')


    @yield('content')

    @include('basic_pages.layouts.footer')

    @include('basic_pages.layouts.js')

</body>

</html>
