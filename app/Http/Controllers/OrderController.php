<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function createOrder(Request $request)
    {

        //number 	status 	amount 	fromCurrency 	toCurrency 	rate 	description 	sender 	recipient 	agent 	agent2 	total 	source
        $prefix = 'ORD';
        $zeroFillLength = 6;
        $nextOrderId = Order::max('id') + 1;
        $orderNumber = $prefix . str_pad($nextOrderId, $zeroFillLength, '0', STR_PAD_LEFT);

        $order = new Order();
        $order->number = $orderNumber;
        $order->status = 'initiated';
        $order->amount = $request->input('amount');
        $order->fromCurrency = $request->input('fromCurrency');
        $order->toCurrency = $request->input('toCurrency');
        $order->rate = $request->input('rate');
        $order->sender = Auth::id();
        $order->recipient = $request->recipient;
        $order->save();

        return view('transactions.confirm')->with('order', $order);
    }

    public function confirmOrder(Request $request)
    {
        $data = [];
        //check if user with the phone number and id number exists in the system
        $user = User::where('number', $request->input('phone'))->where('national_id', $request->input('national_id'))->first();

        return view('transactions.confirm')->with('data', $data);
    }
}
