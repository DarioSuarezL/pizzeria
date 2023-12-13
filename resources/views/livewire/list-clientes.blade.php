<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    <div class="flex justify-between">
        <h1 class="mt-3 text-2xl font-medium text-gray-900">
            Clientes
        </h1>
    </div>

    <div class="flex flex-col lg:grid lg:grid-cols-2 lg:grid-rows-5">
        @forelse ($clientes as $cliente)
            <div class="bg-white m-2 rounded-lg flex border justify-between">
                <div>
                    <p class=" pt-3 px-3 hover:text-xl font-bold">{{$cliente->user->name}}</p>
                    <p class=" px-3">Correo: {{$cliente->user->email}}</p>
                    <p class=" px-3">Teléfono: {{$cliente->numeroTelf}}</p>
                    <p class=" px-3">
                        <span class="font-bold">Dirección: </span>
                        {{$cliente->direccion}}
                    </p>
                </div>
                <div class="flex flex-col justify-center">
                    {{-- <a href="" class="bg-yellow-500 hover:bg-yellow-400 text-white py-2 uppercase text-sm m-2 rounded-lg text-center">
                        Editar
                    </a> --}}
                    <form action="{{route('clientes.destroy', $cliente->user->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <x-button class="mx-2">
                            Eliminar
                        </x-button>
                    </form>
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
