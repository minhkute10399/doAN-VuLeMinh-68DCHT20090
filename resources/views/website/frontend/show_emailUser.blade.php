@extends('website.frontend.masterlayout')

@section('content')
    <section class="container-auth">
        <header class="header-auth-profile">
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
                    </ul>
                </section>
            </section>
            <section class="user-detail max-width">
                <section class="header-user-detail">
                    <section class="user-detail-title">
                        <h1>{{ trans('message.change_email') }}</h1>
                        <p>{{ trans('message.manageinfo_slogan') }}</p>
                    </section>
                </section>
                <section class="change-email">
                    <section>
                        <strong>{{ trans('message.current_email') }}</strong>
                        <p>{{ $user->email }}</p>
                        <div class="input-container">
                            <label for>{{ trans('message.new_email') }}</label>
                            <div>
                                <form action="{{ route('update', auth()->user()->id) }}" method="POST" id="update-email-form">
                                    @csrf
                                    @method('PATCH')
                                    <input type="email" maxlength="50" name="email" placeholder="{{ trans('message.type_new_email') }}" class="@error('email') error-focus @enderror">
                                    @error('email')
                                        <p class="error-message">{{ $message }}</p>
                                    @enderror
                                </form>
                            </div>
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

