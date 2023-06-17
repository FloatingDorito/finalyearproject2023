<?php

namespace App\Http\Livewire\Artist\Commission;

use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;
use App\View\Components\ArtistBaseLayout;
use App\Models\User;
use App\Models\Artist;
use App\Models\Commission;

class ManageCommission extends Component
{
    use WithFileUploads;

    public $image;
    private $artist;
    public $username;
    public $commission;

    public $rules = ['image' => 'required|image|mimes:jpeg,png,svg,jpg,gif'];

    public function mount(Commission $commission)
    {
        $this->commission = $commission ?? new Commission;
        $this->image = $this->commission->imagecover;
        $user = User::where('username', $this->username)->first();
        $this->artist = Artist::where('user_id', $user->id)->first();
    }
    public function render()
    {
        return view('livewire.artist.commission.manage-commission')->layout(ArtistBaseLayout::class);
    }
}
