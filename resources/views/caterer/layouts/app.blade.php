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
    <link href="{{ asset('plugins/sweetalert/sweetalert.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/toast-master/css/jquery.toast.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Styles -->
    <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/hover.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/spinners.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/caterer.css') }}" rel="stylesheet" type="text/css" />

    <!-- Theme -->
    <link href="{{ asset('css/colors/default.css') }}" id="theme" rel="stylesheet">

    <!-- custom -->
    <link href="{{ asset('css/caterer-reset.css') }}" rel="stylesheet" type="text/css" />
    
    <script type="text/javascript">
        const BASE_URL = @json( config('app.url') );
    </script>
</head>
<body class="skin-default-dark fix-sidebar theme-caterer {{ theme_config($themeConfig, 'body_classes') }}">

    @include('caterer.layouts.preloader')

    <div id="main-wrapper">

        @if (theme_config($themeConfig, 'show_header'))
            @include('caterer.layouts.header')
        @endif

        @if (theme_config($themeConfig, 'show_sidebar'))
            @include('caterer.layouts.sidebar')
        @endif

        <div class="status-wrapper">
            @if (session('success'))
                @component('caterer.layouts.components.status', ['type' => 'success', 'message' => Session::get('success')])@endcomponent
            @endif

            @if (session('error'))
                @component('caterer.layouts.components.status', ['type' => 'danger', 'message' => Session::get('error')])@endcomponent
            @endif
        </div>
        
        <div class="border-top border-primary">
            <div class="page-wrapper">
                @yield('content')

                <div>
                    <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10">
                        <i class="mdi mdi-message text-white"></i>
                    </button>
                </div>
            </div>
            


            @include('caterer.layouts.sidebar_right')
        </div>

        
        
        @if (theme_config($themeConfig, 'show_footer'))
            @include('caterer.layouts.footer')
        @endif

    </div>

    <!-- Scripts -->
    <script src="{{ asset('plugins/jquery/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('plugins/popper/popper.min.js') }}" ></script>
    <script src="{{ asset('plugins/bootstrap/dist/js/bootstrap.min.js') }}" ></script>
    <script src="{{ asset('plugins/sticky-kit-master/dist/sticky-kit.min.js') }}" ></script>
    <script src="{{ asset('plugins/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('plugins/toast-master/js/jquery.toast.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('plugins/moment/moment.js') }}"></script>
    <script src="{{ asset('plugins/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('plugins/datatables/datatables.min.js') }}"></script>

    <script src="{{ asset('js/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('js/waves.js') }}"></script>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/caterer.js') }}"></script>

    <script src="{{ asset('js/caterer-custom.js') }}"></script>
    <script type="text/javascript">
        $(function() {

            @if( Session::has( 'status' ))

                var message = @json(Session::get( 'status' ));

                $.toast({
                    heading: 'Info',
                    text: message,
                    position: 'bottom-left',
                    loaderBg:'#ff6849',
                    icon: 'info',
                    hideAfter: 3000, 
                    stack: 6
                  });
            @endif

        });

        //CKEDITOR.replace( '.ckeditor' );
    </script>
    
</body>
</html>
