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
<body class="{{get_option('enable_rtl')? 'rtl' : ''}}">

<div class="main-navbar-wrap">


    <nav class="navbar navbar-expand-lg navbar-light">

        <div class="container">
            <a class="navbar-brand site-main-logo" href="{{route('home')}}">
                @php
                    $logoUrl = media_file_uri(get_option('site_logo'));
                @endphp

                @if($logoUrl)
                    <img src="{{media_file_uri(get_option('site_logo'))}}" alt="{{get_option('site_title')}}" />
                @else
                    <img src="{{asset('assets/images/teqtoe-lms-logo.svg')}}" alt="{{get_option('site_title')}}" />
                @endif
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNavbarContent" aria-controls="mainNavbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainNavbarContent">
                <ul class="navbar-nav categories-nav-item-wrapper mt-2 mt-lg-0">

                </ul>

                

                <ul class="navbar-nav main-nav-auth-profile-wrap justify-content-end mt-2 mt-lg-0 flex-grow-1">

                    <li class="nav-item nav-categories-item">
                        <a class="nav-link" href="{{route('categories')}}"> <i class="la la-th-large"></i> {{__t('categories')}}  <i class="fa fa-angle-down"></i> </a>

                        <div class="categories-menu">
                            <ul class="categories-ul-first">
                                <li>
                                    <a href="{{route('categories')}}">
                                        <i class="la la-th-list"></i> {{__t('all_categories')}}
                                    </a>
                                </li>
                                @foreach($categories as $category)
                                    <li>
                                        <a href="{{route('category_view', $category->slug)}}">
                                            <i class="la {{$category->icon_class}}"></i> {{$category->category_name}}

                                            @if($category->sub_categories->count())
                                                <i class="la la-angle-right"></i>
                                            @endif
                                        </a>
                                        @if($category->sub_categories->count())
                                            <ul class="level-sub">
                                                @foreach($category->sub_categories as $subCategory)
                                                    <li><a href="{{route('category_view', $subCategory->slug)}}">{{$subCategory->category_name}}</a></li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                    </li>

                    <li class="nav-item nav-categories-item">
                        <a class="nav-link" href=""> MCQ <i class="fa fa-angle-down"></i> </a>

                        <div class="categories-menu">
                            <ul class="categories-ul-first">
                                <li>
                                    <a href="">J2EE</a>
                                </li>
                                <li>
                                    <a href="">IAS</a>
                                </li>
                                <li>
                                    <a href="">IPS</a>
                                </li>
                            </ul>
                        </div>

                    </li>
                    <li class="nav-item dropdown mini-cart-item">
                        {!! view_template_part('template-part.minicart') !!}
                    </li>

                    @if (Auth::guest())
                        <li class="nav-item mr-2 ml-2">
                            <a class="nav-link btn btn-login-outline login-btn" href="{{route('login')}}"> <i class="fa fa-sign-in"></i> Login / Signup</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link btn btn-theme-primary signup-btn" href="{{route('register')}}"> <i class="la la-user-plus"></i> {{__t('signup')}}</a>
                        </li> -->
                    @else
                        <li class="nav-item main-nav-right-menu nav-item-user-profile">
                            <a class="nav-link profile-dropdown-toogle" href="javascript:;">
                                <span class="top-nav-user-name">
                                    {!! $auth_user->get_photo !!}
                                </span>
                            </a>
                            <div class="profile-dropdown-menu pt-0">

                                <div class="profile-dropdown-userinfo bg-light p-3">
                                    <p class="m-0">{{ $auth_user->name }}</p>
                                    <small>{{$auth_user->email}}</small>
                                </div>

                                @include(theme('dashboard.sidebar-menu'))
                            </div>
                        </li>
                    @endif

                </ul>

            </div>
        </div>

    </nav>

</div>
