<div class="app-sidebar-menu overflow-hidden flex-column-fluid">
    <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5" data-kt-scroll="true"
        data-kt-scroll-activate="true" data-kt-scroll-height="auto"
        data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
        data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">

        <div class="menu menu-column menu-rounded menu-sub-indention px-3" id="#kt_app_sidebar_menu" data-kt-menu="true"
            data-kt-menu-expand="false">

            {{-- begin::Dashboard --}}
            <div class="menu-item">
                <a class="menu-link {{ Route::is('user.home') ? 'active' : null }}"
                    href="{{ route('user.home', ['username' => auth()->user()->username]) }}">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/kt-products/docs/metronic/html/releases/2023-06-08-055059/core/html/src/media/icons/duotune/general/gen001.svg-->
                        <span class="svg-icon svg-icon svg-icon-2"><svg width="24" height="24"
                            viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M11 2.375L2 9.575V20.575C2 21.175 2.4 21.575 3 21.575H9C9.6 21.575 10 21.175 10 20.575V14.575C10 13.975 10.4 13.575 11 13.575H13C13.6 13.575 14 13.975 14 14.575V20.575C14 21.175 14.4 21.575 15 21.575H21C21.6 21.575 22 21.175 22 20.575V9.575L13 2.375C12.4 1.875 11.6 1.875 11 2.375Z"
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
                    <span class="menu-section text-muted text-uppercase fs-8 ls-1">Artists & Commissions</span>
                </div>
            </div>

            <div class="menu-item">
                <a class="menu-link @if (Route::is('user.artists')) active @endif" href="{{route('user.artists', ['username' => auth()->user()->username])}}">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/kt-products/docs/metronic/html/releases/2023-06-08-055059/core/html/src/media/icons/duotune/art/art003.svg-->
                        <span class="svg-icon svg-icon-2"><svg width="24" height="24" viewBox="0 0 24 24"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.3"
                                    d="M6.45801 14.775L9.22501 17.542C11.1559 16.3304 12.9585 14.9255 14.605 13.349L10.651 9.39502C9.07452 11.0415 7.66962 12.8441 6.45801 14.775Z"
                                    fill="currentColor" />
                                <path
                                    d="M9.19301 17.51C9.03401 19.936 6.76701 21.196 3.55701 21.935C3.34699 21.9838 3.12802 21.9782 2.92074 21.9189C2.71346 21.8596 2.52471 21.7484 2.37231 21.5959C2.2199 21.4434 2.10886 21.2545 2.04967 21.0472C1.99048 20.8399 1.98509 20.6209 2.034 20.411C2.772 17.201 4.03401 14.934 6.45801 14.775L9.19301 17.51ZM21.768 4.43697C21.9476 4.13006 22.0204 3.77232 21.9751 3.41963C21.9297 3.06694 21.7687 2.73919 21.5172 2.48775C21.2658 2.2363 20.9381 2.07524 20.5854 2.02986C20.2327 1.98449 19.8749 2.0574 19.568 2.23701C16.2817 4.20292 13.2827 6.61333 10.656 9.39998L14.61 13.354C17.395 10.7252 19.8037 7.72455 21.768 4.43697Z"
                                    fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title">Artist</span>
                </a>
            </div>

            <div class="menu-item">
                <a class="menu-link @if (Route::is('user.commissions')) active @endif" href="{{ route('user.commissions', ['username' => auth()->user()->username]) }}">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/kt-products/docs/metronic/html/releases/2023-06-08-055059/core/html/src/media/icons/duotune/general/gen006.svg-->
                        <span class="svg-icon svg-icon-2"><svg width="24" height="24" viewBox="0 0 24 24"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.3"
                                    d="M22 5V19C22 19.6 21.6 20 21 20H19.5L11.9 12.4C11.5 12 10.9 12 10.5 12.4L3 20C2.5 20 2 19.5 2 19V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5ZM7.5 7C6.7 7 6 7.7 6 8.5C6 9.3 6.7 10 7.5 10C8.3 10 9 9.3 9 8.5C9 7.7 8.3 7 7.5 7Z"
                                    fill="currentColor" />
                                <path
                                    d="M19.1 10C18.7 9.60001 18.1 9.60001 17.7 10L10.7 17H2V19C2 19.6 2.4 20 3 20H21C21.6 20 22 19.6 22 19V12.9L19.1 10Z"
                                    fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title">Commisions</span>
                </a>
            </div>
            {{-- begin::Commissions --}}
            <div data-kt-menu-trigger="click" class="menu-item menu-accordion mb-1 here show">
                <span class="menu-link">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/kt-products/docs/metronic/html/releases/2023-06-08-055059/core/html/src/media/icons/duotune/ecommerce/ecm008.svg-->
                        <span class="svg-icon svg-icon svg-icon-2"><svg width="24" height="24"
                                viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.3"
                                    d="M18 21.6C16.3 21.6 15 20.3 15 18.6V2.50001C15 2.20001 14.6 1.99996 14.3 2.19996L13 3.59999L11.7 2.3C11.3 1.9 10.7 1.9 10.3 2.3L9 3.59999L7.70001 2.3C7.30001 1.9 6.69999 1.9 6.29999 2.3L5 3.59999L3.70001 2.3C3.50001 2.1 3 2.20001 3 3.50001V18.6C3 20.3 4.3 21.6 6 21.6H18Z"
                                    fill="currentColor" />
                                <path
                                    d="M12 12.6H11C10.4 12.6 10 12.2 10 11.6C10 11 10.4 10.6 11 10.6H12C12.6 10.6 13 11 13 11.6C13 12.2 12.6 12.6 12 12.6ZM9 11.6C9 11 8.6 10.6 8 10.6H6C5.4 10.6 5 11 5 11.6C5 12.2 5.4 12.6 6 12.6H8C8.6 12.6 9 12.2 9 11.6ZM9 7.59998C9 6.99998 8.6 6.59998 8 6.59998H6C5.4 6.59998 5 6.99998 5 7.59998C5 8.19998 5.4 8.59998 6 8.59998H8C8.6 8.59998 9 8.19998 9 7.59998ZM13 7.59998C13 6.99998 12.6 6.59998 12 6.59998H11C10.4 6.59998 10 6.99998 10 7.59998C10 8.19998 10.4 8.59998 11 8.59998H12C12.6 8.59998 13 8.19998 13 7.59998ZM13 15.6C13 15 12.6 14.6 12 14.6H10C9.4 14.6 9 15 9 15.6C9 16.2 9.4 16.6 10 16.6H12C12.6 16.6 13 16.2 13 15.6Z"
                                    fill="currentColor" />
                                <path
                                    d="M15 18.6C15 20.3 16.3 21.6 18 21.6C19.7 21.6 21 20.3 21 18.6V12.5C21 12.2 20.6 12 20.3 12.2L19 13.6L17.7 12.3C17.3 11.9 16.7 11.9 16.3 12.3L15 13.6V18.6Z"
                                    fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title">Purchased Commissions</span>
                    <span class="menu-arrow"></span>
                </span>
                {{-- Unsuccess Payment --}}
                <div class="menu-sub menu-sub-accordion">
                    <div class="menu-item">
                        <a class="menu-link" href="#">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Unsuccessful Commission Payment</span>
                        </a>
                    </div>
                </div>
                {{-- Waiting for Artist Approval --}}
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
                {{-- Ongoing Commission --}}
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
                {{-- Completed Commission --}}
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
