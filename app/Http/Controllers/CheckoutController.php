<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\PaymentMethod;
use App\Models\ShippingType;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = Cart::getContent();
        $payments = PaymentMethod::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $shipping = ShippingType::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('checkout.index', compact('cart', 'payments', 'shipping'));
    }

    public function checkout(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'mobile' => 'required|min:10',
            'email' => 'required|email',
            'shipping_address' => 'required',
            'payment_method_id' => 'integer|required',
            'shipping_type_id' => 'integer|required',
            'total' =>'required',

        ]);
        if (Cart::isEmpty()) {
            return redirect()->route('shop');
        }
        DB::beginTransaction();
        $order = new Order();
        $order->name=$request->input('name');
        $order->mobile=$request->input('mobile');
        $order->email=$request->input('email');
        $order->shipping_address=$request->input('shipping_address');
        $order->payment_method_id=$request->input('payment_method_id');
        $order->shipping_type_id=$request->input('shipping_type_id');
        $order->total=Cart::getSubTotal();
        $order->status='Pending';
        $order->save();


        $cart = Cart::getContent();
        foreach ($cart as $cartItem) {
            $orderItem = new OrderItem();
            $orderItem->product_id = $cartItem->id;
            $orderItem->quantity = $cartItem->quantity;
            $order->items()->save($orderItem);
        }
        $order->setOrderNo('ORD-');

        DB::commit();
        Cart::clear();
        /*if ($request->input('payment_type') == Payment::CARD_MOBILE_MONEY) {
            return redirect()->route('order.pay.card', ['id' => encryptId($order->id)]);
        } else {
            return redirect()->route('order.success', ['id' => encryptId($order->id)]);
        }*/
        dd($order);
//        return redirect()->route('welcome');
    }
}
