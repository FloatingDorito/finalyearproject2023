<?php

namespace App\Http\Livewire\User\Chat;

use Livewire\Component;
use App\View\Components\UserBaseLayout;

class Main extends Component
{
    public function render()
    {
        return view('livewire.user.chat.main')->layout(UserBaseLayout::class);
    }
}
