<?php

namespace App\Http\Livewire\Artist\Chat;

use Livewire\Component;
use App\Models\Conversations;
use App\Models\User;

class ChatList extends Component
{
    public $auth_id;
    public $conversations, $receiverInstance, $selectedConvo;

    protected $listeners = ['chatUserSelected', 'refreshComponent'];

    public function refreshComponent()
    {
        $this->emit('$refresh');
    }
    public function chatUserSelected($convoId, $receiverId)
    {
        $this->emitTo('artist.chat.chatbox', 'loadConvo', $convoId, $receiverId);
    }

    public function getChatListUser(Conversations $conversation, $request)
    {
        $this->auth_id = auth()->user()->id;
        if ($conversation->sender_id == $this->auth_id) {
            $this->receiverInstance = User::firstWhere('id', $conversation->receiver_id);
        } else {
            $this->receiverInstance = User::firstWhere('id', $conversation->sender_id);
        }
        if (isset($request)) {
            return $this->receiverInstance->$request;
        }
    }

    public function mount()
    {
        $this->auth_id = auth()->user()->id;
        $this->conversations = Conversations::where('sender_id', $this->auth_id)->orWhere('receiver_id', $this->auth_id)->orderBy('last_time_message', 'DESC')->get();
    }
    public function render()
    {
        return view('livewire.artist.chat.chat-list');
    }
}
