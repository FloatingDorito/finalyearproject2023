<?php

namespace App\Http\Livewire\Artist\Commission;

use Livewire\Component;
use App\View\Components\ArtistBaseLayout;
use App\Models\User;
use App\Models\Artist;
use App\Models\Commission;

class ViewCommission extends Component
{
    public $commission;
    public $username;
    public function mount(Commission $commission){
        $this->commission = $commission;
    }
    public function render()
    {
        return view('livewire.artist.commission.view-commission')->layout(ArtistBaseLayout::class);
    }
}
