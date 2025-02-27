<?php

namespace App\Http\Controllers\Vehicle;

use App\Http\Controllers\Controller;
use App\Models\VehicleBrand;
use Exception;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function list(Request $request)
    {
        try{
            $v = VehicleBrand::all();

            return $this->json([
                "list" => $v->toArray(),
            ]);
        }catch( Exception $e ) {
            return $this->jsonException($e);
        }
    }
}
