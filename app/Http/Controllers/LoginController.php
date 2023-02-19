<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Exception;

class LoginController extends Controller
{
    public function login(Request $request): JsonResponse
    {
        $credentials = request(['email', 'password']);
        $ttl         = env("JWT_EXPIRE", 4) * 60 * 60;
    
        try {
            $token = auth()->setTTL($ttl)->attempt($credentials);

            if( !strlen($token) ) {
                return $this->json(["message" => "Usuário ou senha incorreta"], 401);
            }

            return $this->json([
                "access_token" => $token,
                "token_type"   => "Bearer",
                "expires_in"   => env("JWT_EXPIRE", 4) * 60 * 60,
            ]);
        } catch( Exception $e ) {
            return $this->jsonException($e);
        }
    }

    public function logout(Request $request): JsonResponse
    {
        try {
            auth()->logout();

            return $this->json(["message" => "Token de acesso destruído"]);
        } catch( Exception $e ) {
            return $this->jsonException($e);
        }
    }

    public function refresh(Request $request): JsonResponse
    {
        try {
            $token = auth()->refresh();

            return $this->json(["access_token" => $token]);
        } catch( Exception $e ) {
            return $this->jsonException($e);
        }
    }

    public function getMe(): JsonResponse
    {
        try {
            $user = auth()->user();

            if( is_null($user) ) {
                return $this->json(["message" => "Token inválido"], 403);
            }

            return $this->json(["usuario" => $user], 202);
        } catch( Exception $e ) {
            return $this->jsonException($e);
        }
    }
}
