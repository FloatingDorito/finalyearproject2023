<?php

namespace App\Http\Livewire\User\Artist;

use Livewire\Component;
use App\View\Components\UserBaseLayout;
use App\Models\Artist;
use App\Models\Portfolio;
use App\Models\Commission;

class ViewArtist extends Component
{
    public $artist, $portfolios, $commissions;
    public function mount(Artist $artist){
        $this->artist = $artist;
        $this->portfolios = Portfolio::where('artist_id', $this->artist->id)->get();
        $conditions = [
            'artist_id' => $this->artist->id,
            'status' => true
        ];
        $this->commissions = Commission::where($conditions)->get();
    }
    public function render()
    {
        return view('livewire.user.artist.view-artist')->layout(UserBaseLayout::class);
    }
}
