@include(theme('header_user_dashboard'))


<div class="dashboard-wrap">

    <div class="container-fluid pl-0">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-3 col-xl-2 pr-0 bg-white">
                <div class="dashboard-menu-box">
                    <div class="dashboard-menu-col px-3 py-5">
                        @include(theme('dashboard.sidebar-menu'))
                    </div>
                        <div id="user_dashboard_mm" class="user_dashboard_mm">
                            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>

                            @if (Auth::guest())
                                <li class="nav-item mr-2 ml-2">
                                    <a class="nav-link btn btn-login-outline login-btn" href="{{route('login')}}"> <i class="fa fa-sign-in"></i> Login / Signup</a>
                                </li>
                            @else
                                <li class="nav-item main-nav-right-menu nav-item-user-profile mb-4">
                                    <span class="top-nav-user-name profile">
                                        {!! $auth_user->get_photo !!}
                                    </span>
                                    <p class="mt-3 text-center auth-name">{{ $auth_user->name }}</p>
                                </li>
                            @endif

                            <li class="{{request()->is('dashboard') ? 'active' : ''}}"><a href="{{route('dashboard')}}"> <i class="la la-dashboard"></i> {{__t('dashboard')}} </a></li>

                            @php
                            $menus = dashboard_menu();
                            @endphp

                            @if(is_array($menus) && count($menus))
                                @foreach($menus as $key => $instructor_menu)
                                    <li class="{{array_get($instructor_menu, 'is_active') ? 'active' : ''}}">
                                        <a href="{{route($key)}}"> {!! array_get($instructor_menu, 'icon') !!} {!! array_get($instructor_menu, 'name') !!} </a>
                                    </li>
                                @endforeach
                            @endif

                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="la la-sign-out"></i> {{__t('logout')}}
                                </a>
                            </li>

                        </div>

                        <div class="user_mm display-md"> 
                            @php
                                $logoUrl = media_file_uri(get_option('site_logo'));
                            @endphp

                            @if($logoUrl)
                                <img class="logo-img" src="{{media_file_uri(get_option('site_logo'))}}" alt="{{get_option('site_title')}}" />
                            @else
                                <img src="{{asset('assets/images/teqtoe-lms-logo.svg')}}" alt="{{get_option('site_title')}}" />
                            @endif
                          <button class="openbtn" onclick="openNav()">☰</button>
                        </div>
                    </div>
            </div>

            <div class="col-sm-12 col-md-12 col-lg-9 col-xl-10">
                <div class="dashboard-content">
                    @include('inc.flash_msg')
                    @yield('content')
                </div>
            </div>

        </div>
    </div>

</div>


@include(theme('footer_user_dashboard'))