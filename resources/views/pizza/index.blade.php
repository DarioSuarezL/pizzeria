<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Menú') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @if (session('success'))
                <div class="bg-green-600 p-2 rounded-lg text-center">
                    <p class="text-white">{{session('success')}}</p>
                </div>
                @endif
                <livewire:list-pizzas>
            </div>
        </div>
    </div>
</x-app-layout>
