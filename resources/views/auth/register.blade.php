<x-guest-layout>
<div class="mt-20 py-35">
        <div class="flex max-w-sm mx-auto overflow-hidden bg-white rounded-lg shadow-lg lg:max-w-4xl">
            <div class="hidden bg-cover lg:block lg:w-1/2"
                style="background-image:url('https://images.unsplash.com/photo-1546514714-df0ccc50d7bf?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=667&q=80')">
            </div>

            <div class="w-full p-8 lg:w-1/2">
                <h2 class="text-2xl font-semibold text-center text-gray-700">Register</h2>
                <x-auth-session-status :status="session('status')" />

                <form  method="POST" action="{{ route('register') }}">
                    @csrf
                        <div class="mt-4">
                            <label class="block mb-2 text-sm font-bold text-gray-700">Full Name</label>
                            <input class="block w-full px-4 py-2 text-gray-700 bg-gray-200 border border-gray-300 rounded appearance-none focus:outline-none focus:shadow-outline" type="name" name="name" id="name" pattern="[a-zA-Z ]+"  value="{{old('name')}}" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <label class="block mb-2 text-sm font-bold text-gray-700">Email Address</label>
                            <input class="block w-full px-4 py-2 text-gray-700 bg-gray-200 border border-gray-300 rounded appearance-none focus:outline-none focus:shadow-outline" type="email" name="email" value="{{old('email')}}"/>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <label class="block mb-2 text-sm font-bold text-gray-700">Password</label>
                            <input class="block w-full px-4 py-2 text-gray-700 bg-gray-200 border border-gray-300 rounded appearance-none focus:outline-none focus:shadow-outline" type="password" name="password" required autocomplete="new-password"  />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <div class="flex justify-between">
                                <label class="block mb-2 text-sm font-bold text-gray-700">Confirm Password</label>
                            </div>

                            <input class="block w-full px-4 py-2 text-gray-700 bg-gray-200 border border-gray-300 rounded appearance-none focus:outline-none focus:shadow-outline" type="password" name="password_confirmation" required autocomplete="new-password"  />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

                        </div>

                        <div class="mt-8">
                            <button class="w-full px-4 py-2 font-bold text-white bg-gray-700 rounded hover:bg-gray-600">Register </button>
                        </div>

                        <div class="flex items-center justify-between mt-4">
                            <span class="w-1/5 border-b md:w-1/4"></span>
                            <a href="{{ route('login') }}" class="text-xs text-gray-500 uppercase">or Login </a>
                            <span class="w-1/5 border-b md:w-1/4"></span>
                        </div>
                </form>

            </div>
        </div>
    </div>
    <script>
        const nameInput = document.getElementById('name');

        nameInput.addEventListener('input', (event) => {
          const inputValue = event.target.value;
          const filteredValue = inputValue.replace(/[^a-zA-Z ]/g, '');
          event.target.value = filteredValue;
        });
      </script>
</x-guest-layout>
