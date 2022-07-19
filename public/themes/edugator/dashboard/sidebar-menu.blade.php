<ul class="dashboard-menu">

            <a class="navbar-brand site-main-logo my-4" href="{{route('home')}}">
                @php
                    $logoUrl = media_file_uri(get_option('site_logo'));
                @endphp

                @if($logoUrl)
                    <img src="{{media_file_uri(get_option('site_logo'))}}" alt="{{get_option('site_title')}}" />
                @else
                    <img src="{{asset('assets/images/teqtoe-lms-logo.svg')}}" alt="{{get_option('site_title')}}" />
                @endif
            </a>
                    @if (Auth::guest())
                        <li class="nav-item mr-2 ml-2">
                            <a class="nav-link btn btn-login-outline login-btn" href="{{route('login')}}"> <i class="fa fa-sign-in"></i> Login / Signup</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link btn btn-theme-primary signup-btn" href="{{route('register')}}"> <i class="la la-user-plus"></i> {{__t('signup')}}</a>
                        </li> -->
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
</ul>
