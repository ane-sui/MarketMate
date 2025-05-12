<?php

namespace App\Http\Controllers;

use App\Mail\PurchaseConfirmation;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Stripe\Checkout\Session;
use Stripe\Stripe;

class StripeController extends Controller
{
    public function index()
    {
        return view('products.index');
    }

    public function checkout(Request $request)
    {
        $productQuantity= Product::find($request->product_id);
        $stockQuantity=$productQuantity->quantity;
        $orderQuantity=$request->quantity;

        if ($stockQuantity == 0 || $stockQuantity < $orderQuantity)  {
            return abort(404);
        }

        $sale=$request->only(['product_name','product_id','quantity','price']);
        $orderDetails = [
            'customer_name' => auth()->user()->name,
            'product_name' => $request->input('product_name'),
            'order_id' => uniqid(), // Generate a unique order ID or use a database-generated ID
            'quantity' => $request->input('quantity'), // Add quantity to the order details
            'total_amount' => $request->input('price'),
        ];

        // Ensure the email is retrieved correctly from the authenticated user
        Mail::to(auth()->user()->email)->send(new PurchaseConfirmation($orderDetails));


        $request->user()->sales()->create($sale);

        Product::find($request->product_id)->decrement('quantity');

        // Mail::to(auth()->user()->email)->send(
        //     new PurchaseConfirmation
        // );


        Stripe::setApiKey(env('STRIPE_SECRET'));

        $session = Session::create([
            'line_items'  => [
                [
                    'price_data' => [
                        'currency'     => 'usd',
                        'product_data' => [
                            'name' =>$request->product_name,
                        ],
                        'unit_amount'  =>$request->price * 100,
                    ],
                    'quantity'   => $request->quantity,
                ],
            ],
            'mode'        => 'payment',
            'success_url' => route('products.index'),
            'cancel_url'  => route('products.index'),
        ]);







        // Mail::to(auth()->user()->email)->send(
        //     new PurchaseConfirmation
        // );
        return redirect()->away($session->url);
    }


}
