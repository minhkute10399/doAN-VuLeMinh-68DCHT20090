<!doctype html>
<html lang="zxx">

<!-- Mirrored from envytheme.com/tf-demo/edufield/index-four.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 07 Dec 2018 19:58:12 GMT -->
<head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
        {{-- <script src="{{ asset('bower_components/bootstrap/js/dist/modal.js') }}"></script> --}}
        <!-- IcoFont Min CSS -->
        <link rel="stylesheet" href="{{ asset('edufield/assets/css/icofont.min.css') }}">
		<!-- Classy Nav CSS -->
		<link rel="stylesheet" href="{{ asset('edufield/assets/css/classy-nav.min.css') }}">
		<!-- Animate CSS -->
		<link rel="stylesheet" href="{{ asset('edufield/assets/css/animate.css') }}">
		<!-- Owl Carousel CSS -->
		<link rel="stylesheet" href="{{ asset('edufield/assets/css/owl.carousel.css') }}">
		<!-- Magnific Popup CSS -->
		<link rel="stylesheet" href="{{ asset('edufield/assets/css/magnific-popup.css') }}">
		<!-- Owl Theme Default CSS -->
		<link rel="stylesheet" href="{{ asset('edufield/assets/css/owl.theme.default.min.css') }}">
		<!-- Style CSS -->
        <link rel="stylesheet" href="{{ asset('edufield/assets/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('bower_components/components-font-awesome/css/all.css') }}">
        <!-- Responsive CSS -->
        <link rel="stylesheet" href="{{ asset('edufield/assets/css/responsive.css') }}">

        <title>EduField - Education & Online Courses</title>

        <link rel="icon" type="image/png" href="{{ asset('edufield/assets/img/favicon.png') }}">
        <script src="{{ asset('js/backgroundscript.js') }}"></script>
        {{-- <script src="{{ asset('js/videoajax.js') }}"></script> --}}
        {{-- <script src="{{ asset('js/scriptcustom.js') }}"></script> --}}
        <script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
        <script src="{{ asset('bootstrap/none/js/bootstrap.bundle.min.js') }}"></script>
        <script defer src="{{ asset('js/bootstrap.js') }}"></script>
        <script defer src="{{ asset('js/pusher.js') }}"></script>
        {{-- <script defer src="{{ asset('js/dropdown-notification.js') }}"></script> --}}
        <main class="py-4">
            @yield('content')
        </main>
        @include('sweetalert::alert')
        @toastr_css
        @jquery
        @toastr_js
        @toastr_render
    </head>
