<?php

namespace App\Http\Controllers\Vehicle;

use App\Http\Controllers\Controller;
use App\Models\VehicleModel;
use Exception;
use Illuminate\Http\Request;

class ModelsController extends Controller
{
    public function list(int $brandId, Request $request)
    {
        try{
            $v = VehicleModel::where("brand_id", "=", $brandId)->orderBy("model")->get();

            return $this->json([
                "list" => $v->toArray(),
            ]);
        }catch( Exception $e ) {
            return $this->jsonException($e);
        }
    }
}
