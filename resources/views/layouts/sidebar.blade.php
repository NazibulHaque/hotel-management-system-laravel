<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">


    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class="nav-item {{ Request::is('admin') ? 'active' : '' }}">
                <a href="{{ route('admin.dashboard') }}">
                    <i class="feather icon-home"></i>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>

            <li class="nav-item {{ Request::is('admin/business-settings*') ? 'active' : '' }}">
                <a href="{{ route('admin.rooms.index') }}">
                    <i class="fa fa-cog"></i>
                    <span class="menu-title">{{ __('Rooms') }}</span>
                </a>
            </li>

            <li class="nav-item {{ Request::is('admin/third-party*') ? 'active' : '' }}">
                <a href="{{ route('admin.gallery.index') }}">
                    <i class="fa fa-key"></i>
                    <span class="menu-title">{{ __('Gallery') }}</span>
                </a>
            </li>

        </ul>
    </div>
</div>
