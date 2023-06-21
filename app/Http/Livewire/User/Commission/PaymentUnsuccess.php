<?php

namespace App\Http\Livewire\User\Commission;

use App\View\Components\UserBaseLayout;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Order;
use App\Models\Commission;

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

    public function checkout($commID, $orderID)
    {
        $commission = Commission::where('id', $commID)->first();
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        $commission_data = [
            'name' => $commission->title
        ];     
        $checkout_session = $stripe->checkout->sessions->create([
            'customer_email' => auth()->user()->email,
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'myr',
                        'product_data' => $commission_data,
                        'unit_amount' => $commission->price*100,
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('checkout.success',['username' => auth()->user()->username]).'?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('checkout.unsuccess',['username' => auth()->user()->username])
        ]);
        $order = Order::where('id',$orderID)->first();
        $order->session_id = $checkout_session->id;
        $order->save();
        return redirect($checkout_session->url);
    }
}
