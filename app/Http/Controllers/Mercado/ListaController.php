<?php

namespace App\Http\Controllers\Mercado;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;

class ListaController extends Controller
{
    public function cadastrarLista(Request $request)
    {
        try {
            $dados = $request->all();

            return $this->json($dados);
        } catch( Exception $e ) {
            return $this->jsonException($e);
        }
    }
}
