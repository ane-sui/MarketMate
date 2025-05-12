<x-app-layout>
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
                                            <div class="flex items-center">
                                                <img class="w-16 h-16 mr-4" src="https://via.placeholder.com/150" alt="Product image">
                                                <span class="font-semibold">{{$product->product_name}}</span>
                                            </div>
                                        </td>
                                        <td class="py-4">{{Number::currency($product->price,'USD')}}</td>
                                        <td class="py-4">
                                            <div class="flex items-center">
                                                <button class="px-4 py-2 mr-2 border rounded-md">-</button>
                                                <span class="w-8 text-center">1</span>
                                                <button class="px-4 py-2 ml-2 border rounded-md">+</button>
                                            </div>
                                        </td>
                                        <td class="py-4">$TOTAL</td>
                                    </tr>

                                <!-- More product rows -->
                            </tbody>

                        </table>
                    </div>
                </div>
                <div class="md:w-1/4">
                    <div class="p-6 bg-white rounded-lg shadow-md">
                        <h2 class="mb-4 text-lg font-semibold">Summary</h2>
                        <div class="flex justify-between mb-2">
                            <span>Subtotal</span>
                            <span>{{Cart::instance('cart')->subtotal()}}</span>

                            {{-- <span>{{Number::currency($item->subtotal(),'USD')}}</span> --}}
                        </div>
                        <div class="flex justify-between mb-2">
                            <span>Taxes</span>
                            <span>{{Cart::instance()->tax()}}</span>
                        </div>
                        <div class="flex justify-between mb-2">
                            <span>Shipping</span>
                            <span>FREE</span>
                        </div>
                        <hr class="my-2">
                        <div class="flex justify-between mb-2">
                            <span class="font-semibold">Total</span>
                            <span class="font-semibold">{{Cart::instance()->total()}}</span>
                        </div>
                        <a  href=""class="w-full px-4 py-2 mt-4 text-white bg-blue-500 rounded-lg">Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>







{{-- <x-panel class="flex flex-col w-1/3 mt-4 text-center">
    <div class="self-start text-sm">{{ $product->name }}</div>
    <div class="py-8">
        <h3 class="text-xl font-bold transition-colors duration-300 group-hover:text-blue-800">
            <a href="{{route('products.show', $product)}}" target="_blank">{{ $product->product_name }}</a>
        </h3>
        <p class="mt-4 text-sm">{{ $product->price }}</p>
    </div>

    <div class="flex items-center justify-between mt-auto">
        <div>
            {{$product->description}}
        </div>

        <div>
            @if (auth()->user()->id !== $product->user_id)
                <x-primary-button>CHECKOUT</x-primary-button>
                <x-secondary-button>REVIEW</x-secondary-button>
            @else
                {{-- <x-primary-button><a href= {{route('products.edit',$product)}}> EDIT</a>
                </x-primary-button>
                <x-secondary-button>DELETE</x-secondary-button> --}}
            {{-- @endif --}}

        {{-- </div>
    </div>
</x-panel> --}}
