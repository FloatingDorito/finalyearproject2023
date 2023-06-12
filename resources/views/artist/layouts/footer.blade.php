<div id="kt_app_footer" class="app-footer">
    <div class="app-container container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3">
        <div class="text-dark order-2 order-md-1">
            <span class="text-muted fw-semibold me-1">{{ now()->year }} &copy;</span>
            <a href="{{ route('artist.home', ['username' => auth()->user()->username]) }}" target="_blank" class="text-gray-800 text-hover-primary">{{ config('app.name') }}</a>
        </div>

        <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
            <li class="menu-item">
                Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
            </li>
        </ul>
    </div>
</div>
