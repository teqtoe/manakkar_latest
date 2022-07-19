@extends(theme('dashboard.layout'))

@section('content')

    @if($auth_user->enrolls->count())

            @foreach($auth_user->enrolls as $course)

        <div class="enrolled-courses mb-4">
            <div class="row">
                <div class="col-lg-3">
                    <img src="{{$course->thumbnail_url}}" width="300" />
                </div>
                <div class="col-lg-9">
                    <div class="enrolled-courses-content">
                        <p>
                            <strong class="mt-4">{{$course->title}}</strong>
                                {!! $course->status_html() !!} 
                                @php
                                    $lectures_count = $course->lectures->count();
                                    $assignments_count = $course->assignments->count();
                                    $quizzes_count = $course->quizzes->count();
                                @endphp
                        </p>


                        <div class=""><strong>{!! $course->price_html() !!}</strong></div>

                        <div class="d-flex align-items-center justify-content-between flex-wrap mt-auto">

                            <div class="d-flex align-items-start flex-column">
                                <span class="course-list-lecture-count">{{$lectures_count}} {{__t('lectures')}}</span>
                            </div>

                            <div class="d-flex align-items-start flex-column">
                                @if($assignments_count)
                                    <span class="course-list-assignment-count">{{$assignments_count}} {{__t('assignments')}}</span>
                                @endif
                            </div>

                            <div class="d-flex align-items-start flex-column">
                                @if($quizzes_count)
                                <span class="course-list-assignment-count">{{$quizzes_count}} {{__t('quizzes')}}</span>
                                @endif
                            </div>

                            @if($course->status == 1)
                                <a href="{{route('course', $course->slug)}}" class="view-icon-btn  mt-2" target="_blank"><i class="la la-eye"></i> </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>


            @endforeach

    @else
        {!! no_data(null, null, 'my-5' ) !!}
    @endif

@endsection
