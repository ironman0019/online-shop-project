<?php

namespace App\Http\Controllers\Home;

use App\Models\Market\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Market\Delivery;
use App\Models\Market\Order;
use App\Models\Market\OrderItem;
use App\Models\User\Address;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    public function orderStore(Request $request)
    {

        $request->validate([
            'delivery_type' => 'required|exists:deliveries,id',
            'address_id' => 'required|exists:addresses,id'
        ]);

        $user = Auth::user();
        $cart = Cart::where('user_id', $user->id)->where('status', 0)->with('cartItems.product')->first();

        if(!$cart || $cart->cartItems->isEmpty()) {
            return to_route('home');
        }

        try {

            DB::beginTransaction();

            $delivery = Delivery::findOrFail($request->input('delivery_type'));
            $address = Address::findOrFail($request->input('address_id'));

            $order = Order::create([
                'user_id' => $user->id,
                'address_id' => $request->input('address_id'),
                'peyment_id' => 1,
                'delivery_id' => $request->input('delivery_type'),
                'coupan_id' => $cart->coupan_id,
                'cart_id' => $cart->id,
                'address_object' => json_encode($address),
                'peyment_object' => 0,
                'delivery_object' => json_encode($delivery),
                'peyment_type' => 0,
                'peyment_status' => 0,
                'delivery_amount' => $delivery->amount,
                'delivery_status' => 0,
                'delivery_date' => $delivery->delivery_time . '-' . $delivery->delivery_time_unit,
                'order_final_amount' => $cart->total_price,
                'order_discount_amount' => $cart->total_discount_price,
                'order_total_discount_amount' => $cart->total_price - $cart->total_discount_price,
                'order_status' => 0,
            ]);

            foreach($cart->cartItems as $item) {

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product->id,
                    'product_object' => json_encode($item),
                    'quantity' => $item->quantity,
                    'price' => $item->product->price,
                    'total_price' => $item->total_price,
                    'status' => 0,
                ]);

            };

            $cart->update(['status' => 1]);
            DB::commit();

            return to_route('home')->with('success', 'سفارش شما ثبت شد');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Something went wrong');
        }



    }


}
