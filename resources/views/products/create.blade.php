<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Products') }}
        </h2>
    </x-slot>

<div class="max-w-2xl p-4 mx-auto sm:p-6 lg:p-8">
            <aside class="p-4 md:w-3/3">
            <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                @csrf
                <h3 class="mb-4 text-xl font-bold text-center">Product Details</h3>
                <p class="flex justify-end mt-1 text-sm text-gray-500" id="file_input_help">SVG, PNG, JPG or GIF (MAX. 800x400px).</p>

                <input
                        type="file" name="image" id="image"
                        value="{{old('image')}}"
                        class="block w-full p-2 mb-2 border-gray-300 rounded-lg shadow-sm cursor-pointer text-md bg-gray-50 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">

                        <x-input-error :messages="$errors->get('image')" class="mt-2" />

                    <input
                        type="text" name="product_name" id="product_name" value="{{old('product_name')}}" placeholder="{{ __('Product Name') }}"
                        class="block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <x-input-error :messages="$errors->get('product_name')" class="mt-2" />

                    {{-- <label for="description" class="text-gray-700 ">Description</label> --}}
                    <input
                        name="description"
                        id="description"
                        placeholder="{{ __('Brief description for the product') }}"
                        value="{{old('description')}}"
                        class="block w-full mt-2 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />

                    <select
                        name="category"
                        id="category"
                        placeholder="{{ __('Product Category') }}"
                        value="{{old('category')}}"
                        class="block w-full mt-2 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="">Select Category</option>
                        <option value="Electronics">Electronics</option>
                        <option value="Home & Kitchen">Home & Kitchen</option>
                        <option value="Fashion">Fashion</option>
                        <option value="Beauty & Personal Care">Beauty & Personal Care</option>
                        <option value="Health & Wellness">Health & Wellness</option>
                        <option value="Books & Stationery">Books & Stationery</option>
                        <option value="Hobbies & Games">Hobbies & Games</option>
                        <option value="Automotive">Automotive</option>
                    </select>
                    <x-input-error :messages="$errors->get('category')" class="mt-2" />

                    <input
                        type="number"
                        name="price"
                        id="price"
                        placeholder="{{ __('Product Price ($USD)') }}"
                        value="{{old('price')}}"
                        step="0.01" class="block w-full mt-2 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">

                    <x-input-error :messages="$errors->get('price')" class="mt-2" />

                    {{-- <label for="quantity" class="text-gray-700 ">Quantity</label> --}}
                    <input type="number"
                        name="quantity"
                        id="quantity"
                        placeholder="{{ __('Quantity*') }}"
                        value="{{old('quantity')}}"
                        class="block w-full mt-2 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
                <x-primary-button  class="mt-4">{{ __('ADD LISTING') }}</x-primary-button>
            </form>

        </aside>
    </div>
</x-app-layout>
