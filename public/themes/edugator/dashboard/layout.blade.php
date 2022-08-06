@include(theme('header_user_dashboard'))
<div class="dashboard-wrap">
<div class="wrapper">
   <!-- Navbar -->
   <nav class="main-header navbar navbar-expand">
      <ul class="navbar-nav">
         <li class="nav-item">
            <a class="nav-link pushmenu" data-widget="pushmenu" href="#" role="button"><i class="fa fa-bars"></i></a>
         </li>
      </ul>
   </nav>
   <!-- /.navbar -->
   <!-- Main Sidebar Container -->
   <aside class="main-sidebar sidebar-dark-primary elevation-4">
         <!-- Brand Logo -->
        <div class="fav-menu">
          <img src="{{theme_url('favicon.png')}}" alt="{{get_option('site_title')}}" />
        </div>
      <!-- Sidebar -->
      <div class="sidebar mt-3">
         <!-- Sidebar Menu -->
         <nav class="">
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



      <div class="dropdown profile-butn dropright fxd">
        <a type="button" id="dropdownMenu2" class=" profile-dropdown-toogle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="top-nav-user-name">
              {!! $auth_user->get_photo !!}
            </span>
        </a>
        <!--Menu-->
        <div class="dropdown-menu dropdown-primary" x-placement="right-start">
          <div class="row justify-content-center align-items-center">
            <div class="col-lg-4">
              <span class="top-nav-user-name">
                {!! $auth_user->get_photo !!}
              </span>
            </div>
            <div class="col-lg-8">
              <p class="m-0 auth_name">{{ $auth_user->name }}</p>
              <small>{{$auth_user->email}}</small>
            </div>
          </div>
            <p class="logout-btn">
              <a href="{{ route('logout') }}"
                 onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  <i class="la la-sign-out"></i> {{__t('logout')}}
              </a>
            </p>
        </div>
      </div>

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