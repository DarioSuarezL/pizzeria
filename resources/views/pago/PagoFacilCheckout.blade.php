<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Prueba</title>
    </head>

    <body>
            <!-- Este formulario es netamente de prueba, es un ejemplo de encriptacion de datos necesarios para llamar al servicio pagoFacilCheckout.
                 Se utiliza un  javascript con ajax para capturar datos del formulario "FormCliente", encriptarlos y ubicarlos en el formulario "FormPagoFacilCheckout"
                 para continuar con el llamado al proceso de pago en PagoFacilCheckout.

                 En caso de que tener un back-end propio ignorar este formulario y continuar utilizando directamente el formulario "FormPagoFacilCheckout"
                  -->
            <p>Este formulario es netamente de prueba, es un ejemplo de encriptacion de datos necesarios para llamar al servicio pagoFacilCheckout.
            Se utiliza un  javascript con ajax para capturar datos del formulario "FormCliente", encriptarlos y ubicarlos en el formulario "FormPagoFacilCheckout"
            para continuar con el llamado al proceso de pago en PagoFacilCheckout.

            En caso de que tener un back-end propio ignorar este formulario y continuar utilizando directamente el formulario "FormPagoFacilCheckout"</p>
            <br>
            <br>
            <fieldset>
                <form id="FormCliente" >
                    @csrf
                    
                    <label for=""> PedidoDeVenta: </label>
                    <input type="number" name="PedidoDeVenta" value="1" >
                    <br>
                    <label for=""> Email: </label>
                    <input type="text" name="Email" value="victor@gmail.com" >
                    <br>
                    <label for=""> Celular: </label>
                    <input type="number" name="Celular" value="6314429" >
                    <br>
                    <label for=""> Monto: </label>
                    <input type="number" name="Monto" value='1' >
                    <br>
                    <label for=""> MonedaVenta: </label>
                    <select name="MonedaVenta" id="">
                        <option value="2">Bs</option>
                        <option value="1"> $u$</option>
                    </select>
                </form>
            </fieldset>
            <br>
            <input type="button" name="" id="" value="Pagar Compra"  onclick="PrepararParametros()">

            <!-- Este es el formulario del boton de pago checkout 
                que tiene los parametros que se envian al checkout  que son tcParametros  -  tcCommerceID -->
            <form   method="post" id="FormPagoFacilCheckout" style="display:none" 
                    action="https://checkout.pagofacil.com.bo/es/pay" enctype="multipart/form-data"  class="form">			
                <input   name="tcParametros" id="tcParametros"  type="text"  value="" > 
                <input   name="tcCommerceID"  id="tcCommerceID" type="text"  value=""  >
                <input type="submit" class="btn btn-primary" id="btnpagar" value="">
            </form>
            
            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="{{ asset('js/jquery-1.11.1.min.js') }}"></script> 
        <script src="{{ asset('js/jquery.min.js') }}" type="1e80906edbc96c168d73edb0-text/javascript"></script>
        <script src="{{ asset('js/PagoFacilCheckoutClient.js') }}"></script> 


    <script>
    


    </script>




    </body>
</html>


