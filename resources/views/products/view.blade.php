<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{-- {{ __('{{$product->product_name}}') }} --}}
        </h2>
    </x-slot>
        <div class="h-screen py-8 bg-gray-100">
            <div class="container px-4 mx-auto">
                <h1 class="mb-4 text-2xl font-semibold">Shopping Cart</h1>
                <div class="flex flex-col gap-4 md:flex-row">
                    <div class="md:w-3/4">
                        <div class="p-6 mb-4 bg-white rounded-lg shadow-md">
                            <table class="w-full">
                                <thead>
                                    <tr>
                                        <th class="font-semibold text-left">Product</th>
                                        <th class="font-semibold text-left">Price</th>
                                        <th class="font-semibold text-left">Quantity</th>
                                        <th class="font-semibold text-left">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="py-4">
                                            <div class="flex items-center p-2">
                                                <img  src="{{asset($product->image)}}" class="rounded " width="20%" height="8%" alt="{{$product->name}}">
                                                <span class="p-2 font-semibold">{{$product->product_name}}</span>
                                            </div>
                                        </td>
                                        <td class="py-4">{{Number::currency($product->price,'USD')}}</td>
                                        <td class="py-4">
                                            <div class="flex items-center">
                                                <button id="add" onclick="add()" class="px-4 py-2 mr-2 border rounded-md">-</button>
                                                    <span id="quantity" class="w-8 text-center">1</span>
                                                <button id="sub" class="px-4 py-2 ml-2 border rounded-md">+</button>
                                            </div>




                                        </td>
                                        <td class="py-4">{{Number::currency($product->price,'USD')}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="md:w-1/4">
                        <div class="p-6 bg-white rounded-lg shadow-md">
                            <h2 class="mb-4 text-lg font-semibold">Summary</h2>
                            <div class="flex justify-between mb-2">
                                <span>Subtotal</span>
                                <span>--</span>
                            </div>
                            <div class="flex justify-between mb-2">
                                <span>Taxes</span>
                                <span>--</span>
                            </div>
                            <div class="flex justify-between mb-2">
                                <span>Shipping</span>
                                <span>--</span>
                            </div>
                            <hr class="my-2">
                            <div class="flex justify-between mb-2">
                                <span class="font-semibold">Total</span>
                                <span class="font-semibold">{{Number::currency($product->price,'USD')}}</span>
                            </div>
                            <form action={{route('checkout',$product)}} method="post">
                                @csrf
                                <input type="text" name="product_name" hidden value="{{$product->product_name}}">
                                <input type="text" name="price" hidden value="{{$product->price}}">
                                <input type="text" name="quantity" hidden value="1">
                                <input type="text" name="product_id" hidden value="{{$product->id}}">
                                <button name="submit"  class="w-full px-4 py-2 mt-4 text-white bg-blue-500 rounded-lg">Checkout </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            let add =document.getElementById('add');
            let sub =document.getElementById('sub');
            let quantity =document.getElementById('quantity');

            let qt=parseInt(quantity.textContent)
            const add=()=>{
                qt ++;
                quantity.textContent=qt;
;           }                                             }
        </script>





    </x-app-layout>
