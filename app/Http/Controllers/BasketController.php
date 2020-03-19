<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutRequest;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{
    public function basket() {
        $orderId = session('orderId');
        $order = null;
        if (!is_null($orderId)) {
            $order = Order::find($orderId);

        }
//        if (Auth::user()) {
//            $user_id = Auth::user()->id;
//            $order = Order::where('user_id', $user_id);
//        }
        return view('basket', ['order' => $order]);
    }

    public function checkout() {
        $orderId = session('orderId');
        if (is_null($orderId)) {
            return redirect()->route('index');
        }
        $order = Order::find($orderId);
        return view('checkout', ['order' => $order]);
    }

    public function confirm(CheckoutRequest $request) {
        $orderId = session("orderId");
        if (is_null($orderId)) {
            return redirect()->route('index');
        }
        $order = Order::find($orderId);
        $success = $order->confirmOrder($request->name, $request->phone);
        return redirect()->route('test');
    }

    public function add($productId){
        $orderId = session('orderId');
        if (is_null($orderId)) {
            $order = Order::create();
            session(['orderId' => $order->id]);
        } else {
            $order = Order::find($orderId);
        }

        if (Auth::check()) {
            $order->user_id = Auth::id();
            $order->save();
        }

        $order->products()->attach($productId);
        return redirect()->route('basket');
    }

    public function remove($productId) {
        $orderId = session('orderId');
        if (is_null($orderId)) {
            return redirect()->route('basket');
        }
        $order = Order::find($orderId);

        $order->products()->detach($productId);
        return redirect()->route('basket');
    }
}
