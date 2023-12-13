<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    <div class="flex justify-between">
        <h1 class="mt-3 text-2xl font-medium text-gray-900">
            Formulario de pizzas
        </h1>
    </div>

    <div class="flex flex-col justify-center">
        <form wire:submit.prevent='store'>
            {{-- method="POST" action="{{route('pizzas.store')}}" enctype="multipart/form-data" --}}
            <div class="mt-5">
                <x-label for="nombre" value="{{ __('Nombre') }}" />
                <p class="text-sm">Procure poner el nombre con el tamaño</p>
                <x-input id="nombre" class="block mt-1 w-full" type="text" wire:model="nombre" :value="old('nombre')" placeholder="CHESSEBURGER - GRANDE" autofocus/>
            </div>

            <div class="mt-5">
                <x-label for="precio" value="{{ __('Precio') }}" />
                <p class="text-sm">Ponga punto (.) para los decimales</p>
                <x-input id="precio" class="block mt-1 w-full" type="text" wire:model="precio" :value="old('precio')" placeholder="56.00"/>
            </div>

            <div class="mt-5">
                <x-label for="tamano" value="{{ __('Tamaño') }}" />
                <select class="block mt-1 w-full rounded-lg" id="tamano_id" wire:model="tamano_id">
                    <option value="-1" hidden selected>- SELECCIONE -</option>
                    @foreach ($tamanos as $tamano)
                    <option value="{{$tamano->id}}">{{$tamano->nombre}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mt-5">
                <x-label for="categoria_id" value="{{ __('Categoría') }}" />
                <select class="block mt-1 w-full rounded-lg" wire:model="categoria_id" id="categoria_id">
                    <option value="-1" hidden selected>- SELECCIONE -</option>
                    @foreach ($categorias as $categoria)
                    <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mt-5">
                <x-label for="descripcion" value="{{ __('Descripción') }}" />
                <x-text-area id="descripcion" class="block mt-1 w-full" wire:model="descripcion" :value="old('descripcion')"/>
            </div>

            <div class="mt-5">
                <x-label for="foto" value="{{ __('Foto de la pizza') }}" />
                <x-input id="foto" class="block mt-1 w-full"
                    type="file" wire:model="foto"
                    :value="old('foto')"
                    accept="image/*"
                />
            </div>

            @if ($foto)
                <div class="mt-5">
                    <p class="inline bg-green-700 rounded-lg p-2 text-white">Previsualización de foto:</p>
                    <img src="{{$foto->temporaryUrl()}}" alt="" class="w-40 h-40">
                </div>
            @endif

            <div class="flex justify-end">
                <x-button class="mt-5">
                    {{ __('Añadir al menú') }}
                </x-button>
            </div>
            <x-validation-errors class="mb-4" />
        </form>
    </div>

</div>
