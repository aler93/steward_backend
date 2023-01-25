<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Exception;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function json($data, int $status = 200)
    {
        return response()->json($data, $status);
    }

    protected function jsonMessage(string $message, int $status = 200)
    {
        return $this->json(["message" => $message], $status);
    }

    protected function jsonResponse(string $title, string $message = "", array $data = [], int $status = 200)
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

    protected function jsonException(Exception $e)
    {
        if( env("APP_DEBUG") ) {
            dd($e);
        }
        $resp = [
            "message" => $e->getMessage(),
            "line"    => $e->getLine(),
            "trace"   => $e->getTrace(),
        ];

        return $this->json($resp);
    }
}
