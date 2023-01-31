<?php

namespace App\Http\Controllers\Saude;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;

class UsuarioController extends Controller
{
    public function estatisticas(string $uuidUser) 
    {
        try {
            $dados = [];

            return $this->json(["estatisticas" => $dados]);
        } catch( Exception $e ) {
            return $this->jsonException($e);
        }
    }
}
