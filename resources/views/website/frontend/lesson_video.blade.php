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
    <div id="ajax-lesson-detail">
        <div class="learning-section">
            <div class="player-column">
                <div class="active-player">
                    <div class="learn-active-video">
                        <div class="iframe-container">
                            <iframe src="{{ $lesson->video_url }}" frameborder="0"></iframe>
                        </div>
                    </div>
                </div>
                <div id="comment-container-ajax">
                    <section class="comment-container">
                        <section>
                            <div class="tab-header">
                                <p class="sub-tab">{{ trans('message.overall') }}</p>
                            </div>
                            <div class="learning-description">
                                <p>Tham gia học tập tại EduField để cùng nhau trao đổi trong quá trình học tập </p>
                                <p>EduField học mọi lúc, mọi nơi</p>
                            </div>
                            <div class="learn-comment-block">
                                <div class="comment-detail-row">
                                    <div class="comment-content-heading">
                                        <h4 id="count-comment">{{ $course->comments->count() }}
                                            {{ trans('message.comment') }}</h4>
                                    </div>
                                    @auth
                                        <div class="comment-user">
                                            <img src="{{ asset(config('image_path.images') . '/' . Auth::user()->images) }}"
                                                alt="">
                                            <div class="text-input-comment">
                                                {{-- <form action="{{ route('comment', [$course->id]) }}" method="POST"
                                                    id="comment-form">
                                                    @csrf --}}
                                                <input type="hidden" name="course_id" value="{{ $course->id }}"
                                                    id="course_id">
                                                <input type="text" placeholder="{{ trans('message.common_question') }}"
                                                    name="content" autocomplete="off" id="content">
                                                @error('content')
                                                    <p class="error-message">{{ $message }}</p>
                                                @enderror
                                                {{-- </form> --}}
                                            </div>
                                            <div class="comment-submit">
                                                <button form="comment-form" data-url="{{ route('comment.store') }}"
                                                    class="button-comment">{{ trans('message.post_comment') }}</button>
                                            </div>
                                        </div>
                                    @endauth
                                    <div class="append">
                                        @foreach ($course->comments->reverse() as $comment)
                                            <div class="comment-detail-student">
                                                <div class="avatar-wrap">
                                                    <img src="{{ asset(config('image_path.images')) . '/' . $comment->user->images }}"
                                                        alt="">
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
                                                            <span class="reply-comment">{{ trans('message.reply') }} .
                                                                {{ $comment->created_at->diffForHumans() }}</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </section>
                    </section>
                </div>
                <div class="footer-wrapper">
                    <h2>{{ trans('message.edufield_edu') }}</h2>
                    <div>{{ trans('message.banner_1') }}</div>
                </div>
            </div>
            <div class="learning-playlist">
                <div class="learn-playlist">
                    <header>
                        <h1>{{ $course->name }}</h1>
                    </header>
                    <div class="related-video">
                        <div class="heading-video">
                            <div class="video-group">
                                <h3>{{ trans('message.all_lesson') }}</h3>
                                <div>{{ $course->lessons->count() }} {{ trans('message.lesson') }}</div>
                            </div>
                        </div>
                        <ul class="list-video">
                            @foreach ($course->lessons as $key => $lessonItem)
                                <li class="lesson-item @if ($lessonItem->id == $lesson->id) current-study @endif"
                                    data-url="{{ route('video', [$lessonItem->id]) }}">
                                    <a>
                                        <div class="check-study">
                                            {{-- @if ($lessonItem->status == config('status.course.finish_number'))
                                                <i class="fas fa-check color-success"></i>
                                            @elseif ($lessonItem->status == config('status.course.progress_number'))
                                                <i class="fas fa-spinner color-playing"></i>
                                            @elseif ($lessonItem->status == config('status.course.not_register_number'))
                                                <i class="fas fa-lock"></i>
                                            @endif --}}
                                        </div>
                                        <div class="list-video-content">
                                            <h3>{{ trans('message.lesson') }} {{ $key + 1 }}:
                                                {{ $lessonItem->title }}
                                                @if ($lessonItem->exercises->count() > 0)
                                                    ({{ $lessonItem->exercises->count() }}
                                                    {{ trans('message.exercise') }})
                                                @endif
                                            </h3>
                                            <p>
                                                <i class="fas fa-play-circle @if ($lessonItem->id ==
                                                    $lesson->id) color-playing @endif "></i>
                                            </p>
                                        </div>
                                    </a>
                                </li>
                                @if ($lesson->id == $lessonItem->id && $lesson->exercises->count() > 0)
                                    <li class="test-container">
                                        <div class="test-wrapper">
                                            <h3>{{ trans('message.exercise') }}:</h3>
                                            @foreach ($lesson->exercises as $key => $exercise)
                                                <button type="button" data-toggle="modal"
                                                    data-target="#lesson{{ $exercise->id }}" class="exercise-item">
                                                        @if ($exercise->users->contains(Auth::user()))
                                                            <i class="fas fa-check color-success position-check"></i>
                                                        @endif
                                                    <span>{{ $key + 1 }}</span>
                                                </button>
                                            @endforeach
                                        </div>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $(document).on("click", ".lesson-item", function() {
                let dataUrl = this.dataset.url;
                $.ajax({
                    type: "GET",
                    url: dataUrl,
                    success: function(result) {
                        const curentLinkVideo = window.location.href;
                        let arrayLocation = curentLinkVideo.split("/");
                        arrayLocation[arrayLocation.length - 1] = result.lesson.id;
                        const ajaxChangeLink = arrayLocation.join("/");
                        $("iframe").attr("src", result.lesson.video_url);
                        window.history.pushState({}, "", ajaxChangeLink);
                    },
                });
            });
        })

    </script>
    <script>
        $(document).on("click", ".button-comment", function() {
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
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
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


    <!-- Do Exercise -->
    @foreach ($lesson->exercises as $exercise)
        <div class="modal fade" id="lesson{{ $exercise->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ $exercise->title }}</h5>
                    </div>
                    <div class="modal-body">
                        @if (Auth::check() && $exercise->users->contains(Auth::user()))

                        @elseif (Auth::check())
                            <h5>{{ trans('message.attention') }}</h5>
                            <p>{{ trans('message.attention_doing_assignment') }} </p>
                            <div class="attention">
                                <h6>{{ trans('message.step_1') }}</h6>
                                <p>{{ trans('message.student_do_exercise_at')  }} <strong>{{ $exercise->title }}</strong>
                                </p>
                            </div>
                            <div class="attention">
                                <h6>{{ trans('message.step_2') }}</h6>
                                <p>{{ trans('message.student_store_exercise') }}
                                </p>
                            </div>
                            <div class="attention">
                                <h6>{{ trans('message.step_3') }}</h6>
                                <p>{{ trans('message.after_store_exercise') }}
                                    <strong>{{ trans('message.submit_exercise') }} </strong> {{ trans('message.for_teacher_reviewing') }}
                                </p>
                            </div>
                        @endif
                        <form action="{{ route('sendExercise.store') }}" method="POST" id="send_exercise_student">
                            @csrf
                            <input type="hidden" name="exercise_id" value="{{ $exercise->id }}">
                            <input type="hidden" name="lesson_id" value="{{ $lesson->id }}">
                            <div class="add-lesson">
                                <h6>{{ $exercise->title }}</h6>
                                <a href="{{ $exercise->url }}" target="{{ $exercise->url }}">{{ trans('message.exercise_link') }}</a>
                            </div>
                            <div class="add-lesson">
                                @foreach ($exercise->users as $assignment)
                                    @if (Auth::check() && $exercise->users->contains(Auth::user()))
                                        <h6>{{ trans('message.your_solution') }}</h6>
                                        <a href="{{ $assignment->pivot->url }}" target="{{ $assignment->pivot->url }}">{{ trans('message.your_solution_link') }}</a>
                                    @endif
                                @endforeach
                            </div>
                            <div class="add-lesson">
                                <h6>{{ trans('message.submit_exercise') }}</h6>
                                <input type="text" name="url" autocomplete="off">
                                @error('url')
                                    <p class="error-message">{{ $message }}</p>
                                @enderror
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-dark"
                            data-dismiss="modal">{{ trans('message.close') }}</button>
                        <button type="submit" form="send_exercise_student"
                            class="btn btn-outline-success">{{ trans('message.save_change') }}</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
