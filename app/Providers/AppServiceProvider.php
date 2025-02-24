<?php

namespace App\Providers;

use App\Models\Market\Cart;
use App\Models\Menu;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFour();

        View::composer('*', function($view) {
            $menus = Menu::whereNull('parent_id')->get();
            $view->with('menus', $menus);
        });

        View::composer('*', function($view) {
            $cart = null;
            $cartItemCount = 0;
            $cartTotalPrice = 0;

            if(Auth::check()) {
                $cart = Cart::where('user_id', Auth::id())->where('status', 0)->with('cartItems.product')->first();
                $cartItemCount = $cart ? $cart->cartItems->count() : 0;
                $cartTotalPrice = $cart ? $cart->total_price : 0;
            }

            $view->with([
                'cart' => $cart,
                'cartItemCount' => $cartItemCount,
                'cartTotalPrice' => $cartTotalPrice
            ]);


        });

    }
}
