<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    <div class="flex justify-between">
        <h1 class="mt-3 text-2xl font-medium text-gray-900">
            Menú de clientes
        </h1>
        {{-- <a class="m-5 p-2 bg-red-800 hover:bg-red-700 rounded-lg" href="{{route('clientes.create')}}">
            <p class="text-white">+ Nueva cliente</p>
        </a> --}}
    </div>

    <div class="flex flex-col lg:grid lg:grid-cols-2 lg:grid-rows-5">
        @forelse ($clientes as $cliente)
            <div class="bg-white m-2 rounded-lg flex border">
                {{-- <img src="{{$cliente->imagen_url}}" class="rounded-l-lg" width="200" alt="{{$cliente->nombre}}"> --}}
                <div>
                    <p class=" pt-3 px-3 hover:text-xl font-bold">{{$cliente->user->name}}</p>
                    <p class=" px-3">Correo: {{$cliente->user->email}}</p>
                    <p class=" px-3">Teléfono: {{$cliente->numeroTelf}}</p>
                    <p class=" px-3">
                        <span class="font-bold">Dirección: </span>
                        {{$cliente->direccion}}
                    </p>
                </div>
            </div>
        @empty

        <p class="bg-red-700 rounded-lg text-3xl text-white">No hay clientes registrados.</p>

        @endforelse
    </div>

    <div class="mt-6">
        {{$clientes->links()}}
    </div>

</div>
