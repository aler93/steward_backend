<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use App\Models\LinkPagamento;
use Illuminate\Http\Request;

class PedidosController extends Controller
{
    private static string $examplePixUrl    = "https://upload.wikimedia.org/wikipedia/commons/thumb/f/fa/Link_pra_pagina_principal_da_Wikipedia-PT_em_codigo_QR_b.svg/280px-Link_pra_pagina_principal_da_Wikipedia-PT_em_codigo_QR_b.svg.png";
    private static string $examplePixCode   = "00020126580014br.gov.bcb.pix0136123e4567-e12b-12d1-a456-426655440000 5204000053039865802BR5913Fulano de Tal6008BRASILIA62070503***63041D3D";
    private static string $exampleBoletoUrl = "https://www.banese.com.br/conteudo/uploads/2024/01/Modelo-de-Boleto.pdf";

    public function __construct()
    {
        sleep(2);
    }

    public function obterPix(Request $request)
    {
        try {
            $link = LinkPagamento::where("id", $request->input("id"))->first();
            if (is_null($link)) {
                throw new \Exception("Link não encontrado", 404);
            }
            $link->status = LinkPagamento::$processandoPagamento;
            $link->save();

            // send to payment gateway

            return $this->json([
                                   "qr_code"     => self::$examplePixCode,
                                   "qr_code_url" => self::$examplePixUrl,
                                   "link"        => $link
                               ]);
        } catch (\Exception $e) {
            return $this->jsonException($e);
        }
    }

    public function obterBoleto()
    {
        try {
            return $this->json([
                                   "boleto_url" => self::$exampleBoletoUrl,
                               ]);
        } catch (\Exception $e) {
            return $this->jsonException($e);
        }
    }
}
