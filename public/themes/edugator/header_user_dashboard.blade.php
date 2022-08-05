@php
    use App\Category;
    $categories = Category::whereStep(0)->with('sub_categories')->orderBy('category_name', 'asc')->get();
@endphp

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{get_option('enable_rtl')? 'rtl' : 'auto'}}" >
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{theme_url('favicon.png')}}"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>  @if( ! empty($title)) {{ $title }} | {{get_option('site_title')}}  @else {{get_option('site_title')}} @endif </title>

    <!-- all css here -->

    <!-- bootstrap v3.3.6 css -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/line-awesome.min.css')}}">

    <!-- Teqtoe -->
    <link rel="stylesheet" href="{{theme_asset('css/slick.css')}}">
    <link rel="stylesheet" href="{{theme_asset('css/linea-fonts.css')}}">
    <link rel="stylesheet" href="{{theme_asset('css/flaticon.css')}}">
    <link rel="stylesheet" href="{{theme_asset('css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{theme_asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{theme_asset('css/adminlte.css')}}">
    
    <link rel="stylesheet" href="{{'https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap'}}">

    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Display:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900&display=swap" rel="stylesheet">


@yield('page-css')

    <!-- style css -->
    <link rel="stylesheet" href="{{theme_asset('css/style.css?v=1134')}}">

    <!-- modernizr css -->
    <script src="{{asset('assets/js/vendor/modernizr-2.8.3.min.js')}}"></script>


    <script type="text/javascript">
        /* <![CDATA[ */
        window.pageData = @json(pageJsonData());
        /* ]]> */
    </script>
</head>
<body class="hold-transition sidebar-mini sidebar-collapse {{get_option('enable_rtl')? 'rtl' : ''}}">

<div class="main-navbar-wrap">



</div>
