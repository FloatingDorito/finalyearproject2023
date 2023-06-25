<div>
    @section('pageTitle', 'Upload Order Image')
    <div class="card shadow-sm mb-5 mb-xl-10">
        <!--begin::Card header-->
        <div class="card-header border-0 cursor-pointer">
            <!--begin::Card title-->
            <div class="card-title m-0">
                <h3 class="fw-bold m-0">
                    Upload  Order Image</h3>
            </div>
            <!--end::Card title-->
        </div>
        <!--begin::Card header-->
        <!--begin::Content-->
        <div>
            <!--begin::Form-->
            <form class="form" wire:submit.prevent="submit" enctype="multipart/form-data">
                <!--begin::Card body-->
                <div class="card-body border-top p-9">
                    <!--begin::Input group-->
                    <div class="mb-5">
                        <label class="fw-bold required form-label">Commission Order Image Upload</label>
                        <input type="file" accept="image/*" class="form-control" wire:model="image" />
                    </div>
                    <div>
                        @if ($image)
                        <a class="btn btn-primary" wire:click="clearImgUpload">Clear Upload</a>
                        <br>
                            @if ($image instanceof \Livewire\TemporaryUploadedFile)
                                @php
                                    $extension = $image->getClientOriginalExtension();
                                    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
                                @endphp
                                @if (in_array($extension, $allowedExtensions))
                                    <label class="col-form-label fw-bold mt-2">Photo Preview:</label>
                                    <br>
                                    <img class="img-fluid mt-2" width="250px" src="{{ $image->temporaryUrl() }}">
                                @endif
                            @else
                                <label class="fw-bold mt-2">Photo Preview:</label>
                                <br>
                                <img class="img-fluid mt-2" width="250px"
                                    src="{{ secure_asset('orderImage/' . $image) }}">
                            @endif
                        @endif
                        @error('image')
                            <h3 class="error text-danger">ERROR: {{ $message }}</h3>
                        @enderror
                    </div>
                    <!--end::Input group-->
                </div>
                <!--end::Card body-->
                <!--begin::Actions-->
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    {{-- <a href="{{ route('artist.order.view', ['username' => auth()->user()->username, 'order' => $orderImage->order->id]) }}"
                        class="btn btn-secondary me-5">Back</a> --}}

                    <button type="submit" class="btn btn-primary">Save
                        Changes</button>
                </div>
                <!--end::Actions-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Content-->
    </div>
</div>
