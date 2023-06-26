<div>
    <!--begin::Card footer-->
    <div class="card-footer pt-4" id="kt_chat_messenger_footer">
        <form class="form" wire:submit.prevent="submit" enctype="multipart/form-data">
            <!--begin::Input-->
            <textarea class="form-control form-control-flush mb-3" wire:model="sendText" rows="1" data-kt-element="input" placeholder="Type a message"></textarea>
            <!--end::Input-->
            <!--begin:Toolbar-->
            <div class="d-flex flex-stack">
                <!--begin::Send-->
                <button class="btn btn-primary" type="submit">Submit</button>
                <!--end::Send-->
            </div>
            <!--end::Toolbar-->
        </form>
    </div>
    <!--end::Card footer-->
</div>
