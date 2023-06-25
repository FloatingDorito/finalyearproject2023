<?php

namespace App\Http\Livewire\Artist\Order;

use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;
use App\View\Components\ArtistBaseLayout;
use App\Models\Order;
use App\Models\OrderImage;

class UploadCommissionImage extends Component
{
    use WithFileUploads;
    public $username, $order, $image;
    public $rules = ['image' => 'required|image|mimes:jpeg,png,svg,jpg,gif'];

    public function mount($username){
        $username = $this->username;
        $this->order = Order::where('id', $this->order)->first();
    }
    public function updated()
    {
        $this->validate();     
    }
    public function clearImgUpload()
    {
        $this->image = null;
    }
    public function render()
    {
        return view('livewire.artist.order.upload-commission-image')->layout(ArtistBaseLayout::class);
    }

    public function submit()
    {
        $this->validate();

        $img = $this->image;
        $file_name = time() . '.' . $img->getClientOriginalExtension();

        $save_img = Image::make($img->getRealPath());
        $save_img->save('orderImage/'.$file_name);

        $image_upload = new OrderImage;
        $image_upload->order_id = $this->order->id;
        $image_upload->filename = $this->image->getClientOriginalName();
        $image_upload->filelocation = $file_name;
        $image_upload->save();

        return redirect()->route('artist.order.view', ['username' => $this->username, 'order' => $this->order->id]);
    }
}
