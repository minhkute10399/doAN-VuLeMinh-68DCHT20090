@extends('website.frontend.masterlayout')

@section('content')
    <div class="header">
        <div class="main-header" id="background-banner">
            <div class="menu">
                <div class="menu-navbar">
                    <a href="{{ route('home.index') }}" class="link-home">
                        <img src="{{ asset('edufield/assets/img/logo.png') }}" alt="" class="logo-home">
                    </a>
                </div>
                <div class="first-menu">
                    <ul>
                        <li><a href="{{ route('home.index') }}" class="active">{{ trans('message.home') }}</a></li>
                        <li><a href="#">{{ trans('message.course') }}</a></li>
                        <li><a href="#">{{ trans('message.teacher') }}</a></li>
                    </ul>
                </div>
            </div>
            <div class="second-menu">
                <ul class="action-ul">
                    @auth
                        <div class="info-container">

                            <div class="avatar">
                                @if (Auth::user()->images)
                                    <img src="{{ asset(config('image_path.images') . '/' . Auth::user()->images) }}" alt="">
                                @else
                                    <img src="{{ asset(config('image_path.image_default')) }}" alt="">
                                @endif
                            </div>
                            <p>{{ Auth::user()->name }}</p>

                        </div>
                        <div class="action-container">
                            <div class="notification-wrap">
                                <div class="bell-notification-container">
                                    <span class="number-notification">1</span>
                                    <i class="fas fa-bell menu-item" id="btn-dropdown-notification"></i>
                                </div>

                                <div class="dropdown-notification" id="notification-content">
                                    {{-- @foreach ($requestsOfUser as $request) --}}
                                    <div class="notify-item">
                                        <div class="notify-img">
                                            {{-- @if ($request->mentor->image)
                                                    <img src="{{ asset(config('img.img_path') . $request->mentor->image->url) }}" alt="">
                                                @else
                                                    <img src="{{ asset(config('title.avatar_default')) }}" alt="">
                                                @endif --}}
                                        </div>
                                        <div class="notify-info">
                                            {{-- <p>
                                                    @lang('label.request_user', ['mentor_name' => $request->mentor->name, 'lesson' => $request->lesson->title, 'course' => $request->lesson->course->name, 'lesson_link' => route("course.lesson", [$request->lesson->id])])
                                                </p> --}}
                                            {{-- <span class="notify-action" data-toggle="modal" data-target="#request{{ $request->id }}">@lang('label.rate')</span> --}}
                                        </div>
                                    </div>
                                    {{-- @endforeach --}}
                                </div>
                            </div>
                            <div class="parent-menu">
                                <i class="fas fa-caret-down menu-item" id="btn-dropdown"></i>
                                <ul class="dropdown" id="dropdown-content">
                                    <li>
                                        <a href="{!! route('change-language', ['en']) !!}">
                                            <div><i class="fas fa-globe-americas"></i></div>
                                            <label for="theme">{{ trans('message.en') }}</label>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{!! route('change-language', ['vi']) !!}">
                                            <div><i class="fas fa-globe-asia"></i></div>
                                            <label for="theme">{{ trans('message.vi') }}</label>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('profile.index') }}" class="flex-link-display">
                                            <div><i class="fas fa-cog"></i></div>
                                            <label>{{ trans('message.setting') }}</label>
                                        </a>
                                    </li>
                                    <li>
                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <button class="btn-logout">
                                                <div><i class="fas fa-sign-out-alt"></i></div>
                                                <p>{{ trans('message.logout') }}</p>
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @else
                        <ul class="action-ul">
                            <li class="info-container"><a href="{{ route('login') }}">{{ trans('message.login') }}</a>
                            </li>
                            <li><a href="{{ route('register') }}">{{ trans('message.register') }}</a></li>
                        </ul>
                    @endauth
                </ul>
            </div>
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
                                        <a href="{{ route('lessons.show', [$course->id]) }}" class="free-course">{{ trans('message.continue') }}</a>
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
            <a href="#" class="all-subject">{{ trans('message.all_course') }}</a>
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
