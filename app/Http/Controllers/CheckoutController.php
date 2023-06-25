<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Conversations;
use App\Models\Messages;

class CheckoutController extends Controller
{
    public function success(Request $request)
    {
        $sessionId = $request->query('session_id');
        $order = Order::where('session_id', $sessionId)->first();
        $order->status = 'paid';
        $order->save();
        $this->checkConversation($order->user_id);
        return view('user.layouts.checkout-success');
    }

    public function checkConversation($receiverID)
    {
        $conditionOne = [
            'receiver_id' => auth()->user()->id,
            'sender_id' => $receiverID
        ];
        $conditionTwo = [
            'receiver_id' => $receiverID,
            'sender_id' => auth()->user()->id
        ];
        $checkConvo = Conversations::where($conditionOne)->orWhere($conditionTwo)->get();

        if (count($checkConvo) == 0) {
            $createConvo = Conversations::create([
                'receiver_id' => $receiverID,
                'sender_id' => auth()->user()->id
            ]);
            $createMessage = Messages::create([
                'conversations_id' => $createConvo->id,
                'sender_id' => auth()->user()->id,
                'receiver_id' => $receiverID,
                'texts' => "Hey, I am ".auth()->user()->username." I've Purchased your Commission"
            ]);
            $createConvo->last_time_message = $createMessage->created_at;
            $createConvo->save();
        } else {
            $convo = Conversations::where($conditionOne)->orWhere($conditionTwo)->first();
            $createMessage = Messages::create([
                'conversations_id' => $convo->id,
                'sender_id' => auth()->user()->id,
                'receiver_id' => $receiverID,
                'texts' => "Hey, I am ".auth()->user()->username." I've Purchased your Commission Again!"
            ]);
            $convo->last_time_message = $createMessage->created_at;
            $convo->save();
        }
    }

    public function unsuccess()
    {
        return view('user.layouts.checkout-unsuccess');
    }
}
