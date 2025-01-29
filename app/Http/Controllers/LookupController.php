<?php

namespace App\Http\Controllers;

use App\Services\SistemaCep\Cep;
use Illuminate\Http\Request;
use App\Models\TipoPagamento;
use App\Models\CanalComunicacao;
use Exception;

class LookupController extends Controller
{
    public function tiposPagamentos()
    {
        try {
            $tipos = TipoPagamento::where("ativo", true)->get();

            return $this->json(["tipos_pagamento" => $tipos]);
        } catch (Exception $e) {
            return $this->jsonException($e);
        }
    }

    public function canaisComunicacao()
    {
        try {
            return $this->json(["canais" => CanalComunicacao::all()]);
        } catch (Exception $e) {
            return $this->jsonException($e);
        }
    }

    public function buscarCep(string $cep)
    {
        $buscador = new Cep();

        return $this->json(["endereco" => $buscador->buscarCep($cep),]);
    }
}
