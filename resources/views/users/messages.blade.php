<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Messages') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="mb-4 text-2xl font-bold text-center">Messages Inbox</h1>
                        <ul class="flex flex-wrap mb-0 list-none">
                            @forelse($messages as $message)
                                <li class="flex items-center px-4 py-2 mb-4 mr-4 border border-gray-200 rounded-md bg-white hover:bg-gray-100 transition duration-300 ease-in-out">
                                    <a href="{{ route('messages.show', $message) }}" class="text-sm text-gray-800">
                                        {{ $message->name }}
                                    </a>
                                    <span class="ml-auto text-xs text-gray-600">({{ $message->email }} purchases)</span>
                                </li>
                            @empty
                                <li class="text-sm text-gray-600">No top purchased products to display.</li>
                            @endforelse
                    </ul>
                    <div class="mt-4">
                        {{ $messages->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
