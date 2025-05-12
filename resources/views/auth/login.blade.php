<!-- https://play.tailwindcss.com/MIwj5Sp9pw -->
<x-guest-layout>
<div class="py-40 mt-30">
    <div class="flex max-w-sm mx-auto overflow-hidden bg-white rounded-lg shadow-lg lg:max-w-4xl">
        <div class="hidden bg-cover lg:block lg:w-1/2"
            style="background-image:url('https://images.unsplash.com/photo-1546514714-df0ccc50d7bf?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=667&q=80')">
        </div>

        <div class="w-full p-8 lg:w-1/2">
            <h2 class="text-2xl font-semibold text-center text-gray-700">Login</h2>
            <x-auth-session-status :status="session('status')" />
            <form  method="POST" action="{{ route('login') }}">
                @csrf
                    <div class="mt-4">
                        <label class="block mb-2 text-sm font-bold text-gray-700">Email Address</label>
                        <input class="block w-full px-4 py-2 text-gray-700 bg-gray-200 border border-gray-300 rounded appearance-none focus:outline-none focus:shadow-outline" type="email" name="email" value="{{old('email')}}" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <div class="flex justify-between">
                            <label class="block mb-2 text-sm font-bold text-gray-700">Password</label>
                      @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-xs text-gray-500">Forget Password?</a>
                        </div>

                        <input class="block w-full px-4 py-2 text-gray-700 bg-gray-200 border border-gray-300 rounded appearance-none focus:outline-none focus:shadow-outline" type="password" name="password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />

                    </div>
                    <!-- Remember Me -->
                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="text-indigo-600 border-gray-300 rounded shadow-sm focus:ring-indigo-500" name="remember">
                            <span class="text-sm text-gray-600 ms-2">{{ __('Remember me') }}</span>
                        </label>
                    </div>
                    @endif

                    <div class="mt-8">
                        <button class="w-full px-4 py-2 font-bold text-white bg-gray-700 rounded hover:bg-gray-600">Login</button>
                    </div>

                    <div class="flex items-center justify-between mt-4">
                        <span class="w-1/5 border-b md:w-1/4"></span>
                        <a href="{{ route('register') }}" class="text-xs text-gray-500 uppercase">or Register </a>
                        <span class="w-1/5 border-b md:w-1/4"></span>
                    </div>
            </form>

        </div>
    </div>
</div>
</x-guest-layout>
