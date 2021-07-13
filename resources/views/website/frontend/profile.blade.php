@extends('website.frontend.masterlayout')

@section('content')
    <section class="container-auth">
        <header class="header-auth-profile">
            <div class="header-link-profile">
                <a href="{{ route('home.index') }}" class="sub-link-profile">
                    <img src="{{ asset('edufield/assets/img/logo.png') }}" alt="" class="logo-home">
                </a>
                <a href="{{ route('home.index') }}" class="btn-link">
                    <i class="fas fa-chevron-left"></i>
                    <span>{{ trans('message.return_home') }}</span>
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
                                <div class="position-avatar-container">
                                    <i class="fas fa-camera"></i>
                                </div>
                            </section>
                            <section class="sidebar-header">
                                <h3>{{ $user->name }}</h3>
                                <p>{{ $user->role->name }}</p>
                            </section>
                        </a>
                        <div class="modal fade" id="modal-avatar">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">{{ trans('message.change_picture') }}</h5>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('profile.update', [$user->id]) }}" method="POST"
                                            id="avatar-change" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            {{-- <input type="text" class="d-none" value="{{ config('validate.update_avatar') }}" name="validate_rule"> --}}
                                            <div class="form-group">
                                                <input type='file' id="input-img" name="images" />
                                                @error('photo')
                                                    <p class="error-message">{{ $message }}</p>
                                                @enderror
                                                <img id="img-preview" src="#" class="d-none" />
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" form="avatar-change"
                                            class="btn btn-outline-success">{{ trans('message.update') }}</button>
                                        <button type="button" class="btn btn-outline-secondary"
                                            data-dismiss="modal">{{ trans('message.close') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <ul class="sidebar-nav">
                        <li class="sidebar-item">
                            <a href="{{ route('profile.index') }}">{{ trans('message.account') }}</a>
                        </li>
                        @can('see_teacher_course')
                            <li class="sidebar-item">
                                <a href="{{ route('courses') }}">{{ trans('message.manage_course') }}</a>
                            </li>
                        @endcan
                    </ul>
                </section>
            </section>
            <section class="user-detail">
                <section class="header-user-detail">
                    <section class="detail-icon">
                        <img src="{{ asset('images/icon.svg') }}" alt="">
                    </section>
                    <section class="user-detail-title">
                        <h1>{{ trans('message.account') }}</h1>
                        <p>{{ trans('message.manageinfo_slogan') }}</p>
                    </section>
                </section>
                <section class="user-detail-row">
                    <h4>{{ trans('message.account_info') }}</h4>
                    <a href="{{ route('email') }}" class="user-detail-link">
                        <section class="detail-item">
                            <span>{{ trans('message.email') }}</span>
                            <span class="detail-description">{{ $user->email }}</span>
                        </section>
                        <div>
                            <i class="fas fa-chevron-right arrow-color"></i>
                        </div>
                    </a>
                </section>
                <section class="user-detail-row seperate-row">
                    <h4>{{ trans('message.personal_information') }}</h4>
                    <a href="" class="user-detail-link">
                        <section class="detail-item">
                            <span>{{ trans('message.name') }}</span>
                            <span class="detail-description">{{ $user->name }}</span>
                        </section>
                        <div>
                            <i class="fas fa-chevron-right arrow-color"></i>
                        </div>
                    </a>
                    <a href="" class="user-detail-link">
                        <section class="detail-item">
                            <span>{{ trans('message.registered_course') }}</span>
                            <span class="detail-description">{{ $user->courses->count() }}
                                {{ trans('message.course') }}</span>
                        </section>
                        <div>
                            <i class="fas fa-chevron-right arrow-color"></i>
                        </div>
                    </a>
                </section>
            </section>
            <section class="user-chart">
                <div id="chart-container">
                    <canvas id="myChart"></canvas>
                </div>
            </section>
        </section>
    </section>
    <script src="{{ asset('js/preview-img.js') }}"></script>
    {{-- <script src="{{ asset('bower_components/chart.js/dist/Chart.js') }}"></script> --}}
    <script src="{{ asset('js/Chart.js') }}"></script>
    <script src="{{ asset('js/preview.js') }}"></script>
@endsection
