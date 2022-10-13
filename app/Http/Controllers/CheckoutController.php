<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\PaymentMethod;
use App\Models\ShippingType;
use Cart;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = Cart::getContent();
        $payments = PaymentMethod::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $shippings = ShippingType::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');
        return view('checkout.index',compact('cart','payments','shippings'));
    }

    public function checkout(StoreOrderRequest $request)
    {
        if (Cart::isEmpty()) {
            return redirect()->back();
        }
        $order = Order::create($request->all());

        $cart = Cart::getContent();
        foreach ($cart as $cartItem) {
            $orderItem = new OrderItem();
            $orderItem->product_id = $cartItem->id;
            $orderItem->quantity = $cartItem->quantity;
            $order->items()->save($orderItem);
        }
        Cart::clear();
        /*if ($request->input('payment_type') == Payment::CARD_MOBILE_MONEY) {
            return redirect()->route('order.pay.card', ['id' => encryptId($order->id)]);
        } else {
            return redirect()->route('order.success', ['id' => encryptId($order->id)]);
        }*/
        return redirect()->back();
    }
}
