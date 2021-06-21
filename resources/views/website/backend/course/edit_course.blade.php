@extends('website.backend.layouts.main')

@section('content')
<div class="hold-transition sidebar-mini">
    <div class="wrapper">
        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('manageCourse.update', $course->id) }}" method="post" enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        <input type="text" class="d-none" value="edit" name="edit">
                                        <div class="form-group">
                                            <label for="name">@lang('label.name')</label>
                                            <input type="text" class="form-control @error ('name') focus @enderror" id="name" value="{{ $course->name }}" placeholder="{{ trans('message.name') }}" name="name">
                                            @error ('name')
                                                <p class="error-message">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="description">@lang('label.description')</label>
                                            <textarea rows="3" class="form-control @error ('description') focus @enderror" id="description" placeholder="{{ trans('message.description') }}" name="description">{{ $course->description }}</textarea>
                                            @error('description')
                                                <p class="error-message">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type='file' id="input-img" name="images"/>
                                            <img id="img-preview" src="#" class="d-none"/>
                                            @error('photo')
                                                <p class="error-message">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary">@lang('label.submit')</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection
