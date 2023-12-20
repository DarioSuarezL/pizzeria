<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    <div class="flex justify-between">
        <h1 class="mt-3 text-2xl font-medium text-gray-900">
            Todos tus pedidos
        </h1>
        @if (session('alert'))
        <div class="flex items-center bg-green-500 text-white text-sm font-bold px-4 py-3" role="alert">
            <p>{{session('alert')}}</p>
        </div>
        @endif
    </div>

    <div class="flex flex-col">

        @forelse ($pedidos as $pedido)
        <div class="border rounded-lg p-2">
            <p class="text-xl font-bold mt-5">Pedido #{{$pedido->id}}</p>
            <p class=" px-3"><span class="font-bold">Cliente:</span> {{$pedido->cliente->user->name}}</p>
            <p class=" px-3"><span class="font-bold">Estado del pago:</span> {{$pedido->pagoestado->nombre}}</p>
            <p class=" px-3"><span class="font-bold">Estado pedido:</span> {{$pedido->estado->nombre}}</p>
            <p class=" px-3"><span class="font-bold">Total:</span> {{$pedido->total}} Bs.</p>
            <p class=" px-3"><span class="font-bold">Método de pago:</span> {{$pedido->metodoPago->nombre}} Bs.</p>
            <p class=" px-3 lowercase flex flex-col">
                <span class="font-bold capitalize">Descripción: </span>
                @foreach ($pedido->detalles as $detalle)
                <div class=" flex justify-between w-1/2 mb-3">
                    <p class="px-3"><span class="font-bold">Pizza:</span>{{$detalle->pizza->nombre}}</p>
                    <p class="px-3"><span class="font-bold">Cantidad:</span>{{$detalle->cantidad}}</p>
                </div>
                @endforeach
            </p>

        </div>
        @empty
        <p class="p-2 bg-green-700 text-white text-sm rounded-lg">Aun no has hecho pedidos</p>
        @endforelse

    </div>
    {{-- Do your work, then step back. --}}
</div>
