@extends('website.frontend.masterlayout')

@section('content')
    <section class="container-auth">
        <header class="header-auth-profile">
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
            <section class="user-info">
                <section class="sidebar-info">
                    <section class="user-sidebar">
                        <a href class="flex-link" data-toggle="modal" data-target="#modal-avatar">
                            <section class="sidebar-avatar">
                                <img src="{{ asset(config('image_path.images') . '/' . $user->images) }}" alt="">
                            </section>
                            <section class="sidebar-header">
                                <h3>{{ $user->name }}</h3>
                                <p>{{ $user->role->name }}</p>
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
            <section class="user-detail max-width">
                <section class="header-user-detail">
                    <section class="detail-icon">
                        <img src="{{ asset('images/edit.svg') }}" alt="">
                    </section>
                    <section class="user-detail-title">
                        <h1>{{ trans('message.edit_course') }}</h1>
                        <p>{{ trans('message.manageinfo_slogan') }}</p>
                    </section>
                </section>
                <section class="change-email">
                    <section>
                       <div class="input-container">
                            <section class="user-detail-row">
                                <div class="input-container">
                                    <label for>{{ trans('message.course_name') }}</label>
                                    <div>
                                        <form action="{{ route('updateCourse', [$course->id]) }}" method="POST" id="update-email-form" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <input type="text" maxlength="50" name="name" autocomplete="off" placeholder="{{ trans('message.type_course_name') }}" class="@error('name') error-focus @enderror" value="{{ $course->name }}">
                                            @error('name')
                                                <p class="error-message">{{ $message }}</p>
                                            @enderror

                                            <label for class="label-add-course">{{ trans('message.description') }}</label>
                                            <textarea type="text" cols="60" rows="5" autocomplete="off" name="description" placeholder="{{ trans('message.type_course_name') }}" class="@error('description') error-focus @enderror">{{ $course->description }}</textarea>
                                            @error('description')
                                                <p class="error-message">{{ $message }}</p>
                                            @enderror

                                            <label for class="label-add-course">{{ trans('message.category') }}</label>
                                            <select name="category_id" id="" class="@error('category_id') error-focus @enderror">
                                                <option>{{ $course->category->name }}</option>
                                                @foreach ($categories as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                                <p class="error-message">{{ $message }}</p>
                                            @enderror

                                            <label for class="label-add-course">{{ trans('message.image') }}</label>
                                            <div class="form-group">
                                                <input type='file' id="input-img" name="images"/>
                                                @error('photo')
                                                    <p class="error-message">{{ $message }}</p>
                                                @enderror
                                                <img id="img-preview" src="#" class="d-none" />
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </section>
                       </div>
                        <section class="btn-submit-container">
                            <button type="submit" form="update-email-form">{{ trans('message.process') }}</button>
                        </section>
                    </section>
                </section>
            </section>
        </section>
    </section>
    <script src="{{ asset('js/preview-img.js') }}"></script>
@endsection

