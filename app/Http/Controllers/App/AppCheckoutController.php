<?php

namespace App\Http\Controllers\App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
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
    public function success()
    {
        return view('app.success');
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

    public function store(Request $request)
    {
        $this->validate(request(), [
            'address' => 'required',
            'address2' => 'required',
            'city' => 'required',
            'province' => 'required',
            'number' => 'required',
            'zip_code' => 'required'
        ]);

        //Get total price
        $cart = session()->get('cart');
        $total_price = 0;
        foreach ( $cart as $id => $product) {
            $total_price += $product['price'] * $product['quantity'];
        }
        //Get total price

        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->status = 'PENDING';
        $order->address = $request->post('address');
        $order->address_line2 = $request->post('address2');
        $order->city = $request->post('city');
        $order->province = $request->post('province');
        $order->phone_number = $request->post('number');
        $order->zip_code = $request->post('zip_code');
        $order->total_price = $total_price;
        $order->save();

        //Save Order Item
        foreach ( $cart as $id => $product) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $id;
            $orderItem->quantity = $product['quantity'];
            $orderItem->price = $product['price'];
            $orderItem->Save();
        }

        // remove chart session
        session()->forget('cart');
        // remove chart session

        return redirect('checkout/success');
    }
}
