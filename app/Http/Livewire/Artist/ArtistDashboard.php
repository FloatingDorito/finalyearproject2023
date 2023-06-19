<?php

namespace App\Http\Livewire\Artist;

use Livewire\Component;
use App\View\Components\ArtistBaseLayout;
use App\Models\User;
use App\Models\Artist;
use App\Models\Portfolio;
use App\Models\Commission;

class ArtistDashboard extends Component
{
    public $artist;
    public $username;
    public $portfolios;
    public $commissions;
    public function mount(){
        $user = User::where('username', $this->username)->first();
        $this->artist = Artist::where('user_id', $user->id)->first();
        $this->portfolios = Portfolio::where('artist_id', $this->artist->id)->get();
        $this->commissions = Commission::where('artist_id', $this->artist->id)->get();
    }
    public function render()
    {
        return view('livewire.artist.artist-dashboard')->layout(ArtistBaseLayout::class);
    }
}
