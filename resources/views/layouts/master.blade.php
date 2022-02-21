<!DOCTYPE html>
<!--[if IE 8]><html lang="en" class="no-js ie ie8"><![endif]-->
<!--[if IE 9]><html lang="en" class="no-js ie ie9"><![endif]-->
<!--[if gt IE 9]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <title>My Site - Home Page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&amp;family=Work+Sans:wght@300;400;500;600;700;900&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontside/css/main.min.css')}}">
    <link rel="stylesheet" href="{{ asset('frontside/css/custom.css')}}">
    <!--[if lt IE 9]> <script src="js/ie9fix.min.js"></script><![endif]-->
</head>

<body>

    @include('layouts.includes.header')
    <!-- END: header-->
    @yield('content')
    <!-- END: main-->
    @include('layouts.includes.footer')
    <!-- END: footer-->

    <script src="{{ asset('frontside/js/libs.min.js')}}"></script>
    <script src="{{ asset('frontside/js/plugins.min.js')}}"></script>
    <script src="{{ asset('frontside/js/start.min.js')}}"></script>
    <script src="{{ asset('frontside/ie9fix.min.js')}}"></script>
    <!-- END : scripts-->
</body>

</html>
