@extends('website.frontend.layoutmaster')

@section('content')
    <header>
        <div class="header">
            <div class="main-header">
                {{-- <div class="menu">
                    <ul class="menu-navbar">
                        <li><img src="{{ asset('images/logo-vuihoc-bitu-normal.png') }}" alt="" class="logo-home"></li>
                        <li>Khóa học </li>
                    </ul>
                    <ul class="authentication">
                        <li>Đăng nhập</li>
                        <li>Đăng ký</li>
                    </ul>
                </div> --}}
                <div class="content">
                    <div class="content-header">
                        <h5>Cùng nhau tạo ra giá trị nhiều hơn cho xã hội!</h5>
                        <h1>Học tập để trau dồi kiến thức!</h1>
                        <div class="button-header">
                            <a href="#" class="a-link">Khóa học</a>
                            <a href="#" class="a-link">Đăng ký ngay</a>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </header>
    <main>
        <div class="container-main">
            <div class="icon-info">
                <div class="feature-icon">
                    <img src="{{ asset('images/feature-1.png') }}" alt="">
                    <h3>Trên 30,000 học viên </h3>
                </div>
                <div class="feature-icon">
                    <img src="{{ asset('images/feature-2.png') }}" alt="">
                    <h3>30 khóa học dành cho bạn </h3>
                </div>
                <div class="feature-icon">
                    <img src="{{ asset('images/feature-3.png') }}" alt="">
                    <h3>Học bất cứ lúc nào, bất cứ đâu </h3>
                </div>
            </div>
            <div class="feature-title-subject">
                <h2>Khóa học nổi bật</h2>
                <p>Những khóa học có số lượng học viên theo học nhiều nhất và lượt xem nhiều nhất </p>
            </div>
            <div class="section-subject">
                <section class="section">
                    <div class="subject">
                        <div class="subject-class">
                            <a href="">
                                <div class="img-subject-class" ></div>
                            </a>
                        </div>
                        <div class="content-popular-class">
                            <a href="" class="title-popular-class">
                                <h6>Học từ cơ bản đến nâng cao toán học </h6>
                            </a>
                            <p>Khóa học đề cao việc thực hành qua những ví dụ trong thực tế giúp học viên học được và nằm được những kiên thức nền tảng</p>
                            <ul class="info-subject">
                                <li class="author">
                                    <a href="#" >
                                        <img src="{{ asset('images/feature-3.png') }}" alt="" class="author-icon">Minh
                                    </a>
                                </li>
                                <li class="seen">
                                    <i class="fas fa-users"> 10</i>
                                </li>
                                <li class="type">
                                    <a href="#" class="free-course">Free</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </section>
                <section class="section">
                    <div class="subject">
                        <div class="subject-class">
                            <a href="">
                                <div class="img-subject-class" ></div>
                            </a>
                        </div>
                        <div class="content-popular-class">
                            <a href="" class="title-popular-class">
                                <h6>Học từ cơ bản đến nâng cao toán học </h6>
                            </a>
                            <p>Khóa học đề cao việc thực hành qua những ví dụ trong thực tế giúp học viên học được và nằm được những kiên thức nền tảng</p>
                            <ul class="info-subject">
                                <li class="author">
                                    <a href="#" >
                                        <img src="{{ asset('images/feature-3.png') }}" alt="" class="author-icon">Minh
                                    </a>
                                </li>
                                <li class="seen">
                                    <i class="fas fa-users"> 10</i>
                                </li>
                                <li class="type">
                                    <a href="#" class="free-course">Free</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </section>
                <section class="section">
                    <div class="subject">
                        <div class="subject-class">
                            <a href="">
                                <div class="img-subject-class" ></div>
                            </a>
                        </div>
                        <div class="content-popular-class">
                            <a href="" class="title-popular-class">
                                <h6>Học từ cơ bản đến nâng cao toán học </h6>
                            </a>
                            <p>Khóa học đề cao việc thực hành qua những ví dụ trong thực tế giúp học viên học được và nằm được những kiên thức nền tảng</p>
                            <ul class="info-subject">
                                <li class="author">
                                    <a href="#" >
                                        <img src="{{ asset('images/feature-3.png') }}" alt="" class="author-icon">Minh
                                    </a>
                                </li>
                                <li class="seen">
                                    <i class="fas fa-users"> 10</i>
                                </li>
                                <li class="type">
                                    <a href="#" class="free-course">Free</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </section>
                <section class="section">
                    <div class="subject">
                        <div class="subject-class">
                            <a href="">
                                <div class="img-subject-class" ></div>
                            </a>
                        </div>
                        <div class="content-popular-class">
                            <a href="" class="title-popular-class">
                                <h6>Học từ cơ bản đến nâng cao toán học </h6>
                            </a>
                            <p>Khóa học đề cao việc thực hành qua những ví dụ trong thực tế giúp học viên học được và nằm được những kiên thức nền tảng</p>
                            <ul class="info-subject">
                                <li class="author">
                                    <a href="#" >
                                        <img src="{{ asset('images/feature-3.png') }}" alt="" class="author-icon">Minh
                                    </a>
                                </li>
                                <li class="seen">
                                    <i class="fas fa-users"> 10</i>
                                </li>
                                <li class="type">
                                    <a href="#" class="free-course">Free</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </section>
                <section class="section">
                    <div class="subject">
                        <div class="subject-class">
                            <a href="">
                                <div class="img-subject-class" ></div>
                            </a>
                        </div>
                        <div class="content-popular-class">
                            <a href="" class="title-popular-class">
                                <h6>Học từ cơ bản đến nâng cao toán học </h6>
                            </a>
                            <p>Khóa học đề cao việc thực hành qua những ví dụ trong thực tế giúp học viên học được và nằm được những kiên thức nền tảng</p>
                            <ul class="info-subject">
                                <li class="author">
                                    <a href="#" >
                                        <img src="{{ asset('images/feature-3.png') }}" alt="" class="author-icon">Minh
                                    </a>
                                </li>
                                <li class="seen">
                                    <i class="fas fa-users"> 10</i>
                                </li>
                                <li class="type">
                                    <a href="#" class="free-course">Free</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </section>
                <section class="section">
                    <div class="subject">
                        <div class="subject-class">
                            <a href="">
                                <div class="img-subject-class" ></div>
                            </a>
                        </div>
                        <div class="content-popular-class">
                            <a href="" class="title-popular-class">
                                <h6>Học từ cơ bản đến nâng cao toán học </h6>
                            </a>
                            <p>Khóa học đề cao việc thực hành qua những ví dụ trong thực tế giúp học viên học được và nằm được những kiên thức nền tảng</p>
                            <ul class="info-subject">
                                <li class="author">
                                    <a href="#" >
                                        <img src="{{ asset('images/feature-3.png') }}" alt="" class="author-icon">Minh
                                    </a>
                                </li>
                                <li class="seen">
                                    <i class="fas fa-users"> 10</i>
                                </li>
                                <li class="type">
                                    <a href="#" class="free-course">Free</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </section>
            </div>
            <div class="lower-m">
                <a href="#" class="all-subject">Tất cả khóa học</a>
            </div>
        </div>
    </main>
    <footer>
        <div class="main-footer">
            <div class="description">
                <p>Vuihoc.vn là một trải nghiệm học tập tuyệt vời,<br>
                    cung cấp những khoá học online chất lượng cao<br>cho học sinh tiểu học.
                </p>

                <p>
                    Các khóa học được đầu tư kĩ lưỡng từ nội<br>dung tới chất lượng hình ảnh và âm thanh
                </p>
                <br>
                <p>
                    © 2019 MyCV JSC. All rights reserved.
                </p>
            </div>
            <div class="description">
                <h6>Liên hệ</h6>
                <div class="link">
                    <a href="#">facebook.com</a>
                    <a href="#">Twitter.com</a>
                </div>
            </div>
            <div class="description">
                <h6>Hỗ trợ</h6>
                <div class="link">
                    <a href="#">Hỗ trợ</a>
                    <a href="#">Đóng góp</a>
                </div>
            </div>
            <div class="description">
                <h6>Sân chơi</h6>
                <div class="link">
                    <a href="#">Đố vui</a>
                    <a href="#">Chữa bài</a>
                </div>
            </div>
        </div>
    </footer>
@endsection
