<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\JsonResponse;
use Exception;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function json($data, int $status = 200): jsonResponse
    {
        return response()->json($data, $status);
    }

    protected function jsonMessage(string $message, int $status = 200): jsonResponse
    {
        return $this->json(["message" => $message], $status);
    }

    protected function jsonCreated(string $message, array $data = []): jsonResponse
    {
        return $this->json(["message" => $message, "recurso" => $data], 201);
    }

    protected function jsonNoContent(): jsonResponse
    {
        return $this->json(null, 204);
    }

    protected function jsonResponse(string $title, string $message = "", array $data = [], int $status = 200): jsonResponse
    {
        if( !strlen($title) ) {
            $title = "Requisição concluída";
        }

        $response = [
            "title"   => $title,
            "message" => $message,
            "data"    => $data,
            "status"  => http_response_code($status)
        ];

        return $this->json($response, $status);
    }

    protected function jsonException(Exception $e): jsonResponse
    {
        $resp = [
            "message" => $e->getMessage(),
            "line"    => $e->getLine(),
        ];

        if( env("APP_DEBUG") ) {
            $resp["trace"] = $e->getTrace();
        }

        return $this->json($resp);
    }
}
