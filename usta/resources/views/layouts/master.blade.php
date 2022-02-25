<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>@yield('title')</title>
        <link rel="stylesheet" href="{{ URL::to('/css/main.css') }}">
        <link rel="shortcut icon" href="/images/gt_favicon.png">

        <link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/font-awesome.min.css">

        <!-- Custom styles for our template -->
        <link rel="stylesheet" href="/css/bootstrap-theme.css" media="screen" >
        <link rel="stylesheet" href="/css/main.css">
        @yield('styles')
    </head>
    <body>
    @include('includes.header')
    @yield('content')
    @include('includes.footer')
    </body>
</html>
