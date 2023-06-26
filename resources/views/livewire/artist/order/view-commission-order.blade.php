<div>
    @section('pageTitle', 'Artist Dashboard')
    <div class="card mb-5 mb-xl-10">
        <div class="card-header">
            <h3 class="card-title">#{{ $order->id }}</h3>
            @if ($order->status == 'approved')
                <div class="card-toolbar">
                    <a href="{{ route('artist.order.upload', ['username' => auth()->user()->username, 'order' => $order->id]) }}"
                        class="btn btn-sm fw-bold btn-primary mb-3 mb-sm-0 me-3">Upload Images</a>
                    <button class="btn btn-sm fw-bold btn-info mb-3 mb-sm-0" data-bs-toggle="modal"
                        data-bs-target="#completeModal" data-toggle="modal" data-target="#completeModal">
                        Complete Order
                    </button>
                </div>
            @endif
        </div>
        <div class="card-body pt-9 pb-0">
            <div class="row mb-2">
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded image-160x"
                        style="background-image:url('{{ secure_asset('commission/' . $order->commission->coverimage) }}')">
                    </div>
                </div>
                <div class="col-12 col-md-8 col-lg-9">
                    <h2 class="fw-bold mt-3 mt-md-0 mb-3">Buyer: {{ $order->user->username }}</h2>
                    <h2 class="fw-bold mt-3 mt-md-0 mb-3">{{ $order->commission->title }}</h2>
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
                                        @if ($orderImage->order->status == 'approved')
                                            <button class="btn btn-sm btn-danger mt-3" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal" data-toggle="modal"
                                                data-target="#deleteModal">
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr012.svg-->
                                                <span class="svg-icon svg-icon-3">
                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path opacity="0.3"
                                                            d="M10 18C9.7 18 9.5 17.9 9.3 17.7L2.3 10.7C1.9 10.3 1.9 9.7 2.3 9.3C2.7 8.9 3.29999 8.9 3.69999 9.3L10.7 16.3C11.1 16.7 11.1 17.3 10.7 17.7C10.5 17.9 10.3 18 10 18Z"
                                                            fill="currentColor"></path>
                                                        <path
                                                            d="M10 18C9.7 18 9.5 17.9 9.3 17.7C8.9 17.3 8.9 16.7 9.3 16.3L20.3 5.3C20.7 4.9 21.3 4.9 21.7 5.3C22.1 5.7 22.1 6.30002 21.7 6.70002L10.7 17.7C10.5 17.9 10.3 18 10 18Z"
                                                            fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                                Delete Image
                                            </button>
                                        @endif
                                    </div>
                                    <!--begin::Card body-->
                                </div>
                                <!--begin::Card-->
                                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
                                    aria-labelledby="deleteModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel">
                                                    Delete Commission Order Image
                                                </h5>
                                                <!--begin::Close-->
                                                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2"
                                                    data-bs-dismiss="modal" aria-label="Close">
                                                    <!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/kt-products/docs/metronic/html/releases/2023-06-08-055059/core/html/src/media/icons/duotune/arrows/arr097.svg-->
                                                    <span class="svg-icon svg-icon-5 m-0"><svg width="32"
                                                            height="32" viewBox="0 0 32 32" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <rect x="9.39844" y="20.7144" width="16"
                                                                height="2.66667" rx="1.33333"
                                                                transform="rotate(-45 9.39844 20.7144)"
                                                                fill="currentColor" />
                                                            <rect x="11.2852" y="9.40039" width="16"
                                                                height="2.66667" rx="1.33333"
                                                                transform="rotate(45 11.2852 9.40039)"
                                                                fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                </div>
                                                <!--end::Close-->
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure want to delete this image?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button"
                                                    wire:click.prevent="delete('{{ $orderImage->id }}')"
                                                    class="btn btn-danger close-modal" data-dismiss="modal">Yes,
                                                    Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="modal fade" id="completeModal" tabindex="-1" role="dialog" aria-labelledby="completeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="completeModalLabel">Complete Commission Order
                    </h5>
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/kt-products/docs/metronic/html/releases/2023-06-08-055059/core/html/src/media/icons/duotune/arrows/arr097.svg-->
                        <span class="svg-icon svg-icon-5 m-0"><svg width="32" height="32" viewBox="0 0 32 32"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="9.39844" y="20.7144" width="16" height="2.66667" rx="1.33333"
                                    transform="rotate(-45 9.39844 20.7144)" fill="currentColor" />
                                <rect x="11.2852" y="9.40039" width="16" height="2.66667" rx="1.33333"
                                    transform="rotate(45 11.2852 9.40039)" fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
                <div class="modal-body">
                    <p>Are you sure want to complete this order?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="button" wire:click.prevent="complete('{{ $order->id }}')"
                        class="btn btn-danger close-modal" data-dismiss="modal">Yes,
                        Complete</button>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script src="{{ secure_asset('/assets/plugins/custom/fslightbox/fslightbox.bundle.js') }}"></script>
    <script>
        window.addEventListener('orderUpdated', () => {
            $('#completeModalLabel').modal('hide');
            location.reload();
        });
        window.addEventListener('imageDelete', () => {
            $('#deleteModal').modal('hide');
            location.reload();
        });
    </script>
@endpush
