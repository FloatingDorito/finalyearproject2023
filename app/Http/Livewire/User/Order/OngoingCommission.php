<?php

namespace App\Http\Livewire\User\Order;

use Livewire\Component;
use Livewire\WithPagination;
use App\View\Components\UserBaseLayout;
use App\Models\User;
use App\Models\Order;

class OngoingCommission extends Component
{
    use WithPagination;
    const PAGINATION_NUMBER = 10;
    protected $paginationTheme = 'bootstrap';
    protected $user;
    public $username;
    public function mount($username)
    {
        $this->username = $username;
    }
    public function render()
    {
        $this->user = User::where('username', $this->username)->first();
        $conditions = [
            'user_id' => $this->user->id,
            'status' => 'approved'
        ];
        $orders = Order::where($conditions)
            ->paginate(self::PAGINATION_NUMBER);

        return view('livewire.user.order.ongoing-commission', ['orders' => $orders])->layout(UserBaseLayout::class);
    }
}
