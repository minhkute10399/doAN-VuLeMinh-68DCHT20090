@extends('website.backend.layouts.main')

@section('content')
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>{{ trans('message.manage_user') }}</h2>
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
                    <div class="col-sm-8">
                        <div class="input-group input-group-sm">
                            <form action="{{ route('searchAccount') }}" method="GET" id="search_account">
                                @csrf
                                <input type="text" name="search_account" class="form-control float-right"
                                    placeholder="{{ trans('message.search_account') }}">
                                @error('search_account')
                                    <p class="error-message">{{ $message }}</p>
                                @enderror
                            </form>

                            <div class="input-group-append">
                                <button type="submit" form="search_account" class="btn btn-outline-primary search-account">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <div id="datatable-responsive_wrapper"
                                class="dataTables_wrapper container-fluid dt-bootstrap no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="datatable-responsive"
                                            class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline"
                                            cellspacing="0" role="grid" aria-describedby="datatable-responsive_info">
                                            <thead>
                                                <tr role="row" class="text-center">
                                                    <th class="sorting_asc" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        aria-sort="ascending"
                                                        aria-label="First name: activate to sort column descending">
                                                        #
                                                    </th>
                                                    <th class="sorting_asc" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        aria-sort="ascending"
                                                        aria-label="First name: activate to sort column descending">
                                                        {{ trans('message.name') }}
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable-responsive"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Last name: activate to sort column ascending">
                                                        {{ trans('message.image') }}
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable-responsive"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Last name: activate to sort column ascending">
                                                        {{ trans('message.email') }}
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable-responsive"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Last name: activate to sort column ascending">
                                                        {{ trans('message.role') }}
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable-responsive"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Last name: activate to sort column ascending">
                                                        {{ trans('message.status') }}
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable-responsive"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Last name: activate to sort column ascending">
                                                        {{ trans('message.create_at') }}
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable-responsive"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Last name: activate to sort column ascending">
                                                        {{ trans('message.update_at') }}
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable-responsive"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Last name: activate to sort column ascending">
                                                        {{ trans('message.action') }}
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($user as $index => $item)
                                                    <tr role="row" class="odd">
                                                        <td>{{ $index++ }}</td>
                                                        <td>{{ $item->name }}</td>
                                                        <td><img src="{{ asset(config('image_path.images') . '/' . $item->images) }}"
                                                                alt="" class="list_image"></td>
                                                        <td>{{ $item->email }}</td>
                                                        <td>{{ $item->role->name }}</td>
                                                        <td>
                                                            @if ($item->status != config('status.active'))
                                                                <div class="inactive_user">
                                                                    {{ trans('message.inactive') }}</div>
                                                            @else
                                                                <div class="active_user">{{ trans('message.active') }}
                                                                </div>
                                                            @endif
                                                        </td>
                                                        <td>{{ date('M d ,Y', strtotime($item->created_at)) }}
                                                            {{ trans('message.at') }}
                                                            {{ date('g:ia', strtotime($item->created_at)) }}</td>
                                                        <td>{{ date('M d ,Y', strtotime($item->updated_at)) }}
                                                            {{ trans('message.at') }}
                                                            {{ date('g:ia', strtotime($item->updated_at)) }}</td>
                                                        <td class="edit_list_user">
                                                            <button type="button" class="btn btn-outline-danger"
                                                                data-toggle="modal" data-target="#edit{{ $item->id }}">
                                                                {{ trans('message.reject') }}
                                                            </button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {{-- <div>{{ $user->links() }}</div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @foreach ($user as $item)
        <div class="modal fade" id="edit{{ $item->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form action="{{ route('manageUser.update', [$item->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">{{ $item->name }}</h5>
                            {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button> --}}
                        </div>
                        <div class="modal-body">
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align"
                                    for="first-name">{{ trans('message.banned_at') }}<span class="required"></span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="date" id="status" required="required" class="form-control "
                                        name="banned_until" value="{{ $item->banned_until }}">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">{{ trans('message.close') }}</button>
                            <button type="submit" d-form="block{{ $item->id }}"
                                class="btn btn-danger">{{ trans('message.reject') }}</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    @endforeach
@endsection
