
<footer>
        <div class="container">

    <div class="footer-top py-5">

            <div class="row">

                <div class="col-md-4">
                    <div class="footer-widget-wrap">
                        <h4>About us</h4>
                        <p class="footer-about-us-desc">
                            teqtoe is a LMS platform that connect Teachers with Students globally. Teachers crate high quality course and present them in super easy way. teqtoe LMS created by <a href="https://themeqx.com" target="_blank">Themeqx</a>
                        </p>
                        <p class="footer-social-icon-wrap">
                            <a href="#"><i class="la la-facebook-square"></i> </a>
                            <a href="#"><i class="la la-twitter-square"></i> </a>
                            <a href="#"><i class="la la-youtube-square"></i> </a>
                        </p>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="footer-widget-wrap link-widget-wrap">
                        <h4>Quick Links</h4>
                        <ul class="footer-links">
                            <li><a href="{{route('home')}}">{{__t('home')}}</a> </li>
                            <li><a href="{{route('dashboard')}}">{{__t('dashboard')}}</a> </li>
                            <li><a href="{{route('blog')}}">{{__t('blog')}}</a> </li>
                            <li><a href="{{route('post_proxy')}}">{{__t('about_us')}}</a> </li>
                            <li><a href="#">Contact Us</a> </li>
                            <li><a href="{{route('register')}}">{{__t('signup')}}</a> </li>
                        </ul>

                    </div>
                </div>

                <div class="col-md-3">
                    <div class="footer-widget-wrap link-widget-wrap">                        
                        <h4>Learning</h4>
                        <ul class="footer-links">
                            <li><a href="{{route('courses')}}">{{__t('courses')}}</a> </li>
                            <li><a href="{{route('popular_courses')}}">{{__t('popular_courses')}}</a> </li>
                            <li><a href="{{route('featured_courses')}}">{{__t('featured_courses')}}</a> </li>
                        </ul>

                    </div>
                </div>

                <div class="col-md-3">
                    <div class="footer-widget-wrap contact-us-widget-wrap">
                        <h4>Contact us</h4>
                        <p class="footer-cont footer-address"><i class="la la-map-marker"></i> USA, New York 144, Next Avenue, New York</p>
                        <p class="footer-cont mb-0"><i class="la la-phone"></i> Tel.: +1 234 452 341 55 </p>
                        <p class="footer-cont mb-0"><i class="la la-envelope"></i> info@demo.com </p>
                    </div>
                </div>

            </div>
        </div>


    <div class="footer-bottom py-2">

            <div class="row">
                <div class="col-md-12">
                    <div class="footer-bottom-contents-wrap d-flex">

                        <div class="footer-bottom-left d-flex">
                            <!-- <h5 class="text-primary">teqtoe LMS</h5> -->
                            <span class="">Copyright © 2020 Manakkar | All rights reserved.</span>
                        </div>

                        <!-- <div class="footer-bottom-right flex-grow-1 text-right">
                            <ul class="footer-bottom-right-links">
                                <li>
                                    <a href="{{route('post_proxy', get_option('terms_of_use_page'))}}">
                                        {{__t('terms_of_use')}}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('post_proxy', get_option('privacy_policy_page'))}}">
                                        {{__t('privacy_policy')}} &amp; {{__t('cookie_policy')}}
                                    </a>
                                </li>

                            </ul>
                        </div> -->

                    </div>
                </div>
            </div>

    </div>
    </div>


</footer>


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
@yield('page-js')

<!-- main js -->
<script src="{{theme_asset('js/main.js')}}"></script>


</body>
</html>
