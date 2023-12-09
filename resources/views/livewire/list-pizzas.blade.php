<div class="p-6 lg:p-8 bg-white border-b border-gray-200">

    <x-application-logo class="block h-12 w-auto" />
    <h1 class="mt-8 text-2xl font-medium text-gray-900">
        Menú de pizzas
    </h1>

    <div class=" grid grid-cols-2 grid-rows-5">
        @forelse ($pizzas as $pizza)
            <div class="bg-red-800 m-2 rounded-lg flex">
                <img src="{{$pizza->imagen_url}}" class="rounded-l-lg" width="200" alt="{{$pizza->nombre}}">
                <div>
                    <p class="text-white pt-3 px-3 hover:text-xl hover:font-bold">{{$pizza->nombre}}</p>
                    <p class="text-white px-3"><span class="font-bold">Precio:</span> {{$pizza->precio}} Bs.</p>
                    <p class="text-white px-3 lowercase">
                        <span class="font-bold capitalize">Descripción: </span>
                        {{$pizza->descripcion}}
                    </p>

                    <x-button class="m-3">
                        <p class="text-white">+</p>
                        <x-car></x-car>
                    </x-button>
                </div>

            </div>
        @empty

        <p class="bg-red-700 rounded-lg text-3xl">NO TENEMOS MENÚ</p>

        @endforelse
    </div>

    <div class="mt-6">
        {{$pizzas->links()}}
    </div>

</div>
