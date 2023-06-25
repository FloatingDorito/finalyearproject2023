<div>
    @section('pageTitle', 'Artist Dashboard')
    <div class="card mb-5 mb-xl-10">
        <div class="card-header">
            <h3 class="card-title">#{{ $order->id }}</h3>
        </div>
        <div class="card-body pt-9 pb-0">
            <div class="row mb-2">
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded image-160x"
                        style="background-image:url('{{ secure_asset('commission/' . $order->commission->coverimage) }}')">
                    </div>
                </div>
                <div class="col-12 col-md-8 col-lg-9">
                    <h2 class="fw-bold mt-3 mt-md-0 mb-3">{{ $order->commission->title }}</h2>
                    @if ($order->status == 'approved')
                        <span class="badge badge-info">Ongoing</span>
                    @elseif ($order->status == 'completed')
                        <span class="badge badge-danger">Completed</span>
                    @endif
                    <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary my-5"
                        target="_blank">
                        <!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/kt-products/docs/metronic/html/releases/2023-06-08-055059/core/html/src/media/icons/duotune/communication/com013.svg-->
                        <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg width="24" height="24"
                                viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M6.28548 15.0861C7.34369 13.1814 9.35142 12 11.5304 12H12.4696C14.6486 12 16.6563 13.1814 17.7145 15.0861L19.3493 18.0287C20.0899 19.3618 19.1259 21 17.601 21H6.39903C4.87406 21 3.91012 19.3618 4.65071 18.0287L6.28548 15.0861Z"
                                    fill="currentColor" />
                                <rect opacity="0.3" x="8" y="3" width="8" height="8"
                                    rx="4" fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                        &nbsp; {{ $order->commission->artist->user->username }}
                    </a>
                    <div class="col-6">
                        <div class="border border-dashed rounded py-3 px-4 mx-2 mb-3">
                            <div class="text-center fs-6 fw-bold text-gray-700">MYR {{ $order->commission->price }}
                            </div>
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
                                {!! nl2br(e($order->commission->expectations)) !!}
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
                                {!! nl2br(e($order->commission->likes)) !!}
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
                                {!! nl2br(e($order->commission->dislikes)) !!}
                            </span>
                            <!--end::Content-->
                        </div>
                    </div>
                </div>
                <div class="col-12 my-2">
                    <h3>Description</h3>
                    <p>{!! nl2br(e($order->commission->description)) !!}</p>
                </div>
            </div>

            <div class="d-flex overflow-auto h-55px">
                <ul
                    class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bolder flex-nowrap">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#commissionTab">Commissions</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="commissionTab" role="tabpanel">
                @if (count($orderImages) > 0)
                    <div class="row">
                        @foreach ($orderImages as $orderImage)
                            <div class="col-md-6 col-xxl-4 mb-3">
                                <!--begin::Card-->
                                <div class="card">
                                    <!--begin::Card body-->
                                    <div class="card-body d-flex flex-center flex-column py-9 px-6">
                                        <!--begin::Overlay-->
                                        <a class="d-block overlay" data-fslightbox="lightbox-basic"
                                            href="{{ secure_asset('orderImage/' . $orderImage->filelocation) }}">
                                            <!--begin::Image-->
                                            <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded image-160x"
                                                style="background-image:url('{{ secure_asset('orderImage/' . $orderImage->filelocation) }}')">
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
                                    <!--begin::Card body-->
                                </div>
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
