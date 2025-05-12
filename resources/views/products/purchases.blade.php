<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Purchases') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <div class="grid grid-cols-1 gap-10 sm:grid-cols-2 md:grid-cols-3">
                    @forelse ($items as $product)
                    <div class="flex flex-col mb-3 overflow-hidden rounded shadow-lg">
                        <a href="#"></a>
                        <div class="relative"><a href="#">
                                <div
                                    class="absolute top-0 bottom-0 left-0 right-0 transition duration-300 bg-gray-900 opacity-25 hover:bg-transparent">
                                </div>
                            </a>
                        </div>
                        <div class="px-6 py-4 mb-auto">
                            <a href="#"
                                class="inline-block mb-2 text-lg font-medium transition duration-500 ease-in-out hover:text-indigo-600">
                            Product Name: {{$product->product_name}}  {{$product->quantity}}
                            </a>
                            <a href="#"
                                class="inline-block mb-2 text-lg font-medium transition duration-500 ease-in-out hover:text-indigo-600">
                            Quantity: {{$product->quantity}}
                            </a>
                            <p class="text-gray-500 text-m">
                                {{ $product->created_at->format('j M Y') }}
                                <small>{{$product->description}}</small>
                            </p>
                        </div>
                        <div class="flex flex-row items-center justify-between px-6 py-3 bg-gray-100">
                            <span href="#" class="flex flex-row items-center py-1 mr-1 text-xs text-gray-900 font-regular">
                                @if (auth()->user()->id !== $product->user_id)
                                <svg height="13px" width="13px" version="1.1" id="Layer_1"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                    y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;"
                                    xml:space="preserve">
                                    <g>
                                        <g>
                                            <path
                                                d="M256,0C114.837,0,0,114.837,0,256s114.837,256,256,256s256-114.837,256-256S397.163,0,256,0z M277.333,256 c0,11.797-9.536,21.333-21.333,21.333h-85.333c-11.797,0-21.333-9.536-21.333-21.333s9.536-21.333,21.333-21.333h64v-128 c0-11.797,9.536-21.333,21.333-21.333s21.333,9.536,21.333,21.333V256z">
                                            </path>
                                        </g>
                                    </g>
                                </svg>
                                <span class="ml-1">
                                    <div>
                                            <small class="ml-2 text-sm text-gray-600">{{ $product->created_at->format('j M Y') }}</small>
                                            @unless ($product->created_at->eq($product->updated_at))
                                                <small class="text-sm text-gray-600"> &middot; {{ __('edited') }}</small>
                                            @endunless
                                    </div>
                                    @endif
                                </span>
                            </span>

                            <span href="#" class="flex flex-row items-center py-1 mr-1 text-xs text-gray-900 font-regular">
                            </span>
                        </div>
                    </div>
                    @empty
                        <h2>You haven't made any orders yet...😊</h2>
                    @endforelse
                </div>
            </div>
          <div class="m-4">
            {{ $items->links() }}
        </div>

            </div>

        </div>
    </div>

</x-app-layout>
