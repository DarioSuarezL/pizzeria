<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Visit;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function index(){
        $visits = Visit::where(['page_name' => 'pedidos.index'])->first();
        return view('pedidos.index', compact('visits'));
    }

    public function callback(){


    }
//     public function UrlCallback()
//     {
//         // Campos del formulario del cliente
//         $mapi = new Mapi();

//         $Venta = $_POST["PedidoID"];
//         preg_match('/(\d+)$/', $Venta, $matches);
//         $numeroPedido = isset($matches[1]) ? $matches[1] : null;
//         $Fecha = $_POST["Fecha"];
//         $nuevafecha = date("Y-m-d H:i:s", strtotime($Fecha));
//         $Hora = $_POST["Hora"];
//         $MetodoPago = $_POST["MetodoPago"];
//         $Estado = $_POST["Estado"];
//         $ingreso = true;

//         try {
//             // Aquí verifico si tienen datos todos los parámetros
//             if (isset($numeroPedido, $Fecha, $Hora, $MetodoPago, $Estado)) {
//                 // Aquí verifico si existe la venta
//                 // El Mapi es un modelo que verifica si existe esa venta en la base de datos
//                 $laVentaobtenida = $mapi->obtenerventa($numeroPedido);

//                 if (!$laVentaobtenida) {
//                     $arreglo = [
//                         "error" => 1,
//                         'status' => 1,
//                         'message' => "No se encuentra la venta",
//                         'values' => false
//                     ];
//                     $ingreso = false;
//                 }

//                 // Aquí verifico si existe el método de pago que se mandó
//                 $metodopagoobtenido = $mapi->verificarmetodopago($MetodoPago);

//                 if (!$metodopagoobtenido) {
//                     $arreglo = [
//                         'error' => 1,
//                         'status' => 1,
//                         'message' => "No se encuentra el método de pago",
//                         'values' => false
//                     ];
//                     $ingreso = false;
//                 }

//                 // Si la variable $ingreso es true, significa que están bien los parámetros y puede realizar la consulta
//                 if ($ingreso) {
//                     // Aquí llama al modelo Mapi y le manda los datos para cambiar el estado del pedido o venta
//                     // Método pagarventa actualiza los datos del ESTADO de esa venta o pedido en la base de datos
//                     $result = $mapi->pagarventa($numeroPedido, $nuevafecha, $metodopagoobtenido, $Estado);

//                     if ($result) {
//                         // Se guardó con éxito
//                         $arreglo = [
//                             "error" => 0,
//                             'status' => 1,
//                             'message' => "Pago realizado correctamente.",
//                             'values' => true
//                         ];
//                     } else {
//                         $arreglo = [
//                             "error" => 1,
//                             'status' => 1,
//                             'message' => "No se pudo realizar el pago. Por favor, inténtelo de nuevo.",
//                             'values' => false
//                         ];
//                     }
//                 }
//             } else {
//                 $arreglo = [
//                     "error" => 1,
//                     'status' => 1,
//                     'message' => "Faltan datos",
//                     'values' => false
//                 ];
//             }
//         } catch (\Throwable $th) {
//             $arreglo = [
//                 "error" => 1,
//                 'status' => 1,
//                 'messageSistema' => "[TRY/CATCH] " . $th->getMessage(),
//                 'message' => "No se pudo realizar el pago. Por favor, inténtelo de nuevo.",
//                 'values' => false
//             ];
//         }

//         echo json_encode($arreglo);
//     }
//     
// }
}
