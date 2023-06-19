<?php

namespace App\Http\Livewire\Artist;

use Livewire\Component;
use App\View\Components\ArtistBaseLayout;
use App\Models\User;
use App\Models\Artist;
class ArtistSettings extends Component
{
    public $artist;

    public function mount(){
        $user = User::where('username', $this->username)->first();
        $this->artist = Artist::where('user_id', $user->id)->first();
    }
    public function render()
    {
        return view('livewire.artist.artist-settings')->layout(ArtistBaseLayout::class);
    }
}
