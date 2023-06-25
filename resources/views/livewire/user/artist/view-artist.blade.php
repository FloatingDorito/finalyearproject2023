<div>
    @section('pageTitle', 'View Profile')
    <div class="card mb-5 mb-xl-10">
        <div class="card-body pt-9 pb-0">

            <div class="d-flex flex-wrap flex-sm-nowrap mb-3">
                {{-- Begin::Avatar --}}
                <div class="me-7 mb-4">
                    <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                        <div class="symbol-label fs-3 bg-light-primary text-primary">
                            {{ substr($artist->user->username, 0, 1) }}
                        </div>
                    </div>
                </div>
                {{-- End::Avatar --}}

                {{-- Begin::Artist --}}
                <div class="flex-grow-1">
                    <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                        <div class="d-flex flex-column">

                            <div class="d-flex align-items-center mb-2">
                                <a href="javascript:void(0)"
                                    class="text-gray-800 text-hover-primary fs-2 fw-bolder me-2 text-capitalize">
                                    {{ $artist->user->username }}
                                </a>
                            </div>

                            <div class="d-flex flex-wrap fw-bold fs-6 mb-2">
                                @if ($artist->twitter)
                                    <a href="{{ $artist->twitter }}"
                                        class="d-flex align-items-center text-gray-400 text-hover-primary me-2"
                                        target="_blank">
                                        <i class="fa-brands fa-twitter"></i>
                                        &nbsp; Twitter
                                    </a>
                                @endif
                                @if ($artist->facebook)
                                    <a href="{{ $artist->facebook }}"
                                        class="d-flex align-items-center text-gray-400 text-hover-primary"
                                        target="_blank">
                                        <i class="fa-brands fa-facebook"></i>
                                        &nbsp; Facebook
                                    </a>
                                @endif
                            </div>
                            @if ($artist->description)
                                <div class="d-flex flex-wrap fw-bold fs-6 mb-2 pe-2">
                                    <p class="d-flex align-items-center text-gray-400 mb-2">
                                        {{ $artist->description }}
                                    </p>
                                </div>
                            @endif
                        </div>
                    </div>
                    {{-- End::Artist --}}
                </div>
            </div>

            <div class="d-flex overflow-auto h-55px">
                <ul
                    class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bolder flex-nowrap">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#portfolioTab">Portfolio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#commissionTab">Commission</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="portfolioTab" role="tabpanel">
                @if (count($portfolios) > 0)
                    <div class="card mb-5 mb-xl-10">
                        <div class="card-body">
                            <div class="row">
                                @foreach ($portfolios as $portfolio)
                                    <div class="col-6 col-md-4 mb-5">
                                        <!--begin::Overlay-->
                                        <a class="d-block overlay" data-fslightbox="lightbox-basic"
                                            href="{{ secure_asset('portfolio/' . $portfolio->filelocation) }}">
                                            <!--begin::Image-->
                                            <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-portfolio"
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
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <div class="tab-pane fade" id="commissionTab" role="tabpanel">
                @if (count($commissions) > 0)
                    <div class="row">
                        @foreach ($commissions as $commission)
                            <div class="col-md-6 col-xxl-4">
                                <!--begin::Card-->
                                <div class="card">
                                    <!--begin::Card body-->
                                    <div class="card-body d-flex flex-center flex-column py-9 px-6">
                                        <div class="bgi-no-repeat bgi-position-center bgi-size-cover card-rounded image-160x"
                                            style="background-image:url('{{ secure_asset('commission/' . $commission->coverimage) }}')">
                                        </div>
                                        <a href="{{ route('artist.commission.view', ['username' => auth()->user()->username, 'commission' => $commission->id]) }}"
                                            class="fs-4 text-gray-800 text-hover-primary text-center fw-bold mb-0">{{ $commission->title }}</a>
                                        <!--begin::Price-->
                                        <div class="d-flex flex-center flex-wrap mb-5">
                                            <div class="border border-dashed rounded min-w-90px py-3 px-4 mx-2 mb-3">
                                                <div class="fs-6 fw-bold text-gray-700">MYR {{ $commission->price }}
                                                </div>
                                                <div class="fw-semibold text-center text-gray-400">{{ __('Price') }}
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Price-->
                                        <!--begin::View Details-->
                                        <a href="{{ route('user.commissions.view', ['username' => auth()->user()->username, 'commission' => $commission->id]) }}"
                                            class="btn btn-sm btn-light-primary">
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr012.svg-->
                                            <span class="svg-icon svg-icon-3">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path opacity="0.3"
                                                        d="M10 18C9.7 18 9.5 17.9 9.3 17.7L2.3 10.7C1.9 10.3 1.9 9.7 2.3 9.3C2.7 8.9 3.29999 8.9 3.69999 9.3L10.7 16.3C11.1 16.7 11.1 17.3 10.7 17.7C10.5 17.9 10.3 18 10 18Z"
                                                        fill="currentColor"></path>
                                                    <path
                                                        d="M10 18C9.7 18 9.5 17.9 9.3 17.7C8.9 17.3 8.9 16.7 9.3 16.3L20.3 5.3C20.7 4.9 21.3 4.9 21.7 5.3C22.1 5.7 22.1 6.30002 21.7 6.70002L10.7 17.7C10.5 17.9 10.3 18 10 18Z"
                                                        fill="currentColor"></path>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->View Details
                                        </a>
                                        <!--end::View Details-->
                                    </div>
                                    <!--begin::Card body-->
                                </div>
                                <!--begin::Card-->
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script src="{{ secure_asset('/assets/plugins/custom/fslightbox/fslightbox.bundle.js') }}"></script>
@endpush
