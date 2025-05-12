<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Products') }}
        </h2>
    </x-slot>

<section class="w-full">
    <div class="w-full h-[520px] bg-[url('https://images.unsplash.com/photo-1573855619003-97b4799dcd8b?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')] bg-cover bg-no-repeat bg-center flex flex-col justify-center items-center ">
        <div>
            <h1 class="text-white text-start xl:text-5xl lg:text-4xl md:text-3xl sm:text-2xl xs:text-xl font-semibold bg-gray-800 p-4 bg-opacity-80 rounded-sm">Discover Your New Home</h1>
        </div>
        <div class="w-full mx-auto">
            {{-- <form>
                <div class="xl:w-1/2 lg:w-[60%] md:w-[70%] sm:w-[70%] xs:w-[90%] mx-auto flex gap-2 md:mt-6 xs:mt-4 ">
                    <input type="text" class="border border-gray-400 w-full p-2 rounded-md text-xl pl-2"
                            placeholder="" />
                    <button type="submit" class="px-[10px] p-[10px] bg-blue-500 text-lg text-white rounded-md font-semibold">Search</button>
                </div>
            </form> --}}
        </div>
    </div>
</section>

    <div class="py-6">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                {{-- <div class="p-6 text-gray-900">
                    @include('products.recommendations')
                </div> --}}
                <div class="p-6 text-gray-900">
                    @include('products.show')
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
