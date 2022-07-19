@include(theme('header_user_dashboard'))


<div class="dashboard-wrap">

    <div class="container-fluid pl-0">
        <div class="row">
            <div class="col-md-6 col-lg-2">
                <div class="dashboard-menu-col px-3 py-3">
                    @include(theme('dashboard.sidebar-menu'))
                </div>
            </div>

            <div class="col-md-6 col-lg-10">
                <div class="dashboard-content">
                    @include('inc.flash_msg')
                    @yield('content')
                </div>
            </div>

        </div>
    </div>

</div>


@include(theme('footer_user_dashboard'))