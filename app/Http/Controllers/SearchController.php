<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke()
    {
        $products = Product::query()
            ->where('product_name', 'LIKE', '%'.request('q').'%')
            ->orWhere('category', 'LIKE', '%'.request('q').'%')
            ->get();

        return view('products.results', ['products' => $products]);
    }
}
