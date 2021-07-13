@extends('website.frontend.masterlayout')

@section('content')
    <div class="header">
        @include('website.frontend.header-menu')
    </div>
    <div class="content">
        <section class="content-header">
            <h5>{{ trans('message.banner_1') }}</h5>
            <h1>{{ trans('message.banner_2') }}</h1>
            <div class="button-header">
                <a href="{{ route('allCourses') }}" class="a-link">{{ trans('message.course') }}</a>
            </div>
        </section>
    </div>
    <div class="all-teachers-div">
        <section class="teacher-banner">
            <h5>{{ trans('message.all_teacher') }}</h5>
            <h1>{{ trans('message.banner_2') }}</h1>
        </section>
        <div class="input-group input-group-sm search-teacher">
            <div class="search-item-course">
                <input type="text" name="search" id="input-live-search" class="form-control float-right search-teacher-input"
                   placeholder="{{ trans('message.search_teacher') }}" autocomplete="off">
            </div>
        </div>
    </div>
    <div class="teachers-center" >
        <div class="section-subject" id="teacher-center">
            @foreach ($teachers as $teacher)
                <section class="section">
                    <div class="subject">
                        <div class="subject-class">
                            {{-- <div class="img-subject-class" id="img" data-img="{{ config('image_path.images') .'/'. $course->images }}"></div> --}}
                            <img src="{{ config('image_path.images') . '/' . $teacher->images }}" alt=""
                                class="img-subject-class">
                        </div>
                        <div class="content-popular-class">
                            <div class="title-popular-class">
                                <h6>{{ $teacher->name }}</h6>
                            </div>
                            <p>{{ $teacher->email }}</p>
                            <ul class="info-subject subject-teacher">
                                <li class="type-teachers">
                                    <a href="{{ route('lessons.show', [$teacher->id]) }}">{{ trans('message.detail') }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </section>
            @endforeach
        </div>
        <div class="pagination-link">
            {{ $teachers->links() }}
        </div>
    </div>

    <footer>
        <div class="main-footer">
            <div class="description">
                <img src="{{ asset('edufield/assets/img/logo.png') }}" alt="" class="logo-home">
                <p>{{ trans('message.banner_5') }}<br>
                    {{ trans('message.banner_6') }}<br>{{ trans('message.banner_7') }}
                </p>

                <p>
                    {{ trans('message.banner_8') }}<br>{{ trans('message.banner_9') }}
                </p>
                <br>
                <p>
                    {{ trans('message.banner_10') }}
                </p>
            </div>
            <div class="description">
                <h6>{{ trans('message.contact') }}</h6>
                <div class="link">
                    <a href="#">facebook.com</a>
                    <a href="#">Twitter.com</a>
                </div>
            </div>
            <div class="description">
                <h6>{{ trans('message.support') }}</h6>
                <div class="link">
                    <a href="#">Hỗ trợ</a>
                    <a href="#">Đóng góp</a>
                </div>
            </div>
            <div class="description">
                <h6>{{ trans('message.playground') }}</h6>
                <div class="link">
                    <a href="#">Đố vui</a>
                    <a href="#">Chữa bài</a>
                </div>
            </div>
        </div>
    </footer>
    <script>
        $(document).on("keyup", "#input-live-search", function () {
            let searchInput = $(this).val();

            $.ajax({
                type: "POST",
                url: '{{ route('searchTeacher') }}',
                data: {
                    searchInput: searchInput,
                },
                headers: {
                    'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                },
                success: function (result) {
                    // console.log(result);
                    $('#teacher-center').html('');
                    $('#teacher-center').append(result);
                },
                error: function(error) {
                    // console.log(error);
                }
            });
        });
    </script>
    @jquery
    @toastr_js
    @toastr_render
@endsection
