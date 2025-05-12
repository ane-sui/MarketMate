<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(){

        return view('products.shop', [
        'products' => Product::where('user_id',auth()->user()->id)->latest()->paginate(6),
        ]);

    }
}
