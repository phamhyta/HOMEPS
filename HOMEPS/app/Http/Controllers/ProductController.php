<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::get();
        return view('front-end.products.home', compact(['products']));
    }

    //show shopping cart
    public function cart()
    {
        $cart = session()->get('cart');
        $total = 0;
        $quantity = 0;
        foreach($cart as $c) {
            $quantity += $c['quantity'];
            $total += $c['quantity'] * $c['price'];
        }
        $products = Product::get();
        return view('front-end.products.cart', compact(['products', 'cart', 'total', 'quantity']));
    }


    //addToCart
    public function addToCart($id)
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
                    "id" => $id,
                    "name" => $product->name,
                    "quantity" => 1,
                    "price" => $product->price,
                    "photo" => $product->url_image,
                ]
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
        }
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "id" => $id,
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->price,
            "photo" => $product->url_image,
        ];
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    //Update cart
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

    //Remove from cart
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            return redirect()->back()->with('success', 'Product removed successfully');
        }
    }


    // Show selected product details
    public function show_detail($id)
    {
        $product = Product::where('id', '=', $id)->first();
        $thumbnail = explode(",", $product->thumbnail);
        $thumbnail[0] = str_replace("[", "", $thumbnail[0]);
        $thumbnail[sizeof($thumbnail)-1] = str_replace("]", "", $thumbnail[sizeof($thumbnail)-1]);
        for ($x = 0; $x < sizeof($thumbnail); $x++) {
            $thumbnail[$x] = str_replace("\"", "", $thumbnail[$x]);
        }
        return view('front-end.products.detail', compact(['product', 'thumbnail']));
    }
}