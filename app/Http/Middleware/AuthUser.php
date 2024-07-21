<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use App\Services\HttpStatus;

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
            return response()->json(["message" => "Token JWT não encontrado ou inválido"], HttpStatus::$forbidden);
        }

        if( $self == "self" ) {
            return $next($request);
            $url  = explode("?", $request->getUri())[0];
            $uri  = explode("/", $url);
            $uuid = $uri[count($uri) - 1];
            dd($uuid);

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
