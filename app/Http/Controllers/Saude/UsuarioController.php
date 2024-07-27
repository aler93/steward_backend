<?php

namespace App\Http\Controllers\Saude;

use App\Http\Controllers\Controller;
use App\Models\Perfil;
use App\Models\User;
use App\Models\UserImc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Exception;

class UsuarioController extends Controller
{
    public function estatisticas(Request $request)
    {
        $limit  = $request->input("limit") ?? 50;
        $offset = $request->input("offset") ?? 0;

        try {
            $user  = auth()->user();
            $dados = UserImc::where("id_user", "=", $user->id)
                            ->orderByDesc("data_hora")
                            ->limit($limit)
                            ->offset($offset)
                            ->get();

            foreach ($dados as &$row) {
                $row["imc"]              = $row["massa_corporal"] / ($row["altura"] ** 2);
                $row["imc_f"]            = round($row["imc"], 2);
                $row["altura_f"]         = number_format($row["altura"], 2, ",") . "m";
                $row["massa_corporal_f"] = number_format($row["massa_corporal"], 2, ",") . " kg";
                $row["data_hora_f"]      = date("d/m/Y H:i", strtotime($row["data_hora"]));
            }

            return $this->json(["estatisticas" => $dados]);
        } catch (Exception $e) {
            return $this->jsonException($e);
        }
    }

    public function exportar(Request $request)
    {
        try {
            $user   = auth()->user();
            $perfil = $perfil = Perfil::where("id_user", "=", $user->id)->first();
            $dados  = UserImc::where("id_user", "=", $user->id)->orderByDesc("data_hora")->get();

            foreach ($dados as &$row) {
                $row["imc"]   = $row["massa_corporal"] / ($row["altura"] ** 2);
                $row["imc_f"] = round($row["imc"], 2);
            }

            $user->perfil = $perfil;

            $result = ["user" => $user, "estatisticas" => $dados];
            Storage::put("users/" . $user->uuid . ".json", json_encode($result));

            return $this->json(["user" => $user, "estatisticas" => $dados]);
        } catch (Exception $e) {
            return $this->jsonException($e);
        }
    }

    public function salvar(Request $request)
    {
        try {
            $user = auth()->user();
            if (is_null($user)) {
                return $this->jsonMessage("Usuário não encontrado", 404);
            }

            $dataHora = $request->input("data_hora");
            if (is_null($dataHora)) {
                $dataHora = now()->format("d/m/Y H:i:s");
            }

            $perfil = Perfil::where("id_user", "=", $user->id)->first();
            if (is_null($perfil) and is_null($request->input("altura"))) {
                return $this->jsonMessage("Não é possível salvar sem a informação de altura", 400);
            }

            if (!is_null($request->input("altura")) and $perfil->altura != $request->input("altura")) {
                $perfil->altura = $request->input("altura");
                $perfil->save();
            }

            if (is_null($request->input("massa_corporal"))) {
                return $this->jsonMessage("Não é possível salvar sem a informação de massa corporal", 422);
            }

            $dados = [
                "id_user"        => $user->id,
                "altura"         => $perfil->altura,
                "data_hora"      => $dataHora,
                "massa_corporal" => $request->input("massa_corporal"),
                "observacoes"    => $request->input("observacoes")
            ];

            $imc = new UserImc($dados);
            $imc->save();

            return $this->json(["registro" => $imc]);
        } catch (Exception $e) {
            return $this->jsonException($e);
        }
    }

    public function updatePerfil(Request $request)
    {
        try {
            $upd = [
                "altura"     => $request->input("altura"),
                "cpf"        => filtrarNumeros($request->input("cpf")),
                "telefone"   => filtrarNumeros($request->input("telefone")),
                "avatar_url" => $request->input("avatar_url"),
                "nome"       => $request->input("nome"),
            ];

            Perfil::where("id_user", "=", $request->user()->id)->first()
                  ->update($upd);

            return $this->jsonNoContent();
        } catch (Exception $e) {
            return $this->jsonException($e);
        }
    }
}
