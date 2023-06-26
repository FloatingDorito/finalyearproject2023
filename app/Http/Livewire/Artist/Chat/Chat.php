<?php

namespace App\Http\Livewire\Artist\Chat;

use Livewire\Component;
use App\View\Components\ArtistBaseLayout;

class Chat extends Component
{
    public function render()
    {
        return view('livewire.artist.chat.chat')->layout(ArtistBaseLayout::class);
    }
}
