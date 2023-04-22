<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Ramsey\Uuid\Uuid;

class AuthUser
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param \Closure(Request): (Response|RedirectResponse) $next
     * @param null $self
     * @return JsonResponse
     */
    public function handle(Request $request, Closure $next, $self = null)
    {
        $user = auth()->user();

        if( is_null($user) ) {
            return response()->json(["message" => "Token JWT não encontrado na requisição"], 403);
        }

        if( $user->admin ) {
            return $next($request);
        }

        /*if( $self == "self" ) {
            $uuid = $request->input("uuid_user");
            if( is_null($uuid) ) {
                return response()->json(["message" => "É necessário identificar o usuário na requisição"], 401);
            }

            if( $user->uuid != $uuid ) {
                return response()->json(["message" => "Você não tem permissão para acessar esse recurso"], 401);
            }
        }*/

        return $next($request);
    }
}
