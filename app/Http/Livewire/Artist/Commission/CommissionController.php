<?php

namespace App\Http\Livewire\Artist\Commission;

use Livewire\Component;
use App\View\Components\ArtistBaseLayout;
use App\Models\Artist;
use App\Models\User;
use App\Models\Commission;

class CommissionController extends Component
{
    public $commissions;
    public $username;
    public function mount(){
        $user = User::where('username', $this->username)->first();
        $artist = Artist::where('user_id', $user->id)->first();
        $this->commissions = Commission::where('artist_id', $artist->id)->get();
    }
    public function render()
    {
        return view('livewire.artist.commission.commission-controller')->layout(ArtistBaseLayout::class);
    }
}
