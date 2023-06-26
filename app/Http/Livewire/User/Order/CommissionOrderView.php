<?php

namespace App\Http\Livewire\User\Order;

use Livewire\Component;
use App\View\Components\UserBaseLayout;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderImage;

class CommissionOrderView extends Component
{
    protected $user;
    public $username, $order, $orderImages;
    public function mount()
    {
        $this->user = User::where('username', $this->username)->first();
        $conditions = [
            'id' => $this->order
        ];
        $this->order = Order::where($conditions)
            ->first();
        $this->orderImages = OrderImage::where('order_id', $this->order->id)->get();
    }
    public function render()
    {
        return view('livewire.user.order.commission-order-view')->layout(UserBaseLayout::class);
    }
}
