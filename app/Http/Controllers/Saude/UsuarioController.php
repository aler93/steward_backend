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
            $user  = User::getLogged();
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
            $user   = User::getLogged();
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
            $user = User::getLogged();
            if (is_null($user)) {
                return $this->jsonMessage("Usuário não encontrado", 404);
            }

            $dataHora = $request->input("date_time");
            if (is_null($dataHora)) {
                $dataHora = now()->format("d/m/Y H:i:s");
            }

            $perfil = Perfil::where("user_id", "=", $user->id)->first();
            if (is_null($perfil) and is_null($request->input("height"))) {
                return $this->jsonMessage("Não é possível salvar sem a informação de altura", 400);
            }

            if (!is_null($request->input("height")) and $perfil->height != $request->input("height")) {
                $perfil->height = $request->input("height");
                $perfil->save();
            }

            if (is_null($request->input("body_mass"))) {
                return $this->jsonMessage("Não é possível salvar sem a informação de massa corporal", 422);
            }

            $dados = [
                "user_id"     => $user->id,
                "height"      => $perfil->height,
                "date_time"   => $dataHora,
                "body_mass"   => $request->input("body_mass"),
                "observation" => $request->input("observation")
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
