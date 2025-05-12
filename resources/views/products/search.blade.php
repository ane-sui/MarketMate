<div class="flex items-center justify-center py-3 flex-2">
    <div class="w-full max-w-lg">
        <form class="mt-5 sm:flex sm:items-center" action="/search">
            @csrf
            <input id="q" name="q" class="inline w-full py-2 pl-3 pr-3 leading-5 placeholder-gray-500 bg-white border border-gray-300 rounded-md focus:border-indigo-500 focus:placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-indigo-500 sm:text-sm" placeholder="Product Name" type="search" autofocus="" value="">

            <button type="submit" class="inline-flex items-center justify-center w-full px-4 py-2 mt-3 font-medium text-white bg-gray-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Search</button>

        </form>
    </div>
</div>
