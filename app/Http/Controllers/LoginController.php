<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use App\Models\Perfil;

class LoginController extends Controller
{
    /**
     * @OA\Post(
     *     path="/login",
     *     summary="Login",
     *     tags={"Auth"},
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
     *                 example={"email": "fulano@exemplo.com.br", "password": "S4af3P4assword"}
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
     *                      property="access_token",
     *                      type="string"
     *                  ),
     *                  @OA\Property(
     *                      property="token_type",
     *                      type="string"
     *                  ),
     *                  @OA\Property(
     *                      property="expires_in",
     *                      type="integer"
     *                  ),
     *                  example={"access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0OjgwODAvYXBpL2xvZ2luIiwiaWF0IjoxNzE0MDU4NDI1LCJleHAiOjE3MTQ5MjI0MjUsIm5iZiI6MTcxNDA1ODQyNSwianRpIjoiVGxZUzhQYXFpNDdKQnhpdiIsInN1YiI6IjMiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.2xKUA7vbL80YHU9lKv4pKbXSTUC7lk-GVgfb-nLDxhY", "token_type": "Bearer", "expires_in": 14400}
     *              )
     *         )
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized",
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="message",
     *                     type="string",
     *                 ),
     *                 example={"message": "Usuário ou senha incorreta"}
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Unprocessable content",
     *     ),
     * )
     */
    public function login(Request $request)
    {
        $credentials = request(['email', 'password']);
        $ttl         = env("JWT_EXPIRE", 4) * 60 * 60;

        try {
            $token = auth()->setTTL($ttl)->attempt($credentials);

            if (!strlen($token)) {
                return $this->json(["message" => "Usuário ou senha incorreta"], 401);
            }

            return $this->json([
                                   "access_token" => $token,
                                   "token_type"   => "Bearer",
                                   "expires_in"   => env("JWT_EXPIRE", 4) * 60 * 60,
                                   "expires_at"   => now()->addSeconds(env("JWT_EXPIRE", 4) * 60 * 60),
                               ]);
        } catch (Exception $e) {
            return $this->jsonException($e);
        }
    }

    /**
     * @OA\Post(
     *     path="/logout",
     *     summary="Logout",
     *     tags={"Auth"},
     *     @OA\Response(
     *         response=204,
     *         description="No content",
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="message",
     *                     type="string",
     *                 ),
     *                 example={"message": "Token de acesso destruído"}
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad request",
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="message",
     *                     type="string",
     *                 ),
     *                 example={"message": "Token could not be parsed from the request."}
     *             )
     *         )
     *     ),
     * )
     */
    public function logout(Request $request)
    {
        try {
            auth()->logout();

            return $this->json(["message" => "Token de acesso destruído"]);
        } catch (Exception $e) {
            return $this->jsonException($e, 400);
        }
    }

    /**
     * @OA\Post(
     *     path="/refresh",
     *     summary="Refresh",
     *     tags={"Auth"},
     *     @OA\Response(
     *         response=200,
     *         description="Ok",
     *         @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                  @OA\Property(
     *                      property="access_token",
     *                      type="string"
     *                  ),
     *                  example={"access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0OjgwODAvYXBpL2xvZ2luIiwiaWF0IjoxNzE0MDU4NDI1LCJleHAiOjE3MTQ5MjI0MjUsIm5iZiI6MTcxNDA1ODQyNSwianRpIjoiVGxZUzhQYXFpNDdKQnhpdiIsInN1YiI6IjMiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.2xKUA7vbL80YHU9lKv4pKbXSTUC7lk-GVgfb-nLDxhY"}
     *              )
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad Request",
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="message",
     *                     type="string",
     *                 ),
     *                 example={"message": "Token could not be parsed from the request."}
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Forbidden",
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="message",
     *                     type="string",
     *                 ),
     *                 example={"message": "The token has been blacklisted"}
     *             )
     *         )
     *     ),
     * )
     */
    public function refresh(Request $request)
    {
        try {
            $token = auth()->refresh();

            return $this->json(["access_token" => $token]);
        } catch (Exception $e) {
            $status = 500;
            if ($e->getMessage() == "The token has been blacklisted") {
                $status = 403;
            }
            if ($e->getMessage() == "Token could not be parsed from the request.") {
                $status = 400;
            }
            return $this->jsonException($e, $status);
        }
    }

    /**
     * @OA\Get(
     *     path="/get-me",
     *     summary="Get me",
     *     tags={"Auth"},
     *     @OA\Response(
     *         response=200,
     *         description="Ok",
     *         @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                  @OA\Property(
     *                      property="usuario",
     *                      type="json"
     *                  ),
     *                  example={"usuario": {"uuid": "7a02d1a0-1bd7-4d55-a32d-05e6ad3bee10","email": "exemplo@mail.com.br","email_verified_at": null,"change_password": true,"created_at": "2024-04-25T11:43:40.000000Z","updated_at": "2024-04-25T11:43:40.000000Z","admin": false,"perfil": {"nome": "Usuário Exemplo","cpf": "61141289075","cpf_responsavel": false,"telefone": "48998673412","altura": "1.75","avatar_url": "https://t3.ftcdn.net/jpg/05/53/79/60/360_F_553796090_XHrE6R9jwmBJUMo9HKl41hyHJ5gqt9oz.jpg"}}}
     *              )
     *         )
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Forbidden",
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="message",
     *                     type="string",
     *                 ),
     *                 example={"message": "Token inválido/Não encontrado"}
     *             )
     *         )
     *     ),
     * )
     */
    public function getMe()
    {
        try {
            $user = auth()->user();

            if (is_null($user)) {
                return $this->json(["message" => "Token inválido"], 403);
            }

            $perfil       = Perfil::where("id_user", "=", $user->id)->first();
            $user->perfil = $perfil;

            return $this->json(["usuario" => $user], 202);
        } catch (Exception $e) {
            return $this->jsonException($e);
        }
    }
}
