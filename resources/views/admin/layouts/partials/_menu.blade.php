<div class="app-sidebar-menu overflow-hidden flex-column-fluid">
    <div id="kt_app_sidebar_menu_wrapper"
         class="app-sidebar-wrapper hover-scroll-overlay-y my-5"
         data-kt-scroll="true"
         data-kt-scroll-activate="true"
         data-kt-scroll-height="auto"
         data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
         data-kt-scroll-wrappers="#kt_app_sidebar_menu"
         data-kt-scroll-offset="5px"
         data-kt-scroll-save-state="true">

        <div class="menu menu-column menu-rounded menu-sub-indention px-3" id="#kt_app_sidebar_menu" data-kt-menu="true"
             data-kt-menu-expand="false">

            {{--begin::Dashboard--}}
            <div class="menu-item">
                <a class="menu-link {{ Route::is('admin.home') ? 'active' : null }}" href="{{ route('admin.home') }}">
                <span class="menu-icon">
                    {{-- {!! getSvgIcon("icons/duotune/art/art002.svg", "svg-icon svg-icon-2") !!} --}}
                </span>
                    <span class="menu-title">{{ __('Dashboard') }}</span>
                </a>
            </div>
            {{--end::Dashboard--}}

            <div class="menu-item">
                <div class="menu-content pt-8 pb-2">
                    <span class="menu-section text-muted text-uppercase fs-8 ls-1">Admin Panell</span>
                </div>
            </div>

            {{--begin::Order Management--}}
            <div data-kt-menu-trigger="click"
                 class="menu-item menu-accordion mb-1 here show">
                <span class="menu-link">
                    {{-- <span class="menu-icon">
                        {!! getSvgIcon("icons/duotune/ecommerce/ecm002.svg", "svg-icon svg-icon-2") !!}
                    </span> --}}
                    <span class="menu-title">Approvals</span>
                    <span class="menu-arrow"></span>
                </span>

                {{-- Orders --}}
                {{-- <div class="menu-sub menu-sub-accordion">
                    <div class="menu-item">
                        <a class="menu-link @if(Route::is('order.index') || Route::is('order.show')) active @endif"
                           href="{{ route('order.index') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Orders</span>
                        </a>
                    </div>
                </div> --}}
            </div>

        </div>
    </div>
</div>
