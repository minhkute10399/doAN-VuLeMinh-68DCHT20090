@extends('website.frontend.masterlayout')

@section('content')
    <section class="container-auth">
        <header class="header-auth-profile my-profile-menu">
            <div class="header-link-profile">
                <a href="{{ route('home.index') }}" class="sub-link-profile">
                    <img src="{{ asset('edufield/assets/img/logo.png') }}" alt="" class="logo-home">
                </a>
                <a href="{{ route('profile.index') }}" class="btn-link">
                    <i class="fas fa-chevron-left"></i>
                    <span>{{ trans('message.back_profile') }}</span>
                </a>
            </div>
        </header>
        <section class="content-container">
            <section class="user-info">
                <section class="sidebar-info manage-course-column">
                    <section class="user-sidebar">
                        <a href class="flex-link" data-toggle="modal" data-target="#modal-avatar">
                            <section class="sidebar-avatar">
                                <img src="{{ asset(config('image_path.images') . '/' . $teacher->images) }}" alt="">
                            </section>
                            <section class="sidebar-header">
                                <h3>{{ $teacher->name }}</h3>
                                <p>{{ $teacher->role->name }}</p>
                            </section>
                        </a>
                    </section>
                    <ul class="sidebar-nav">
                        <li class="sidebar-item">
                            <a href="{{ route('profile.index') }}">{{ trans('message.account') }}</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('courses') }}">{{ trans('message.manage_course') }}</a>
                        </li>
                    </ul>
                </section>
            </section>
            <section class="user-detail">
                <section class="header-user-detail">
                    <section class="detail-icon">
                        <img src="{{ asset('images/online-course.svg') }}" alt="">
                    </section>
                    <section class="user-detail-title">
                        <h1>{{ trans('message.course') }}</h1>
                        <p>{{ trans('message.manageinfo_slogan') }}</p>
                    </section>
                </section>
                <section class="user-detail-row">
                    <h4>{{ trans('message.action') }}</h4>
                    <a href="{{ route('profile.create') }}" class="user-detail-link">
                        <section class="detail-item">
                            <span>{{ trans('message.add_course') }}</span>
                            <span class="detail-description">{{ trans('message.click_here') }}</span>
                        </section>
                        <div>
                            <i class="fas fa-chevron-right arrow-color"></i>
                        </div>
                    </a>
                </section>
                <div class="section-subject my-profile-course">
                    @foreach ($teacher->courses as $course)
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
                                            {{-- @foreach ($course->users->where('role_id', config('role.teacher')) as $user) --}}
                                            <a href="{{ route('profile.index') }}">
                                                <img src="{{ asset(config('image_path.images') . '/' . $teacher->images) }}"
                                                    alt="" class="author-icon">{{ $teacher->name }}
                                            </a>
                                        </li>
                                        <li class="seen">
                                            <i class="fas fa-users"> {{ $course->users->count() }}</i>
                                        </li>
                                        <li class="type">
                                            <a href="{{ route('profile.show', [$course->id]) }}" class="free-course">{{ trans('message.detail') }}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </section>
                    @endforeach
                </div>
            </section>
        </section>
    </section>
    <script src="{{ asset('js/preview-img.js') }}"></script>
    <script src="{{ asset('js/chartjs/chart.js') }}"></script>
@endsection
