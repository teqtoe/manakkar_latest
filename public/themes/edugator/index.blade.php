@extends('layouts.theme')


@section('content')

    <div class="hero-banner py-3">

        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12">

                    <div class="hero-left-wrap text-center">
                        <h1 class="hero-title text-white mb-4">{{__t('hero_title')}}</h1>
                        <p class="hero-subtitle text-white mb-4">
                            {!! __t('hero_subtitle') !!}
                        </p>
                        <div class="header-search-wrap my-2 my-lg-0  ml-2">
                            <form action="{{route('courses')}}" class=" cours-search" method="get">
                                <div class="input-group">
                                    <input class="form-control" type="search" name="q" value="{{request('q')}}" placeholder="What do you want to learn today?">
                                    <div class="input-group-append">
                                        <button class="btn my-2 my-sm-0 header-search-btn" type="submit">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="home-course-stats-wrap pb-5 mb-2 text-center">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="home-course-stats-wrap-box">
                                            <p class="count">580+</p> 
                                            <h5>Active Courses</h5>
                                        </div>
                                    </div>
                                    <div class="col-md-3">                                        
                                        <div class="home-course-stats-wrap-box">
                                            <p class="count">1200+</p> 
                                            <h5>Hours Video</h5>
                                        </div>
                                    </div>
                                    <div class="col-md-3">                                        
                                        <div class="home-course-stats-wrap-box">
                                            <p class="count">850+</p> 
                                            <h5>Teachers</h5>
                                        </div>
                                    </div>
                                    <div class="col-md-3">                                        
                                        <div class="home-course-stats-wrap-box">
                                            <p class="count">1800+</p> 
                                            <h5>Students Learning</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


               <!--  <div class="col-md-12 col-lg-6 hero-right-col">
                    <div class="hero-right-wrap">
                        <img src="{{theme_url('images/hero-image.png')}}" class="img-fluid" />
                    </div>
                </div> -->
            </div>
        </div>


    </div>


    <div class="home-section-wrap home-info-box-wrapper py-5">
        <div class="container">
            <div class="row">

                <div class="col-md-3">
                    <div class="home-info-box">
                        <img src="{{theme_url('images/skills.svg')}}">
                        <h3 class="info-box-title">Learn the latest skills</h3>
                        <p class="info-box-desc">like business analytics, graphic design, Python, and more</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="home-info-box">
                        <img src="{{theme_url('images/career-goal.svg')}}">
                        <h3 class="info-box-title">Get ready for a career</h3>
                        <p class="info-box-desc">in high-demand fields like IT, AI and cloud engineering</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="home-info-box">
                        <img src="{{theme_url('images/instructions.svg')}}">
                        <h3 class="info-box-title">Expert instruction</h3>
                        <p class="info-box-desc">Every course designed by expert instructor</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="home-info-box">
                        <img src="{{theme_url('images/cartificate.svg')}}">
                        <h3 class="info-box-title">Earn a certificate</h3>
                        <p class="info-box-desc">Get certified upon completing a course</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @if($featured_courses->count())
        <div class="home-section-wrap home-featured-courses-wrapper py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="section-header-wrap">
                            <h3 class="section-title">
                                {{__t('featured_courses')}}
                            </h3>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <a href="{{route('featured_courses')}}" class="btn btn-link view-btn float-right"></i> View all courses</a>
                    </div>
                </div>
                <div class="popular-courses-cards-wrap mt-3">
                    <div class="row slick_slider" data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "arrows":true, "dots":false, "autoplay":true, "infinite":true, "responsive": [{"breakpoint":1020,"settings":{"slidesToShow": 2}} , {"breakpoint":768,"settings":{"slidesToShow": 1}}, {"breakpoint":575,"settings":{"slidesToShow": 1}}]}'>
                        @foreach($featured_courses as $course)
                            {!! course_card($course, 'col-md-4') !!}
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif


    <div class="mid-callto-action-wrap text-white text-center py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mb-3 text-white">Find the perfect course for you</h2>
                    <p class="mb-3 mid-callto-action-subtitle">Choose from over 100 online video courses <br /> with new additions published every day</p>

                    <a href="{{route('courses')}}" class="btn btn-theme-primary btn-lg" >Find new courses</a>
                </div>
            </div>
        </div>
    </div>

    @if($popular_courses->count())
        <div class="home-section-wrap home-fatured-courses-wrapper py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-header-wrap">
                            <h3 class="section-title">{{__t('popular_courses')}}

                                <a href="{{route('popular_courses')}}" class="btn btn-link  view-btn float-right"><!-- <i class="la la-list"></i> --> {{__t('all_popular_courses')}}</a>
                            </h3>
                            <!-- <p class="section-subtitle">{{__t('popular_courses_desc')}}</p> -->
                        </div>
                    </div>
                </div>
                <div class="popular-courses-cards-wrap mt-3">
                    <div class="row slick_slider" data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "arrows":false, "dots":false, "autoplay":true, "infinite":true, "responsive": [{"breakpoint":1020,"settings":{"slidesToShow": 2}} , {"breakpoint":768,"settings":{"slidesToShow": 1}}, {"breakpoint":575,"settings":{"slidesToShow": 1}}]}'>
                        @foreach($featured_courses as $course)
                            {!! course_card($course) !!}
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif


    @if($new_courses->count())
        <div class="home-section-wrap home-new-courses-wrapper py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-header-wrap">
                            <h3 class="section-title">{{__t('new_arrival')}}

                                <a href="{{route('courses')}}" class="btn btn-link  view-btn float-right"><!-- <i class="la la-list"></i>  -->{{__t('all_courses')}}</a>
                            </h3>
                            <!-- <p class="section-subtitle">{{__t('new_arrival_desc')}}</p> -->
                        </div>
                    </div>
                </div>

                <div class="popular-courses-cards-wrap mt-3">
                    <div class="row slick_slider" data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "arrows":false, "dots":false, "autoplay":true, "infinite":true, "responsive": [{"breakpoint":1020,"settings":{"slidesToShow": 2}} , {"breakpoint":768,"settings":{"slidesToShow": 1}}, {"breakpoint":575,"settings":{"slidesToShow": 1}}]}'>
                        @foreach($new_courses as $course)
                            {!! course_card($course) !!}
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif


        

        <div class="home-cta-wrapp text-center">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-lg-6 home-cta-rt">

                    </div>
                    <div class="col-sm-12 col-lg-6 home-cta-left-col">

                        <div class="home-cta-text-wrapper px-5 text-center">
                            <h4>Become an instructor</h4>
                            <p>Spread your knowledge to millions of students around the world through teqtoe teaching platform. You can teach any tech you love from heart.
                            </p>
                            <a href="{{route('create_course')}}" class="btn btn-theme-primary">Start Teaching Today</a>

                        </div>

                    </div>

                   <!--  <div class="col-sm-12 col-lg-6">

                        <div class="home-cta-text-wrapper px-5 text-center">
                            <h4>Discover latest technology</h4>
                            <p>Earn new skills and enroll to the new courses. Continuous learning is only key to keep your self up-to-date with modern technology.
                            </p>
                            <a href="{{route('courses')}}" class="btn btn-theme-primary">{{__t('find_new_courses')}}</a>
                        </div>

                    </div> -->

                </div>
            </div>
        </div>

 <!--    @if($posts->count())
    <div class="home-section-wrap home-blog-section-wrapper py-5">

        <div class="container">

            <div class="row mb-3">
                <div class="col-md-12">
                    <div class="section-header-wrap text-center">
                        <h3 class="section-title">{{__t('latest_blog_text')}}</h3>
                        <p class="section-subtitle">{{__t('latest_blog_desc')}}</p>
                    </div>
                </div>
            </div>


            <div class="row">
                @foreach($posts as $post)
                    <div class="col-lg-4 mb-4">
                        <div class="home-blog-card">
                            <a href="{{$post->url}}">
                                <img src="{{$post->thumbnail_url->image_md}}" alt="{{$post->title}}" class="img-fluid">
                            </a>
                            <div class="excerpt px-4 pb-4">
                                <p class="date"><span> <i class="la la-calendar"></i>{{$post->published_time}}</span><p>
                                <h2><a href="{{$post->url}}">{{$post->title}}</a></h2>
                                <div class="post-meta d-flex justify-content-between">
                                    <span>
                                        <i class="la la-user"></i>
                                        <a href="{{route('profile', $post->user_id)}}">
                                            {{$post->author->name}}
                                        </a>
                                    </span>
                                    <a href="{{$post->url}}"> READ MORE &nbsp;<i class="fa fa-angle-right"></i> </a>
                                </div>
                                <p class="mt-4">
                                    <a href="{{$post->url}}"><strong>READ MORE <i class="la la-arrow-right"></i> </strong></a>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="btn-see-all-posts-wrapper pt-4">
                <div class="row">
                    <div class="col-md-12 d-flex">
                        <a href="{{route('blog')}}" class="btn btn-theme-primary ml-auto mr-auto">
                            <i class="la la-blog"></i> See All Posts
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    @endif

        


        <div class="home-section-wrap home-cta-wrapper pt-5">

        <div class="home-partners-logo-section py-5 mb-5 text-center">
            <div class="container">

                <h4 class="home-partners-title mb-5">Companies use teqtoe to enrich their brand & business.</h4>

                <div class="home-partners-logo-wrap">
                    <div class="logo-item">
                        <a href=""><img src="{{theme_url('images/adidas.png')}}" alt="adidas" /></a>
                    </div>
                    <div class="logo-item">
                        <a href=""><img src="{{theme_url('images/disnep.png')}}" alt="images" /></a>
                    </div>
                    <div class="logo-item">
                        <a href=""><img src="{{theme_url('images/intel.png')}}" alt="intel" /></a>
                    </div>
                    <div class="logo-item">
                        <a href=""><img src="{{theme_url('images/penlaw.png')}}" alt="penlaw" /></a>
                    </div>
                    <div class="logo-item">
                        <a href=""><img src="{{theme_url('images/shopify.png')}}" alt="shopify" /></a>
                    </div>
                </div>

            </div>
        </div>

    </div> -->

@endsection
