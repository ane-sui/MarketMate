@if ($topProducts)
<h1 class="mb-4 text-2xl font-bold">Product Recomendations</h1>
<ul class="flex flex-wrap mb-0 list-none">
    @forelse($topProducts as $product)
        <li class="flex items-center px-4 py-2 mb-4 mr-4 transition duration-300 ease-in-out bg-white border border-gray-200 rounded-md hover:bg-gray-100">
            <img src="{{ $product->image }}" alt="{{$product->product_name}}" class="object-cover w-8 h-8 ml-2 mr-4 rounded-md">
            <a href="{{ route('products.show', $product) }}" class="text-sm text-gray-800">
                {{ $product->product_name }}
            </a>
            <span class="ml-auto text-xs text-gray-600">({{ $product->purchase_count }} purchases)</span>
        </li>
    @empty
        <li class="text-sm text-gray-600">Nothing to display at the moment.</li>
    @endforelse
</ul>
@endif
