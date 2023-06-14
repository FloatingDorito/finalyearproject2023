<div class="app-sidebar-menu overflow-hidden flex-column-fluid">
    <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5" data-kt-scroll="true"
        data-kt-scroll-activate="true" data-kt-scroll-height="auto"
        data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
        data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">

        <div class="menu menu-column menu-rounded menu-sub-indention px-3" id="#kt_app_sidebar_menu" data-kt-menu="true"
            data-kt-menu-expand="false">

            {{-- begin::Dashboard --}}
            <div class="menu-item">
                <a class="menu-link {{ Route::is('artist.home') ? 'active' : null }}" href="{{ route('artist.home', ['username' => auth()->user()->username]) }}">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/kt-products/docs/metronic/html/releases/2023-06-08-055059/core/html/src/media/icons/duotune/general/gen008.svg-->
                        <span class="svg-icon svg-icon svg-icon-2"><svg width="24" height="24"
                                viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M3 2H10C10.6 2 11 2.4 11 3V10C11 10.6 10.6 11 10 11H3C2.4 11 2 10.6 2 10V3C2 2.4 2.4 2 3 2Z"
                                    fill="currentColor" />
                                <path opacity="0.3"
                                    d="M14 2H21C21.6 2 22 2.4 22 3V10C22 10.6 21.6 11 21 11H14C13.4 11 13 10.6 13 10V3C13 2.4 13.4 2 14 2Z"
                                    fill="currentColor" />
                                <path opacity="0.3"
                                    d="M3 13H10C10.6 13 11 13.4 11 14V21C11 21.6 10.6 22 10 22H3C2.4 22 2 21.6 2 21V14C2 13.4 2.4 13 3 13Z"
                                    fill="currentColor" />
                                <path opacity="0.3"
                                    d="M14 13H21C21.6 13 22 13.4 22 14V21C22 21.6 21.6 22 21 22H14C13.4 22 13 21.6 13 21V14C13 13.4 13.4 13 14 13Z"
                                    fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title">{{ __('Dashboard') }}</span>
                </a>
            </div>
            {{-- end::Dashboard --}}

            <div class="menu-item">
                <div class="menu-content pt-8 pb-2">
                    <span class="menu-section text-muted text-uppercase fs-8 ls-1">Artist Panel</span>
                </div>
            </div>

            {{-- begin::Artist Details --}}
            <div data-kt-menu-trigger="click" class="menu-item menu-accordion mb-1 here show">
                <span class="menu-link">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/kt-products/docs/metronic/html/releases/2023-06-08-055059/core/html/src/media/icons/duotune/communication/com014.svg-->
                        <span class="svg-icon svg-icon svg-icon-2"><svg width="24" height="24"
                                viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M16.0173 9H15.3945C14.2833 9 13.263 9.61425 12.7431 10.5963L12.154 11.7091C12.0645 11.8781 12.1072 12.0868 12.2559 12.2071L12.6402 12.5183C13.2631 13.0225 13.7556 13.6691 14.0764 14.4035L14.2321 14.7601C14.2957 14.9058 14.4396 15 14.5987 15H18.6747C19.7297 15 20.4057 13.8774 19.912 12.945L18.6686 10.5963C18.1487 9.61425 17.1285 9 16.0173 9Z"
                                    fill="currentColor" />
                                <rect opacity="0.3" x="14" y="4" width="4" height="4"
                                    rx="2" fill="currentColor" />
                                <path
                                    d="M4.65486 14.8559C5.40389 13.1224 7.11161 12 9 12C10.8884 12 12.5961 13.1224 13.3451 14.8559L14.793 18.2067C15.3636 19.5271 14.3955 21 12.9571 21H5.04292C3.60453 21 2.63644 19.5271 3.20698 18.2067L4.65486 14.8559Z"
                                    fill="currentColor" />
                                <rect opacity="0.3" x="6" y="5" width="6" height="6"
                                    rx="3" fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title">Artist Details</span>
                    <span class="menu-arrow"></span>
                </span>
                {{-- Account Settings --}}
                <div class="menu-sub menu-sub-accordion">
                    <div class="menu-item">
                        <a class="menu-link" href="#">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Account Settings</span>
                        </a>
                    </div>
                </div>
                {{-- Portfolio --}}
                <div class="menu-sub menu-sub-accordion">
                    <div class="menu-item">
                        <a class="menu-link @if (Route::is('artist.portfolio')) active @endif" href="{{route('artist.portfolio',['username' => auth()->user()->username])}}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Portfolio</span>
                        </a>
                    </div>
                </div>
                {{-- Commissions --}}
                <div class="menu-sub menu-sub-accordion">
                    <div class="menu-item">
                        <a class="menu-link" href="#">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Commissions</span>
                        </a>
                    </div>
                </div>
            </div>

            {{-- begin::Commissions --}}
            <div data-kt-menu-trigger="click" class="menu-item menu-accordion mb-1 here show">
                <span class="menu-link">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/kt-products/docs/metronic/html/releases/2023-06-08-055059/core/html/src/media/icons/duotune/communication/com014.svg-->
                        <span class="svg-icon svg-icon svg-icon-2"><svg width="24" height="24"
                                viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M16.0173 9H15.3945C14.2833 9 13.263 9.61425 12.7431 10.5963L12.154 11.7091C12.0645 11.8781 12.1072 12.0868 12.2559 12.2071L12.6402 12.5183C13.2631 13.0225 13.7556 13.6691 14.0764 14.4035L14.2321 14.7601C14.2957 14.9058 14.4396 15 14.5987 15H18.6747C19.7297 15 20.4057 13.8774 19.912 12.945L18.6686 10.5963C18.1487 9.61425 17.1285 9 16.0173 9Z"
                                    fill="currentColor" />
                                <rect opacity="0.3" x="14" y="4" width="4" height="4"
                                    rx="2" fill="currentColor" />
                                <path
                                    d="M4.65486 14.8559C5.40389 13.1224 7.11161 12 9 12C10.8884 12 12.5961 13.1224 13.3451 14.8559L14.793 18.2067C15.3636 19.5271 14.3955 21 12.9571 21H5.04292C3.60453 21 2.63644 19.5271 3.20698 18.2067L4.65486 14.8559Z"
                                    fill="currentColor" />
                                <rect opacity="0.3" x="6" y="5" width="6" height="6"
                                    rx="3" fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title">Commissions</span>
                    <span class="menu-arrow"></span>
                </span>
                {{-- Ongoing Orders --}}
                <div class="menu-sub menu-sub-accordion">
                    <div class="menu-item">
                        <a class="menu-link" href="#">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Commission Approval</span>
                        </a>
                    </div>
                </div>
                {{-- Ongoing Commission--}}
                <div class="menu-sub menu-sub-accordion">
                    <div class="menu-item">
                        <a class="menu-link" href="#">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Ongoing Commission</span>
                        </a>
                    </div>
                </div>
                {{-- Completed Commission--}}
                <div class="menu-sub menu-sub-accordion">
                    <div class="menu-item">
                        <a class="menu-link" href="#">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Completed Commission</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
