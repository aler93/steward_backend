<?php

namespace App\Http\Controllers\Saude;

use App\Http\Controllers\Controller;
use App\Models\Perfil;
use App\Models\User;
use App\Models\UserImc;
use Illuminate\Http\Request;
use Exception;

class UsuarioController extends Controller
{
    public function estatisticas(string $uuidUser, Request $request) 
    {
        $limit  = $request->input("limit") ?? 50;
        $offset = $request->input("offset") ?? 0;

        try {
            $user  = User::where("uuid", "=", $uuidUser)->first();
            $dados = UserImc::where("id_user", "=", $user->id)->orderByDesc("data_hora")->limit($limit)->offset($offset)->get();

            foreach( $dados as &$row ) {
                $row["imc"] = round($row["massa_corporal"] / ( $row["altura"] ** 2 ), 2);
            }

            return $this->json(["estatisticas" => $dados]);
        } catch( Exception $e ) {
            return $this->jsonException($e);
        }
    }

    public function salvar(Request $request, string $uuidUser) 
    {
        try {
            if( is_null($request->input("data_hora")) ) {
                return $this->jsonMessage("Adicione a informação de data e hora", 422);
            }
            $user = User::where("uuid", "=", $uuidUser)->first();
            if( is_null($user) ) {
                return $this->jsonMessage("Usuário não encontrado", 404);
            }
            $perfil = Perfil::where("id_user", "=", $user->id)->first();
            if( is_null($perfil->altura) and is_null($request->input("altura")) ) {
                return $this->jsonMessage("Não é possível salvar sem a informação de altura", 400);
            }

            if( !is_null($request->input("altura")) and $perfil->altura != $request->input("altura") ) {
                $perfil->altura = $request->input("altura");
                $perfil->save();
            }

            $dados = [
                "id_user"        => $user->id,
                "altura"         => $perfil->altura,
                "data_hora"      => $request->input("data_hora"),
                "massa_corporal" => $request->input("massa_corporal"),
                "observacoes"    => $request->input("observacoes")
            ];

            $imc = new UserImc($dados);
            $imc->save();

            return $this->json(["registro" => $imc]);
        } catch( Exception $e ) {
            return $this->jsonException($e);
        }
    }
}
