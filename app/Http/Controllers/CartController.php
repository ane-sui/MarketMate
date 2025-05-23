<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Surfsidemedia\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    Public function index(Product $product)
    {
        $products= Cart::instance('cart')->content();
        return view('products.cart', compact('products'));
    }

    public function addToCart(Request $request)
    {
        Cart::instance('cart')->add($request->id,$request->name.$request->quantity,$request->price)->associate('App\Models\Product');
        return redirect()->back();
    }
}

