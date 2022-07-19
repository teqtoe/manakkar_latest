<ul class="dashboard-menu">

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
