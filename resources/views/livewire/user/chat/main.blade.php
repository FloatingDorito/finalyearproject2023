<div>
    @section('pageTitle', 'Private Chat')
    <div class="d-flex flex-column flex-lg-row">
        <div class="flex-column flex-lg-row-auto w-100 w-lg-300px w-xl-400px mb-10 mb-lg-0">
            @livewire('user.chat.chat-list')
        </div>        
        <div class="flex-lg-row-fluid ms-lg-7 ms-xl-10">
            @livewire('user.chat.chatbox')
        </div>            
    </div>
</div>
