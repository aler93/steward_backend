<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Services\HttpStatus;
use Illuminate\Http\Response;

class AuthUser
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param \Closure(Request): (Response|RedirectResponse) $next
     * @param null|string $self, param to be validated, such as if user is admin
     * @return JsonResponse|RedirectResponse|Response|mixed
     */
    public function handle(Request $request, Closure $next, $self = null)
    {
        $user = auth()->user();

        if( is_null($user) ) {
            return response()->json(["message" => "Token JWT não encontrado ou inválido"], HttpStatus::$forbidden);
        }

        if( $self == "admin" ) {
            if( !$user->admin ) {
                return response()->json(["message" => "Você não tem permissão para executar essa ação"], HttpStatus::$unauthorized);
            }
        }

        return $next($request);
    }
}
