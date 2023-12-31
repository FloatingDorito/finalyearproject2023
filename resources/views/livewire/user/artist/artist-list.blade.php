<div>
    @section('pageTitle', 'Artists')
    <div class="row">
        @foreach ($artists as $artist)
            <div class="col-md-6 col-xxl-4 mb-5">
                <!--begin::Card-->
                <div class="card">
                    <!--begin::Card body-->
                    <div class="card-body d-flex flex-center flex-column py-9 px-6">
                        <a href="{{route('user.artists.view', ['username'=> auth()->user()->username, 'artist' => $artist->id])}}"
                            class="fs-4 text-gray-800 text-hover-primary fw-bold mb-0">{{ $artist->user->username }}</a>
                        <!--begin::Follow-->
                        <a href="{{route('user.artists.view', ['username'=> auth()->user()->username, 'artist' => $artist->id])}}" class="btn btn-sm btn-light-primary">
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
                        <!--end::Follow-->
                    </div>
                    <!--begin::Card body-->
                </div>
                <!--begin::Card-->
            </div>
        @endforeach
    </div>
    {{$artists->links()}}
</div>
