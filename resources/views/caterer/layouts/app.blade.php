@php 
    if(empty($themeConfig))
        $themeConfig = [];
    
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
    <link href="{{ asset('plugins/toast-master/css/jquery.toast.css') }}" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/hover.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/user.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/user-reset.css') }}" rel="stylesheet" type="text/css" />
    
    <script type="text/javascript">
        const BASE_URL = @json( config('app.url') );
    </script>
</head>
<body class="skin-default-dark single-column fix-sidebar {{ theme_config($themeConfig, 'body_classes') }}">

    @include('caterer.layouts.preloader')

    <div id="main-wrapper">

        @if (theme_config($themeConfig, 'show_header'))
            @include('caterer.layouts.header')
        @endif

        @if (theme_config($themeConfig, 'show_sidebar'))
            @include('caterer.layouts.sidebar')
        @endif

        @yield('content')
        
        @if (theme_config($themeConfig, 'show_footer'))
            @include('caterer.layouts.footer')
        @endif

    </div>


    <!-- Scripts -->
    <script src="{{ asset('plugins/jquery/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('plugins/popper/popper.min.js') }}" ></script>
    <script src="{{ asset('plugins/bootstrap/dist/js/bootstrap.min.js') }}" ></script>
    <script src="{{ asset('plugins/sticky-kit-master/dist/sticky-kit.min.js') }}" ></script>
    <script src="{{ asset('plugins/toast-master/js/jquery.toast.js') }}"></script>

    <script src="{{ asset('js/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('js/waves.js') }}"></script>

    <script src="{{ asset('js/app.js') }}"></script>
    
</body>
</html>
