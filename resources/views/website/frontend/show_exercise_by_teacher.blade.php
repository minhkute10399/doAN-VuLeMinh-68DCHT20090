@extends('website.frontend.masterlayout')

@section('content')
    <section class="container-auth">
        <header class="header-auth-profile my-profile-menu">
            <div class="header-link-profile">
                <a href="{{ route('home.index') }}" class="sub-link-profile">
                    <img src="{{ asset('edufield/assets/img/logo.png') }}" alt="" class="logo-home">
                </a>
                <a href="{{ url()->previous() }}" class="btn-link">
                    <i class="fas fa-chevron-left"></i>
                    <span>{{ trans('message.back_to_course') }}</span>
                </a>
            </div>
        </header>
        <section class="content-container">
            <section class="user-detail">
                <section class="header-user-detail">
                    <section class="detail-icon">
                        <img src="{{ asset('images/homework.svg') }}" alt="">
                    </section>
                    <section class="user-detail-title">
                        <h1>{{ trans('message.exercise') }}</h1>
                        <p>{{ trans('message.manageinfo_slogan') }}</p>
                    </section>
                </section>
                <div class="flex-detail-course">
                    <section>
                        <h1 class="lesson-container-heading">{{ $lesson->title }}</h1>
                        <div class="lesson-container-description">
                            {{ $lesson->description }}
                        </div>
                        <div class="lesson-section">
                            <div class="lessons-section-title">
                                <h3>{{ trans('message.exercise_content') }}</h3>
                                <span class="lesson-total">{{ $lesson->exercises->count() }}
                                    {{ trans('message.exercise') }}</span>
                            </div>
                            <div class="add-lesson-btn">
                                <button type="button" class="btn btn-outline-info" data-toggle="modal"
                                    data-target="#exercise{{ $lesson->id }}">
                                    {{ trans('message.add_exercise') }}
                                </button>
                            </div>
                            <div class="lessons-panel">
                                <div class="lessons-panel-group">
                                    <div class="sub-panel">
                                        @php
                                            $index = 0;
                                        @endphp

                                        <table class="table">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">{{ trans('message.title') }}</th>
                                                    <th scope="col">{{ trans('message.video_url') }}</th>
                                                    <th scope="col">{{ trans('message.action') }}</th>
                                                </tr>
                                            </thead>
                                            @foreach ($lesson->exercises as $exercise)
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">{{ $index + 1 }}</th>
                                                        <td>{{ $exercise->title }}</td>
                                                        <td>{{ $exercise->url }}</td>
                                                        <td>
                                                            <div class="btn-action-detail-course">
                                                                <button type="button" class="btn btn-outline-success"
                                                                    data-toggle="modal"
                                                                    data-target="#edit_lesson{{ $lesson->id }}">
                                                                    <span>{{ trans('message.edit') }}</span>
                                                                </button>
                                                                <a href="{{ $exercise->url }}"
                                                                    class="btn btn-outline-primary exercise-teacher"
                                                                    target="{{ $exercise->url }}">{{ trans('message.detail') }}</a>
                                                                <button type="button" class="btn btn-outline-danger"
                                                                    data-toggle="modal"
                                                                    data-target="#delete_lesson{{ $lesson->id }}">
                                                                    <span>{{ trans('message.delete') }}</span>
                                                                </button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </section>
        </section>
    </section>
    {{-- Add exercise --}}
    @foreach ($lesson->exercises as $exercise)
        <div class="modal fade" id="exercise{{ $exercise->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ trans('message.add_exercise') }}</h5>
                    </div>
                    <div class="modal-body">
                        <h5>{{ trans('message.attention') }}</h5>
                        <p>{{ trans('message.attention_text') }}</p>
                        <div class="attention">
                            <h6>{{ trans('message.step_1') }}</h6>
                            <p>{{ trans('message.type_your_title') }} <strong>{{ trans('message.title') }}</strong>
                            </p>
                        </div>
                        <div class="attention">
                            <h6>{{ trans('message.step_2') }}</h6>
                            <p>{{ trans('message.video_tutorial_create_exercise') }} <a
                                    href="https://www.youtube.com/watch?v=b_FNIAfi5us"
                                    target="https://www.youtube.com/watch?v=b_FNIAfi5us">{{ trans('message.click_here') }}</a>
                            </p>
                            <p>{{ trans('message.teacher_will_create_assignment') }} <a
                                    href="https://drive.google.com/drive/u/0/my-drive"
                                    target="https://drive.google.com/drive/u/0/my-drive">{{ trans('message.google_drive') }}</a>
                            </p>
                            <p>{{ trans('message.after_create_exercise') }}
                                <strong>{{ trans('message.exercise_url') }}</strong>
                            </p>
                        </div>
                        <form action="{{ route('addexercise') }}" method="POST" id="add_exercise">
                            @csrf
                            <input type="hidden" name="lesson_id" value="{{ $lesson->id }}">
                            <div class="add-lesson">
                                <h6>{{ trans('message.title') }}</h6>
                                <input type="text" name="title" placeholder="{{ trans('message.type_title') }}"
                                    autocomplete="off">
                                @error('title')
                                    <p class="error-message">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="add-lesson">
                                <h6>{{ trans('message.exercise_url') }}</h6>
                                <textarea name="url" id="" cols="40" rows="2"
                                    placeholder="{{ trans('message.link_exercise') }}"></textarea>
                                @error('name')
                                    <p class="error-message">{{ $message }}</p>
                                @enderror
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ trans('message.close') }}</button>
                        <button type="submit" form="add_exercise"
                            class="btn btn-success">{{ trans('message.save_change') }}</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
