
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
                            <img src="{{ asset(config('image_path.images') .'/'. Auth::user()->images) }}" alt="">
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
