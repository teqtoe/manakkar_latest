@extends('layouts.theme')

@section('content')

    @php
        $contine_url = $course->continue_url;
    @endphp

    <div class="page-header-jumborton">

        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="page-header-left">
                        <h1>{{clean_html($course->title)}}</h1>
                        @if($course->short_description)
                            <p class="page-header-subtitle m-0">{{clean_html($course->short_description)}}</p>
                        @endif

                        <p class="author mt-4">
                            <span class="created-by">
                                <!-- <i class="la la-user"></i> --> {{__t('created_by')}} <span class="author-name">{{$course->author->name}}</span>
                            </span>

                            <span class="last-updated-at">
                                <!-- <i class="la la-clock"></i> -->
                                {{__t('last_updated')}} <span class="author-name"> {{$course->last_updated_at->format(date_time_format())}}</span>
                            </span>
                        </p>

                    </div>
                </div>

            </div>
        </div>

    </div>


<div class="course-page">

    <div class="container py-5">

        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8  orderr-2"> <!-- offset-md-1 -->
                <div class="course-details-wrap">
                    <div class="course-intro-stats-wrapper mb-4">


                    </div>


                    @if($course->description)
                        <div class="course-description mt-4 mb-5">
                            <h4 class="mb-4 course-description-title">{{__t('description')}}</h4>

                            <div class="content-expand-wrap">
                                <div class="content-expand-inner">
                                    {!! $course->description !!}
                                </div>
                            </div>
                        </div>
                    @endif

                    @if($course->benefits_arr)
                        <div class="course-widget mb-4">
                            <h4 class="mb-4">{{__t('what_learn')}}</h4>

                            <div class="content-expand-wrap">
                                <div class="content-expand-inner">
                                    <ul class="benefits-items row">
                                        @foreach($course->benefits_arr as $benefit)
                                            <li class="col-6 benefit-item d-flex mb-2">
                                                <i class="la la-check-square"></i>
                                                <span class="benefit-item-text ml-2">{{$benefit}}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if($course->sections->count())

                        <div class="course-curriculum-header d-flex mt-5">
                            <h4 class="mb-4 course-curriculum-title flex-grow-1">{{__t('course_curriculum')}}</h4>

                            <p id="expand-collapse-all-sections">
                                <a href="javascript:;" data-action="expand">Expand all</a>
                                <a href="javascript:;" data-action="collapse" style="display: none;">Collapse all</a>
                            </p>

                            <p class="ml-3 course-total-lectures-info">{{$course->total_lectures}} {{__t('lectures')}}</p>
                            <p class="ml-3 mr-3 course-runtime-info">{{seconds_to_time_format($course->total_video_time)}}</p>
                        </div>

                        <div class="course-curriculum-wrap mb-4">

                            @foreach($course->sections as $section)

                                <div id="course-section-{{$section->id}}" class="course-section bg-white border">

                                    <div class="course-section-header bg-light p-3 d-flex">
                                        <span class="course-section-name flex-grow-1 ml-2">
                                            <strong>
                                                <i class="la la-{{$loop->first ? 'minus' : 'plus'}}"></i>
                                                {{$section->section_name}}
                                            </strong>
                                        </span>

                                        <span class="course-section-lecture-count">
                                            {{$section->items->count()}} {{__t('lectures')}}
                                        </span>
                                    </div>

                                    <div class="course-section-body" style="display: {{$loop->first ? 'block' : 'none'}};">

                                        @if($section->items->count())
                                            @foreach($section->items as $item)
                                                <div class="course-curriculum-item border-bottom pl-4 d-flex">
                                                    <p class="curriculum-item-title m-0 flex-grow-1">

                                                        <a href="{{route('single_'.$item->item_type, [$course->slug, $item->id ] )}}">
                                                            <span class="curriculum-item-icon mr-2">
                                                                {!! $item->icon_html !!}
                                                            </span>
                                                            <span class="curriculum-item-title">
                                                                {{clean_html($item->title)}}
                                                            </span>
                                                        </a>
                                                    </p>

                                                    <p class="course-section-item-details d-flex m-0">
                                                        <span class="section-item-preview flex-grow-1">
                                                            @if($item->is_preview)
                                                                <a href="{{route('single_lecture', [$course->slug, $item->id ] )}}">
                                                                 <i class="la la-eye"></i> {{__t('preview')}}
                                                             </a>
                                                            @endif
                                                        </span>

                                                        @if($item->attachments->count())
                                                            <span class="section-item-attachments mr-3" data-toggle="tooltip" title="{{__t('dl_resource_available')}}">
                                                                <i class="la la-paperclip"></i>
                                                            </span>
                                                        @endif

                                                        <span class="section-item-duration ml-auto">
                                                            {{$item->runtime}}
                                                        </span>
                                                    </p>

                                                </div>
                                            @endforeach
                                        @endif

                                    </div>

                                </div>
                            @endforeach

                        </div>
                    @endif

                    @if($course->requirements_arr)
                        <h4 class="mb-4">{{__t('requirements')}}</h4>

                        <div class="course-widget mb-4 p-4">
                            <ul class="benefits-items row">
                                @foreach($course->requirements_arr as $requirement)
                                    <li class="col-6 benefit-item d-flex mb-2">
                                        <i class="la la-info-circle"></i>
                                        <span class="benefit-item-text ml-2">{{$requirement}}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    <div id="course-instructors-wrap" class="my-5">

                        <h4 class="mb-4">{{__t('instructors')}}</h4>

                        @foreach($course->instructors as $instructor)
                            @php
                                $courses_count = $instructor->courses()->publish()->count();
                                $students_count = $instructor->student_enrolls->count();
                                $instructor_rating = $instructor->get_rating;
                            @endphp

                            <div class="course-single-instructor-wrap mb-4 d-flex">

                                <div class="instructor-stats">
                                    <div class="profile-image mb-4">
                                        <a href="{{route('profile', $instructor->id)}}">
                                            {!! $instructor->get_photo !!}
                                        </a>
                                    </div>
                                </div>

                                <div class="instructor-details">
                                    <a href="{{route('profile', $instructor->id)}}">
                                        <h4 class="instructor-name">{{$instructor->name}}</h4>
                                    </a>

                                    @if($instructor->job_title)
                                        <p class="instructor-designation">{{$instructor->job_title}}</p>
                                    @endif

                                    @if($instructor->about_me)
                                        <div class="profle-about-me-text mt-4">
                                            <div class="content-expand-wrap">
                                                <div class="content-expand-inner">
                                                    {!! nl2br($instructor->about_me) !!}
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="instructor-meta-data">
                                        <div class="row mt-4">
                                            <div class="col-md-4 left">
                                                @if($instructor_rating->rating_count)
                                                    <div class="profile-rating-wrap d-flex">
                                                        {!! star_rating_generator($instructor_rating->rating_avg) !!}
                                                        <p class="m-0 ml-2">({{$instructor_rating->rating_avg}})</p>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-md-8 instructor-course-students">
                                                <p class="instructor-stat-value mb-1 mr-3">
                                                    <i class="la la-play-circle"></i>
                                                    <strong>{{$courses_count}}</strong> {{__t('courses')}}
                                                </p>
                                                <p class="instructor-stat-value mb-1 mr-3">
                                                    <i class="la la-user-circle"></i>
                                                    <strong>{{$students_count}}</strong> {{__t('students')}}
                                                </p>
                                                <p class="instructor-stat-value mb-1">
                                                    <i class="la la-comments"></i>
                                                    <strong>{{$instructor_rating->rating_count}} </strong> {{__t('reviews')}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>




                            </div>

                        @endforeach
                    </div>


                    @if($course->reviews->count())
                        <div id="course-ratings-wrap">
                            <h4 class="mb-4">{{__t('student_feedback')}}</h4>

                            <div id="course-rating-stats-wrap" class="mt-4 d-flex">
                                <div class="rating-stats-avg mr-5">
                                    <p class="rating-avg-big m-0">{{$course->rating_value}}</p>
                                    {!! star_rating_generator($course->rating_value) !!}
                                    <p class="number-of-reviews mt-1">
                                        {{sprintf(__t('from_amount_reviews'), $course->rating_count)}}
                                    </p>
                                </div>

                                <div class="star-rating-reviews-bar-wrap flex-grow-1">
                                    @foreach($course->get_ratings('stats') as $rateKey => $rating)
                                        <div class="rating-percent-wrap d-flex mt-2">
                                            <div class="star-rating-bar-bg">
                                                <div class="star-rating-bar-fill" style="width: {{array_get($rating, 'percent')}}%"></div>
                                            </div>

                                            <div class="star-rating-percent-wrap">
                                                {!! star_rating_generator($rateKey) !!}
                                            </div>
                                            <p class="rating-percent-text m-0">{{array_get($rating, 'percent')}}%</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="reviews-list-wrap">
                                @foreach($course->reviews as $review)
                                    <div class="single-review d-flex">
                                        <div class="reviewed-user d-flex">
                                            <div class="reviewed-user-photo">
                                                <a href="{{route('profile', $review->user->id)}}">
                                                    {!! $review->user->get_photo !!}
                                                </a>
                                            </div>
                                            <div class="reviewed-user-name">
                                                <a href="{{route('profile', $review->user->id)}}"><strong>{!! $review->user->name !!}</strong></a>
                                                <p class="mb-1">
                                                    <a href="{{route('review', $review->id)}}" class="text-muted " >{{$review->created_at->diffForHumans()}}</a>
                                                </p>
                                                {!! star_rating_generator($review->rating) !!}
                                            </div>
                                        </div>

                                        <div class="review-details">
                                            @if($review->review)
                                                <div class="review-desc">
                                                    {!! nl2br($review->review) !!}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                </div>

            </div>



                <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 orderr-1">

                    <div class="page-header-right-enroll-box p-3 mt-sm-4 mt-md-0 bg-white shadow">



                        @if($course->video_info())
                            @include(theme('video-player'), ['model' => $course])
                        @else
                            <img src="{{media_image_uri($course->thumbnail_id)->image_md}}" class="img-fluid" />
                        @endif



                                <div class="course-whats-included-box px-3 pb-2">
                                    <!-- <h4 class="mb-4">{{__t('whats_included')}}</h4> -->

                                    @php
                                        $lectures_count = $course->lectures->count();
                                        $assignments_count = $course->assignments->count();
                                        $attachments_count = $course->contents_attachments->count();
                                    @endphp
                                    <p class="mt-3 course-head-meta-wrap">
          
                                        @if( $isEnrolled)
                                            <p class="text-muted text-center mt-3 mb-4"><strong>Enrolled At</strong> : {{date('F d, Y', strtotime($isEnrolled->enrolled_at))}} </p>

                                            <a href="{{$contine_url}}" class="btn btn-info btn-lg btn-block"><i class="la la-play-circle"></i> Continue course</a>

                                        @else
                                            @if($course->paid)

                                                <div class="course-landing-page-price-wrap">
                                                    {!! $course->price_html(false, true) !!}
                                                </div>

                                                <form action="{{route('add_to_cart')}}" class="add_to_cart_form" method="post">
                                                    @csrf

                                                    <input type="hidden" name="course_id" value="{{$course->id}}">

                                                    <div class="enroll-box-btn-group mt-3 px-3 pb-1">

                                                        <?php
                                                        $in_cart = cart($course->id)

                                                        ?>
                                                        <button type="button" class="btn btn-lg btn-theme-primary btn-block mb-3 add-to-cart-btn" data-course-id="{{$course->id}}" name="cart_btn" value="add_to_cart" {{$in_cart? 'disabled="disabled"' : ''}} >
                                                            @if($in_cart)
                                                                <i class='la la-check-circle'></i> Added to cart
                                                            @else
                                                                <i class="la la-shopping-cart"></i> Add to cart
                                                            @endif
                                                        </button>
                                                        <button type="submit" class="btn btn-lg btn-outline-dark btn-block" name="cart_btn" value="buy_now">Buy now</button>
                                                    </div>
                                                </form>

                                            @elseif($course->free)
                                                <div class="course-landing-page-price-wrap">
                                                    {!! $course->price_html(false, true) !!}
                                                </div>
                                                <form action="{{route('free_enroll')}}" class="course-free-enroll" method="post">
                                                    @csrf
                                                    <input type="hidden" name="course_id" value="{{$course->id}}">
                                                    <button type="submit" class="btn btn-warning btn-lg btn-block">{{__t('enroll_now')}}</button>
                                                </form>
                                            @endif
                                        @endif
                                        </p>
                                    <ul class="price-box-content mb-5">
                                        <li>
                                            <div class="price-box-icon">
                                                <i class="ti-bar-chart"></i> Levels
                                            </div>
                                            <div class="price-box-info">
                                                {{course_levels($course->level)}}
                                            </div>
                                        </li>

                                        @if($course->total_video_time)
                                            <li> 
                                                <div class="price-box-icon">
                                                    <i class="la la-video"></i> Duration
                                                </div>
                                                <div class="price-box-info"> 
                                                    {{seconds_to_time_format($course->total_video_time)}}  {{__t('on_demand_video')}} 
                                                </div>
                                            </li>
                                        @endif

                                        <li> 
                                            <div class="price-box-icon">
                                                <i class="la la-book"></i>  {{__t('lectures')}}
                                            </div>
                                            <div class="price-box-info"> 
                                                {{$lectures_count}} 
                                            </div>
                                        </li>

                                        @if($assignments_count)
                                            <li> 
                                                <div class="price-box-icon">
                                                    <i class="la la-tasks"></i> {{__t('assignments')}}
                                                </div>
                                                <div class="price-box-info"> 
                                                    {{$assignments_count}} 
                                                </div>
                                            </li>
                                        @endif

                                        @if($attachments_count)
                                            <li> 
                                                <div class="price-box-icon">
                                                    <i class="la la-file-download"></i> Downloadable Resources 
                                                </div>
                                                <div class="price-box-info">
                                                    {{$attachments_count}}
                                                </div> 
                                            </li>
                                        @endif

                                        <li>
                                            <div class="price-box-icon">
                                                <i class="la la-mobile"></i> Access
                                            </div>
                                            <div class="price-box-info">  
                                                Tablet and Phone 
                                            </div>
                                        </li>

                                        <li> 
                                            <div class="price-box-icon">
                                                <i class="la la-certificate"></i> Certificate of Completion 
                                            </div>
                                        </li>
                                    </ul>
                                </div>

                        

                    </div>

                </div>

        </div>

    </div>

</div>

@endsection
