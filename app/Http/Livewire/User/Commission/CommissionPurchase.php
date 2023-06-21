<?php

namespace App\Http\Livewire\User\Commission;

use App\Models\Order;
use App\View\Components\UserBaseLayout;
use Livewire\Component;
use App\Models\Commission;
use Stripe\Stripe;

class CommissionPurchase extends Component
{
    public $commission;
    public $username;

    public function mount(Commission $commission)
    {
        $this->commission = $commission;
    }
    public function render()
    {
        return view('livewire.user.commission.commission-purchase')->layout(UserBaseLayout::class);
    }

    public function checkout()
    {
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        $commission_data = [
            'name' => $this->commission->title
        ];     
        
        $checkout_session = $stripe->checkout->sessions->create([
            'customer_email' => auth()->user()->email,
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'myr',
                        'product_data' => $commission_data,
                        'unit_amount' => $this->commission->price*100,
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('checkout.success',['username' => auth()->user()->username]).'?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('checkout.unsuccess',['username' => auth()->user()->username])
        ]);
        $data = [
            'artist_id' => $this->commission->artist->id,
            'user_id' => auth()->user()->id,
            'commissions_id' => $this->commission->id,
            'session_id' => $checkout_session->id,
            'status' => 'unpaid'
        ];

        Order::create($data);

        return redirect($checkout_session->url);
    }
}