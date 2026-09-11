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
                <a href="{{ route('admin.site-settings.index') }}">
                    <i class="fa fa-cog"></i>
                    <span class="menu-title">{{ __('Site Settings') }}</span>
                </a>
            </li>

            <li class="nav-item {{ Request::is('admin/business-settings*') ? 'active' : '' }}">
                <a href="{{ route('admin.home-settings.index') }}">
                    <i class="fa fa-home"></i>
                    <span class="menu-title">{{ __('Home Settings') }}</span>
                </a>
            </li>

            <li class="nav-item {{ Request::is('admin/business-settings*') ? 'active' : '' }}">
                <a href="{{ route('admin.rooms.index') }}">
                    <i class="fa fa-bed"></i>
                    <span class="menu-title">{{ __('Rooms') }}</span>
                </a>
            </li>

            <li class="nav-item {{ Request::is('admin/third-party*') ? 'active' : '' }}">
                <a href="{{ route('admin.gallery.index') }}">
                    <i class="fa fa-image"></i>
                    <span class="menu-title">{{ __('Gallery') }}</span>
                </a>
            </li>

            <li class="nav-item {{ Request::is('admin/third-party*') ? 'active' : '' }}">
                <a href="{{ route('admin.testimonials.index') }}">
                    <i class="fa fa-quote-left"></i>
                    <span class="menu-title">{{ __('Testimonials') }}</span>
                </a>
            </li>

            <li class="nav-item {{ Request::is('admin/third-party*') ? 'active' : '' }}">
                <a href="{{ route('admin.enquiries.index') }}">
                    <i class="fa fa-envelope"></i>
                    <span class="menu-title">{{ __('Enquiries') }}</span>
                </a>
            </li>

        </ul>
    </div>
</div>
