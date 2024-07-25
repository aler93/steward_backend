<?php

namespace App\Services\SistemaCep;

use App\Services\SistemaCep\Viacep\ViaCep;

class Cep
{
    private array $provedores = ["local", "viacep", "opencep"];

    public function buscarCep($cep): array
    {
        $busca = $this->viacep($cep);

        if( empty($busca["cep"]) ) {
            $busca = $this->openCep($cep);
        }

        return $busca;
    }

    private function openCep($cep)
    {
        $open     = new ViaCep();
        $endereco = $open->buscar($cep);

        return [
            "cep"    => $endereco->cep,
            "rua"    => $endereco->rua,
            "bairro" => $endereco->bairro,
            "cidade" => $endereco->cidade,
            "estado" => $endereco->estado,
            "pais"   => $endereco->pais,
        ];
    }

    private function viacep($cep)
    {
        $via      = new ViaCep();
        $endereco = $via->buscar($cep);

        return [
            "cep"    => $endereco->cep,
            "rua"    => $endereco->rua,
            "bairro" => $endereco->bairro,
            "cidade" => $endereco->cidade,
            "estado" => $endereco->estado,
            "pais"   => $endereco->pais,
        ];
    }
}