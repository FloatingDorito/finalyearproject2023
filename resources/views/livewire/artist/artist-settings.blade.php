<div>
    @section('pageTitle', 'Artist Settings')
    <div class="card shadow-sm mb-xl-10">
        <!--begin::Card header-->
        <div class="card-header border-0 cursor-pointer">
            <!--begin::Card title-->
            <div class="card-title m-0">
                <h3 class="fw-bold m-0">
                    Artist Settings
                </h3>
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
                        <div class="col-md-6 mb-5">
                            <!--begin::Input group-->
                            <div class="input-group">
                                <span class="input-group-text required">Username</span>
                                <input type="text" class="form-control" placeholder="Username"
                                    wire:model="user.username" />
                            </div>
                            @error('user.username')
                                <span class="error text-danger">ERROR: {{ $message }}</span>
                            @enderror
                            <!--end::Input group-->
                        </div>
                        <div class="col-12 mb-5">
                            <!--begin::Input group-->
                            <div class="input-group">
                                <span class="input-group-text">Artist Description</span>
                                <textarea class="form-control" placeholder="Describe Yourself" wire:model="artist.description"></textarea>
                            </div>
                            @error('artist.description')
                                <span class="error text-danger">ERROR: {{ $message }}</span>
                            @enderror
                            <!--end::Input group-->
                        </div>
                        <div class="col-12 mb-5">
                            <!--begin::Input group-->
                            <div class="input-group">
                                <span class="input-group-text">Facebook</span>
                                <input type="text" class="form-control" placeholder="e.g. https://www.facebook.com/facebookname"
                                    wire:model="artist.facebook" />
                            </div>
                            @error('artist.facebook')
                                <span class="error text-danger">ERROR: {{ $message }}</span>
                            @enderror
                            <!--end::Input group-->
                        </div>
                        <div class="col-12 mb-5">
                            <!--begin::Input group-->
                            <div class="input-group">
                                <span class="input-group-text">Twitter</span>
                                <input type="text" class="form-control" placeholder="e.g. https://twitter.com/twittername"
                                    wire:model="artist.twitter" />
                            </div>
                            @error('artist.twitter')
                                <span class="error text-danger">ERROR: {{ $message }}</span>
                            @enderror
                            <!--end::Input group-->
                        </div>
                    </div>
                </div>
                <!--end::Card body-->
                <!--begin::Actions-->
                <div class="card-footer d-flex justify-content-end py-6 px-9">
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

