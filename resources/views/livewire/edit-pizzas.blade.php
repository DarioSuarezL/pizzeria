<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    <div class="flex justify-between">
        <h1 class="mt-3 text-2xl font-medium text-gray-900">
            Formulario de pizzas
        </h1>
    </div>

    <div class="flex flex-col justify-center">

        <x-validation-errors class="mb-4" />
        <form method="POST" action="{{route('pizzas.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="mt-5">
                <x-label for="nombre" value="{{ __('Nombre') }}" />
                <p class="text-sm">Procure poner el nombre con el tamaño</p>
                <x-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" placeholder="CHESSEBURGER - GRANDE" autofocus/>
            </div>

            <div class="mt-5">
                <x-label for="precio" value="{{ __('Precio') }}" />
                <p class="text-sm">Ponga punto (.) para los decimales</p>
                <x-input id="precio" class="block mt-1 w-full" type="text" name="precio" :value="old('precio')" placeholder="56.00"/>
            </div>

            <div class="mt-5">
                <x-label for="tamano" value="{{ __('Tamaño') }}" />
                <select class="block mt-1 w-full" id="tamano_id" name="tamano_id">
                    @foreach ($tamanos as $tamano)
                        <option value="{{$tamano->id}}">{{$tamano->nombre}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mt-5">
                <x-label for="categoria_id" value="{{ __('Categoría') }}" />
                <select class="block mt-1 w-full" name="categoria_id" id="categoria_id">
                    @foreach ($categorias as $categoria)
                        <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mt-5">
                <x-label for="descripcion" value="{{ __('Descripción') }}" />
                <x-text-area id="descripcion" class="block mt-1 w-full" name="descripcion" :value="old('descripcion')"/>
            </div>

            <div class="mt-5">
                <x-label for="foto" value="{{ __('Foto de la pizza') }}" />
                <x-input id="foto" class="block mt-1 w-full" type="file" name="foto" :value="old('foto')"/>
            </div>

            <div class="flex justify-end">
                <x-button class="mt-5">
                    {{ __('Añadir al menú') }}
                </x-button>
            </div>
        </form>
    </div>

</div>
