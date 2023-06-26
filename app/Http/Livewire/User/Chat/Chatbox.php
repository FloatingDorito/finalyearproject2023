<?php

namespace App\Http\Livewire\User\Chat;

use Livewire\Component;
use App\Models\Conversations;
use App\Models\Messages;
use App\Models\User;

class Chatbox extends Component
{
    public $selectedConvo, $receiverInstance, $messageCount, $messages;

    protected $listeners = ['loadConvo','loadMessage'];

    public function loadMessage($messageID){
        $newMessage = Messages::where('id',$messageID)->first();
        $this->messages->push($newMessage);
    }
    public function loadConvo(Conversations $conversation,User $receiverInstance){        
        $this->selectedConvo = $conversation;
        $this->receiverInstance = $receiverInstance;
        $this->messageCount = Messages::where('conversations_id', $this->selectedConvo->id)->count();
        $this->messages = Messages::where('conversations_id', $this->selectedConvo->id)->get();
        $this->emitTo('user.chat.send-message', 'getReceiver', $this->selectedConvo->id,$this->receiverInstance->id);
    }
    public function render()
    {
        return view('livewire.user.chat.chatbox');
    }
}
