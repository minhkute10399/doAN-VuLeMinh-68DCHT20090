@extends('website.frontend.masterlayout')

@section('content')
    <div class="header">
        @include('website.frontend.header-menu')
    </div>
    <div class="content">
        <section class="content-header">
            <h5>{{ trans('message.banner_1') }}</h5>
            <h1>{{ trans('message.banner_2') }}</h1>
            <div class="button-header">
                <a href="#" class="a-link">{{ trans('message.course') }}</a>
            </div>
        </section>
    </div>
    </div>
    <div class="container-main">
        <div class="icon-info">
            <div class="feature-icon">
                <img src="{{ asset('images/feature-1.png') }}" alt="">
                <h3>{{ trans('message.over') }} <label>{{ $student->count() }}</label>
                    {{ trans('message.student') }} </h3>
            </div>
            <div class="feature-icon">
                <img src="{{ asset('images/feature-2.png') }}" alt="">
                <h3><label>{{ $courses->count() }}</label> {{ trans('message.course_for_you') }} </h3>
            </div>
            <div class="feature-icon">
                <img src="{{ asset('images/feature-3.png') }}" alt="">
                <h3>{{ trans('message.banner_3') }}</h3>
            </div>
        </div>
        <div class="feature-title-subject">
            <h2>{{ trans('message.popular_course') }}</h2>
            <p>{{ trans('message.banner_4') }}</p>
        </div>
        <div class="section-subject">
            @foreach ($courses as $course)
                <section class="section">
                    <div class="subject">
                        <div class="subject-class">
                            {{-- <div class="img-subject-class" id="img" data-img="{{ config('image_path.images') .'/'. $course->images }}"></div> --}}
                            <img src="{{ config('image_path.images') . '/' . $course->images }}" alt=""
                                class="img-subject-class">
                        </div>
                        <div class="content-popular-class">
                            <a href="{{ route('singleCourse', [$course->id]) }}" class="title-popular-class">
                                <h6>{{ $course->name }}</h6>
                            </a>
                            <p>{{ $course->description }}</p>
                            <ul class="info-subject">
                                <li class="author">
                                    @foreach ($course->users->where('role_id', config('role.teacher')) as $user)
                                        <a href="#">
                                            <img src="{{ asset(config('image_path.images') . '/' . $user->images) }}"
                                                alt="" class="author-icon">{{ $user->name }}
                                        </a>
                                    @endforeach
                                </li>
                                <li class="seen">
                                    <i class="fas fa-users"> {{ $course->users->count() }}</i>
                                </li>
                                @if (Auth::check() && $course->users->contains(Auth::user()))
                                    <li class="type">
                                        @foreach ($course->lessons as $key => $lesson)
                                            @if ($key == 0)
                                                <a href="{{ route('lessons.show', [$lesson->id]) }}" class="free-course">{{ trans('message.continue') }}</a>
                                            @endif
                                        @endforeach
                                    </li>
                                @elseif (Auth::check())
                                    <li class="type">
                                        <a href="{{ route('singleCourse', [$course->id]) }}" class="free-course">{{ trans('message.free_course') }}</a>
                                    </li>
                                @else
                                    <li class="type">
                                        <a href="{{ route('singleCourse', [$course->id]) }}" class="free-course">{{ trans('message.free_course') }}</a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </section>
            @endforeach
        </div>
        <div class="lower-m">
            <a href="{{ route('allCourses') }}" class="all-subject">{{ trans('message.all_course') }}</a>
        </div>
    </div>
    <footer>
        <div class="main-footer">
            <div class="description">
                <p>{{ trans('message.banner_5') }}<br>
                    {{ trans('message.banner_6') }}<br>{{ trans('message.banner_7') }}
                </p>

                <p>
                    {{ trans('message.banner_8') }}<br>{{ trans('message.banner_9') }}
                </p>
                <br>
                <p>
                    {{ trans('message.banner_10') }}
                </p>
            </div>
            <div class="description">
                <h6>{{ trans('message.contact') }}</h6>
                <div class="link">
                    <a href="#">facebook.com</a>
                    <a href="#">Twitter.com</a>
                </div>
            </div>
            <div class="description">
                <h6>{{ trans('message.support') }}</h6>
                <div class="link">
                    <a href="#">Hỗ trợ</a>
                    <a href="#">Đóng góp</a>
                </div>
            </div>
            <div class="description">
                <h6>{{ trans('message.playground') }}</h6>
                <div class="link">
                    <a href="#">Đố vui</a>
                    <a href="#">Chữa bài</a>
                </div>
            </div>
        </div>
    </footer>
    @jquery
    @toastr_js
    @toastr_render
@endsection
