<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
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
        
        // if cart is empty then this the first product
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

        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {

            $cart[$id]['quantity']++;

            session()->put('cart', $cart);

            return redirect('/carts')->with('success', 'Product added to cart succesfully!');
        }

        // if item not exist in cart then add to cart with quantity = 1
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
