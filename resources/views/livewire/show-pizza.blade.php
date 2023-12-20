<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}

    <div class="bg-white m-2 rounded-lg flex border">
        <img src="{{$pizza->imagen_url}}" class="rounded-l-lg" width="500" alt="{{$pizza->nombre}}">
        <div class=" flex flex-col justify-center">
            <p class=" pt-3 px-3 text-xl font-bold ">{{$pizza->nombre}}</p>
            <p class=" px-3"><span class="font-bold">Precio:</span> {{$pizza->precio}} Bs.</p>
            <p class=" px-3 lowercase">
                <span class="font-bold capitalize">Descripción: </span>
                {{$pizza->descripcion}}
            </p>

            {{-- formulario para cantidad de compra --}}
            <form wire:submit.prevent='carrito' class="px-3 mt-5">
                <x-label for="cantidad" value="{{ __('Cantidad') }}"/>
                <x-input type="number" wire:model="cantidad" id="cantidad" min="1" value="{{old('cantidad')}}"/>
                <x-button>
                    Agregar al carrito
                </x-button>
            </form>

        </div>
    </div>

</div>
