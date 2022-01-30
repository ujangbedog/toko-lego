<?php

namespace App\Http\Controllers\App;
use App\Http\Controllers\Controller;

use App\Models\Product;
use Illuminate\Http\Request;

class AppCartController extends Controller
{
    public function __construct()
    {
        
    }

    public function index()
    {
        return view('app.cart');
    }

    public function add($id)
    {
        $product = Product::find($id);
        if(!$product) {
            abort(404);
        }

        $cart = session()->get('cart');
        
        if(!$cart) {

            $cart = [
                $id => [
                    "name" => $product->name,
                    "quantity" => 1,
                    "price" => $product->price,
                    "image_url" => $product->image_url
                ]
            ];

            session()->put('cart', $cart);

            return redirect('/carts')->with('success', 'Product added to cart successfuly!');
        }

        if(isset($cart[$id])) {

            $cart[$id]['quantity']++;

            session()->put('cart', $cart);

            return redirect('/carts')->with('success', 'Product added to cart succesfully!');
        }

        $cart[$id] = [
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->price,
            "image_url" => $product->image_url
        ];

        session()->put('cart', $cart);

        return redirect('/carts')->with('success', 'Product added to cart succesfully!');
    }

    public function update(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
            echo json_encode(array('status' => 'ok'));
        }else{
            echo json_encode(array('status' => 'error'));
        }
    }

    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');

            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }

            session()->flash('success', 'Product removed successfully');
            
        }
    }
}
