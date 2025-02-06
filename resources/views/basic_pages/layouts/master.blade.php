<!doctype html>
<html class="no-js" lang="zxx">

<head>
    
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Glaxdu - Education Bootstrap 5 Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/img/favicon.png') }}">

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
