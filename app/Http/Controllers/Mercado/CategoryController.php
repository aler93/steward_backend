<?php

namespace App\Http\Controllers\Mercado;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use Exception;

class CategoriaController extends Controller
{
    public function create(Request $request)
    {
        try {
            $name = ucfirst(strtolower($request->input("name")));
            $row  = ["name" => $name];

            if( strlen($name) <= 0 ) {
                return $this->jsonMessage("Categoria sem nome", 400);
            }

            if( !is_null(ProductCategory::where("name", "=", $name)->first()) ) {
                return $this->jsonMessage("Categoria já cadastrada", 409);
            }

            $cat = new ProductCategory($row);
            $cat->save();

            return $this->jsonCreated("Categoria cadastrada", $cat->toArray());
        } catch( Exception $e ) {
            return $this->jsonException($e);
        }
    }

    public function delete(int $id)
    {
        try {
            ProductCategory::where("id", "=", $id)->forceDelete();

            return $this->jsonNoContent();
        } catch( Exception $e ) {
            return $this->jsonException($e);
        }
    }

    public function list()
    {
        $cols = ["product_categories.id", "product_categories.nome", "cp.nome AS categoria", "product_categories.imagem_url"];
        try {
            $categorias = ProductCategory::select($cols)->leftJoin("product_categories AS cp", "cp.id", "=", "product_categories.id_categoria")
            ->get();

            return $this->json(["categorias" => $categorias->toArray()]);
        } catch( Exception $e ) {
            return $this->jsonException($e);
        }
    }
}
