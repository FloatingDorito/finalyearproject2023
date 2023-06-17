<div>
    @section('pageTitle', 'Commission')
    <div class="card shadow-sm mb-5 mb-xl-10">
        <!--begin::Card header-->
        <div class="card-header border-0 cursor-pointer">
            <!--begin::Card title-->
            <div class="card-title m-0">
                <h3 class="fw-bold m-0">
                    {{ Route::is('artist.manage.commission') ? 'Create Commission' : 'Edit Commission' }}</h3>
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
                        <label class="fw-bold required form-label">Cover Image Upload</label>
                        <input type="file" accept="image/*" class="form-control" wire:model="image" />
                    </div>
                    <div>
                        @if ($image)
                            <label class="col-form-label fw-bold mt-2">Photo Preview:</label>
                            @if ($image instanceof \Livewire\TemporaryUploadedFile)
                                <img class="img-fluid mt-2" src="{{ $image->temporaryUrl() }}">
                            @else
                                <img class="img-fluid mt-2" src="{{secure_asset('portfolio/'.$image)}}">
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
                    <a href="{{ route('artist.commission', ['username' => auth()->user()->username]) }}"
                        class="btn btn-secondary me-5">Back</a>

                    @if ($commission->exists)
                        <button type="button" class="btn btn-danger me-5" data-bs-toggle="modal"
                            data-bs-target="#deleteModal" data-toggle="modal" data-target="#deleteModal">Delete</button>
                    @endif

                    <button type="submit" class="btn btn-primary">Save
                        Changes</button>
                </div>
                <!--end::Actions-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Content-->

        <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
            aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Delete Confirm</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true close-btn">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure want to delete?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                        <button type="button" wire:click.prevent="delete()" class="btn btn-danger close-modal"
                            data-dismiss="modal">Yes, Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
