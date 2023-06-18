<?php

namespace App\Http\Livewire\Artist\Commission;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\View\Components\ArtistBaseLayout;
use App\Models\User;
use App\Models\Artist;
use App\Models\Commission;

class ManageCommission extends Component
{
    use WithFileUploads;

    public $coverimage;
    public $exampleimageone;
    public $exampleimagetwo;
    public $exampleimagethree;
    public $artist;
    public $username;
    public $commission;

    protected function rules()
    {
        if ($this->coverimage instanceof \Livewire\TemporaryUploadedFile) {
            return [
                'coverimage' => ['required', 'image', 'mimes:jpeg,png,svg,jpg,gif', 'max:5120'],
                'commission.title' => ['required', 'string'],
                'commission.price' => ['required', 'integer'],
                'commission.description' => ['required', 'string'],
                'commission.expectations' => ['required', 'string'],
                'commission.likes' => ['required', 'string'],
                'commission.dislikes' => ['required', 'string'],
                'exampleimageone' => ['nullable', 'image', 'mimes:jpeg,png,svg,jpg,gif', 'max:5120'],
                'exampleimagetwo' => ['nullable', 'image', 'mimes:jpeg,png,svg,jpg,gif', 'max:5120'],
                'exampleimagethree' => ['nullable', 'image', 'mimes:jpeg,png,svg,jpg,gif', 'max:5120'],
                'commission.status' => ['boolean']
            ];
        } else {
            return [
                'commission.title' => ['required', 'string'],
                'commission.price' => ['required', 'integer'],
                'commission.description' => ['required', 'string'],
                'commission.expectations' => ['required', 'string'],
                'commission.likes' => ['required', 'string'],
                'commission.dislikes' => ['required', 'string'],
                'exampleimageone' => ['nullable', 'image', 'mimes:jpeg,png,svg,jpg,gif', 'max:5120'],
                'exampleimagetwo' => ['nullable', 'image', 'mimes:jpeg,png,svg,jpg,gif', 'max:5120'],
                'exampleimagethree' => ['nullable', 'image', 'mimes:jpeg,png,svg,jpg,gif', 'max:5120'],
                'commission.status' => ['boolean']
            ];
        }

    }

    public function mount(Commission $commission)
    {
        $this->commission = $commission ?? new Commission;
        if ($this->commission->status == null) {
            $this->commission->status = false;
        }
        $this->coverimage = $this->commission->coverimage;
        $this->exampleimageone = $this->commission->exampleimageone;
        $this->exampleimagetwo = $this->commission->exampleimagetwo;
        $this->exampleimagethree = $this->commission->exampleimagethree;
        $user = User::where('username', $this->username)->first();
        $this->artist = Artist::where('user_id', $user->id)->first();
    }
    public function render()
    {
        return view('livewire.artist.commission.manage-commission')->layout(ArtistBaseLayout::class);
    }

    public function imgCopyright($img)
    {
        if ($img) {
            $file_name = time() . '.' . $img->getClientOriginalExtension();
            $copyright = Image::make($img->getRealPath());
            $height = $copyright->height();
            $width = $copyright->width();
            $copyright->text('Artwork Belongs To:' . $this->username, $height / 2, $width / 2, function ($font) {
                $font->file(public_path('assets/Ramyoon.ttf'));
                $font->color([255, 255, 255, 0.7]);
                $font->size(100);
                $font->align('center');
                $font->valign('bottom');
            });
            $copyright->save('commission/' . $file_name);

        } else {
            $file_name = null;
        }
        return $file_name;
    }

    public function submit()
    {
        $this->validate();

        $path_coverimage = $this->coverimage;
        $path_exampleimageone = $this->exampleimageone;
        $path_exampleimagetwo = $this->exampleimagetwo;
        $path_exampleimagethree = $this->exampleimagethree;

        if ($this->coverimage instanceof \Livewire\TemporaryUploadedFile) {
            $path_coverimage = $this->imgCopyright($this->coverimage);
        }
        if ($this->exampleimageone instanceof \Livewire\TemporaryUploadedFile) {
            $path_exampleimageone = $this->imgCopyright($this->exampleimageone);
        }
        if ($this->exampleimagetwo instanceof \Livewire\TemporaryUploadedFile) {
            $path_exampleimagetwo = $this->imgCopyright($this->exampleimagetwo);
        }
        if ($this->exampleimagethree instanceof \Livewire\TemporaryUploadedFile) {
            $path_exampleimagethree = $this->imgCopyright($this->exampleimagethree);
        }

        $this->commission = Commission::updateOrCreate(
            [
                'id' => $this->commission ? $this->commission->id : null,
                'artist_id' => $this->artist->id
            ],
            [
                'coverimage' => $path_coverimage,
                'title' => $this->commission->title,
                'price' => $this->commission->price,
                'description' => $this->commission->description,
                'expectations' => $this->commission->expectations,
                'likes' => $this->commission->likes,
                'dislikes' => $this->commission->dislikes,
                'status' => $this->commission->status,
                'exampleimageone' => $path_exampleimageone,
                'exampleimagetwo' => $path_exampleimagetwo,
                'exampleimagethree' => $path_exampleimagethree
            ]
        );

        return redirect()->route('artist.commission', ['username' => $this->username]);
    }
}