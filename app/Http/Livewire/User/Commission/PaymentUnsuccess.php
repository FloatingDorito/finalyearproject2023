<?php

namespace App\Http\Livewire\User\Commission;

use App\View\Components\UserBaseLayout;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Order;

class PaymentUnsuccess extends Component
{
    use WithPagination;
    const PAGINATION_NUMBER = 5;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {

        $conditions = [
            'status' => 'unpaid',
            'user_id' => auth()->user()->id
        ];
        $orders = Order::where($conditions)
        ->paginate(self::PAGINATION_NUMBER);

        return view('livewire.user.commission.payment-unsuccess', ['orders' => $orders])->layout(UserBaseLayout::class);
    }
}
