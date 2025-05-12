<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Contact Us') }}
        </h2>
    </x-slot>
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div id="contact-us" class="overflow-hidden bg-white py-16 px-4  sm:px-6 lg:px-8 lg:py-24">
                            <div class="relative mx-auto max-w-xl">
                                <svg class="absolute left-full translate-x-1/2 transform" width="404" height="404" fill="none"
                                    viewBox="0 0 404 404" aria-hidden="true">
                                    <defs>
                                        <pattern id="85737c0e-0916-41d7-917f-596dc7edfa27" x="0" y="0" width="20" height="20"
                                            patternUnits="userSpaceOnUse">
                                            <rect x="0" y="0" width="4" height="4" class="text-gray-200 dark:text-slate-600"
                                                fill="currentColor"></rect>
                                        </pattern>
                                    </defs>
                                    <rect width="404" height="404" fill="url(#85737c0e-0916-41d7-917f-596dc7edfa27)"></rect>
                                </svg>
                                <svg class="absolute right-full bottom-0 -translate-x-1/2 transform" width="404" height="404" fill="none"
                                    viewBox="0 0 404 404" aria-hidden="true">
                                    <defs>
                                        <pattern id="85737c0e-0916-41d7-917f-596dc7edfa27" x="0" y="0" width="20" height="20"
                                            patternUnits="userSpaceOnUse">
                                            <rect x="0" y="0" width="4" height="4" class="text-gray-200 dark:text-slate-800"
                                                fill="currentColor"></rect>
                                        </pattern>
                                    </defs>
                                    <rect width="404" height="404" fill="url(#85737c0e-0916-41d7-917f-596dc7edfa27)"></rect>
                                </svg>
                                <div class="text-center">
                                    <h2 class="text-3xl font-extrabold tracking-tight text-gray-900  sm:text-4xl">Contact Us
                                    </h2>
                                    <p class="mt-4 text-lg leading-6 text-gray-500 dark:text-slate-400">Please use the form below to contact us.
                                        Thank you!
                                    </p>
                                </div>
                                <div class="mt-12">
                                    <form class="grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-8" action="{{route('messages.store')}}" method="Post">
                                        @csrf
                                        <div class="sm:col-span-2">
                                            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-slate-400">Name</label>
                                            <div class="mt-1">
                                                <input name="name" type="text" id="name" value="{{ auth()->user()->name}}" class="border border-gray-300 block w-full rounded-md py-3 px-4 shadow-sm focus:border-sky-500 focus:ring-sky-500 ">
                                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                            </div>
                                        </div>
                                        <div class="sm:col-span-2">
                                            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-slate-400">Email</label>
                                            <div class="mt-1">
                                                <input name="email" id="email" value="{{ auth()->user()->email}}" type="email" autocomplete="email"  class="border border-gray-300 block w-full rounded-md py-3 px-4 shadow-sm focus:border-sky-500 focus:ring-sky-500">
                                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                            </div>
                                        </div>
                                        <div class="sm:col-span-2">
                                            <label for="message" class="block text-sm font-medium text-gray-700 dark:text-slate-400">Message</label>
                                            <div class="mt-1">
                                                <textarea required name="message" id="message" rows="4" class="border border-gray-300 block w-full rounded-md py-3 px-4 shadow-sm focus:border-sky-500 focus:ring-sky-500  " value="{{old('message')}}"></textarea>
                                                <x-input-error :messages="$errors->get('message')" class="mt-2" />

                                            </div>
                                        </div>
                                        <div class="flex justify-end sm:col-span-2">
                                            <button type="submit" class="inline-flex items-center rounded-md px-4 py-2 font-medium focus:outline-none focus-visible:ring focus-visible:ring-sky-500 shadow-sm sm:text-sm transition-colors duration-75 text-sky-500 border border-sky-500 hover:bg-sky-50 active:bg-sky-100 disabled:bg-sky-100  disabled:cursor-not-allowed">
                                                <span>Send Message</span>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    {{-- @auth --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/assets/css/chat.min.css">
    <script>
        var botmanWidget = {
            aboutText: 'Start the conversation with Hi',
            introMessage: 'Hi 🙋‍♂️my name is Laura and im hear to help you. Use Keywords: Products, Policy, Shipping, Payment to View FAQs ✨⁉🤗.'
        };
    </script>
<script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>
{{-- @endauth --}}

</x-app-layout>
