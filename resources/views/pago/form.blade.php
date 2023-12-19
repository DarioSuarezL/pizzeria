<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
       
            <div class="container">
                <h2>Registration Form</h2>
                <form method="POST" action="{{ route('/consumirServicio') }}" id="FormCliente">
                    @csrf



                    <!-- PagoFacil API service fields -->

                    <div class="form-group">
                        <label for="nombre">Nombre</label><!--RazonSocial-->
                        <input type="text" name="tcRazonSocial" id="tcRazonSocial" placeholder="Nombre" value="{{ $user->name }}" required>
                    </div>

                    <div class="form-group">
                        <label for="apellidos">CI/NIT</label>
                        <input type="text" name="tcCiNit" id="tcCiNit" placeholder="numero de CI/NIT" value="{{ $ci_nit}}" required>
                    </div>
                    <div class="form-group">
                        <label for="telefono">Teléfono</label>
                        <input type="text" name="tnTelefono" id="tnTelefono"
                            value="{{ $numeroTelf = $user->cliente ? $user->cliente->numeroTelf : null; }}" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Correo</label>
                        <input type="email" name="tcCorreo" id="tcCorreo" placeholder="Correo" value="{{ $user->email }}" required>
                    </div>
                    <div class="form-group">
                    <label for="PedidoDeVenta"> PedidoDeVenta: </label>
                    <input type="text" name="PedidoDeVenta" id="PedidoDeVenta" value="grupo25sa-">
                    </div>
                    <div class="form-group">
                        <label for="monto">Monto</label>
                        <input type="text" name="tnMonto" id="tnMonto" placeholder="Costo Total" required>
                    </div>
                    <input type="hidden" name="Fecha" id="Fecha">
                    <input type="hidden" name="Hora" id="Hora">
                    <div class="form-group">
                    <label for=""> MonedaVenta: </label>
                    <select name="MonedaVenta" id="">
                        <option value="2">Bs</option>
                        <option value="1"> $u$</option>
                    </select>
                    </div>
                    <div class="form-group col-sm-6 flex-column d-flex">
                                <label class="form-control-label px-3">Tipo de Servicio</label>
                                <select name="tnTipoServicio" class="form-control">
                                    <option value="1">Servicio QR</option>
                                    <option value="2">Tigo Money</option>
                                </select>
                            </div>
                    <div class="containercard">
          

                    <div class="form-group">
                        <label for="idSucursal">Serial</label>
                        <input type="text" name="taPedidoDetalle[0][Serial]">
                    </div>
                    <div class="form-group">
                        <label for="idSucursal">Pedido</label>
                        <input type="text" name="taPedidoDetalle[0][Producto] " id="Producto">
                    </div>

                    <div class="form-group">
                        <label for="idUsuario">Cantidad</label>
                        <input type="text" name="taPedidoDetalle[0][Cantidad]">
                    </div>
                    <div class="form-group">
                        <label for="idUsuario">Precio</label>
                        <input type="text" name="taPedidoDetalle[0][Precio]">
                    </div>
                    <div class="form-group">
                        <label for="idUsuario">Descuento</label>
                        <input type="text" name="taPedidoDetalle[0][Descuento]">
                    </div>
                    <div class="form-group">
                        <label for="idUsuario">Total</label>
                        <input type="text" name="taPedidoDetalle[0][Total]">
                    </div>
                      <!--  <div class="card">
                            <div class="card-front">

                           
                                <div class="card-details">
                                    <div class="form-group">
                                        <label for="card_number">Numero de tarjeta</label>
                                        <input type="text" name="card_number" id="card_number" required>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col">
                                                <label for="expiration_date">Expiracion</label>
                                                <input type="text" name="expiration_date" id="expiration_date"
                                                    placeholder="MM/YY" required>
                                            </div>
                                            <div class="col">
                                                <label for="cvt">CVT</label>
                                                <input type="text" name="cvt" id="cvt" required>
                                            </div>
                                            <div class="col">
                                                <label for="cp">CP</label>
                                                <input type="text" name="cp" id="cp" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>-->

                    </div>


                    
                   

                   
                    <button type="submit">Submit</button>

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