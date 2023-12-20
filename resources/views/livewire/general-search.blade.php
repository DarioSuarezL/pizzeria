<form wire:submit.prevent='find' class="m-3 flex">
    <x-input id="search" class="block w-full h-full" type="text" wire:model="search" :value="old('search')"
        placeholder="Busqueda general" />
    <x-button>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            data-slot="icon" class="w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
        </svg>
    </x-button>
</form>