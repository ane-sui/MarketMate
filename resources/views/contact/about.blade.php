<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('About Us') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- @include('products.show') --}}
                    <div class="items-center max-w-screen-xl sm:flex">
                        <div class="p-10 sm:w-1/2">
                            <div class="object-center text-center image">
                                <img src="https://i.imgur.com/WbQnbas.png">
                            </div>
                        </div>
                        <div class="p-5 sm:w-1/2">
                            <div class="text">
                                <span class="text-gray-500 uppercase border-b-2 border-indigo-600">About Our Company</span>
                                <h2 class="my-4 text-3xl font-bold sm:text-4xl "> <span class="text-indigo-600">MarketMate</span>
                                </h2>
                                <p class="text-gray-700">
                                    <p class="mb-8 leading-relaxed">
                                        MarketMate is a vibrant online marketplace connecting buyers and sellers in Zimbabwe. Our platform offers a convenient and secure way to discover a wide range of products and services, from electronics and fashion to home goods and groceries.
                                    </p>
                                </p>
                            </div>
                        </div>
                    </div>
            </div>

        </div>

    </div>
</x-app-layout>
