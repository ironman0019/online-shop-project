<?php

namespace App\Http\Controllers\Home\Customer;

use App\Models\Market\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Market\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    public function index()
    {

        $orders = Order::where('user_id', auth()->user()->id)->where('order_status', 0)->filter(request(['status']))->with('orderItems.product')->get();
        
        return view('app.profile.my-orders', compact('orders'));
    }

}
