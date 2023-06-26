<div>
    @section('pageTitle', 'View Commission')
    <div class="card shadow-sm">
        <div class="card-header">
            <h3 class="card-title">{{ $commission->title }}</h3>
            <div class="card-toolbar">
                <a href="{{ route('artist.edit.commission', ['username' => auth()->user()->username, 'commission' => $commission->id]) }}"
                    class="btn btn-sm fw-bold btn-primary">Edit Commission</a>
            </div>
        </div>
        <div class="card-body">
            <div class="row mb-2">
                <div class="col-12 col-md-4 col-lg-3">
                    <!--begin::Overlay-->
                    <a class="d-block overlay image-160x" data-fslightbox="lightbox-basic"
                        href="{{ secure_asset('commission/' . $commission->coverimage) }}">
                        <!--begin::Image-->
                        <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded image-160x"
                            style="background-image:url('{{ secure_asset('commission/' . $commission->coverimage) }}')">
                        </div>
                        <!--end::Image-->
                        <div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow image-160x">
                            <i class="bi bi-eye-fill text-white fs-3x"></i>
                        </div>
                    </a>
                    <!--end::Overlay-->
                </div>
                <div class="col-12 col-md-8 col-lg-9">
                    <h2 class="fw-bold mt-3 mt-md-0 mb-3">{{ $commission->title }}</h2>
                    <div class="col-6">
                        <div class="border border-dashed rounded py-3 px-4 mx-2 mb-3">
                            <div class="text-center fs-6 fw-bold text-gray-700">MYR {{ $commission->price }}</div>
                            <div class="fw-semibold text-center text-gray-400">{{ __('Price') }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 my-2">
                    <div class="alert alert-primary mb-3" role="alert">
                        <div class="d-flex flex-column pe-0 pe-sm-10">
                            <!--begin::Title-->
                            <h5 class="mb-1 text-primary">Expectations</h5>
                            <!--end::Title-->

                            <!--begin::Content-->
                            <span>
                                {!! nl2br(e($commission->expectations)) !!}
                            </span>
                            <!--end::Content-->
                        </div>
                    </div>
                    <div class="alert alert-success mb-3" role="alert">
                        <div class="d-flex flex-column pe-0 pe-sm-10">
                            <!--begin::Title-->
                            <h5 class="mb-1 text-success">Likes</h5>
                            <!--end::Title-->

                            <!--begin::Content-->
                            <span>
                                {!! nl2br(e($commission->likes)) !!}
                            </span>
                            <!--end::Content-->
                        </div>
                    </div>
                    <div class="alert alert-danger mb-3" role="alert">
                        <div class="d-flex flex-column pe-0 pe-sm-10">
                            <!--begin::Title-->
                            <h5 class="mb-1 text-danger">Dislikes</h5>
                            <!--end::Title-->

                            <!--begin::Content-->
                            <span>
                                {!! nl2br(e($commission->dislikes)) !!}
                            </span>
                            <!--end::Content-->
                        </div>
                    </div>
                </div>
                <div class="col-12 my-2">
                    <h3>Description</h3>
                    <p>{!! nl2br(e($commission->description)) !!}</p>
                </div>
                @if ($commission->exampleimageone)
                    <div class="col-12 col-md-4 col-lg-3 mb-3">
                        <!--begin::Overlay-->
                        <a class="d-block overlay image-160x" data-fslightbox="lightbox-basic"
                            href="{{ secure_asset('commission/' . $commission->exampleimageone) }}">
                            <!--begin::Image-->
                            <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded image-160x"
                                style="background-image:url('{{ secure_asset('commission/' . $commission->exampleimageone) }}')">
                            </div>
                            <!--end::Image-->
                            <div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow image-160x">
                                <i class="bi bi-eye-fill text-white fs-3x"></i>
                            </div>
                        </a>
                        <!--end::Overlay-->
                    </div>
                @endif
                @if ($commission->exampleimagetwo)
                    <div class="col-12 col-md-4 col-lg-3 mb-3">
                        <!--begin::Overlay-->
                        <a class="d-block overlay image-160x" data-fslightbox="lightbox-basic"
                            href="{{ secure_asset('commission/' . $commission->exampleimagetwo) }}">
                            <!--begin::Image-->
                            <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded image-160x"
                                style="background-image:url('{{ secure_asset('commission/' . $commission->exampleimagetwo) }}')">
                            </div>
                            <!--end::Image-->

                            <!--begin::Action-->
                            <div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow image-160x">
                                <i class="bi bi-eye-fill text-white fs-3x"></i>
                            </div>
                            <!--end::Action-->
                        </a>
                        <!--end::Overlay-->
                    </div>
                @endif
                @if ($commission->exampleimagethree)
                    <div class="col-12 col-md-4 col-lg-3 mb-3">
                        <!--begin::Overlay-->
                        <a class="d-block overlay image-160x" data-fslightbox="lightbox-basic"
                            href="{{ secure_asset('commission/' . $commission->exampleimagethree) }}">
                            <!--begin::Image-->
                            <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded image-160x"
                                style="background-image:url('{{ secure_asset('commission/' . $commission->exampleimagthree) }}')">
                            </div>
                            <!--end::Image-->

                            <!--begin::Action-->
                            <div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow image-160x">
                                <i class="bi bi-eye-fill text-white fs-3x"></i>
                            </div>
                            <!--end::Action-->
                        </a>
                        <!--end::Overlay-->
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script src="{{ secure_asset('/assets/plugins/custom/fslightbox/fslightbox.bundle.js') }}"></script>
@endpush
