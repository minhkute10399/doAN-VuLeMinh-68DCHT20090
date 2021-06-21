@extends('website.frontend.masterlayout')

@section('content')

    <body>
        {{-- <!-- Start Preloader Area -->
        <div class="preloader-area">
            <div class="loader">
                <div class="dots">
                    <i class="dots-item dots-item-move-down"></i>
                    <i class="dots-item dots-item-move-left"></i>
                    <i class="dots-item dots-item-move-left"></i>
                    <i class="dots-item dots-item-move-left"></i>
                    <i class="dots-item dots-item-move-left"></i>
                    <i class="dots-item dots-item-move-down"></i>
                    <i class="dots-item dots-item-move-right"></i>
                    <i class="dots-item dots-item-move-right"></i>
                    <i class="dots-item dots-item-move-down"></i>
                    <i class="dots-item dots-item-move-up"></i>
                    <i class="dots-item dots-item-move-down"></i>
                    <i class="dots-item dots-item-move-up"></i>

                    <i class="dots-item"></i>

                    <i class="dots-item dots-item-move-down"></i>
                    <i class="dots-item dots-item-move-up"></i>
                    <i class="dots-item dots-item-move-down"></i>
                    <i class="dots-item dots-item-move-up"></i>
                    <i class="dots-item dots-item-move-left"></i>
                    <i class="dots-item dots-item-move-left"></i>
                    <i class="dots-item dots-item-move-up"></i>
                    <i class="dots-item dots-item-move-right"></i>
                    <i class="dots-item dots-item-move-right"></i>
                    <i class="dots-item dots-item-move-right"></i>
                    <i class="dots-item dots-item-move-right"></i>
                    <i class="dots-item dots-item-move-up"></i>
                </div>
            </div>
        </div>
        <!-- End Preloader Area --> --}}

        <!-- Start Main Menu Area -->
        <div class="main-header-area header-sticky box-shadow">
            <div class="container">
                <div class="classy-nav-container breakpoint-off">
                    <!-- Classy Menu -->
                    <nav class="classy-navbar justify-content-between" id="EduStudyNav">

                        <!-- Logo -->
                        <a class="nav-brand" href="index-three.html"><img
                                src="{{ asset('edufield/assets/img/logo.png') }}" alt="logo"></a>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- close btn -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
                                    {{-- <li><a href="#" class="active">Home</a>
                                <ul class="dropdown">
                                    <li><a href="index-default.html">Home Demo One</a></li>
                                    <li><a href="index-two.html">Home Demo Two</a></li>
                                    <li><a href="index-three.html">Home Demo Three</a></li>
                                    <li class="active"><a href="index-four.html">Home Demo Four</a></li>
                                </ul>
                            </li> --}}

                                    {{-- <li><a href="#">About Us</a>
                                <ul class="dropdown">
                                    <li><a href="about.html">About Us</a></li>
                                    <li><a href="admission.html">Admission</a></li>
                                    <li><a href="teacher-style-one.html">Teacher Style One</a></li>
                                    <li><a href="teacher-style-two.html">Teacher Style Two</a></li>
                                    <li><a href="single-teacher.html">Teacher Details</a></li>
                                </ul>
                            </li> --}}

                                    <li><a href="#">Courses</a>
                                        <ul class="dropdown">
                                            <li><a href="courses-style-one.html">Courses Style One</a></li>
                                            <li><a href="courses-style-two.html">Courses Style Two</a></li>
                                            <li><a href="single-courses.html">Courses Details</a></li>
                                        </ul>
                                    </li>

                                    {{-- <li><a href="#">Events</a>
                                <ul class="dropdown">
                                    <li><a href="event-style-one.html">Events Style One</a></li>
                                    <li><a href="event-style-two.html">Events Style Two</a></li>
                                    <li><a href="single-events.html">Events Details</a></li>
                                </ul>
                            </li> --}}

                                    <li><a href="#">Pages</a>
                                        <ul class="dropdown">
                                            {{-- <li><a href="about.html">About Us</a></li> --}}
                                            {{-- <li><a href="#">Blog</a>
                                        <ul class="dropdown">
                                            <li><a href="blog-style-one.html">Blog Style One</a></li>
                                            <li><a href="blog-style-two.html">Blog Style Two</a></li>
                                            <li><a href="blog-style-three.html">Blog Style Three</a></li>
                                            <li><a href="single-blog.html">Blog Details</a></li>
                                        </ul>
                                    </li> --}}
                                            {{-- <li><a href="#">Shop</a>
                                        <ul class="dropdown">
                                            <li><a href="shop-style-one.html">Shop Style One</a></li>
                                            <li><a href="shop-style-two.html">Shop Style Two</a></li>
                                            <li><a href="single-shop.html">Shop Details</a></li>
                                            <li><a href="cart.html">Cart</a></li>
                                            <li><a href="checkout.html">Checkout</a></li>
                                        </ul>
                                    </li> --}}
                                            {{-- <li><a href="#">Courses</a>
                                        <ul class="dropdown">
                                            <li><a href="courses-style-one.html">Courses Style One</a></li>
                                            <li><a href="courses-style-two.html">CosingleCourse
                                    <li><a href="#">Teacher</a>
                                        {{-- <ul class="dropdown">
                                            <li><a href="teacher-style-one.html">Teacher Style One</a></li>
                                            <li><a href="teacher-style-two.html">Teacher Style Two</a></li>
                                            <li><a href="single-teacher.html">Teacher Details</a></li>
                                        </ul> --}}
                                    </li>
                                    {{-- <li><a href="#">Events</a>
                                        <ul class="dropdown">
                                            <li><a href="event-style-one.html">Events Style One</a></li>
                                            <li><a href="event-style-two.html">Events Style Two</a></li>
                                            <li><a href="single-events.html">Events Details</a></li>
                                        </ul>
                                    </li> --}}
                                    {{-- <li><a href="#">Contact</a>
                                        <ul class="dropdown">
                                            <li><a href="contact-style-one.html">Contact Style One</a></li>
                                            <li><a href="contact-style-two.html">Contact Style Two</a></li>
                                        </ul>
                                    </li> --}}
                                    {{-- <li><a href="admission.html">Admission</a></li>
                                    <li><a href="error.html">404 Error</a></li>
                                    <li><a href="faq.html">FAQ</a></li>
                                    <li><a href="login.html">Login</a></li>
                                    <li><a href="register.html">Register</a></li> --}}
                                </ul>
                                </li>

                                <li><a href="#">Blog</a>
                                    <ul class="dropdown">
                                        <li><a href="blog-style-one.html">Blog Style One</a></li>
                                        <li><a href="blog-style-two.html">Blog Style Two</a></li>
                                        <li><a href="blog-style-three.html">Blog Style Three</a></li>
                                        <li><a href="single-blog.html">Blog Details</a></li>
                                    </ul>
                                </li>

                                {{-- <li><a href="#">Shop</a>
                                <ul class="dropdown">
                                    <li><a href="shop-style-one.html">Shop Style One</a></li>
                                    <li><a href="shop-style-two.html">Shop Style Two</a></li>
                                    <li><a href="single-shop.html">Shop Details</a></li>
                                    <li><a href="cart.html">Cart</a></li>
                                    <li><a href="checkout.html">Checkout</a></li>
                                </ul>
                            </li> --}}

                                {{-- <li><a href="#">Contact</a>
                                <ul class="dropdown">
                                    <li><a href="contact-style-one.html">Contact Style One</a></li>
                                    <li><a href="contact-style-two.html">Contact Style Two</a></li>
                                </ul>
                            </li> --}}

                                <li><a href="#search" class="search-btn"><i class="icofont-search-2"></i></a></li>
                                @guest
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                        </li>
                                    @endif
                                @else
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }}
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                                                                            document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endguest
                                </ul>
                            </div>
                            <!-- Nav End -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <!-- End Main Menu Area -->
        <div class="class">
            <div class="player-column">
                <div class="active-video">
                    <div class="video-wrapper">
                        <div class="react-player">
                            {{-- @foreach ($course->lessons as $item) --}}
                                <div class="react-view">
                                    <iframe src="{{ $lesson->video_url }}" frameborder="0" allowfullscreen
                                        style="width: 1000px; height: 670px; padding-top: 50px" id="iframe"></iframe>
                                </div>
                            {{-- @endforeach --}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="list-lesson">
                <div class="learn-playlist">
                    <div class="accordion" id="accordionEx" role="tablist" aria-multiselectable="true">
                        <div class="card">
                            <div class="card-header" role="tab" id="headingOne">
                                <a data-toggle="collapse" data-parent="#accordionEx" href="#collapseOne"
                                    aria-expanded="true" aria-controls="collapseOne">
                                    <h5 class="mb-0">
                                        All Lessons<span><i class="icofont-rounded-down"></i></span>
                                    </h5>
                                </a>
                            </div>
                            @foreach ($course->lessons as $index => $lesson)
                                <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne"
                                    data-parent="#accordionEx">
                                    <div class="card-body">
                                        <ul>
                                            <li class="video">
                                                <i class="icofont-ui-play"></i> Lesson {{ $index + 1 }} :
                                                <span><div class="video-lesson" data-url="{{ route('video', [$lesson->id]) }}">
                                                    {{ $lesson->title }}
                                                </div></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- End Footer Area -->

        <!-- Back to top -->
        <a class="scrolltop" href="#top"><i class="icofont-hand-drawn-up"></i></a>
        <!-- End Back to top -->

        <!-- jQuery Min JS -->
        <script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
        <script>
            $(document).ready(function() {
                $(document).on("click", ".video-lesson", function() {
                    var urlData = this.dataset.url;
                    console.log(urlData);
                    $.ajax({
                        type: "GET",
                        url: urlData,
                        success: function success (result) {
                            const oldLocation = window.location.href;
                            let arrayLocation = oldLocation.split('/');
                            arrayLocation[arrayLocation.length - 1] = result.lesson.id;
                            const ajaxLocation = arrayLocation.join('/');
                            console.log(oldLocation, result, ajaxLocation);
                            $('#iframe').attr("src", result.lesson.video_url);
                            window.history.pushState({},"", ajaxLocation);
                        },
                    });
                });
            });
        </script>
        {{-- <script src="{{ asset('edufield/assets/js/jquery.min.js') }}"></script> --}}
        <!-- Prpper JS -->
        <script src="{{ asset('edufield/assets/js/popper.min.js') }}"></script>
        <!-- Bootstrap Min JS -->
        <script src="{{ asset('edufield/assets/js/bootstrap.min.js') }}"></script>
        <!-- Classy Nav Min Js -->
        <script src="{{ asset('edufield/assets/js/classy-nav.min.js') }}"></script>
        <!-- Owl Carousel Min Js -->
        <script src="{{ asset('edufield/assets/js/owl.carousel.min.js') }}"></script>
        <!-- Magnific Popup JS -->
        <script src="{{ asset('edufield/assets/js/jquery.magnific-popup.min.js') }}"></script>
        <!-- CounterUp JS -->
        <script src="{{ asset('edufield/assets/js/jquery.counterup.min.js') }}"></script>
        <!-- Waypoints JS -->
        <script src="{{ asset('edufield/assets/js/waypoints.min.js') }}"></script>
        <!-- Form Validator Min JS -->
        <script src="{{ asset('edufield/assets/js/form-validator.min.js') }}"></script>
        <!-- Contact Form Min JS -->
        <script src="{{ asset('edufield/assets/js/contact-form-script.js') }}"></script>
        <!-- Main JS -->
        <script src="{{ asset('edufield/assets/js/main.js') }}"></script>
    </body>
@endsection
