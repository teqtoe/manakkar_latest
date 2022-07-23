

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    {{ csrf_field() }}
</form>

@if( ! auth()->check() && request()->path() != 'login')
    @include(theme('template-part.login-modal-form'))
@endif

<!-- jquery latest version -->
<script src="{{asset('assets/js/vendor/jquery-1.12.0.min.js')}}"></script>
<!-- bootstrap js -->
<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>


<!--Teqtoe-->
<script src="{{asset('themes/edugator/assets/js/jquery.min.js')}}"></script>
<script src="{{asset('themes/edugator/assets/js/slick.min.js')}}"></script>
<script src="{{asset('themes/edugator/assets/js/adminlte.js')}}"></script>



@yield('page-js')

<!-- main js -->
<script src="{{theme_asset('js/main.js')}}"></script>


</body>
</html>
