<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;

class AuthUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $self = null)
    {
        $user = auth()->user();

        if( is_null($user) ) {
            return response()->json(["message" => "Token JWT não encontrado na requisição"], 403);
        }

        if( $self == "self" ) {
            $url  = explode("?", $request->getUri())[0];
            $uri  = explode("/", $url);
            $uuid = $uri[count($uri) - 1];

            if( $user->uuid != $uuid ) {
                return response()->json(["message" => "Você não tem permissão para acessar esse recurso"], 401);
            }
        }

        if( $self == "admin" ) {
            if( !$user->admin ) {
                return response()->json(["message" => "Você não tem permissão para executar essa ação"], 401);
            }
        }

        if( $self == "dev" ) {
            if( !$user->dev ) {
                return response()->json(["message" => "Você não tem permissão para executar essa ação"], 401);
            }
        }

        return $next($request);
    }
}
