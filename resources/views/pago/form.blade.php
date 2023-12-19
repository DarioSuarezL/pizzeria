<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
       
            <div class="container">
                <h2>Registration Form</h2>
                <form method="POST" action="{{ route('/consumirServicio') }}">
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
                        <label for="monto">Monto</label>
                        <input type="text" name="tnMonto" id="tnMonto" placeholder="Costo Total" required>
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
                        <input type="text" name="taPedidoDetalle[0][Producto]">
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
            </div>
         <div class=" grid grid-cols-2 ">
            <iframe name="QrImage" style="width:100%; height:495px"></iframe>
         </div>
        </div>
            <script src="{{ asset('js/scripts.js') }}"></script>

        </div>
    </div>


</x-app-layout>