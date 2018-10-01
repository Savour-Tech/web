@php 
    if(empty($themeConfig))
        $themeConfig = [];

    //defaults
    $themeConfig['show_footer'] = isset($themeConfig['show_footer'])? $themeConfig['show_footer']: true;
    $themeConfig['body_classes'] = isset($themeConfig['body_classes'])? $themeConfig['body_classes']: true;
@endphp
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <link href="{{ asset('favicon.ico') }}" rel="icon">
    <!-- plugings -->

    <link href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('plugins/jquery-toast/dist/jquery.toast.min.css') }}" rel="stylesheet"/>

    <!-- Styles -->
    <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/hover.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet" type="text/css" />
    
</head>
<body class="skin-default {{ $themeConfig['body_classes'] }}">

    <!--Preloader start-->
    <div class="loader-wrapper">
        <div class="loader">
            <div class="bubble-1"></div>
            <div class="bubble-2"></div>
            <div class="bubble-3"></div>
        </div>
    </div>
    <!--Preloader End-->

    @include('welcome.layouts.header')

    @yield('content')
    
    @if ($themeConfig['show_footer'])
        @include('welcome.layouts.footer')
    @endif


    <!-- Scripts -->
    <script src="{{ asset('plugins/jquery/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('plugins/popper/popper.min.js') }}" ></script>
    <script src="{{ asset('plugins/bootstrap/dist/js/bootstrap.min.js') }}" ></script>
    <script src="{{ asset('js/welcome/scrollreveal.min.js') }}"></script>
    <script src="{{ asset('js/welcome/jquery.counterup.min.js') }}"></script>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/welcome.js') }}"></script>
    
</body>
</html>
