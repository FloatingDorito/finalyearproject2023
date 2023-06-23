<?php

namespace App\Http\Livewire\Artist\Portfolio;

use Livewire\WithPagination;
use App\Models\Artist;
use App\Models\User;
use App\View\Components\ArtistBaseLayout;
use App\Models\Portfolio;
use Livewire\Component;

class PortfolioController extends Component
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
        $portfolios = Portfolio::where('artist_id', $this->artist->id)
            ->paginate(self::PAGINATION_NUMBER);

        return view('livewire.artist.porfolio.portfolio', ['portfolios' => $portfolios])->layout(ArtistBaseLayout::class);
    }
}