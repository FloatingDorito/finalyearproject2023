<div class="app-header-menu app-header-mobile-drawer align-items-stretch" data-kt-drawer="true"
    data-kt-drawer-name="app-header-menu" data-kt-drawer-activate="{default: true, lg: false}"
    data-kt-drawer-overlay="true" data-kt-drawer-width="225px" data-kt-drawer-direction="end"
    data-kt-drawer-toggle="#kt_app_header_menu_toggle" data-kt-swapper="true"
    data-kt-swapper-mode="{default: 'append', lg: 'prepend'}"
    data-kt-swapper-parent="{default: '#kt_app_body', lg: '#kt_app_header_wrapper'}">

    <div class="menu menu-rounded menu-column menu-lg-row my-5 my-lg-0 align-items-stretch fw-semibold px-2 px-lg-0"
        id="kt_app_header_menu" data-kt-menu="true">
        <div class="menu-item me-lg-1">
            <a class="menu-link py-3 @if (Route::is('user.home')) active @endif"
                href="{{ route('user.home', ['username' => auth()->user()->username]) }}">
                <span class="menu-title">Dashboard</span>
            </a>
        </div>
        <div class="menu-item me-lg-1">
            <a class="menu-link py-3 @if (Route::is('user.artists')) active @endif" href="{{ route('user.artists', ['username' => auth()->user()->username]) }}">
                <span class="menu-title">Artist</span>
            </a>
        </div>
        <div class="menu-item me-lg-1">
            <a class="menu-link py-3 @if (Route::is('user.commissions')) active @endif" href="{{ route('user.commissions', ['username' => auth()->user()->username]) }}">
                <span class="menu-title">Commission</span>
            </a>
        </div>
    </div>

</div>
