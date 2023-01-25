<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\User\CadastrarRequest;
use App\Models\Perfil;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function cadastrar(CadastrarRequest $request)
    {
        try {
            DB::beginTransaction();
            $uuid = uuid();
            $data = array_merge($request->all(), ["uuid" => $uuid, "name" => $request->input("perfil")["nome"]]);

            $data["password"]        = Hash::make($data["password"]);
            $data["change_password"] = false;

            $user = new User($data);
            $user->save();
            $userId = $user->id;

            $dataPerfil = array_merge($request->input("perfil"), ["id_user" => $userId]);
            $perfil = new Perfil($dataPerfil);
            $perfil->save();

            DB::commit();

            return $this->json(["uuid_user" => $uuid], 202);
        } catch( Exception $e ) {
            DB::rollback();

            return $this->jsonException($e);
        }
    }

    public function listar(Request $request)
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

    public function buscar(string $uuid)
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

    public function remover(string $uuid)
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
}
