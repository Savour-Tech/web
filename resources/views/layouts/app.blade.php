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


    <!-- Styles -->
    <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/hover.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/user.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/user-reset.css') }}" rel="stylesheet" type="text/css" />
    
</head>
<body class="skin-default-dark fix-header single-column fix-sidebar {{ $themeConfig['body_classes'] }}">

    @include('layouts.preloader')

    <div id="main-wrapper">

        @include('layouts.header')
        
        @yield('content')
        
        @if ($themeConfig['show_footer'])
            @include('layouts.footer')
        @endif

    </div>


    <!-- Scripts -->
    <script src="{{ asset('plugins/jquery/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('plugins/popper/popper.min.js') }}" ></script>
    <script src="{{ asset('plugins/bootstrap/dist/js/bootstrap.min.js') }}" ></script>
    <script src="{{ asset('plugins/sticky-kit-master/dist/sticky-kit.min.js') }}" ></script>
    <script src="{{ asset('plugins/toast-master/js/jquery.toast.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('plugins/moment/moment.js') }}"></script>

    <script src="{{ asset('js/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('js/waves.js') }}"></script>

    <script src="{{ asset('js/app.js') }}"></script>
    
</body>
</html>
