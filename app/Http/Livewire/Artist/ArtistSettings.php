<?php

namespace App\Http\Livewire\Artist;

use Livewire\Component;
use App\View\Components\ArtistBaseLayout;
use App\Models\User;
use App\Models\Artist;
use Illuminate\Validation\Rule;
class ArtistSettings extends Component
{
    public $artist;
    public $user;
    public $username;

    public function rules(){
        return [
            'user.username' => ['required','string',Rule::unique('users', 'username')->ignore($this->user->id)],
            'artist.description' => ['nullable', 'string'],
            'artist.facebook' => ['nullable', 'string'],
            'artist.twitter' => ['nullable', 'string']
        ];
    }

    public function mount(){
        $this->user = User::where('username', $this->username)->first();
        $this->artist = Artist::where('user_id', $this->user->id)->first();
    }
    public function render()
    {
        return view('livewire.artist.artist-settings')->layout(ArtistBaseLayout::class);
    }

    public function submit(){
        $this->validate();
        $user = $this->user;
        $user->username = $this->user['username'];
        $user->save();
        $artist = $this->artist;
        $artist->description = $this->artist['description'];
        $artist->facebook = $this->artist['facebook'];
        $artist->twitter = $this->artist['twitter'];
        $artist->save();

        return redirect()->route('artist.home',['username'=> $user->username]);
    }
}
