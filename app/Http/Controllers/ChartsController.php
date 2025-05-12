<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
use App\Models\User;

class ChartsController extends Controller
{
    public function charts()
    {
        // User chart data (same as before)
        $userData = User::selectRaw("DATE(created_at) as date, COUNT(*) as aggregate")
            ->whereDate('created_at', '>=', now()->subDays(30))
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $userLabels = $userData->pluck('date');
        $userCounts = $userData->pluck('aggregate');

        // Category chart data
        $categoryData = Product::selectRaw("category, COUNT(*) as aggregate")
            ->groupBy('category')
            ->orderBy('aggregate', 'desc') // Order by category popularity
            ->get();

        $categoryLabels = $categoryData->pluck('category');
        $categoryCounts = $categoryData->pluck('aggregate');

        // Sales chart data
        $salesData = Sale::selectRaw("product_name, COUNT(*) as aggregate")
            ->groupBy('product_name')
            ->orderBy('aggregate', 'desc') // Order by sales count
            ->take(10) // Get the top 10 most popular products
            ->get();

        $salesLabels = $salesData->pluck('product_name');
        $salesCounts = $salesData->pluck('aggregate');

        return view('users.charts', compact('userLabels', 'userCounts', 'categoryLabels', 'categoryCounts', 'salesLabels', 'salesCounts'));
    }
}
