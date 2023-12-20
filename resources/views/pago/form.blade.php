<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
       
            <div class="container">
            <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Checkout') }}
        </h2>
    </x-slot>
                <form method="POST" action="{{ route('/generarqr') }}" id="FormCliente">
                    @csrf



                    <!-- PagoFacil API service fields -->
            <div class="md:grid md:grid-cols-3 gap-5">
                <div class="mb-12">
                    <div class="form-group">
                        <x-label for="nombre">Nombre</x-label><!--RazonSocial-->
                        <x-input type="text" name="tcRazonSocial" id="tcRazonSocial" placeholder="Nombre" value="{{ $user->name }}" class="w-full" required/>
                    </div>
            
                    <div class="form-group">
                        <x-label for="apellidos">CI/NIT</x-label>
                        <x-input type="text" name="tcCiNit" id="tcCiNit" placeholder="numero de CI/NIT" value="{{ $ci_nit}}" class="w-full"  required/>
                    </div>
                    <div class="form-group">
                        <x-label for="telefono">Teléfono</x-label>
                        <x-input type="text" name="tnTelefono" id="tnTelefono"
                            value="{{ $numeroTelf = $user->cliente->numeroTelf }}" class="w-full"  required/>
                    </div>
                    <div class="form-group">
                        <x-label for="email">Correo</x-label>
                        <x-input type="email" name="tcCorreo" id="tcCorreo" placeholder="Correo" value="{{ $user->email }}" class="w-full" required/>
                    </div>
                    <div class="form-group">
                    <x-label for="PedidoDeVenta"> PedidoDeVenta: </x-label>
                    <x-input type="text" name="PedidoID" id="PedidoDeVenta" value="grupo25sa-" class="w-full" />
                    </div>
                    <div class="form-group">
                        <x-label for="monto">Monto</x-label>
                        <x-input type="text" name="tnMonto" id="tnMonto" placeholder="Costo Total" class="w-full" required/>
                    </div>
                    <x-input type="hidden" name="Fecha" id="Fecha"/>
                    <x-input type="hidden" name="Hora" id="Hora"/>
                    <div class="form-group">
                    <x-label for=""> MonedaVenta: </x-label>
                    <select name="MonedaVenta" id="">
                        <option value="2">Bs</option>
                        <option value="1"> $u$</option>
                    </select>
                    </div>
                    <div class="form-group col-sm-6 flex-column d-flex">
                                <x-label class="form-control-label px-3">Tipo de Servicio</x-label>
                                <select name="tnTipoServicio" class="form-control">
                                    <option value="1">Servicio QR</option>
                                    <option value="2">Tigo Money</option>
                                </select>
                            </div>
                            <div class="form-group" style="padding: 30px;">
                            <x-button type="submit">Submit</x-button>
                            </div>
                            </div>
           
                
                <div class="mb-5">
                    <div class="form-group">
                        <x-label for="idSucursal">Serial</x-label>
                        <x-input type="text" name="taPedidoDetalle[0][Serial]"/>
                    </div>
                    <div class="form-group">
                        <x-label for="idSucursal">Pedido</x-label>
                        <x-input type="text" name="taPedidoDetalle[0][Producto] " id="Producto"/>
                    </div>

                    <div class="form-group">
                        <x-label for="idUsuario">Cantidad</x-label>
                        <x-input type="text" name="taPedidoDetalle[0][Cantidad]"/>
                    </div>
                    <div class="form-group">
                        <x-label for="idUsuario">Precio</x-label>
                        <x-input type="text" name="taPedidoDetalle[0][Precio]"/>
                    </div>
                    <div class="form-group">
                        <x-label for="idUsuario">Descuento</x-label>
                        <x-input type="text" name="taPedidoDetalle[0][Descuento]"/>
                    </div>
                    <div class="form-group">
                        <x-label for="idUsuario">Total</x-label>
                        <x-input type="text" name="taPedidoDetalle[0][Total]"/>
                    </div>
           

                    </div>
                 
                    <div class="mb-5">
                    <img src="{{ $laQrImage }}" alt="QR Code Image">
                    </div>
                    </div>
                    
                   

                   
                    

                </form>

   

              <!--  <input type="button" name="" id="" value="Pagar Compra"  onclick="PrepararParametros()">-->

<!-- Este es el formulario del boton de pago checkout 
    que tiene los parametros que se envian al checkout  que son tcParametros  -  tcCommerceID -->
<form   method="post" id="FormPagoFacilCheckout" style="display:none" 
        action="https://checkout.pagofacil.com.bo/es/pay" enctype="multipart/form-data"  class="form">			
    <input   name="tcParametros" id="tcParametros"  type="text"  value="" > 
    <input   name="tcCommerceID"  id="tcCommerceID" type="text"  value=""  >
    <input type="submit" class="btn btn-primary" id="btnpagar" value="">
</form>


            </div>
         <div class=" grid grid-cols-2 ">
            <iframe name="QrImage" style="width:100%; height:495px"></iframe>
         </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
            <script src="{{ asset('js/scripts.js') }}"></script>
            <script src="{{ asset('js/jquery-1.11.1.min.js') }}"></script> 
        <script src="{{ asset('js/jquery.min.js') }}" type="1e80906edbc96c168d73edb0-text/javascript"></script>
        <script src="{{ asset('js/PagoFacilCheckoutClient.js') }}"></script> 

        </div>
    </div>
    <script>
document.addEventListener('DOMContentLoaded', function () {
    // Obtener el campo oculto
    var fechaCampo = document.getElementById('Fecha');
    var horaCampo = document.getElementById('Hora');

    // Obtener la fecha y hora actual
    var fechaActual = new Date();
    var horaActual = new Date();

    // Formatear la fecha y hora como desees (por ejemplo, formato YYYY-MM-DD y HH:mm:ss)
    var fechaFormateada = fechaActual.toISOString().split('T')[0];
    var horaFormateada = horaActual.toTimeString().split(' ')[0];

    // Asignar la fecha y hora a los campos ocultos
    fechaCampo.value = fechaFormateada;
    horaCampo.value = horaFormateada;
});
</script>
<script>
    $(document).ready(function () {
        // Obtener el valor del primer input
        var valorPedido = $("#PedidoDeVenta").val();

        // Asignar el mismo valor al segundo input
        $("#Producto").val(valorPedido);
    });
</script>

</x-app-layout>