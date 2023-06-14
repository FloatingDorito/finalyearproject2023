<?php

namespace App\Http\Livewire\Artist\Portfolio;
use App\Models\Artist;
use App\Models\User;
use App\View\Components\ArtistBaseLayout;
use App\Models\Portfolio;
use Livewire\Component;

class PortfolioController extends Component
{
    public $portfolios;
    public $username;
    public function mount(){
        $user = User::where('username', $this->username)->first();
        $artist = Artist::where('user_id', $user->id)->first();
        $this->portfolios = Portfolio::where('artist_id', $artist->id)->get();
    }
    public function render()
    {
        return view('livewire.artist.porfolio.portfolio')->layout(ArtistBaseLayout::class);
    }
}
