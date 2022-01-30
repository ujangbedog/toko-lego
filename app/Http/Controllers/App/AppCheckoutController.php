<?php

namespace App\Http\Controllers\App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;

class AppCheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $orders=Order::where('user_id', '=', Auth::user()->id)->get();
        return view('app.checkout', compact('orders'));
    }
    public function create()
    {
        $cart = session()->get('cart');
        if($cart) {
            return view('app.checkout');
        } else {
            return redirect('/products');
        }
    }
}
