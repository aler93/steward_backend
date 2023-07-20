<?php

namespace App\Http\Controllers;

use App\Http\Requests\ForgotPassword;
use App\Models\UserMenu;
use Illuminate\Http\Request;
use App\Http\Requests\User\CadastrarRequest;
use App\Models\Perfil;
use App\Models\User;
use App\Models\UserSenhaRecuperacao;
use App\Repositories\UserRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use \Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    private UserRepository $repository;

    public function __construct(UserRepository $userRepository)
    {
        $this->repository = $userRepository;
    }

    public function cadastrar(CadastrarRequest $request): JsonResponse
    {
        try {
            DB::beginTransaction();
            $uuid = uuid();
            $data = array_merge($request->all(), ["uuid" => $uuid]);

            $data["password"]        = Hash::make($data["password"]);
            $data["change_password"] = false;

            $user = new User($data);
            $user->save();
            $userId = $user->id;

            $dataPerfil = array_merge($request->input("perfil"), ["id_user" => $userId]);

            $dataPerfil["telefone"] = isset($dataPerfil["telefone"]) ? filtrarNumeros($dataPerfil["telefone"]) : "";
            $dataPerfil["cpf"]      = isset($dataPerfil["cpf"]) ? filtrarNumeros($dataPerfil["cpf"]) : "";
            $dataPerfil["sexo"]     = isset($dataPerfil["sexo"]) ? strtoupper($dataPerfil["sexo"]) : "N";

            $perfil = new Perfil($dataPerfil);
            $perfil->save();

            DB::commit();

            return $this->json(["uuid_user" => $uuid], 201);
        } catch (Exception $e) {
            DB::rollback();

            return $this->jsonException($e);
        }
    }

    public function listar(Request $request): JsonResponse
    {
        $limit  = $request->input("limit") ?? 15;
        $offset = $request->input("offset") ?? 0;

        try {
            $users = User::limit($limit)->offset($offset)->get();

            return $this->json(["usuarios" => $users]);
        } catch (Exception $e) {
            return $this->jsonException($e);
        }
    }

    public function buscar(string $uuid): JsonResponse
    {
        try {
            $user = User::whereUuid($uuid)->with("perfil")->first();

            if (is_null($user)) {
                throw new Exception("Usuário não encontrado", 404);
            }

            return $this->json($user->toArray());
        } catch (Exception $e) {
            return $this->jsonException($e, $e->getCode());
        }
    }

    public function remover(string $uuid): JsonResponse
    {
        try {
            DB::beginTransaction();

            $user = User::where("uuid", "=", $uuid)->first();

            $perfil = Perfil::where("id_user", "=", $user->id)->first();

            $perfil->forceDelete();
            $user->forceDelete();

            DB::commit();

            return $this->json(null, 204);
        } catch (Exception $e) {
            DB::rollBack();

            return $this->jsonException($e);
        }
    }

    public function atualizar(Request $request, string $uuid): JsonResponse
    {
        if (empty($request->all())) {
            return $this->jsonMessage("Payload inválida", 422);
        }

        try {
            DB::beginTransaction();

            $user   = User::where("uuid", "=", $uuid)->first();
            if( is_null($user) ) {
                throw new Exception("Usuário não encontrado", 404);
            }
            $perfil = Perfil::where("id_user", "=", $user->id)->first();

            $dataPerfil             = $request->input("perfil");
            $dataPerfil["telefone"] = $dataPerfil["telefone"] ? filtrarNumeros($dataPerfil["telefone"]) : null;
            $dataPerfil["cpf"]      = $dataPerfil["cpf"] ? filtrarNumeros($dataPerfil["cpf"]) : null;

            $dataUser = $request->all();
            unset($dataUser["perfil"]);
            $dataUser["admin"] = false;

            unset($dataUser["id"]);
            unset($dataUser["uuid"]);

            $perfil->update($dataPerfil);
            $user->update($dataUser);

            $out["user"]           = $user->toArray();
            $out["user"]["perfil"] = $perfil->toArray();

            DB::commit();

            return $this->json($out);
        } catch (Exception $e) {
            DB::rollBack();

            return $this->jsonException($e);
        }
    }

    public function admin(string $uuid): JsonResponse
    {
        try {
            $user = User::where("uuid", "=", $uuid)->first();

            $user->admin = !$user->admin;
            $user->save();

            return $this->jsonNoContent();
        } catch (Exception $e) {
            return $this->jsonException($e);
        }
    }

    public function obterMeuMenu(Request $request): JsonResponse
    {
        $idUser = $request->user()->id;
        $cols = [
            "menu_items.name",
            "menu_items.path",
        ];

        try {
            $items = UserMenu::select($cols)->where("id_user", "=", $idUser)
                             ->join("menu_items", "menu_items.id", "=", "user_menu.id_menu")->get();

            return $this->json($items);
        } catch (Exception $e) {
            return $this->jsonException($e);
        }
    }

    public function forgotPassword(ForgotPassword $request): JsonResponse
    {
        $translate = ["email" => "e-mail", "telegram" => "Telegram"];
        try {
            if(!isset($translate[$request->input("canal")])) {
                throw new Exception("Serviço para recuperação de senha não cadastrado");
            }

            $user = User::where("email", "=", $request->input("email"))->first();
            if( is_null($user) ) {
                throw new Exception("E-mail não encontrado");
            }

            $token = $this->repository->gerarToken();
            $validade = now()->addDay();

            $data = [
                "validade_token" => $validade->format("d/m/Y H:i")
            ];
            if( env("APP_DEBUG") ) {
                $data["token"] = $token;
            }

            $msg = "Chave para recuperação enviada com sucesso para seu {$translate[$request->input('canal')]}";

            $recup = new UserSenhaRecuperacao([
                "uuid"       => uuid(),
                "token"      => $token,
                "email"      => $request->input('email'),
                "canal"      => $request->input('canal'),
                "valido_ate" => $validade,
            ]);
            $recup->save();

            $r = $this->repository->enviarTokenRecuperacao($recup);
            if( $r ) {
                return $this->jsonResponse("Mensagem enviada com sucesso", $msg, $data);
            }

            return $this->jsonResponse("Ocorreu um erro ao enviar a mensagem...");
        } catch( Exception $e ) {
            return $this->jsonException($e, $e->getCode());
        }
    }
}
