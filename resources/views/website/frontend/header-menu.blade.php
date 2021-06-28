
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

