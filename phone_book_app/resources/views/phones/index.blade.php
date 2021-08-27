<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Phone Book') }}
        </h2>
    </x-slot>

    <div >
        <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="block mb-8">
                <a href="{{ route('phones.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Add Phone Number</a>
            </div>
            <div class="flex flex-col">
                @livewire('search.phone-search')
            </div>

        </div>
    </div>
</x-app-layout>
