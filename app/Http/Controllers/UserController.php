<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\User\CadastrarRequest;
use App\Models\Perfil;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use \Illuminate\Http\JsonResponse;

class UserController extends Controller
{
     /**
     * @OA\Post(
     *     path="/users",
     *     summary="Cadastra usuário",
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="email",
     *                     type="string",
     *                 ),
     *                 @OA\Property(
     *                     property="password",
     *                     type="string",
     *                 ),
     *                 @OA\Property(
     *                     property="perfil",
     *                     type="json",
     *                     @OA\Schema(ref="#/components/schemas/PerfilSchema")
     *                 ),
     *                 example={"email": "fulano@exemplo.com.br", "password": "S4af3P4assword", "perfil": {"nome": "Fulano da Silva", "cpf": 61141289075, "cpf_responsavel": false, "telefone": "(48) 9-9867-3412", "altura": 1.75, "avatar_url": "https://t3.ftcdn.net/jpg/05/53/79/60/360_F_553796090_XHrE6R9jwmBJUMo9HKl41hyHJ5gqt9oz.jpg"}}
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Created",
     *         @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                  @OA\Property(
     *                      property="user_uuid",
     *                      type="string",
     *                      example="7a02d1a0-1bd7-4d55-a32d-05e6ad3bee10",
     *                  )
     *              )
     *         )
     *     )
     * )
     */
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

            $dataPerfil["telefone"] = filtrarNumeros($dataPerfil["telefone"]);
            $dataPerfil["cpf"]      = filtrarNumeros($dataPerfil["cpf"]);

            $perfil = new Perfil($dataPerfil);
            $perfil->save();

            DB::commit();

            return $this->json(["uuid_user" => $uuid], 201);
        } catch( Exception $e ) {
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
        }catch( Exception $e ) {
            return $this->jsonException($e);
        }
    }

    public function buscar(string $uuid): JsonResponse
    {
        try{
            $user = User::whereUuid($uuid)->with("perfil")->first();

            if( is_null($user) ) {
                throw new Exception("Usuário não encontrado", 404);
            }

            return $this->json($user->toArray());
        }catch( Exception $e ) {
            return $this->jsonException($e);
        }
    }

    public function remover(string $uuid): JsonResponse
    {
        try {
            DB::beginTransaction();

            $user   = User::where("uuid", "=", $uuid)->first();

            $perfil = Perfil::where("id_user", "=", $user->id)->first();

            $perfil->forceDelete();
            $user->forceDelete();

            DB::commit();

            return $this->json(null, 204);
        }catch( Exception $e ) {
            DB::rollBack();

            return $this->jsonException($e);
        }
    }

    public function atualizar( Request $request, string $uuid ): JsonResponse
    {
        try {
            DB::beginTransaction();

            $user   = User::where("uuid", "=", $uuid)->first();
            $perfil = Perfil::where("id_user", "=", $user->id)->first();

            $dataPerfil = $request->input("perfil");
            $dataPerfil["telefone"] = filtrarNumeros($dataPerfil["telefone"]);
            $dataPerfil["cpf"]      = filtrarNumeros($dataPerfil["cpf"]);

            $dataUser   = $request->all();
            unset($dataUser["perfil"]);
            $dataUser["admin"] = false;

            $perfil->update($dataPerfil);
            $user->update($dataUser);

            DB::commit();

            return $this->json(null, 200);
        }catch( Exception $e ) {
            DB::rollBack();

            return $this->jsonException($e);
        }
    }

    public function admin( string $uuid ): JsonResponse
    {
        try {
            DB::beginTransaction();

            $user   = User::where("uuid", "=", $uuid)->first();

            $user->admin = !$user->admin;
            $user->save();

            DB::commit();

            return $this->json(null, 200);
        }catch( Exception $e ) {
            DB::rollBack();

            return $this->jsonException($e);
        }
    }
}
