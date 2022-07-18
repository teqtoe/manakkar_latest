<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{theme_url('favicon.png')}}"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>  @if( ! empty($title)) {{ $title }} @else {{ get_option('site_title') }} @endif </title>

    <!-- all css here -->
    <!-- google-font css -->
{{--<link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">--}}
<!-- bootstrap v3.3.6 css -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/line-awesome.min.css')}}">

        <!-- Teqtoe -->
    <link rel="stylesheet" href="{{theme_asset('css/slick.css')}}">
    <link rel="stylesheet" href="{{theme_asset('css/linea-fonts.css')}}">
    <link rel="stylesheet" href="{{theme_asset('css/flaticon.css')}}">
    <link rel="stylesheet" href="{{theme_asset('css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{theme_asset('css/font-awesome.min.css')}}">
    
    <link rel="stylesheet" href="{{'https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap'}}">

@yield('page-css')

<!-- style css -->
    <link rel="stylesheet" href="{{theme_asset('css/style.css')}}">

    <!-- modernizr css -->
    <script src="{{asset('assets/js/vendor/modernizr-2.8.3.min.js')}}"></script>


    <script type="text/javascript">
        /* <![CDATA[ */
        window.pageData = @json(pageJsonData());
        /* ]]> */
    </script>

</head>
<body>

@yield('content')

@if( ! auth()->check() && request()->path() != 'login')
    @include(theme('template-part.login-modal-form'))
@endif

<!-- jquery latest version -->
<script src="{{asset('assets/js/vendor/jquery-1.12.0.min.js')}}"></script>
<!-- bootstrap js -->
<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>

@yield('page-js')

<!-- main js -->
<script src="{{theme_asset('js/main.js')}}"></script>



</body>
</html>
