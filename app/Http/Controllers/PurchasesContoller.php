<?php

namespace App\Http\Controllers;
use App\Models\Sale;
use Illuminate\Http\Request;

class PurchasesContoller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('products.purchases', [
            'items' => Sale::where('user_id',auth()->user()->id)->latest()->paginate(6),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sale $product)
    {
        // Gate::authorize('delete', $product);
        $product->delete();

        return redirect(route('purchases.index'));
    }
}
