<ol class="breadcrumb breadcrumb-separatorless text-muted fs-6 fw-semibold">
    <li class="breadcrumb-item">
        <a href="{{ route('artist.home', ['username' => auth()->user()->username]) }}">Artist Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-400 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-muted">@yield('pageTitle')</li>
</ol>