@extends('website.backend.layouts.main')

@section('content')
<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>{{ $course->name }}</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li>
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="row">
                <div class="col-sm-2">
                    <div class="input-group input-group-sm">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box table-responsive">
                        <div id="datatable-responsive_wrapper"class="dataTables_wrapper container-fluid dt-bootstrap no-footer">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline"  cellspacing="0" role="grid" aria-describedby="datatable-responsive_info">
                                        <thead>
                                            <tr role="row" class="text-center">
                                                <th class="sorting_asc" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1" aria-sort="ascending" aria-label="First name: activate to sort column descending">
                                                    #
                                                </th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1" aria-sort="ascending" aria-label="First name: activate to sort column descending">
                                                    {{ trans('message.title') }}
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-responsive"rowspan="1" colspan="1" aria-label="Last name: activate to sort column ascending">
                                                    {{ trans('message.course') }}
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-responsive"rowspan="1" colspan="1" aria-label="Last name: activate to sort column ascending">
                                                    {{ trans('message.create_at') }}
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-responsive"rowspan="1" colspan="1" aria-label="Last name: activate to sort column ascending">
                                                    {{ trans('message.update_at') }}
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-responsive"rowspan="1" colspan="1" aria-label="Last name: activate to sort column ascending">
                                                    {{ trans('message.action') }}
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($course->lessons as $index => $lesson)
                                                <tr role="row" class="odd">
                                                    <td>{{ $index++ }}</td>
                                                    <td>{{ $lesson->title }}</td>
                                                    <td>{{ $lesson->course->name }}</td>
                                                    <td>{{ date('M d ,Y', strtotime($lesson->created_at)) }} {{ trans('message.at') }} {{ date('g:ia', strtotime($lesson->created_at)) }}</td>
                                                    <td>{{ date('M d ,Y', strtotime($lesson->updated_at)) }} {{ trans('message.at') }} {{ date('g:ia', strtotime($lesson->updated_at)) }}</td>
                                                    <td class="edit_list_user">
                                                        <a href="{{ route('adminLesson', [$lesson->id]) }}" class="btn btn-primary">
                                                            {{ trans('message.show_video') }}
                                                        </a>

                                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#edit{{ $lesson->id }}">
                                                           {{ trans('message.reject') }}
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- @foreach ($course->lessons as $lesson)
        <div class="modal fade" id="show{{ $lesson->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form action="{{ route('manageUser.update', [$lesson->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">{{ $lesson->title }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="item form-group">
                                <iframe width="1000" height="1000" src="{{ $lesson->video_url }}" frameborder="0"></iframe>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a type="button" class="btn btn-secondary close" data-dismiss="modal">{{ trans('message.close') }}</a>
                            <button type="submit" d-form="block{{ $lesson->id }}"  class="btn btn-danger">{{ trans('message.reject') }}</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
@endforeach --}}

@foreach ($course->lessons as $lesson)
        <div class="modal fade" id="edit{{ $lesson->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form action="{{ route('manageUser.update', [$lesson->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">{{ $lesson->name }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">{{ trans('messsage.do_you_want_to_reject') }}<span class="required">*</span>
                                </label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('message.close') }}</button>
                            <button type="submit" d-form="block{{ $lesson->id }}"  class="btn btn-danger">{{ trans('message.reject') }}</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    @endforeach
    <script type="text/javascript" src="{{ asset('js/stop_iframe.js') }}"></script>
@endsection
