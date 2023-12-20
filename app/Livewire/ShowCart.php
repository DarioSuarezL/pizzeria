<?php

namespace App\Livewire;

use App\Models\Pedido;
use GuzzleHttp\Client;
use Livewire\Component;
use App\Models\DetallePedido;

class ShowCart extends Component
{

    public $pedido;
    public $QR;

    public function render()
    {
        $this->pedido = Pedido::where('cliente_id', auth()->user()->cliente->id)->where('estado_id', 1)->first();
        if($this->pedido){
            $detalles = DetallePedido::where('pedido_id', $this->pedido->id)->get();
            $total = $detalles->sum('subtotal');

            return view('livewire.show-cart', [
                'detalles' => $detalles,
                'total' => $total,
            ]);
        }
        return view('livewire.show-cart', [
            'detalles' => [],
            'total' => 0,
        ]);
    }

    public function delete($id)
    {
        $detalle = DetallePedido::find($id);
        $pedido = Pedido::find($detalle->pedido->id);
        $pedido->total = $pedido->total - $detalle->subtotal;

        $detalle->delete();

        if($pedido->total == 0){
            $pedido->delete();
        }else{
            $pedido->save();
        }

    }

    public function checkout(){

        $tcCommerceID = env('PAGOFACIL_COMMERCEID');
        $tcTokenServicio = env('PAGOFACIL_TOKENSERVICE');
        $tcTokenSecret = env('PAGOFACIL_TOKENSECRET');
        $tcUrlCallBack = env('PAGOFACIL_URLCALLBACK');
        $tcUrlReturn = env('PAGOFACIL_URLRETURN');

        $url = "https://serviciostigomoney.pagofacil.com.bo/api/servicio/generarqrv2";

        $dataHeader = [
            "Accept" => "application/json"
        ];

        $taPedidoDetalle = [
            "serial" => $this->pedido->id,
            "producto" => "Pedido ".$this->pedido->id,
            "cantidad" => 1,
            "precio" => $this->pedido->total,
            "descuento" => 0,
            "total" => $this->pedido->total,
        ];

        $dataBody = [
            "tcTokenServicio"       => $tcTokenServicio,
            "tcTokenSecret"         => $tcTokenSecret,
            "tcCommerceID"          => $tcCommerceID,
            "tnMoneda"              => 2,
            "tnTelefono"            => $this->pedido->cliente->numeroTelf,
            "tcNombreUsuario"       => $this->pedido->cliente->user->name,
            "tnCiNit"               => $this->pedido->cliente->ci_nit,
            "tcNroPago"             => "pago ".rand(1000, 9999),
            "tnMontoClienteEmpresa" => $this->pedido->total,
            "tcCorreo"              => $this->pedido->cliente->user->email,
            "tcUrlCallBack"         => $tcUrlCallBack,
            "tcUrlReturn"           => $tcUrlReturn,
            "taPedidoDetalle"       => $taPedidoDetalle
            // "tcPedidoID"            => $this->pedido->id,

        ];

        // dd($dataBody);

        $clienteHTTP = new Client();

        $response = $clienteHTTP->request('POST', $url, [
            'headers' => $dataHeader,
            'json' => $dataBody
        ]);

        $decodedJSON = json_decode($response->getBody());

        // dd($decodedJSON);
        $values = explode(";", $decodedJSON->values)[1];
        $this->QR = "data:image/png;base64,".json_decode($values)->qrImage;

        $this->pedido->pago_estados_id = 2;
        $this->pedido->save();

    }

}
