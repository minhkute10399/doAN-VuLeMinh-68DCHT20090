<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>{{ trans('message.admin') }}</h3>
        <ul class="nav side-menu">
            <li class="sidebar-admin">
                <a href="{{ route('dashboard') }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i> {{ trans('message.dashboard') }}
                </a>
            </li>
            <li class="sidebar-admin">
                <a href="{{ route('categories.index') }}">
                    <i class="fas fa-list-ul"></i> {{ trans('message.category') }}
                </a>
            </li>
            <li class="sidebar-admin">
                <a>
                    <i class="fas fa-user"></i> {{ trans('message.manage_user') }}
                    <span class="fa fa-chevron-down"></span>
                </a>
                <ul class="nav child_menu">
                    <li class="sidebar-admin">
                        <a href="{{ route('manageUser.index') }}">
                            <i class="nav-icon fas fa-users"></i>
                            {{ trans('message.list_user') }}
                        </a>
                    </li class="sidebar-admin">
                    <li class="sidebar-admin">
                        <a href="{{ route('blacklistUser') }}">
                            <i class="fas fa-address-book"></i>
                            {{ trans('message.black_list') }}
                        </a>
                    </li>
                </ul>
            </li>
            @can('admin_check')
                <li class="sidebar-admin">
                    <a>
                        <i class="nav-icon fas fa-layer-group"></i> {{ trans('message.manage_course') }}
                        <span class="fa fa-chevron-down"></span>
                    </a>
                    <ul class="nav child_menu">
                        <li class="sidebar-admin"><a href="{{ route('manageCourse.index') }}">
                            <i class="fas fa-book-open"></i> {{ trans('message.list_course') }}</a>
                        </li>
                    </ul>
                </li>
            @endcan
        </ul>
    </div>
</div>
