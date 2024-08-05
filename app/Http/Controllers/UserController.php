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
    private static array $responses = [
        "en-US" => [
            "userNotFound" => "User not found",
        ],
        "pt-BR" => [
            "userNotFound" => "Usuário não encontrado",
        ]
    ];

    /**
     * @OA\Post(
     *     path="/user",
     *     summary="Cadastrar",
     *     tags={"Usuário"},
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
     *                 example={"email": "fulano@exemplo.com.br", "password": "S4af3P4assword", "perfil": {"nome": "Fulano da Silva", "cpf": 61141289075, "cpf_responsavel": false, "telefone": "48998673412", "altura": 1.75, "avatar_url": "https://t3.ftcdn.net/jpg/05/53/79/60/360_F_553796090_XHrE6R9jwmBJUMo9HKl41hyHJ5gqt9oz.jpg"}}
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

            $dataPerfil["telefone"] = filtrarNumeros($dataPerfil["telefone"] ?? "");
            $dataPerfil["cpf"]      = filtrarNumeros($dataPerfil["cpf"] ?? "");

            $perfil = new Perfil($dataPerfil);
            $perfil->save();

            DB::commit();

            return $this->json(["uuid_user" => $uuid], 201);
        } catch( Exception $e ) {
            DB::rollback();

            return $this->jsonException($e);
        }
    }

    /**
     * @OA\Get(
     *     path="/user",
     *     summary="Listar",
     *     description="Lista usuários cadastrados no BD. Necessário permissão admin.",
     *     tags={"Usuário"},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="limit",
     *                     type="integer",
     *                 ),
     *                 @OA\Property(
     *                     property="offset",
     *                     type="integer",
     *                 ),
     *                 example={"limit": 15, "offset": 0}
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Ok",
     *         @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                  @OA\Property(
     *                      property="usuarios",
     *                      type="json",
     *                      example={"usuarios": {"uuid": "7a02d1a0-1bd7-4d55-a32d-05e6ad3bee10","email": "exemplo@mail.com.br","email_verified_at": null,"change_password": true,"created_at": "2024-04-25T11:43:40.000000Z","updated_at": "2024-04-25T11:43:40.000000Z","admin": false}},
     *                  )
     *              )
     *         )
     *     )
     * )
     */
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

    /**
     * @OA\Get(
     *     path="/user/{uuid}",
     *     summary="Busca UUID",
     *     description="Busca um usuário com base no UUID passado na URL",
     *     tags={"Usuário"},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="uuid",
     *                     type="string",
     *                 ),
     *                 example={"uuid": "7a02d1a0-1bd7-4d55-a32d-05e6ad3bee10"}
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Ok",
     *         @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                  @OA\Property(
     *                      property="usuario",
     *                      type="json",
     *                      example={"uuid": "7a02d1a0-1bd7-4d55-a32d-05e6ad3bee10","email": "exemplo@mail.com.br","email_verified_at": null,"change_password": true,"created_at": "2024-04-25T11:43:40.000000Z","updated_at": "2024-04-25T11:43:40.000000Z","admin": false,"perfil": {"nome": "Usuário Exemplo","cpf": "61141289075","cpf_responsavel": false,"telefone": "48998673412","altura": "1.75","avatar_url": "https://t3.ftcdn.net/jpg/05/53/79/60/360_F_553796090_XHrE6R9jwmBJUMo9HKl41hyHJ5gqt9oz.jpg"}},
     *                  )
     *              )
     *         )
     *     )
     * )
     */
    public function buscar(string $uuid): JsonResponse
    {
        $loc = env("APP_LOCALE");
        try{
            $user = User::whereUuid($uuid)->with("perfil")->first();

            if( is_null($user) ) {
                throw new Exception(self::$responses[$loc]["userNotFound"], 404);
            }

            return $this->json(["usuario" => $user->toArray()]);
        }catch( Exception $e ) {
            return $this->jsonException($e, $e->getCode());
        }
    }

    /**
     * @OA\Delete(
     *     path="/user/{uuid}",
     *     summary="Remover",
     *     description="Deleta um usuário (soft delete)",
     *     tags={"Usuário"},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="uuid",
     *                     type="string",
     *                 ),
     *                 example={"uuid": "7a02d1a0-1bd7-4d55-a32d-05e6ad3bee10"}
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="No content"
     *     )
     * )
     */
    public function remover(string $uuid): JsonResponse
    {
        try {
            DB::beginTransaction();

            $user   = User::where("uuid", "=", $uuid)->first();
            //$perfil = Perfil::where("id_user", "=", $user->id)->first();

            //$perfil->forceDelete();
            $user->deleted_at = now();
            $user->save();

            DB::commit();

            return $this->json(null, 204);
        }catch( Exception $e ) {
            DB::rollBack();

            return $this->jsonException($e);
        }
    }

    /**
     * @OA\Put(
     *     path="/user/{uuid}",
     *     summary="Atualizar",
     *     description="Atualiza um usuário",
     *     tags={"Usuário"},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="uuid",
     *                     type="string",
     *                 ),
     *                 example={"uuid": "7a02d1a0-1bd7-4d55-a32d-05e6ad3bee10"}
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="No content"
     *     )
     * )
     */
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

    /**
     * @OA\Patch(
     *     path="/user/{uuid}",
     *     summary="Admin",
     *     description="Atualiza o parâmetro admin de um usuário",
     *     tags={"Usuário"},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="uuid",
     *                     type="string",
     *                 ),
     *                 example={"uuid": "7a02d1a0-1bd7-4d55-a32d-05e6ad3bee10"}
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="No content"
     *     )
     * )
     */
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
