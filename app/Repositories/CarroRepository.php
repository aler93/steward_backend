<?php

namespace App\Repositories;

use App\Models\Carro;
use App\Models\Lookup;
use App\Models\Produto;
use Exception;
use Illuminate\Http\Request;

class CarroRepository
{
    private $lookup = "transmissao";

    public function validarIdTransmissao(int $idLookup): bool
    {
        $look = Lookup::where("id", "=", $idLookup)->first();
        if(is_null($look)) {
            return false;
        }

        return $look->id_externo == $this->lookup;
    }

    public function carroPorUuid(string $uuid, bool $throwNotFound = true): ?Carro
    {
        $carro = Carro::where("uuid", "=", $uuid)->first();

        if( is_null($carro) and $throwNotFound ) {
            throw new Exception("Carro não encontrado", 404);
        }

        return $carro;
    }
}
