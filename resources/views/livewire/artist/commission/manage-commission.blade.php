<div>
    @section('pageTitle', 'Commission')
    <div class="card shadow-sm mb-xl-10">
        <!--begin::Card header-->
        <div class="card-header border-0 cursor-pointer">
            <!--begin::Card title-->
            <div class="card-title m-0">
                <h3 class="fw-bold m-0">
                    {{ Route::is('artist.create.commission') ? 'Create Commission' : 'Edit Commission' }}</h3>
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
                    <div class="row">
                        <div class="col-12">
                            <!--begin::Input group-->
                            <div class="mb-5">
                                <label class="fw-bold required form-label">Cover Image Upload</label>
                                <input type="file" accept="image/*" class="form-control" wire:model="coverimage" />
                            </div>
                            <div class="mb-5">
                                @if ($coverimage)
                                    <a class="btn btn-primary" wire:click="clearCoverImgUpload">Clear Upload</a>
                                    <br>
                                    @if ($coverimage instanceof \Livewire\TemporaryUploadedFile)
                                        @php
                                            $extension = $coverimage->getClientOriginalExtension();
                                            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
                                        @endphp
                                        @if (in_array($extension, $allowedExtensions))
                                            <label class="col-form-label fw-bold mt-2">Photo Preview:</label>
                                            <br>
                                            <img class="img-fluid mt-2" width="250px"
                                                src="{{ $coverimage->temporaryUrl() }}">
                                        @endif
                                    @else
                                        <label class="col-form-label fw-bold mt-2">Photo Preview:</label>
                                        <br>
                                        <img class="img-fluid mt-2" width="250px"
                                            src="{{ secure_asset('commission/' . $coverimage) }}">
                                    @endif
                                @endif
                                @error('coverimage')
                                    <span class="error text-danger">ERROR: {{ $message }}</span>
                                @enderror
                            </div>
                            <!--end::Input group-->
                        </div>
                        <div class="col-md-6 mb-5">
                            <!--begin::Input group-->
                            <div class="input-group">
                                <span class="input-group-text required">Commission Title</span>
                                <input type="text" class="form-control" placeholder="Title"
                                    wire:model="commission.title" />
                            </div>
                            @error('commission.title')
                                <span class="error text-danger">ERROR: {{ $message }}</span>
                            @enderror
                            <!--end::Input group-->
                        </div>
                        <div class="col-md-6 mb-5">
                            <!--begin::Input group-->
                            <div class="input-group">
                                <span class="input-group-text required">$</span>
                                <input type="text" class="form-control" placeholder="Price"
                                    wire:model="commission.price" />
                            </div>
                            @error('commission.price')
                                <span class="error text-danger">ERROR: {{ $message }}</span>
                            @enderror
                            <!--end::Input group-->
                        </div>
                        <div class="col-12 mb-5">
                            <!--begin::Input group-->
                            <div class="input-group">
                                <span class="input-group-text required">Commission Expectations</span>
                                <textarea class="form-control" placeholder="What is expected as end result?" wire:model="commission.expectations"></textarea>
                            </div>
                            @error('commission.expectations')
                                <span class="error text-danger">ERROR: {{ $message }}</span>
                            @enderror
                            <!--end::Input group-->
                        </div>
                        <div class="col-12 mb-5">
                            <!--begin::Input group-->
                            <div class="input-group">
                                <span class="input-group-text required">Commission Likes</span>
                                <textarea class="form-control" placeholder="What artist can draw" wire:model="commission.likes"></textarea>
                            </div>
                            @error('commission.likes')
                                <span class="error text-danger">ERROR: {{ $message }}</span>
                            @enderror
                            <!--end::Input group-->
                        </div>
                        <div class="col-12 mb-5">
                            <!--begin::Input group-->
                            <div class="input-group">
                                <span class="input-group-text required">Commission Dislikes</span>
                                <textarea class="form-control" placeholder="What artist cannot draw" wire:model="commission.dislikes"></textarea>
                            </div>
                            @error('commission.dislikes')
                                <span class="error text-danger">ERROR: {{ $message }}</span>
                            @enderror
                            <!--end::Input group-->
                        </div>
                        <div class="col-12 mb-5">
                            <!--begin::Input group-->
                            <div class="input-group">
                                <span class="input-group-text required">Commission Description</span>
                                <textarea class="form-control" placeholder="More details of the Commission" wire:model="commission.description"></textarea>
                            </div>
                            @error('commission.description')
                                <span class="error text-danger">ERROR: {{ $message }}</span>
                            @enderror
                            <!--end::Input group-->
                        </div>
                        <div class="col-12 mb-5">
                            <div class="form-check form-switch form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" wire:model="commission.status"
                                    id="commissionStatus" />
                                <label class="form-check-label" for="commissionStatus">
                                    Display
                                </label>
                                @error('commission.status')
                                    <span class="error text-danger">ERROR: {{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 mb-5">
                            <!--begin::Input group-->
                            <div class="mb-5">
                                <label class="fw-bold form-label">Example Image Upload 1</label>
                                <input type="file" accept="image/*" class="form-control"
                                    wire:model="exampleimageone" />
                            </div>
                            <div class="mb-5">
                                @if ($exampleimageone)
                                    <a class="btn btn-primary" wire:click="clearExpImgOneUpload">Clear Upload</a>
                                    <br>
                                    @if ($exampleimageone instanceof \Livewire\TemporaryUploadedFile)
                                        @php
                                            $extension = $exampleimageone->getClientOriginalExtension();
                                            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
                                        @endphp
                                        @if (in_array($extension, $allowedExtensions))
                                            <label class="col-form-label fw-bold mt-2">Photo Preview:</label>
                                            <br>
                                            <img class="img-fluid mt-2" width="250px"
                                                src="{{ $exampleimageone->temporaryUrl() }}">
                                        @endif
                                    @else
                                        <label class="col-form-label fw-bold mt-2">Photo Preview:</label>
                                        <br>
                                        <img class="img-fluid mt-2" width="250px"
                                            src="{{ secure_asset('commission/' . $exampleimageone) }}">
                                    @endif
                                @endif
                                @error('exampleimageone')
                                    <span class="error text-danger">ERROR: {{ $message }}</span>
                                @enderror
                            </div>
                            <!--end::Input group-->
                        </div>
                        <div class="col-12 mb-5">
                            <!--begin::Input group-->
                            <div class="mb-5">
                                <label class="fw-bold form-label">Example Image Upload 2</label>
                                <input type="file" accept="image/*" class="form-control"
                                    wire:model="exampleimagetwo" />
                            </div>
                            <div class="mb-5">
                                @if ($exampleimagetwo)
                                    <a class="btn btn-primary" wire:click="clearExpImgTwoUpload">Clear Upload</a>
                                    <br>
                                    @if ($exampleimagetwo instanceof \Livewire\TemporaryUploadedFile)
                                        @php
                                            $extension = $exampleimagetwo->getClientOriginalExtension();
                                            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
                                        @endphp
                                        @if (in_array($extension, $allowedExtensions))
                                            <label class="col-form-label fw-bold mt-2">Photo Preview:</label>
                                            <br>
                                            <img class="img-fluid mt-2" width="250px"
                                                src="{{ $exampleimagetwo->temporaryUrl() }}">
                                        @endif
                                    @else
                                        <label class="col-form-label fw-bold mt-2">Photo Preview:</label>
                                        <br>
                                        <img class="img-fluid mt-2" width="250px"
                                            src="{{ secure_asset('commission/' . $exampleimagetwo) }}">
                                    @endif
                                @endif
                                @error('exampleimagetwo')
                                    <span class="error text-danger">ERROR: {{ $message }}</span>
                                @enderror
                            </div>
                            <!--end::Input group-->
                        </div>
                        <div class="col-12 mb-5">
                            <!--begin::Input group-->
                            <div class="mb-5">
                                <label class="fw-bold form-label">Example Image Upload 3</label>
                                <input type="file" accept="image/*" class="form-control"
                                    wire:model="exampleimagethree" />
                            </div>
                            <div class="mb-5">
                                @if ($exampleimagethree)
                                    <a class="btn btn-primary" wire:click="clearExpImgThreeUpload">Clear Upload</a>
                                    <br>
                                    @if ($exampleimagethree instanceof \Livewire\TemporaryUploadedFile)
                                        @php
                                            $extension = $exampleimagethree->getClientOriginalExtension();
                                            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
                                        @endphp
                                        @if (in_array($extension, $allowedExtensions))
                                            <label class="col-form-label fw-bold mt-2">Photo Preview:</label>
                                            <br>
                                            <img class="img-fluid mt-2" width="250px"
                                                src="{{ $exampleimagethree->temporaryUrl() }}">
                                        @endif
                                    @else
                                        <label class="col-form-label fw-bold mt-2">Photo Preview:</label>
                                        <br>
                                        <img class="img-fluid mt-2" width="250px"
                                            src="{{ secure_asset('commission/' . $exampleimagethree) }}">
                                    @endif
                                @endif
                                @error('exampleimagethree')
                                    <span class="error text-danger">ERROR: {{ $message }}</span>
                                @enderror
                            </div>
                            <!--end::Input group-->
                        </div>
                    </div>
                </div>
                <!--end::Card body-->
                <!--begin::Actions-->
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <a href="{{ route('artist.commission', ['username' => auth()->user()->username]) }}"
                        class="btn btn-secondary me-5">Back</a>

                    @if ($commission->exists)
                        <button type="button" class="btn btn-danger me-5" data-bs-toggle="modal"
                            data-bs-target="#deleteModal" data-toggle="modal"
                            data-target="#deleteModal">Delete</button>
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
                        <button type="button" class="btn btn-secondary close-btn"
                            data-dismiss="modal">Close</button>
                        <button type="button" wire:click.prevent="delete()" class="btn btn-danger close-modal"
                            data-dismiss="modal">Yes, Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
