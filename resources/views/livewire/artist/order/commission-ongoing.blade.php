<div>
    @section('pageTitle', 'Ongoing Commissions')
    <div class="card shadow-sm">
        <div class="card-header">
            <h3 class="card-title">{{ auth()->user()->username }}'s Ongoing Commissions</h3>
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
                                            @if ($order->status == 'approved')
                                                <span class="badge badge-info">Ongoing</span>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <a href="{{route('artist.order.view', ['username' => auth()->user()->username, 'order' => $order->id])}}" class="btn btn-sm btn-icon btn-secondary me-3">
                                                <!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/kt-products/docs/metronic/html/releases/2023-06-08-055059/core/html/src/media/icons/duotune/general/gen055.svg-->
                                                <span class="svg-icon svg-icon-5 m-0"><svg width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M2 4.63158C2 3.1782 3.1782 2 4.63158 2H13.47C14.0155 2 14.278 2.66919 13.8778 3.04006L12.4556 4.35821C11.9009 4.87228 11.1726 5.15789 10.4163 5.15789H7.1579C6.05333 5.15789 5.15789 6.05333 5.15789 7.1579V16.8421C5.15789 17.9467 6.05333 18.8421 7.1579 18.8421H16.8421C17.9467 18.8421 18.8421 17.9467 18.8421 16.8421V13.7518C18.8421 12.927 19.1817 12.1387 19.7809 11.572L20.9878 10.4308C21.3703 10.0691 22 10.3403 22 10.8668V19.3684C22 20.8218 20.8218 22 19.3684 22H4.63158C3.1782 22 2 20.8218 2 19.3684V4.63158Z"
                                                            fill="currentColor" />
                                                        <path
                                                            d="M10.9256 11.1882C10.5351 10.7977 10.5351 10.1645 10.9256 9.77397L18.0669 2.6327C18.8479 1.85165 20.1143 1.85165 20.8953 2.6327L21.3665 3.10391C22.1476 3.88496 22.1476 5.15129 21.3665 5.93234L14.2252 13.0736C13.8347 13.4641 13.2016 13.4641 12.811 13.0736L10.9256 11.1882Z"
                                                            fill="currentColor" />
                                                        <path
                                                            d="M8.82343 12.0064L8.08852 14.3348C7.8655 15.0414 8.46151 15.7366 9.19388 15.6242L11.8974 15.2092C12.4642 15.1222 12.6916 14.4278 12.2861 14.0223L9.98595 11.7221C9.61452 11.3507 8.98154 11.5055 8.82343 12.0064Z"
                                                            fill="currentColor" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </a>
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
