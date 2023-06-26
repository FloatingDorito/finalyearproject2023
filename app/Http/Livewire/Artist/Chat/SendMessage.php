<?php

namespace App\Http\Livewire\Artist\Chat;

use Livewire\Component;
use App\Models\Conversations;
use App\Models\Messages;

class SendMessage extends Component
{
    public $sendText;
    public $receiver;
    public $convo;
    protected $listeners = ['getReceiver'];
    public $rules = ['sendText' => 'nullable|string'];
    public function render()
    {
        return view('livewire.artist.chat.send-message');
    }

    public function getReceiver($convoId, $receiverId)
    {
        $this->convo = Conversations::where('id', $convoId)->first();
        $this->receiver = $receiverId;
    }

    public function submit()
    {
        $this->validate();
        $convo = $this->convo;
        $createMessage = Messages::create([
            'conversations_id' => $convo->id,
            'sender_id' => auth()->user()->id,
            'receiver_id' => $this->receiver,
            'texts' => $this->sendText
        ]);
        $convo->last_time_message = $createMessage->created_at;
        $convo->save();
        $this->emitTo('artist.chat.chatbox', 'loadMessage', $createMessage->id); 
        $this->emitTo('artist.chat.chat-list', 'refreshComponent');
        $this->reset('sendText');        
    }
}
