<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class UserRecomendationsController extends Controller
{
    public function topPurchasedProducts()
    {
        // Assuming you have a `products` table and an `orders` table
        // with a `product_id` foreign key in the `orders` table

        $topProducts = Product::join('sales', 'products.id', '=', 'sales.product_id')
            ->select('products.*', \Illuminate\Support\Facades\DB::raw('COUNT(sales.id) as purchase_count'))
            ->groupBy('products.id')
            ->orderBy('purchase_count', 'desc')
            ->take(5)
            ->get();

        return view('products.recommendations', compact('topProducts'));
    }
}
