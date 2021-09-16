@extends('website.frontend.masterlayout')

@section('content')
    <div class="header-menu course-menu" id="my-header">
        <div class="left-container">
            <div class="logo">
                <a href="{{ route('home.index') }}" class="link">
                    <img src="{{ asset('edufield/assets/img/logo.png') }}" alt="" class="logo-home">
                </a>
            </div>
            <div class="first-menu">
                <ul>
                    <li><a href="{{ route('home.index') }}" class="active">{{ trans('message.home') }}</a></li>
                    <li><a href="{{ route('allCourses') }}">{{ trans('message.course') }}</a></li>
                    <li><a href="{{ route('teachers') }}">{{ trans('message.teacher') }}</a></li>
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
                                <span class="number-notification">{{ Auth::user()->unreadNotifications()->groupBy('notifiable_type')->count() }}</span>
                                <i class="fas fa-bell menu-item" id="btn-dropdown-notification"></i>
                            </div>

                            <div class="dropdown-notification" id="notification-content">
                                @foreach (Auth::user()->notifications as $teacher)
                                    <a href="{{ route('singleCourseNotification', [$teacher->data['course_id'], $teacher->id] ) }}" class="notification-link-course">
                                        <div class="notify-item">
                                            <div class="notify-img">
                                                <img src="{{ asset(config('image_path.images') .'/'. $teacher->data['images']) }}" alt="">
                                            </div>
                                            <div class="notify-info">
                                                <h6>{{ $teacher->data['user'] }}</h6>
                                                <p>{{ trans('message.left_comment') }} <strong>{{ $teacher->data['course_name'] }}</strong></p>
                                                <span>{{ $teacher->created_at->diffForHumans() }}</span>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
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
    <div class="all-course-container all-course">
        <div class="left-course">
            <div class="input-group input-group-sm">
                <div class="text-search">
                    <h5>{{ trans('message.search') }}: </h5>
                </div>
                <div class="search-item-course">
                    <form action="{{ route('search') }}" method="GET" id="search_course">
                        @csrf
                        <input type="text" name="search" class="form-control float-right search"
                            placeholder="{{ trans('message.search_course') }}">
                        @error('search')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                    </form>

                    <div class="input-group-append">
                        <button type="submit" form="search_course" class="btn btn-outline-primary search_course_item">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="categories">
                <div class="category-children">
                    <h5>{{ trans('message.category') }}</h5>

                    @foreach ($categories as $item)
                        @foreach ($item->children as $child)
                            <div class="children-tag">
                                <a href="{{ route('subject', [$child->id]) }}">
                                    <i class="fas fa-sort-down"></i>
                                    {{ $child->name }}
                                </a>
                            </div>
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
        <div class="right-course">
            <section>
                <h4 class="h4-allcourse">{{ trans('message.all_course') }}</h4>
            </section>
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
                                        @foreach ($course->users->where('role_id', config('role.teacher'))->take(1) as $user)
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
                                                    <a href="{{ route('lessons.show', [$lesson->id]) }}"
                                                        class="free-course">{{ trans('message.continue') }}</a>
                                                @endif
                                            @endforeach
                                        </li>
                                    @elseif (Auth::check())
                                        <li class="type">
                                            <a href="{{ route('singleCourse', [$course->id]) }}"
                                                class="free-course">{{ trans('message.free_course') }}</a>
                                        </li>
                                    @else
                                        <li class="type">
                                            <a href="{{ route('singleCourse', [$course->id]) }}"
                                                class="free-course">{{ trans('message.free_course') }}</a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </section>
                @endforeach
            </div>
            <div class="pagination-link">
                {{ $courses->links() }}
            </div>
        </div>

    </div>
    <footer>
        <div class="main-footer">
            <div class="description">
                <img src="{{ asset('edufield/assets/img/logo.png') }}" alt="" class="logo-home">
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
@endsection
