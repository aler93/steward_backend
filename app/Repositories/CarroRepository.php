<?php

namespace App\Repositories;

use App\Models\Lookup;
use App\Models\Produto;
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
}
