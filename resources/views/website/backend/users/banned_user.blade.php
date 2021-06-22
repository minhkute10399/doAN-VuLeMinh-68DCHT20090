@extends('website.backend.layouts.main')

@section('content')
<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>{{ trans('message.black_list') }}</h2>
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
                                                    {{ trans('message.name') }}
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1" aria-label="Last name: activate to sort column ascending">
                                                    {{ trans('message.image') }}
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-responsive"rowspan="1" colspan="1" aria-label="Last name: activate to sort column ascending">
                                                    {{ trans('message.email') }}
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-responsive"rowspan="1" colspan="1" aria-label="Last name: activate to sort column ascending">
                                                    {{ trans('message.role') }}
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-responsive"rowspan="1" colspan="1" aria-label="Last name: activate to sort column ascending">
                                                    {{ trans('message.status') }}
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-responsive"rowspan="1" colspan="1" aria-label="Last name: activate to sort column ascending">
                                                    {{ trans('message.create_at') }}
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-responsive"rowspan="1" colspan="1" aria-label="Last name: activate to sort column ascending">
                                                    {{ trans('message.update_at') }}
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-responsive"rowspan="1" colspan="1" aria-label="Last name: activate to sort column ascending">
                                                    {{ trans('message.banned_until') }}
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-responsive"rowspan="1" colspan="1" aria-label="Last name: activate to sort column ascending">
                                                    {{ trans('message.action') }}
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($banned_user as $index => $user)
                                                <tr role="row" class="odd">
                                                    <td>{{ $index++ }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td><img src="{{ asset(config('image_path.images') .'/'. $user->images) }}" alt="" class="list_image"></td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ $user->role->name }}</td>
                                                    <td>
                                                        @if ($user->status != config('status.active'))
                                                            <div class="inactive_user">{{ trans('message.inactive') }}</div>
                                                        @else
                                                            <div class="active_user">{{ trans('message.active') }}</div>
                                                        @endif
                                                    </td>
                                                    <td>{{ date('M d ,Y', strtotime($user->created_at)) }} {{ trans('message.at') }} {{ date('g:ia', strtotime($user->created_at)) }}</td>
                                                    <td>{{ date('M d ,Y', strtotime($user->updated_at)) }} {{ trans('message.at') }} {{ date('g:ia', strtotime($user->updated_at)) }}</td>
                                                    <td>{{ $user->banned_until }}</td>
                                                    <td class="edit_list_user">
                                                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#edit{{ $user->id }}">
                                                           {{ trans('message.unban') }}
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div>{{ $banned_user->links() }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@foreach ($banned_user as $user)
        <div class="modal fade" id="edit{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form action="{{ route('manageUser.update', [$user->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">{{ $user->name }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">{{ trans('messsage.banned_at') }}<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="date" id="status"class="form-control " name="banned_until" value="{{ $user->banned_until }}">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('message.close') }}</button>
                            <button type="submit" d-form="block{{ $user->id }}"  class="btn btn-primary">{{ trans('message.unban') }}</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    @endforeach
@endsection
