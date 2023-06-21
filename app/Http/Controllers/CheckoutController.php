<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class CheckoutController extends Controller
{
    public function success(Request $request)
    {
        $sessionId = $request->query('session_id');
        $order = Order::where('session_id', $sessionId)->first();
        $order->status = 'paid';
        $order->save();

        return view('user.layouts.checkout-success');
    }

    public function unsuccess()
    {

        return view('user.layouts.checkout-unsuccess');
    }
}
