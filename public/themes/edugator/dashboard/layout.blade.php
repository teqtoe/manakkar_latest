@include(theme('header_user_dashboard'))
<div class="dashboard-wrap">
<div class="wrapper">
   <!-- Navbar -->
   <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
         <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fa fa-bars"></i></a>
         </li>

      <!-- Brand Logo -->
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
         <!-- <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Home</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
            </li> -->
      </ul>
      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
         <li class="nav-item mr-5">
            <strong>
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="la la-sign-out"></i> {{__t('logout')}}
            </a>
            </strong>
         </li>
      </ul>
   </nav>
   <!-- /.navbar -->
   <!-- Main Sidebar Container -->
   <aside class="main-sidebar sidebar-light-primary elevation-4">
      <!-- Sidebar -->
      <div class="sidebar">
         <!-- Sidebar user (optional) -->
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            @if (Auth::guest())
            <li class="nav-item mr-2 ml-2">
               <a class="nav-link btn btn-login-outline login-btn" href="{{route('login')}}"> <i class="fa fa-sign-in"></i> Login / Signup</a>
            </li>
            @else
            <div class="image">
               {!! $auth_user->get_photo !!}
            </div>
            <div class="info">
               <a href="#" class="d-block">{{ $auth_user->name }}</a>
            </div>
            @endif
         </div>
         <!-- Sidebar Menu -->
         <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
               <li class="nav-item {{request()->is('dashboard') ? 'active' : ''}}">
                  <a href="{{route('dashboard')}}" class="nav-link">
                     <i class="la la-dashboard nav-icon"></i> 
                     <p> {{__t('dashboard')}} </p>
                  </a>
               </li>
               @php
               $menus = dashboard_menu();
               @endphp
               @if(is_array($menus) && count($menus))
               @foreach($menus as $key => $instructor_menu)
               <li class="nav-item {{array_get($instructor_menu, 'is_active') ? 'active' : ''}}">
                  <a href="{{route($key)}}" class="nav-link">
                     {!! array_get($instructor_menu, 'icon') !!} 
                     <p> {!! array_get($instructor_menu, 'name') !!} </p>
                  </a>
               </li>
               @endforeach
               @endif
               <!-- <li class="nav-item">
                  <a href="../widgets.html" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                      Widgets
                    </p>
                  </a>
                  </li> -->
               <!-- <li class="nav-item">
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
                  </li> -->
            </ul>
         </nav>
         <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
   </aside>
   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
      <!-- <section class="content-header">
         <div class="container-fluid">
           <div class="row mb-2">
             <div class="col-sm-6">
               <h1>
                 Navbar & Tabs
                 <small>new</small>
               </h1>
             </div>
             <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                 <li class="breadcrumb-item"><a href="#">Home</a></li>
                 <li class="breadcrumb-item active">Navbar & Tabs</li>
               </ol>
             </div>
           </div>
         </div>
         </section> -->
      <!-- Main content -->
      <section class="content">
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-12">
                  <div class="dashboard-content">
                     @include('inc.flash_msg')
                     @yield('content')
                  </div>
               </div>
               <!-- /.col -->
            </div>
            <!-- ./row -->
         </div>
         <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
   </div>
</div>
@include(theme('footer_user_dashboard'))