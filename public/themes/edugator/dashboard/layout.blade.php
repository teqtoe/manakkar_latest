@include(theme('header'))


<div class="dashboard-wrap">

    <div class="container-fluid pl-0">
        <div class="row">
            <div class="col-2">
                <div class="dashboard-menu-col px-3 py-3">
                    @include(theme('dashboard.sidebar-menu'))
                </div>
            </div>

            <div class="col-10">
                <div class="dashboard-content">
                    @include('inc.flash_msg')
                    @yield('content')
                </div>
            </div>

        </div>
    </div>

</div>


