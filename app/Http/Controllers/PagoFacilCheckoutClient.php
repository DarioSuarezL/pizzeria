<?php

namespace App\Http\Controllers;

use App\Models\Mapi;
use Illuminate\Http\Request;

class PagoFacilCheckoutClient extends Controller
{
    
    public function inicio(){
        
        return \View::make('pago.PagoFacilCheckout');
    }


    public function Encript(){

        parse_str( $_POST['goFormularioCliente'], $loFormDatos);
		 // campos del formulario del cliente
		 $lcPedidoID=$loFormDatos['PedidoDeVenta'] ;
		 $lcEmail= $loFormDatos['tcCorreo'] ;
		 $lnTelefono=$loFormDatos['tnTelefono'] ;
		 $lnMonto=$loFormDatos['tnMonto'] ; 
		 $lcMoneda=$loFormDatos['MonedaVenta'] ;
		 $lcParametro1="";
		 $lcParametro2="Url Return (Página de retorno para el cliente final, e.g. Página de confirmación de compra)";

         //  aqui vendra el listado de productos que viene en la compra , 
         //en caso de que no tenga , solo se colocara el producto   a vender 
         //es un arrar de objetos el cual se le aplica un json_encode(Propio de php)
		 $laProduct_Detalle=array( 
            "Serial"=>1,
            "Producto" =>  "PRODUCTO1", 
            "LinkPago" => 0 , 
            'Cantidad'=>  2,
            "Precio"=>  10 ,  
            "Descuento" => 0, 
            "Total"=> 20 
            );
        array_push($laListaProductos , $laProduct_Detalle );
        $laProduct_Detalle=array( 
                    "Serial"=>2,
                    "Producto" =>  "PRODUCTO2", 
                    "LinkPago" => 0 , 
                    'Cantidad'=>  5,
                    "Precio"=>  20,  
                    "Descuento" => 0, 
                    "Total"=> 100 
                    );
        array_push($laListaProductos , $laProduct_Detalle );
        $lcParametro3= json_encode($laListaProductos);

         $lcParametro3="";
         $lcParametro4="11";// este parametro es estatco para este tipo de integracion se debe mantener en 11 nomas
 


          /***
          *  $lcParametros1 =   URL callback del comerciok, este metodo se utiliza para notificar al comercio que el pago fue realizado correctamente, 
                                el comercio debera realizar sus procesos correspondientes al realizar un pago.

             $lcParametros2 =   URL de retorno, esta ruta es netamente web, y sera la URL de redireccion del comercio, hacia donde se redirigira
                                al cliente luego de terminar el pago.
          */
        
          
        
		// aqui estoy guardando lo mismo pero para crear la firma
		$tcCommerceID ="dato brindado por PagoFacil Bolivia";
        $lcTokenServicio="dato brindado por PagoFacil Bolivia";
        $lcTokenSecret="dato brindado por PagoFacil Bolivia";
        
        try {
            
            $lcCadenaAFirmar= "$lcTokenServicio|$lcEmail|$lnTelefono|$lcPedidoID|$lnMonto|$lcMoneda|$lcParametro1|$lcParametro2|$lcParametro3|$lcParametro4" ;
		 
            // aqui se genera la firma  con la variable $lcCadenaAFirmar
            $lcFirma= hash('sha256', $lcCadenaAFirmar);
    
            // aqui  se concatena de nuevo pero utilizando la firma al comienzo 
            $lcDatosPago="$lcFirma|$lcEmail|$lnTelefono|$lcPedidoID|$lnMonto|$lcMoneda|$lcParametro1|$lcParametro2|$lcParametro3|$lcParametro4" ;
            
            //Esto es el proceso de encriptacion que ocupa php 
            $lnSizeDatosPago=strlen($lcDatosPago);

            $lcDatosPago=str_pad($lcDatosPago,($lnSizeDatosPago+8-($lnSizeDatosPago%8)), "\0");
            //aqui se genera y se guarda  la variable tcparametros, resultado de la encriptacion de los datos con 3DES

            $tcParametros =   openssl_encrypt($lcDatosPago, "DES-EDE3", $lcTokenSecret ,OPENSSL_ZERO_PADDING);

            $laData['tcParametros']= base64_encode($tcParametros);
            $laData['tcCommerceID']=$tcCommerceID;
            
            
            //este codigo solo sirve para verificar si lo que estan encriptando esta bien 
            $tcParametrosDesencriptado= openssl_decrypt($tcParametros, 'DES-EDE3', $lcTokenSecret,  OPENSSL_ZERO_PADDING);
            $laData['tcParametrosDesencriptado']= $tcParametrosDesencriptado;
            ////////////////////////////////////////////////////////////////////////////

                
            return response()->json($laData);
        } catch (\Throwable $th) {
            return null;
        }
    }

    public function UrlCallback(){
        parse_str( $_POST['goFormularioCliente'], $loFormDatos);
        // campos del formulario del cliente
        $mapi = new Mapi();
        $Venta=$_POST["id"];
        $Fecha=$_POST["fecha_hora"];
        $nuevafecha =date("Y-m-d", strtotime($Fecha));
        $Hora=$_POST["Hora"];
        $MetodoPago=$_POST["MetodoPago"];
        $Estado=$_POST["Estado"];
        $ingreso=TRUE;
       
        try{
        // aqui verifico si tienen datos todos los parametros
        if( (isset($Venta)) && (isset($Fecha)) && (isset($Hora)) && (isset($MetodoPago)) && (isset($Estado)) )
       
        {
           //aqui verifico si existe la venta
           // el Mapi es un modelo que verifica si existe esa venta en la base de datos
           $laVentaobtenida=$mapi->obtenerventa($Venta);
           if(count($laVentaobtenida)<=0)
            {
               $arreglo=array("error" => 1, 'status' => 1, 'message' =>"No se encuentra la venta" , 'values' =>FALSE );
               $ingreso=FALSE;
              
       
           }
           // aqui verifico si existe el metodo de pago que nando
       $metodopagoobtenido=$this->$mapi->verificarmetodopago($MetodoPago);
       if(count($metodopagoobtenido)<=0)
        {
           $arreglo=array( 'error' => 1, 'status' => 1, 'message' =>"No se encuentra el metodo de pago", 'values'=>FALSE );
           $ingreso=FALSE;
        }
       //si la variable es true significa que estan bien los parametros y puede realizar la consulta
       if($ingreso==TRUE)
       {
           // aqui llama al modelo Mapi y Le manda los datos para cambiar el estado del pedido O venta
       //metodo pagarventa actualiza los datos del ESTADO de esa venta O pedido en la base de datos
       $result=$this->$mapi->pagarventa($Venta, $nuevafecha, $Hora, $MetodoPago ,$Estado);
       if($result=== TRUE){
            // se guardo con exito
           $arreglo=array("error" => 0, 'status' =>1 ,'message'=>"Pago realizado correctamente." ,'values'=> TRUE );
       }else{
           $arreglo=array("error" => 1, 'status' =>1 ,'message'=>"No se puedo realizar el pago por facvor intente de nuevo." ,'values'=> FALSE );
       }
        }
        }else{
           $arreglo=array("error" => 1, 'status' =>1 ,'message'=>"Faltan datos" ,'values'=> FALSE );
        }
       }catch(\Throwable $th){
           $arreglo=array("error" => 1, 'status' =>1 ,'messageSistema'=>"[TRY/CATCH]" . $th->getMessage(), 'message'=>"No se puedo realizar el pago por facvor intente de nuevo." ,'values'=> FALSE );
       }
       echo json_encode($arreglo);
       
        }
}

