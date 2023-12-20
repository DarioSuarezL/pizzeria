<?php

namespace App\Http\Controllers;

use App\Models\Mapi;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ConsumiServicioController extends Controller
{
    public function RecolectarDatos(Request $request){
       
        try {
            
            $lcComerceID           = "d029fa3a95e174a19934857f535eb9427d967218a36ea014b70ad704bc6c8d1c";
            $lnMoneda              = 2;
            $lnTelefono            = $request->tnTelefono;
            $lcNombreUsuario       = $request->tcRazonSocial;
            $lnCiNit               = $request->tcCiNit;
            $lcNroPago             = "test-" . rand(100000, 999999);
            $lnMontoClienteEmpresa = $request->tnMonto;
            $lcCorreo              = $request->tcCorreo;
            $lcUrlCallBack         = "http://localhost:8000/api/callback/";
            $lcUrlReturn           = "http://localhost:8000/";
            $laPedidoDetalle       = $request->taPedidoDetalle;
            $lcUrl                 = "";


            $loClient = new Client();

            if ($request->tnTipoServicio == 1) {
                $lcUrl = "https://serviciostigomoney.pagofacil.com.bo/api/servicio/generarqrv2";
            } elseif ($request->tnTipoServicio == 2) {
                $lcUrl = "https://serviciostigomoney.pagofacil.com.bo/api/servicio/realizarpagotigomoneyv2";
            }

            $laHeader = [
                'Accept' => 'application/json'
            ];

            $laBody   = [
                "tcCommerceID"          => $lcComerceID,
                "tnMoneda"              => $lnMoneda,
                "tnTelefono"            => $lnTelefono,
                'tcNombreUsuario'       => $lcNombreUsuario,
                'tnCiNit'               => $lnCiNit,
                'tcNroPago'             => $lcNroPago,
                "tnMontoClienteEmpresa" => $lnMontoClienteEmpresa,
                "tcCorreo"              => $lcCorreo,
                'tcUrlCallBack'         => $lcUrlCallBack,
                "tcUrlReturn"           => $lcUrlReturn,
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
                echo '<img src="' . $laQrImage . '" alt="Imagen base64">';
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
        } catch (\Throwable $th) {

            return $th->getMessage() . " - " . $th->getLine();
        }
    }


    public function ConsultarEstado(Request $request)
    {
        $lnTransaccion = $request->tnTransaccion;
        
        $loClientEstado = new Client();

        $lcUrlEstadoTransaccion = "https://serviciostigomoney.pagofacil.com.bo/api/servicio/consultartransaccion";

        $laHeaderEstadoTransaccion = [
            'Accept' => 'application/json'
        ];

        $laBodyEstadoTransaccion = [
            "TransaccionDePago" => $lnTransaccion
        ];

        $loEstadoTransaccion = $loClientEstado->post($lcUrlEstadoTransaccion, [
            'headers' => $laHeaderEstadoTransaccion,
            'json' => $laBodyEstadoTransaccion
        ]);

        $laResultEstadoTransaccion = json_decode($loEstadoTransaccion->getBody()->getContents());

        $texto = '<h5 class="text-center mb-4">Estado Transacción: ' . $laResultEstadoTransaccion->values->messageEstado . '</h5><br>';

        return response()->json(['message' => $texto]);
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

    
