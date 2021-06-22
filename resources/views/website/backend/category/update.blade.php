@extends('website.backend.layouts.main')

@section('content')
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>{{ trans('message.update') }}</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br>
                <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" method="POST" action="{{ route('categories.update', [$category->id]) }}">
                    @csrf
                    @method('PUT')
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name" >{{ trans('message.name') }}<span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="name" required="required" class="form-control " name="name" value="{{ $category->name }}">
                        </div>
                        <select class="form-control" name="parent_id">
                            <option value="{{ config('category.parent') }}">---{{ trans('message.category') }}---</option>
                            @foreach ($categoryList as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                            <a href="{{ route('categories.index') }}" class="btn btn-primary">{{ trans('message.back') }}</a>
                            <button type="submit" class="btn btn-success">{{ trans('message.save_change') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
