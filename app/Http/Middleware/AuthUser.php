<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class AuthUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\JsonResponse
     */
    public function handle(Request $request, Closure $next, $self = null, ... $params)
    {
        $user = auth()->user();

        if( is_null($user) ) {
            return response()->json(["message" => "Token JWT não encontrado na requisição"], 403);
        }

        if( $user->admin ) {
            return $next($request);
        }

        if( $self == "self" ) {
            $uuid = $request->input("uuid_user");
            if( is_null($uuid) ) {
                $url  = explode("?", $request->getRequestUri())[0];
                $params  = explode("/", $url);

                $uuid = $params[3];
                if (!Uuid::isValid($uuid)) {
                    return response()->json(["message" => "UUID inválido..."], 401);
                }
            }

            if( $user->uuid != $uuid ) {
                return response()->json(["message" => "Você não tem permissão para acessar esse recurso"], 401);
            }
        }

        if( $self == "admin" ) {
            if( !$user->admin ) {
                return response()->json(["message" => "Você não tem permissão para executar essa ação"], 401);
            }
        }

        return $next($request);
    }
}
