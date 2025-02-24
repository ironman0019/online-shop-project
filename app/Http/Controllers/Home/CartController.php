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
        $user = Auth::user();
        $cart = Cart::where('user_id', $user->id)->where('status', 0)->with('cartItems.product')->first();
        return view('app.cart', compact('cart'));
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

        // First check if product avilable for sale
        if($cartItem->quantity < $product->marketable_number) {
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
        } else {
            return back()->with('error', 'موجودی محصول تمام شد!');
        }


        $this->updateCartTotalPrice($cart);

        return back()->with('success', 'محصول با موفقیت به سبد خرید اضافه شد');
    }

    public function decreaseItem($id)
    {
        $cartItem = CartItem::findOrFail($id);

        if($cartItem->quantity > 1) {
            $cartItem->decrement('quantity');
            $cartItem->update(['total_price' => $cartItem->quantity * $cartItem->product->price]);
        }
        else
        {
            $this->removeFromCart($id);
            return back()->with('success', 'محصول با موفقیت حذف شد');
        }

        $this->updateCartTotalPrice($cartItem->cart);
        return back()->with('success', 'تعداد محصول کاهش یافت');
    }

    private function updateCartTotalPrice($cart)
    {
        $totalPrice = $cart->cartItems()->sum('total_price');
        $cart->update(['total_price' =>  $totalPrice]);
    }

    public function removeFromCart($id)
    {
        $cartItem = CartItem::findOrFail($id);
        $cart = $cartItem->cart;

        $cartItem->delete();

        $this->updateCartTotalPrice($cart);

        return back()->with('success', 'محصول با موفقیت حذف شد');

    }
}
