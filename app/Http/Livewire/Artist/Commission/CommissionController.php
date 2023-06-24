<?php

namespace App\Http\Livewire\Artist\Commission;

use Livewire\Component;
use Livewire\WithPagination;
use App\View\Components\ArtistBaseLayout;
use App\Models\Artist;
use App\Models\User;
use App\Models\Commission;

class CommissionController extends Component
{
    use WithPagination;
    const PAGINATION_NUMBER = 1;
    protected $paginationTheme = 'bootstrap';
    protected $artist, $user;
    public $username;

    public function mount($username)
    {
        $this->username = $username;
    }
    public function render()
    {       
        $this->user = User::where('username', $this->username)->first();
        $this->artist = Artist::where('user_id', $this->user->id)->first();
        $commissions = Commission::where('artist_id', $this->artist->id)
        ->paginate(self::PAGINATION_NUMBER);
        return view('livewire.artist.commission.commission-controller', ['commissions' => $commissions])->layout(ArtistBaseLayout::class);
    }
}
