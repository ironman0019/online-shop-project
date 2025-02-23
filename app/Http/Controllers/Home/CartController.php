<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Market\Cart;
use App\Models\Market\CartItem;
use App\Models\Market\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function showCart()
    {

    }

    public function addToCart($id)
    {
        $product = Product::findOrFail($id);
        $user = Auth::user();

        $cart = Cart::firstOrCreate(
            ['user_id' => $user->id], 
            ['total_price' => 0, 'total_discount_price' => 0, 'expired_at' => now()->addDays(7)]
        );

        $cartItem = CartItem::where('cart_id', $cart->id)->where('product_id', $product->id)->first();

        if($cartItem) {
            $cartItem->increment('quantity');
            $cartItem->update(['total_price' => $cartItem->quantity * $product->price]);
        } else {
            CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $product->id,
                'quantity' => 1,
                'total_price' => $product->price
            ]);
        }

        $totalPrice = CartItem::where('cart_id', $cart->id)->sum('total_price');
        $cart->update(['total_price' => $totalPrice]);

        return back()->with('success', 'محصول با موفقیت به سبد خرید اضافه شد');
    }

    public function removeFromCart()
    {

    }
}
