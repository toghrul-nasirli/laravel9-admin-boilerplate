<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header position-relative">
            <div class="d-flex justify-content-between align-items-center">
                <div class="logo">
                    <a href="{{ route('users.index') }}">
                        <img src="{{ _asset('mazer/img/logo/logo.svg') }}" alt="logo">
                    </a>
                </div>
                <div class="theme-toggle d-flex gap-2 align-items-center mt-2">
                    <a href="{{ route('settings.change-theme') }}">
                        <i class="fa-regular fa-{{ $darkmode ? 'moon' : 'sun' }} fa-2xs"></i>
                    </a>
                </div>
                <div class="sidebar-toggler">
                    <a href="javascript:void(0)" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">@lang('admin.control') @lang('admin.panel')</li>
                <li class="sidebar-item has-sub {{ _isRequest('users*') ? 'active' : '' }}">
                    <a href="javascript:void(0)" class="sidebar-link">
                        <i class="bi bi-people-fill"></i>
                        <span>@lang('admin.users')</span>
                    </a>
                    <ul class="submenu {{ _isRequest('users*') ? 'active' : '' }}">
                        <li class=" submenu-item">
                            <a href="{{ route('users.index') }}">@lang('admin.all-users')</a>
                        </li>
                        <li class="submenu-item">
                            <a href="{{ route('users.create') }}">@lang('admin.add')</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-title">@lang('admin.settings')</li>
                <li class="sidebar-item {{ _isRequest('settings*') ? 'active' : '' }}">
                    <a href="{{ route('settings') }}" class="sidebar-link">
                        <i class="bi bi-gear-fill"></i>
                        <span>@lang('admin.settings')</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
