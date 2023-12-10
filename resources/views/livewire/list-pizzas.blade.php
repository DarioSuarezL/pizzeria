<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    <div class="flex justify-between">
        <h1 class="mt-3 text-2xl font-medium text-gray-900">
            Menú de pizzas
        </h1>
        <x-button class="m-5">
            <a href="{{route('pizzas.create')}}">+ Nueva pizza</a>
        </x-button>
    </div>

    <div class="flex flex-col lg:grid lg:grid-cols-2 lg:grid-rows-5">
        @forelse ($pizzas as $pizza)
            <div class="bg-white m-2 rounded-lg flex border">
                <img src="{{$pizza->imagen_url}}" class="rounded-l-lg" width="200" alt="{{$pizza->nombre}}">
                <div>
                    <p class=" pt-3 px-3 hover:text-xl hover:font-bold">{{$pizza->nombre}}</p>
                    <p class=" px-3"><span class="font-bold">Precio:</span> {{$pizza->precio}} Bs.</p>
                    <p class=" px-3 lowercase">
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
