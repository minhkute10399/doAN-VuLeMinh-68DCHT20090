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
                    <span>{{ trans('message.back_to_list_course') }}</span>
                </a>
            </div>
        </header>
        <section class="content-container">
            {{-- <section class="user-info">
                <section class="sidebar-info manage-course-column">
                    <section class="user-sidebar">
                        <a href class="flex-link" data-toggle="modal" data-target="#modal-avatar">
                            @foreach ($course->users as $teacher)
                                <section class="sidebar-avatar">
                                    <img src="{{ asset(config('image_path.images') . '/' . $teacher->images) }}" alt="">
                                </section>
                            @endforeach
                            <section class="sidebar-header">
                                <h3>{{ $course->title }}</h3>
                                <p></p>
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
            </section> --}}
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
                {{-- <section class="user-detail-row">
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
                </section> --}}
                {{-- <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <div id="datatable-responsive_wrapper"class="dataTables_wrapper container-fluid dt-bootstrap no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline"  cellspacing="0" role="grid" aria-describedby="datatable-responsive_info">
                                            <thead>
                                                <tr role="row" class="text-center">
                                                    <th class="sorting_asc" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1" aria-sort="ascending" aria-label="First name: activate to sort column descending">
                                                        #
                                                    </th>
                                                    <th class="sorting_asc" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1" aria-sort="ascending" aria-label="First name: activate to sort column descending">
                                                        {{ trans('message.name') }}
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1" aria-label="Last name: activate to sort column ascending">
                                                        {{ trans('message.image') }}
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable-responsive"rowspan="1" colspan="1" aria-label="Last name: activate to sort column ascending">
                                                        {{ trans('message.category') }}
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable-responsive"rowspan="1" colspan="1" aria-label="Last name: activate to sort column ascending">
                                                        {{ trans('message.teacher') }}
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable-responsive"rowspan="1" colspan="1" aria-label="Last name: activate to sort column ascending">
                                                        {{ trans('message.create_at') }}
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable-responsive"rowspan="1" colspan="1" aria-label="Last name: activate to sort column ascending">
                                                        {{ trans('message.update_at') }}
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable-responsive"rowspan="1" colspan="1" aria-label="Last name: activate to sort column ascending">
                                                        {{ trans('message.action') }}
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                    <tr role="row" class="odd">
                                                        <td>{{ $index + 1 }}</td>
                                                        <td>{{ $course->name }}</td>
                                                        <td><img src="{{ asset(config('image_path.images') .'/'. $course->images) }}" alt="" class="list_image"></td>
                                                        <td>{{ $course->category->name }}</td>
                                                        @foreach ($course->users->where('role_id', config('role.teacher')) as $teacher)
                                                            <td>{{ $teacher->name }}</td>
                                                        @endforeach
                                                        <td>{{ date('M d ,Y', strtotime($course->created_at)) }} {{ trans('message.at') }} {{ date('g:ia', strtotime($course->created_at)) }}</td>
                                                        <td>{{ date('M d ,Y', strtotime($course->updated_at)) }} {{ trans('message.at') }} {{ date('g:ia', strtotime($course->updated_at)) }}</td>
                                                        <td class="edit_list_user">
                                                            <form action="{{ route('manageCourse.show', [$course->id]) }}">
                                                                @csrf
                                                                <button type="submit" class="btn btn-primary">
                                                                    {{ trans('message.show_lesson') }}
                                                                </button>
                                                            </form>


                                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#edit{{ $course->id }}">
                                                               {{ trans('message.reject') }}
                                                            </button>
                                                        </td>
                                                    </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                {{-- <ul class="link-menu-url">
                    <li>
                        <a href="#">{{ trans('message.course') }}</a>
                        <i class="fas fa-angle-right svg-format"></i>
                    </li>
                    <li>
                        <a href="{{ route('singleCourse', [$course->id]) }}">{{ trans('message.info') }}</a>
                    </li>
                </ul> --}}
                <div class="flex-detail-course">
                    <section>
                        <h1 class="lesson-container-heading">{{ $course->name }}</h1>
                        <div class="lesson-container-description">
                            {{ $course->description }}
                        </div>
                        <div class="lesson-section">
                            <div class="lessons-section-title">
                                <h3>{{ trans('message.course_section') }}</h3>
                                <span class="lesson-total">{{ $course->lessons->count() }}
                                    {{ trans('message.lesson') }}</span>
                            </div>
                            <div class="add-lesson-btn">
                                <button type="button" class="btn btn-outline-info" data-toggle="modal"
                                    data-target="#course{{ $course->id }}">
                                    {{ trans('message.add_lesson') }}
                                </button>
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
                                                            {{-- <a href="#">
                                                                <span>
                                                                    <i class="fas fa-play-circle"></i>
                                                                    <div>{{ $lesson->title }}</div>
                                                                </span>
                                                                <div>
                                                                    <span>{{ trans('message.learn_now') }}</span>
                                                                </div>
                                                            </a> --}}
                                                            <div class="flex-lesson-action">
                                                                <div class="flex-circle">
                                                                    <i class="fas fa-play-circle"></i>
                                                                    <div>{{ $lesson->title }}</div>
                                                                </div>
                                                                <div class="btn-action-detail-course">
                                                                    <button type="button" class="btn btn-outline-success"
                                                                        data-toggle="modal"
                                                                        data-target="#edit_lesson{{ $lesson->id }}">
                                                                        <span>{{ trans('message.edit') }}</span>
                                                                    </button>
                                                                    <a href="{{ route('exercises', [ $lesson->id ]) }}" class="btn btn-outline-primary exercise">{{ trans('message.exercises') }}</a>
                                                                    <button type="button" class="btn btn-outline-danger"
                                                                        data-toggle="modal"
                                                                        data-target="#delete_lesson{{ $lesson->id }}">
                                                                        <span>{{ trans('message.delete') }}</span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="course-module-edit">
                        <div class="course-detail-purchase">
                            <div class="course-img-preview">
                                <img src="{{ asset(config('image_path.images')) . '/' . $course->images }}" alt=""
                                    class="img-subject-class">
                            </div>
                            {{-- @if (Auth::check())
                                <p class="course-detail-register d-none">{{ trans('message.need_register') }}</p>
                            @else
                                <p class="course-detail-register">{{ trans('message.need_register') }}</p>
                            @endif
                            @if (Auth::check() && $course->users->contains(Auth::user()))
                                <a href="{{ route('lessons.show', [$course->id]) }}" class="course-detail-learn-now">{{ trans('message.continue') }}</a>
                            @elseif(Auth::check())
                                <form action="{{ route('manageCourse.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{ $course->id }}" name="course_id">
                                    <button class="course-detail-learn-now">{{ trans('message.learn_now') }}</button>
                                </form>
                            @else
                                <a href="{{ route('login') }}" class="course-detail-learn-now">{{ trans('message.learn_now') }}</a>
                            @endif --}}
                            <div class="flex-my-course">
                                <a href="{{ route('manageCourse.edit', [$course->id]) }}"
                                    class="course-detail-learn-now-edit">{{ trans('message.edit') }}</a>
                                {{-- <a href="{{ route('profile.show', [$course->id]) }}" class="course-detail-learn-now">{{ trans('message.delete') }}</a> --}}
                                <button type="button" class="course-detail-learn-now" data-toggle="modal"
                                    data-target="#delete{{ $course->id }}">
                                    {{ trans('message.delete') }}
                                </button>
                            </div>
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
        </section>
        </div>
    </section>
    <script src="{{ asset('js/preview-img.js') }}"></script>
    <script src="{{ asset('js/chartjs/chart.js') }}"></script>

    {{-- Delete Course --}}
    <div class="modal fade" id="delete{{ $course->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ trans('message.delete') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('profile.destroy', [$course->id]) }}" id="delete_modal" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" value="{{ $course->id }}">
                        {{ trans('message.want_to_delete') }}
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">{{ trans('message.close') }}</button>
                    <button type="submit" form="delete_modal"
                        class="btn btn-primary">{{ trans('message.delete') }}</button>
                </div>
            </div>
        </div>
    </div>
    {{-- Add lesson --}}
    <div class="modal fade" id="course{{ $course->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ trans('message.add_lesson') }}</h5>
                </div>
                <div class="modal-body">
                    <form action="{{ route('addLesson') }}" method="POST" id="add_lesson">
                        @csrf
                        <input type="hidden" name="course_id" value="{{ $course->id }}">
                        <div class="add-lesson">
                            <h6>{{ trans('message.title') }}</h6>
                            <input type="text" name="title" placeholder="{{ trans('message.type_title') }}"
                                autocomplete="off">
                            @error('title')
                                <p class="error-message">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="add-lesson">
                            <h6>{{ trans('message.description') }}</h6>
                            <textarea name="description" id="" cols="40" rows="5"
                                placeholder="{{ trans('message.type_description_lesson') }}"></textarea>
                            @error('description')
                                <p class="error-message">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="add-lesson">
                            <h6>{{ trans('message.video_url') }}</h6>
                            <textarea name="video_url" id="" cols="40" rows="2"
                                placeholder="{{ trans('message.video_link') }}"></textarea>
                            @error('video_url')
                                <p class="error-message">{{ $message }}</p>
                            @enderror
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">{{ trans('message.close') }}</button>
                    <button type="submit" form="add_lesson"
                        class="btn btn-success">{{ trans('message.save_change') }}</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delele lesson -->
    @foreach ($course->lessons as $lesson)
        <div class="modal fade" id="delete_lesson{{ $lesson->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ trans('message.delete') }}</h5>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('destroyLesson', [$lesson->id]) }}" id="delete{{ $lesson->id }}"
                            method="POST">
                            @csrf
                            @method('DELETE')
                        </form>
                        {{ trans('message.want_to_delete') }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bstn-secondary"
                            data-dismiss="modal">{{ trans('message.close') }}</button>
                        <button type="submit" form="delete{{ $lesson->id }}"
                            class="btn btn-primary">{{ trans('message.save_change') }}</button>
                    </div>
                </div>
            </div>
        </div>

        {{-- Edit Lesson --}}
        <div class="modal fade" id="edit_lesson{{ $lesson->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ trans('message.add_lesson') }}</h5>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('updateLesson', [$lesson->id]) }}" method="POST" id="edit_lesson">
                            @csrf
                            @method('PUT')
                            <div class="add-lesson">
                                <h6>{{ trans('message.title') }}</h6>
                                <input type="text" name="title" placeholder="{{ trans('message.type_title') }}"
                                    autocomplete="off" value="{{ $lesson->title }}">
                                @error('title')
                                    <p class="error-message">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="add-lesson">
                                <h6>{{ trans('message.description') }}</h6>
                                <textarea name="description" id="" cols="40" rows="5"
                                    placeholder="{{ trans('message.type_description_lesson') }}">{{ $lesson->description }}</textarea>
                                @error('description')
                                    <p class="error-message">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="add-lesson">
                                <h6>{{ trans('message.video_url') }}</h6>
                                <textarea name="video_url" id="" cols="40" rows="2"
                                    placeholder="{{ trans('message.video_link') }}">{{ $lesson->video_url }}</textarea>
                                @error('video_url')
                                    <p class="error-message">{{ $message }}</p>
                                @enderror
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ trans('message.close') }}</button>
                        <button type="submit" form="edit_lesson"
                            class="btn btn-success">{{ trans('message.save_change') }}</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
