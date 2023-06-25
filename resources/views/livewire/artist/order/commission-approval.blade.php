<div>
    @section('pageTitle', 'Commission Approval')
    <div class="card shadow-sm">
        <div class="card-header">
            <h3 class="card-title">{{ auth()->user()->username }}'s Commissions Order to Approve</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table gs-7 gy-7 gx-7 table-hover table-rounded table-striped">
                    <thead>
                        <tr class="fw-bold fs-6 text-gray-800 text-center border-bottom border-gray-200">
                            <th>Order ID</th>
                            <th>User</th>
                            <th>Title</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($orders) <= 0)
                            <tr>
                                <td class="fw-bold fs-6 text-center" colspan="6">
                                    No Commissions Display
                                </td>
                            </tr>
                        @else
                            @foreach ($orders as $order)
                                <tr>
                                    <td>
                                        <p class="text-center">
                                            {{ $order->id }}
                                        </p>
                                    </td>
                                    <td>
                                        <p class="text-center">
                                            {{ $order->user->username }}
                                        </p>
                                    </td>
                                    <td>
                                        <p class="text-center">
                                            {{ $order->commission->title }}
                                        </p>
                                    </td>
                                    <td>
                                        <p class="text-center">
                                            RM {{ $order->commission->price }}
                                        </p>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <span class="badge badge-success">Paid</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <button data-bs-toggle="modal" data-bs-target="#approveModal"
                                                data-toggle="modal" data-target="#approveModal"
                                                class="btn btn-sm btn-icon btn-secondary me-3">
                                                <!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/kt-products/docs/metronic/html/releases/2023-06-08-055059/core/html/src/media/icons/duotune/arrows/arr085.svg-->
                                                <span class="svg-icon svg-icon-5 m-0"><svg width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M9.89557 13.4982L7.79487 11.2651C7.26967 10.7068 6.38251 10.7068 5.85731 11.2651C5.37559 11.7772 5.37559 12.5757 5.85731 13.0878L9.74989 17.2257C10.1448 17.6455 10.8118 17.6455 11.2066 17.2257L18.1427 9.85252C18.6244 9.34044 18.6244 8.54191 18.1427 8.02984C17.6175 7.47154 16.7303 7.47154 16.2051 8.02984L11.061 13.4982C10.7451 13.834 10.2115 13.834 9.89557 13.4982Z"
                                                            fill="currentColor" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </button>
                                            <button class="btn btn-sm btn-icon btn-secondary me-3">
                                                <!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/kt-products/docs/metronic/html/releases/2023-06-08-055059/core/html/src/media/icons/duotune/arrows/arr097.svg-->
                                                <span class="svg-icon svg-icon-5 m-0"><svg width="32" height="32"
                                                        viewBox="0 0 32 32" fill="none"
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
                                            </button>
                                            <button class="btn btn-sm btn-icon btn-secondary me-3">
                                                <!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/kt-products/docs/metronic/html/releases/2023-06-08-055059/core/html/src/media/icons/duotune/communication/com007.svg-->
                                                <span class="svg-icon svg-icon-5 m-0"><svg width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path opacity="0.3"
                                                            d="M8 8C8 7.4 8.4 7 9 7H16V3C16 2.4 15.6 2 15 2H3C2.4 2 2 2.4 2 3V13C2 13.6 2.4 14 3 14H5V16.1C5 16.8 5.79999 17.1 6.29999 16.6L8 14.9V8Z"
                                                            fill="currentColor" />
                                                        <path
                                                            d="M22 8V18C22 18.6 21.6 19 21 19H19V21.1C19 21.8 18.2 22.1 17.7 21.6L15 18.9H9C8.4 18.9 8 18.5 8 17.9V7.90002C8 7.30002 8.4 6.90002 9 6.90002H21C21.6 7.00002 22 7.4 22 8ZM19 11C19 10.4 18.6 10 18 10H12C11.4 10 11 10.4 11 11C11 11.6 11.4 12 12 12H18C18.6 12 19 11.6 19 11ZM17 15C17 14.4 16.6 14 16 14H12C11.4 14 11 14.4 11 15C11 15.6 11.4 16 12 16H16C16.6 16 17 15.6 17 15Z"
                                                            fill="currentColor" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <div class="modal fade" id="approveModal" tabindex="-1" role="dialog"
                                    aria-labelledby="approveModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="approveModalLabel">Approve Commission Order
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
                                                <p>Are you sure want to approve this order?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button"
                                                    wire:click.prevent="approve('{{ $order->id }}')"
                                                    class="btn btn-danger close-modal" data-dismiss="modal">Yes,
                                                    Approve</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            {{ $orders->links() }}
        </div>
    </div>
</div>
