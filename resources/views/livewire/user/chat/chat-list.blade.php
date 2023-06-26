<div>
    <!--begin::Contacts-->
    <div class="card card-flush">
        <!--begin::Card header-->
        <div class="card-header pt-7" id="kt_chat_contacts_header">
            <!--begin::Title-->
            <div class="card-title">
                <!--begin::User-->
                <div class="d-flex justify-content-center flex-column me-3">
                    <a href="#" class="fs-4 fw-bold text-gray-900 text-hover-primary me-1 mb-2 lh-1">Artists</a>
                </div>
                <!--end::User-->
            </div>
            <!--end::Title-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-5" id="kt_chat_contacts_body">
            <!--begin::List-->
            <div class="scroll-y me-n5 pe-5 h-200px h-lg-auto" data-kt-scroll="true"
                data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
                data-kt-scroll-dependencies="#kt_header, #kt_toolbar, #kt_footer, #kt_chat_contacts_header"
                data-kt-scroll-wrappers="#kt_content, #kt_chat_contacts_body" data-kt-scroll-offset="5px"
                style="">
                @if (count($conversations) > 0)
                    @foreach ($conversations as $conversation)
                        <!--begin::User-->
                        <div class="d-flex flex-stack py-4">
                            <!--begin::Details-->
                            <div class="d-flex align-items-center">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-45px symbol-circle">
                                    <span
                                        class="symbol-label bg-light-danger text-danger fs-6 fw-bolder">{{ substr($this->getChatListUser($conversation, $name = 'username'), 0, 1) }}</span>
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Details-->
                                <div class="ms-5">
                                    <a wire:click="$emit('chatUserSelected', '{{$conversation->id}}','{{ $this->getChatListUser($conversation, 'id') }}')"
                                        class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">{{ $this->getChatListUser($conversation, 'username') }}</a>
                                    <div class="fw-semibold text-muted">{{ $this->getChatListUser($conversation, $name = 'email') }}</div>
                                </div>
                                <!--end::Details-->
                            </div>
                            <!--end::Details-->
                            <!--begin::Lat seen-->
                            <div class="d-flex flex-column align-items-end ms-2">
                                <span class="text-muted fs-7 mb-1">{{$conversation->messages->last()->created_at->shortAbsoluteDiffForHumans()}}</span>
                            </div>
                            <!--end::Lat seen-->
                        </div>
                        <!--end::User-->
                        <!--begin::Separator-->
                        <div class="separator separator-dashed d-none"></div>
                        <!--end::Separator-->
                    @endforeach
                @else
                    You Have No Conversations
                @endif
            </div>
            <!--end::List-->
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Contacts-->
</div>
