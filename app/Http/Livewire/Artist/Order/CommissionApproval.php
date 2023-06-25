<?php

namespace App\Http\Livewire\Artist\Order;

use Livewire\Component;
use Livewire\WithPagination;
use App\View\Components\ArtistBaseLayout;
use App\Models\Artist;
use App\Models\User;
use App\Models\Order;

class CommissionApproval extends Component
{
    use WithPagination;
    const PAGINATION_NUMBER = 10;
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
        $conditions = [
            'artist_id' => $this->artist->id,
            'status' => 'paid'
        ];
        $orders = Order::where($conditions)
            ->paginate(self::PAGINATION_NUMBER);
        return view('livewire.artist.order.commission-approval', ['orders' => $orders])->layout(ArtistBaseLayout::class);
    }
    public function approve($orderID)
    {
        $order = Order::where('id', $orderID)->first();
        $order->status = 'approved';
        $order->save();
        $this->dispatchBrowserEvent('orderUpdated');
    }
}