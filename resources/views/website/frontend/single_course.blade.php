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
    <section class="all-course-container">
        <section class="lesson-container">
            <ul class="link-menu-url">
                <li>
                    <a href="#">{{ trans('message.course') }}</a>
                    <i class="fas fa-angle-right svg-format"></i>
                </li>
                <li>
                    <a href="{{ route('singleCourse', [$course->id]) }}">{{ trans('message.info') }}</a>
                </li>
            </ul>
            <h1 class="lesson-container-heading">{{ $course->name }}</h1>
            <div class="lesson-container-description">
                {{ $course->description }}
            </div>
            <div class="lesson-section">
                <div class="lessons-section-title">
                    <h3>{{ trans('message.course_section') }}</h3>
                    <span class="lesson-total">{{ $course->lessons->count() }} {{ trans('message.lesson') }}</span>
                </div>
                <div class="lessons-panel">
                    <div class="lessons-panel-group">
                        <div class="sub-panel">
                            <div class="panel-heading">
                                <h5>{{ trans('message.lesson') }}</h5>
                            </div>
                            @foreach ($course->lessons as $lesson)
                                <div class="panel-collapse">
                                    <div class="panel-collapse-body">
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <span>
                                                        <i class="fas fa-play-circle"></i>
                                                        <div>{{ $lesson->title }}</div>
                                                    </span>
                                                    <span>{{ trans('message.learn_now') }}</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="learn-comment-block">
                <div class="comment-detail-row">
                    <div class="comment-content-heading">
                        <h4 id="count-comment">{{ $course->comments->count() }} {{ trans('message.comment') }}</h4>
                    </div>
                    @auth
                        <div class="comment-user">
                            <img src="{{ asset(config('image_path.images') .'/'. Auth::user()->images) }}" alt="">
                            <div class="text-input-comment">
                                {{-- <form action="" method="POST" id="comment-form">
                                    @csrf --}}
                                    <input type="hidden" name="course_id" value="{{ $course->id }}" id="course_id">
                                    <input type="text" placeholder="{{ trans('message.common_question') }}" name="content" autocomplete="off" id="content">
                                    @error('content')
                                        <p class="error-message">{{ $message }}</p>
                                    @enderror
                                {{-- </form> --}}
                            </div>
                            <div class="comment-submit">
                                <button form="comment-form" data-url="{{ route('comment.store') }}" class="button-comment">{{ trans('message.post_comment') }}</button>
                            </div>
                        </div>
                    @endauth
                    <div class="append">
                        @foreach ($course->comments->reverse() as $comment)
                            <div class="comment-detail-student">
                                <div class="avatar-wrap">
                                    <img src="{{ asset(config('image_path.images')) .'/'. $comment->user->images }}" alt="">
                                </div>
                                <div class="comment-body">
                                    <div class="comment-body-content">
                                        <h5>{{ $comment->user->name }}</h5>
                                        <div class="comment-body-text">
                                            <span>{{ $comment->content }}</span>
                                        </div>
                                    </div>
                                    <div class="comment-body-time">
                                        <p>
                                            <span>
                                                <span>{{ trans('message.like') }}</span>
                                            </span>
                                            <span class="reply-comment">{{ trans('message.reply') }} . {{ $comment->created_at->diffForHumans() }}</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <section class="course-module">
            <div class="course-detail-purchase">
                <div class="course-img-preview">
                    <img src="{{ asset(config('image_path.images')) .'/'. $course->images }}" alt="" class="img-subject-class">
                </div>
                @if (Auth::check())
                    <p class="course-detail-register d-none">{{ trans('message.need_register') }}</p>
                @else
                    <p class="course-detail-register">{{ trans('message.need_register') }}</p>
                @endif
                @if (Auth::check() && $course->users->contains(Auth::user()))
                    @foreach ($course->lessons as $key => $lesson)
                        @if ($key == 0)
                            <a href="{{ route('lessons.show', [$lesson->id]) }}" class="course-detail-learn-now">{{ trans('message.continue') }}</a>
                        @endif
                    @endforeach
                @elseif(Auth::check())
                    <form action="{{ route('manageCourse.store') }}" method="POST">
                        @csrf
                        <input type="hidden" value="{{ $course->id }}" name="course_id">
                        <button class="course-detail-learn-now">{{ trans('message.learn_now') }}</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="course-detail-learn-now">{{ trans('message.learn_now') }}</a>
                @endif
                <ul>
                    <li>
                        <i class="fas fa-bookmark"></i>
                        <span>{{ $course->category->name }}</span>
                    </li>
                    <li>
                        <i class="fas fa-video"></i>
                        <span>{{ $course->lessons->count() }} {{ trans('message.lesson') }}</span>
                    </li>
                    @foreach ($course->users->where('role_id', config('role.teacher')) as $teacher)
                        <li>
                            <i class="fas fa-user-graduate"></i>
                            <span>{{ $teacher->name }}</span>
                        </li>
                    @endforeach
                    <li>
                        <i class="fas fa-laptop-code"></i>
                        <span>{{ trans('message.online_study') }}</span>
                    </li>
                </ul>
            </div>
        </section>
    </section>
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
    @jquery
    @toastr_js
    @toastr_render
    <script>
        $(document).on("click", ".button-comment", function () {
            let content = $("#content").val();
            let course_id = $("#course_id").val();
            let urlStoreComment = $(this).attr("data-url");
            $.ajax({
                type: "POST",
                url: urlStoreComment,
                data: {
                    "content": content,
                    "course_id": course_id,
                },
                headers: {
                    'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                },
                success: function(result) {
                    $(".append").prepend(result);
                    $("#content").val('');

                    let count = $("#count-comment").text();
                    let splitNumber = count.split(' ');
                    let number = parseInt(splitNumber[0]) + 1;
                    let countComment = number + " " + splitNumber[1];
                    $("#count-comment").text(countComment);
                },
                error: function(error) {
                    // console.log(error);
                }
            });
        });
    </script>
@endsection
