@include('admin.layouts.header')
<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
    @include('admin.layouts.sidebar')

    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">
            @include('admin.layouts.toolbar')
            <div id="kt_app_content" class="app-content">
                <div id="kt_app_content_container" class="app-container container-xxl">
                    {{ $slot }}
                </div>
            </div>
        </div>
        @include('admin.layouts.footer')
    </div>
</div>
