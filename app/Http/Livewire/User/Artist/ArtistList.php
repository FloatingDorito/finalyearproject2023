<?php

namespace App\Http\Livewire\User\Artist;

use App\View\Components\UserBaseLayout;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Artist;

class ArtistList extends Component
{
    use WithPagination;
    const PAGINATION_NUMBER = 12;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $artists = Artist::where('status', 'approved')
        ->paginate(self::PAGINATION_NUMBER);

        return view('livewire.user.artist.artist-list', ['artists' => $artists])->layout(UserBaseLayout::class);
    }
}
