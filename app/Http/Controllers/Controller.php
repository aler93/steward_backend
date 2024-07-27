<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\JsonResponse;
use Exception;

/**
 * @OA\Info(
 *      version="0.1.0",
 *      title="Steward System",
 *      description="Documentação",
 *      @OA\Contact(
 *          email="anaimayer3@gmail.com"
 *      ),
 *      @OA\License(
 *          name="Proprietary",
 *      ),
 * ),
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function json($data, $status = 200): jsonResponse
    {
        if (!in_array($status, array_keys(Response::$statusTexts))) {
            $status = 500;
        }

        return response()->json($data, $status);
    }

    protected function jsonMessage(string $message, int $status = 200): jsonResponse
    {
        return $this->json(["msg" => $message], $status);
    }

    protected function jsonCreated(string $message, array $data = []): jsonResponse
    {
        return $this->json(["msg" => $message, "recurso" => $data], 201);
    }

    protected function jsonNoContent(): jsonResponse
    {
        return $this->json(null, 204);
    }

    protected function jsonResponse(string $title, string $message = "", array $data = [], int $status = 200): jsonResponse
    {
        if (!strlen($title)) {
            $title = "Requisição concluída";
        }

        $response = [
            "titulo"  => $title,
            "msg"     => $message,
            "recurso" => $data,
            "status"  => http_response_code($status)
        ];

        return $this->json($response, $status);
    }

    protected function jsonException(Exception $e, $status = 500): jsonResponse
    {
        $resp = [
            "message" => $e->getMessage(),
            "line"    => $e->getLine(),
        ];

        if (env("APP_DEBUG")) {
            $resp["trace"] = $e->getTrace();
        }

        return $this->json($resp, $status);
    }

    protected function render(string $view, ?array $data = [])
    {
        $conf = [
            "bs_css"       => env("APP_URL") . ":" . env("APP_PORT") . "/public?file=css/bootstrap.min.css",
            "bs_js"        => env("APP_URL") . ":" . env("APP_PORT") . "/public?file=js/bootstrap.bundle.min.js",
            "jquery"       => env("APP_URL") . ":" . env("APP_PORT") . "/public?file=js/jquery-3.7.1.min.js",
            "functions_js" => env("APP_URL") . ":" . env("APP_PORT") . "/public?file=js/functions.js",
            "url"          => env("APP_URL") . ":" . env("APP_PORT"),
            "api"          => env("APP_URL") . ":" . env("APP_PORT") . "/api",
        ];

        return view("app", ["view" => $view, "data" => $data, "conf" => $conf]);
    }
}
