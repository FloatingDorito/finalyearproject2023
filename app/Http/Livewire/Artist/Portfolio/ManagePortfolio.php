<?php

namespace App\Http\Livewire\Artist\Portfolio;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use App\View\Components\ArtistBaseLayout;
use App\Models\Artist;
use App\Models\Portfolio;
use App\Models\User;

class ManagePortfolio extends Component
{
    use WithFileUploads;
    public $image;
    public $artist;
    public $username;
    public $portfolio;
    public $isImage = false;
    public $rules = ['image' => 'required|image|mimes:jpeg,png,svg,jpg,gif'];

    public function mount(Portfolio $portfolio)
    {
        $this->portfolio = $portfolio ?? new Portfolio;
        $this->image = $this->portfolio->filelocation;
        if($this->image){
            $this->isImage = true;
        }
        $user = User::where('username', $this->username)->first();
        $this->artist = Artist::where('user_id', $user->id)->first();
    }

    public function render()
    {
        return view('livewire.artist.porfolio.manage-portfolio')->layout(ArtistBaseLayout::class);
    }

    public function updated()
    {
        $this->validate();       
        $extension = strtolower($this->image->extension());
        $image_exts = array('png','jpg','jpeg','gif','svg');
        if(in_array($extension,$image_exts)){
             $this->isImage = true;
        }
    }

    public function submit()
    {
        $this->validate();

        $img = $this->image;
        $file_name = time() . '.' . $img->getClientOriginalExtension();
        $copyright = Image::make($img->getRealPath());
        $height = $copyright->height();
        $width = $copyright->width();
        $copyright->text('Artwork Belongs To:' . $this->username, $height/2 , $width/2 , function ($font) {
            $font->file(public_path('assets/Ramyoon.ttf'));
            $font->color([255, 255, 255, 0.7]);
            $font->size(100);
            $font->align('center');
            $font->valign('middle');
        });
        $copyright->save('portfolio/'.$file_name);

        $id = $this->portfolio ? $this->portfolio->id : null;
        if (empty($id)) {
            $id = Str::uuid()->toString();
        }

        $this->portfolio = Portfolio::updateOrCreate(
            [
                'id' => $id,
                'artist_id' => $this->artist->id
            ],
            [
                'filename' => $this->image->getClientOriginalName(),
                'filelocation' => $file_name,
            ]
        );

        return redirect()->route('artist.portfolio', ['username' => $this->username]);
    }
}