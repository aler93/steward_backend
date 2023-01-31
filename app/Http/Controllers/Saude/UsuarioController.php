<?php

namespace App\Http\Controllers\Saude;

use App\Http\Controllers\Controller;
use App\Models\Perfil;
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

    public function salvar(Request $request, string $uuidUser) 
    {
        try {
            $perfil = Perfil::where("uuid", "=", $uuidUser)->first();
            if( is_null($perfil) ) {
                return $this->jsonMessage("Usuário não encontrado", 404);
            }
            if( is_null($perfil->altura) and is_null($request->input("altura")) ) {
                return $this->jsonMessage("Não é possível salvar sem a informação de altura", 400);
            }

            if( $perfil->altura != $request->input("altura") ) {
                $perfil->altura = $request->input("altura");
                $perfil->save();
            }

            $dados = [];

            return $this->json(["estatisticas" => $dados]);
        } catch( Exception $e ) {
            return $this->jsonException($e);
        }
    }
}
