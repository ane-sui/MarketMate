<?php

namespace App\Http\Controllers;

use App\Mail\ProductListed;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('products.index', [
            'products' => Product::where('quantity', '>',"0")->with('user')->latest()->paginate(6)
        ]);
    }

    public function view(Product $product)
    {
         return view('products.cart', compact('product'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'product_name'=> 'required|string|max:255',
            'description'=> 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,jpg,svg,png|max:2048',
            'category'=> 'required|string|max:255',
            'price'=> 'required|numeric',
            'quantity'=> 'required|numeric',
        ]);

        $request->file('image')->store('public/uploads/images');


        $validated['image']=$request->file('image')->store('images');

        $request->user()->products()->create($validated);

        Mail::to(auth()->user()->email)->send(
            new ProductListed()
        );

        return redirect(route('products.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
         return view('products.view', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        Gate::authorize('update', $product);

        return view('products.edit', [
            'product' => $product,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        Gate::authorize('update', $product);

        $validated = $request->validate([
            'product_name'=> 'required|string|max:255',
            'description'=> 'required|string|max:255',
            'category'=> 'required|string|max:255',
            'price'=> 'required|numeric',
            'image'=> 'sometimes|image',
            'quantity'=> 'required|string|max:255',
        ]);

        // $request->file('image')->getClientOriginalExtension();
        // $request->file('image')->store('public/uploads/images');

        // dd($request->image);
        if ($request->hasFile('image')) {
            File::delete(storage_path('public/uploads/images/'.$product->image));

            $validated['image']=$request->file('image')->store('images');
        }

        $product->update($validated);

        return redirect(route('products.index'));
    }


    public function destroy(Product $product)
    {
        // Gate::authorize('delete', $product);
        File::delete(storage_path('public/uploads/images/'.$product->image));
        $product->delete();

        return redirect(route('products.index'));
    }
}
