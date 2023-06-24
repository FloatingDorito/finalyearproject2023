<div>
    @section('pageTitle', 'Portfolio')
    <div class="card shadow-sm">
        <div class="card-header">
            <h3 class="card-title">{{ auth()->user()->username }} Portfolio</h3>
            <div class="card-toolbar">
                <a href="{{ route('artist.create.portfolio', ['username' => auth()->user()->username]) }}"
                    class="btn btn-sm fw-bold btn-primary">Add Portfolio</a>
            </div>
        </div>
        <div class="card-body">
            @if ($portfolios)
                <div class="row">
                    @foreach ($portfolios as $portfolio)
                        <div class="col-12 col-md-4 mb-5">
                            <div class="card shadow-sm">
                                <div class="card-header">
                                    <div class="card-toolbar">
                                        <a href="{{ route('artist.edit.portfolio', ['username' => auth()->user()->username, 'portfolio' => $portfolio->id]) }}" class="btn btn-sm btn-light">
                                            Edit
                                        </a>
                                        <button type="button" class="btn btn-sm btn-danger">
                                            Delete
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body d-flex flex-center flex-column py-9 px-6">
                                    <!--begin::Overlay-->
                                    <a class="d-block overlay" data-fslightbox="lightbox-basic"
                                        href="{{ secure_asset('portfolio/' . $portfolio->filelocation) }}">
                                        <!--begin::Image-->
                                        <div class="bgi-no-repeat bgi-position-center bgi-size-cover card-rounded image-160x"
                                            style="background-image:url('{{ secure_asset('portfolio/' . $portfolio->filelocation) }}')">
                                        </div>
                                        <!--end::Image-->
    
                                        <!--begin::Action-->
                                        <div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow">
                                            <i class="bi bi-eye-fill text-white fs-3x"></i>
                                        </div>
                                        <!--end::Action-->
                                    </a>
                                    <!--end::Overlay-->
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
        <div class="card-footer">
            {{ $portfolios->links() }}
        </div>
    </div>
</div>

@push('scripts')
    <script src="{{ secure_asset('/assets/plugins/custom/fslightbox/fslightbox.bundle.js') }}"></script>
@endpush