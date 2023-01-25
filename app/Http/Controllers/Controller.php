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
        return response()->json($data);
    }

    protected function jsonException(Exception $e)
    {
        if( env("APP_DEBUG") ) {
            dd($e);
        }
        $resp = [
            "message" => $e->getMessage(),
            "line"    => $e->getLine(),
        ];

        return $this->json($resp);
    }
}
