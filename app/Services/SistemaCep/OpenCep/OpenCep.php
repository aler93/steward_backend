<?php

namespace App\Services\SistemaCep\OpenCep;

use App\Services\SistemaCep\CepEstrutura;
use App\Services\SistemaCep\CepObject;
use Illuminate\Support\Facades\Http;

class OpenCep implements CepEstrutura
{
    private static string $url = 'https://opencep.com/v1/';

    public function buscar(string $cep): CepObject
    {
        $req  = Http::get(self::$url . $cep);
        $json = json_decode($req->body(), 1);

        $resultado = new CepObject($cep, $json["logradouro"], $json["bairro"], $json["localidade"], $json["uf"], "Brasil");

        return $resultado;
    }
}