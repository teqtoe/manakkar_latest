          <p class="logout-btn">
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="la la-sign-out"></i> {{__t('logout')}}
            </a>
          </p>
    <!-- Brand Logo -->
    <!-- <a class="navbar-brand site-main-logo my-2" href="{{route('home')}}">
        @php
            $logoUrl = media_file_uri(get_option('site_logo'));
        @endphp

        @if($logoUrl)
            <img src="{{media_file_uri(get_option('site_logo'))}}" alt="{{get_option('site_title')}}" />
        @else
            <img src="{{asset('assets/images/teqtoe-lms-logo.svg')}}" alt="{{get_option('site_title')}}" />
        @endif
    </a> -->
    <!-- Sidebar -->
    <!-- <div class="sidebar">
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


      <nav class="navbar bg-light menumobile menuoff">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a class="nav-link" href="#">Link 1</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link 2</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                Dropdown link
              </a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Link 1</a>
                <a class="dropdown-item" href="#">Link 2</a>
                <a class="dropdown-item" href="#">Link 3</a>
              </div>
            </li>
            <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../../index.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../../index2.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../../index3.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v3</p>
                </a>
              </li>
            </ul>
          </li>
          </ul>
        </nav>
    </div> -->



<!-- <ul class="dashboard-menu">

    <a class="navbar-brand site-main-logo my-3" href="{{route('home')}}">
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


 -->