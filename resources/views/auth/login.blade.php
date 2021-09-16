@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-danger">{{ session('message') }}</div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<section class="body-auth">
    <section class="content-auth">
        <section class="form-auth">
            <h1 class="auth-heading">{{ trans('message.title_login') }}</h1>
            <p class="auth-sub-heading">{{ trans('message.content_login_to_learn') }}</p>
            <ul>
                <li class="auth-separator"></li>
                <li>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="text-input-container">
                            <label for="email">{{ trans('message.email') }}</label>
                            <input type="email" class="auth-input" id="email" placeholder="{{ trans('message.type_your_email') }}" name="email">
                            @error('email')
                                <span role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="text-input-container">
                            <label for="password">{{ trans('message.password') }}</label>
                            <input type="password" class="auth-input" id="password" placeholder="{{ trans('message.enter_password') }}" name="password">
                            @error('password')
                                <span role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="auth-btn-submit">{{ trans('message.login') }}</button>
                    </form>
                    <section class="auth-reset-pwd">
                        <a href="{{ route('password.request') }}" class="auth-link">{{ trans('message.forget_password') }}</a>
                    </section>
                </li>
            </ul>
        </section>
    </section>
    <section class="other-action">
        <p>{{ trans('message.you_dont_have_account') }}</p>
        <a href="{{ route('register') }}">{{ trans('message.register_now') }}</a>
    </section>
</section>
@endsection
