<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>{{ trans('message.admin') }}</h3>
        <ul class="nav side-menu">
            <li>
                <a href="{{ route('dashboard') }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>  {{ trans('message.dashboard') }}
                </a>
            </li>
            <li>
                <a href="{{ route('categories.index') }}">
                    <i class="fas fa-tags"></i> {{ trans('message.category') }}
                </a>
            </li>
            <li>
                <a>
                    <i class="fas fa-tags"></i> {{ trans('message.manage_user') }}
                    <span class="fa fa-chevron-down"></span>
                </a>
                <ul class="nav child_menu">
                    <li>
                        <a href="{{ route('manageUser.index') }}">
                            <i class="nav-icon fas fa-users"></i>
                             {{ trans('message.list_user') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('blacklistUser') }}">
                            <i class="fas fa-address-book"></i>
                             {{ trans('message.black_list') }}
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a>
                    <i class="nav-icon fas fa-layer-group"></i> {{ trans('message.manage_course') }}
                    <span class="fa fa-chevron-down"></span>
                </a>
                <ul class="nav child_menu">
                    <li><a href="{{ route('manageCourse.index') }}"> {{ trans('message.list_course') }}</a></li>
                    {{-- <li><a href="{{ route('postRequest') }}">{{ trans('message.request_post') }}</a></li> --}}
                </ul>
            </li>
            <li>
                {{-- <a>
                    <i class="fas fa-tags"></i>{{ trans('message.user') }}
                    <span class="fa fa-chevron-down"></span>
                </a>
                <ul class="nav child_menu">
                    <li><a href="{{ route('users.index') }}">{{ trans('message.user') }}</a></li>
                    <li><a href="{{ route('manageAuthor') }}">{{ trans('message.author') }}</a></li>
                </ul> --}}
            </li>
            <li>
                {{-- <a>
                    <i class="fas fa-tags"></i>{{ trans('message.request_writer') }}
                    <span class="fa fa-chevron-down"></span>
                </a>
                <ul class="nav child_menu">
                    <li><a href="{{ route('requests.index') }}">{{ trans('message.author') }}</a></li>
                </ul> --}}
            </li>
        </ul>
    </div>
</div>
