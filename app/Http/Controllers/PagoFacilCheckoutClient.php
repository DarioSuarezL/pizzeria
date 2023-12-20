<?php

namespace App\Http\Controllers;

use App\Models\Mapi;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class PagoFacilCheckoutClient extends Controller
{
    
    public function inicio(){
        
        return View::make('pago.PagoFacilCheckout');
    }


    public function Encript(Request $request){

        $user = Auth::user();
      
        //obtener el registro de cliente del user para obtener su telefono
        $phone = $request->tnTelefono;
        $ci=$request->tcCiNit;
        $dir=$user->cliente->direccion;
        //parse_str( $_POST['goFormularioCliente'], $loFormDatos);
		 // campos del formulario del cliente
         $lnMoneda              = 2;
         $lnTelefono            = $request->tnTelefono;
         $lcNombreUsuario       = $request->tcRazonSocial;
         $lnCiNit               = $request->tcCiNit;
         $lcNroPago             = "test-" . rand(100000, 999999);
         $lnMonto               = $request->tnMonto;
         $lcCorreo              = $request->tcCorreo;
         $lcParametro1          = "http://localhost:8000/api/callback/";
         $lcParametro2          = "http://localhost:8000/";
         $laPedidoDetalle       = $request->taPedidoDetalle;
         $lcPedidoID            =$request->PedidoID;
         $lcUrl                 = "";


   
         $loClient = new Client();
         //  aqui vendra el listado de productos que viene en la compra , 
         //en caso de que no tenga , solo se colocara el producto   a vender 
         //es un arrar de objetos el cual se le aplica un json_encode(Propio de php)
		 $laProduct_Detalle=$request->taPedidoDetalle;


        $lcParametro3= json_encode($laProduct_Detalle);

         $lcParametro3="";
         $lcParametro4="11";// este parametro es estatco para este tipo de integracion se debe mantener en 11 nomas
         
		// aqui estoy guardando lo mismo pero para crear la firma
		$tcCommerceID = env('PAGOFACIL_COMMERCEID');
        $lcTokenServicio=env('PAGOFACIL_TOKENSERVICE');
        $lcTokenSecret=env('PAGOFACIL_TOKENSECRET');
        
        try {

            
            $lcCadenaAFirmar= "$lcTokenServicio|$lcCorreo|$lnTelefono|$lcPedidoID|$lnMonto|$lnMoneda|$lcParametro1|$lcParametro2|$lcParametro3|$lcParametro4" ;
		 
            // aqui se genera la firma  con la variable $lcCadenaAFirmar
            $lcFirma= hash('sha256', $lcCadenaAFirmar);
    
            // aqui  se concatena de nuevo pero utilizando la firma al comienzo 
            $lcDatosPago="$lcFirma|$lcCorreo|$lnTelefono|$lcPedidoID|$lnMonto|$lnMoneda|$lcParametro1|$lcParametro2|$lcParametro3|$lcParametro4" ;
            
            //Esto es el proceso de encriptacion que ocupa php 
            $lnSizeDatosPago=strlen($lcDatosPago);

            $lcDatosPago=str_pad($lcDatosPago,($lnSizeDatosPago+8-($lnSizeDatosPago%8)), "\0");
            //aqui se genera y se guarda  la variable tcparametros, resultado de la encriptacion de los datos con 3DES

            $tcParametros =   openssl_encrypt($lcDatosPago, "DES-EDE3", $lcTokenSecret ,OPENSSL_ZERO_PADDING);

            $laData['tcParametros']= base64_encode($tcParametros);
            $laData['tcCommerceID']=$tcCommerceID;
            
            
            //este codigo solo sirve para verificar si lo que estan encriptando esta bien 
           $tcParametrosDesencriptado= openssl_decrypt($tcParametros, 'DES-EDE3', $lcTokenSecret,  OPENSSL_ZERO_PADDING);
//$laData['tcParametrosDesencriptado']= $tcParametrosDesencriptado;
            ////////////////////////////////////////////////////////////////////////////

            if ($request->tnTipoServicio == 1) {
                $lcUrl = "https://serviciostigomoney.pagofacil.com.bo/api/servicio/generarqrv2";
            } elseif ($request->tnTipoServicio == 2) {
                $lcUrl = "https://serviciostigomoney.pagofacil.com.bo/api/servicio/realizarpagotigomoneyv2";
            }

            $laHeader = [
                'Accept' => 'application/json'
            ];

            $laBody   = [
                "tcCommerceID"          => $tcCommerceID,
                "tnMoneda"              => $lnMoneda,
                "tnTelefono"            => $lnTelefono,
                'tcNombreUsuario'       => $lcNombreUsuario,
                'tnCiNit'               => $lnCiNit,
                'tcNroPago'             => $lcNroPago,
                "tnMontoClienteEmpresa" => $lnMonto,
                "tcCorreo"              => $lcCorreo,
                'tcUrlCallBack'         => $lcParametro1,
                "tcUrlReturn"           => $lcParametro2,
                "tcPedidoID"            =>$lcPedidoID,
                "tcParametro2"          =>$lcParametro2,
                "tclcParametro3"        =>$lcParametro3,
                "tclcParametro4"        =>$lcParametro1,
                'taPedidoDetalle'       => $laPedidoDetalle
            ];

            $loResponse = $loClient->post($lcUrl, [
                'headers' => $laHeader,
                'json' => $laBody
            ]);

            $laResult = json_decode($loResponse->getBody()->getContents());

            if ($request->tnTipoServicio == 1) {
                
                $laValues = explode(";", $laResult->values)[1];

                $laQrImage = "data:image/png;base64," . json_decode($laValues)->qrImage;

                
            return view('pago.form', ['laQrImage' => $laQrImage ,
                'user' => $user,
                'ci_nit'=>$ci,
                'numeroTelf' => $phone,
                'direccion'=>$dir,
            ]);
            } elseif ($request->tnTipoServicio == 2) {

                $csrfToken = csrf_token();

                echo '<h5 class="text-center mb-4">' . $laResult->message . '</h5>';
                echo '<p class="blue-text">Transacción Generada: </p><p id="tnTransaccion" class="blue-text">'. $laResult->values . '</p><br>';
                echo '<iframe name="QrImage" style="width: 100%; height: 300px;"></iframe>';
                echo '<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>';

                echo '<script>
                        $(document).ready(function() {
                            function hacerSolicitudAjax(numero) {
                                // Agrega el token CSRF al objeto de datos
                                var data = { _token: "' . $csrfToken . '", tnTransaccion: numero };
                                
                                $.ajax({
                                    url: \'/consultar\',
                                    type: \'POST\',
                                    data: data,
                                    success: function(response) {
                                        var iframe = document.getElementsByName(\'QrImage\')[0];
                                        iframe.contentDocument.open();
                                        iframe.contentDocument.write(response.message);
                                        iframe.contentDocument.close();
                                    },
                                    error: function(error) {
                                        console.error(error);
                                    }
                                });
                            }

                            setInterval(function() {
                                hacerSolicitudAjax(' . $laResult->values . ');
                            }, 7000);
                        });
                    </script>';


            
            }
            $jsonData = json_encode($laData);
            //dd($jsonData);

        } catch (\Throwable $th) {
            return  $th->getMessage() . " - " . $th->getLine();;
        }
    }

    public function UrlCallback()
    {
        // Campos del formulario del cliente
        $mapi = new Mapi();
    
        $Venta = $_POST["PedidoID"];
        preg_match('/(\d+)$/', $Venta, $matches);
        $numeroPedido = isset($matches[1]) ? $matches[1] : null;
        $Fecha = $_POST["Fecha"];
        $nuevafecha = date("Y-m-d H:i:s", strtotime($Fecha));
        $Hora = $_POST["Hora"];
        $MetodoPago = $_POST["MetodoPago"];
        $Estado = $_POST["Estado"];
        $ingreso = true;
    
        try {
            // Aquí verifico si tienen datos todos los parámetros
            if (isset($numeroPedido, $Fecha, $Hora, $MetodoPago, $Estado)) {
                // Aquí verifico si existe la venta
                // El Mapi es un modelo que verifica si existe esa venta en la base de datos
                $laVentaobtenida = $mapi->obtenerventa($numeroPedido);
    
                if (!$laVentaobtenida) {
                    $arreglo = [
                        "error" => 1,
                        'status' => 1,
                        'message' => "No se encuentra la venta",
                        'values' => false
                    ];
                    $ingreso = false;
                }
    
                // Aquí verifico si existe el método de pago que se mandó
                $metodopagoobtenido = $mapi->verificarmetodopago($MetodoPago);
    
                if (!$metodopagoobtenido) {
                    $arreglo = [
                        'error' => 1,
                        'status' => 1,
                        'message' => "No se encuentra el método de pago",
                        'values' => false
                    ];
                    $ingreso = false;
                }
    
                // Si la variable $ingreso es true, significa que están bien los parámetros y puede realizar la consulta
                if ($ingreso) {
                    // Aquí llama al modelo Mapi y le manda los datos para cambiar el estado del pedido o venta
                    // Método pagarventa actualiza los datos del ESTADO de esa venta o pedido en la base de datos
                    $result = $mapi->pagarventa($numeroPedido, $nuevafecha, $metodopagoobtenido, $Estado);
    
                    if ($result) {
                        // Se guardó con éxito
                        $arreglo = [
                            "error" => 0,
                            'status' => 1,
                            'message' => "Pago realizado correctamente.",
                            'values' => true
                        ];
                    } else {
                        $arreglo = [
                            "error" => 1,
                            'status' => 1,
                            'message' => "No se pudo realizar el pago. Por favor, inténtelo de nuevo.",
                            'values' => false
                        ];
                    }
                }
            } else {
                $arreglo = [
                    "error" => 1,
                    'status' => 1,
                    'message' => "Faltan datos",
                    'values' => false
                ];
            }
        } catch (\Throwable $th) {
            $arreglo = [
                "error" => 1,
                'status' => 1,
                'messageSistema' => "[TRY/CATCH] " . $th->getMessage(),
                'message' => "No se pudo realizar el pago. Por favor, inténtelo de nuevo.",
                'values' => false
            ];
        }
    
        echo json_encode($arreglo);
    }
}

