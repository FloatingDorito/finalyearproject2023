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
                    <div class="card-body p-10 p-lg-20">
                        <form class="form w-100" id="" data-kt-redirect-url="#" action="#" method="POST"
                            action="{{ route('login') }}">
                            @csrf
                            <!--begin::Heading-->
                            <div class="text-center mb-11">
                                <!--begin::Title-->
                                <h1 class="text-dark fw-bolder mb-3">Sign In</h1>
                                <!--end::Title-->
                                <!--begin::Subtitle-->
                                <div class="text-gray-500 fw-semibold fs-6">Your Creative Awaits</div>
                                <!--end::Subtitle=-->
                            </div>
                            <div class="fv-row mb-8">
                                <input class="form-control bg-transparent @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="fv-row mb-8">
                                <input id="password" type="password"
                                    class="form-control bg-transparent @error('password') is-invalid @enderror"
                                    name="password" required autocomplete="current-password" autofocus>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="d-grid mb-10">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin.auth-layout>
