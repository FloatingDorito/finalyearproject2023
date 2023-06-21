<x-admin.auth-layout>
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        @push('styles')
            <style>
                body {
                    background-image: url('/assets/media/auth/bg9.jpg');
                }

                [data-theme="dark"] body {
                    background-image: url('/assets/media/auth/bg9-dark.jpg');
                }
            </style>
        @endpush
        <div class="d-flex flex-center">
            <div class="d-flex flex-center w-lg-50 p-10">
                <div class="card rounded-3 w-md-550px">
                    <div class="card-body p-10 p-lg-20 d-flex flex-column flex-center">
                        <h1 class="fw-bolder text-gray-900 mb-5">Payment Successful</h1>
                        <div class="fs-6 fw-semibold text-gray-500 mb-10">
                            View Your Paid Commissions Here
                        </div>
                        <div class="mb-11">
                            <a href="{{route('user.home',['username' => auth()->user()->username])}}"
                                class="btn btn-sm btn-primary">{{__('View')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin.auth-layout>
