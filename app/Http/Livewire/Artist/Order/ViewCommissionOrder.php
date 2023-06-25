<?php

namespace App\Http\Livewire\Artist\Order;

use Livewire\Component;
use App\View\Components\ArtistBaseLayout;
use App\Models\Artist;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderImage;

class ViewCommissionOrder extends Component
{
    protected $artist, $user;
    public $username, $order, $orderImages;
    public function mount()
    {
        $this->user = User::where('username', $this->username)->first();
        $this->artist = Artist::where('user_id', $this->user->id)->first();
        $conditions = [
            'artist_id' => $this->artist->id,
            'id' => $this->order
        ];
        $this->order = Order::where($conditions)
            ->first();
        $this->orderImages = OrderImage::where('order_id', $this->order->id)
            ->get();
    }
    public function render()
    {
        return view('livewire.artist.order.view-commission-order')->layout(ArtistBaseLayout::class);
    }

    public function complete($orderID)
    {
        $order = Order::where('id', $orderID)->first();
        $order->status = 'completed';
        $order->save();
        $this->dispatchBrowserEvent('orderUpdated');
    }
}