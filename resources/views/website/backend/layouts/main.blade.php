<!DOCTYPE html>
<html lang="en">

@include('website.backend.layouts.head')

<body class="nav-md">
    @include('sweetalert::alert')
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col admin-theme">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title logo-admin-page">
                        <a href="{{ route('home.index') }}" class="site_title">
                            <img src="{{ asset('edufield/assets/img/logo.png') }}" alt="" class="logo-admin-home">
                        </a>
                    </div>
                    <div class="clearfix"></div>
                    <br />
                    <!-- sidebar menu -->
                    @include('website.backend.layouts.sidebar')
                    <!-- /sidebar menu -->
                </div>
            </div>
            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                    <nav class="nav navbar-nav">
                        <ul class=" navbar-right">
                            <li class="nav-item dropdown open" >
                                @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ trans('message.login')}}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ trans('message.register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown name-admin">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <img src="{{ asset(config('image_path.images') . '/' . Auth::user()->images) }}" alt=""
                                            class="avatar_user">
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right li-admin" aria-labelledby="navbarDropdown">
                                        <ul>
                                            <li>
                                                <a href="{!! route('change-language', ['en']) !!}">
                                                    <i class="fas fa-globe-americas"></i>
                                                    <p for="theme">{{ trans('message.en') }}</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{!! route('change-language', ['vi']) !!}">
                                                    <i class="fas fa-globe-asia"></i>
                                                    <p for="theme">{{ trans('message.vi') }}</p>
                                                </a>
                                            </li>
                                            <li>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="logout-btn">
                                                        <i class="fas fa-sign-out-alt"></i>
                                                        <p for="theme">{{ trans('message.logout') }}</p>
                                                    </button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            @endguest
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->
        <!-- page content -->
        <div class="right_col" role="main">
            @yield('content')
        </div>
        <!-- /page content -->
    @jquery
    @toastr_js
    @toastr_render
    @include('website.backend.layouts.foot')
</body>

</html>
