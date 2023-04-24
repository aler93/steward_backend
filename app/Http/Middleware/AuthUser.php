<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Ramsey\Uuid\Uuid;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

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
        try {
            if (!$user = \JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }
        } catch (TokenExpiredException $e) {
            return response()->json(["msg" => 'token_expired'], 403);
        } catch (TokenInvalidException $e) {
            return response()->json(["msg" => 'token_invalid'], 403);
        } catch (JWTException $e) {
            return response()->json(["msg" => 'token_absent'], 401);
        }

        $user = auth()->user();

        if (is_null($user)) {
            return response()->json(["message" => "Token JWT não encontrado na requisição"], 403);
        }

        if ($user->admin) {
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
