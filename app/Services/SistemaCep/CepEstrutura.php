<?php

namespace App\Services\SistemaCep;

interface CepEstrutura
{
    public function buscar(string $cep): CepObject;
}
