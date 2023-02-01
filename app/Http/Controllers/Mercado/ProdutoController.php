<?php

namespace App\Http\Controllers\Mercado;

use App\Http\Controllers\Controller;
use App\Models\CategoriaProduto;
use Illuminate\Http\Request;
use App\Models\Produto;
use Exception;

class ProdutoController extends Controller
{
    public function cadastrarCategoria(Request $request)
    {
        try {
            $nome = ucfirst(strtolower($request->input("nome")));
            $row = ["nome" => $nome];

            if( strlen($nome) <= 0 ) {
                return $this->jsonMessage("Categoria sem nome", 400);
            }

            if( !is_null(CategoriaProduto::where("nome", "=", $nome)->first()) ) {
                return $this->jsonMessage("Categoria já cadastrada", 409);
            }

            $cat = new CategoriaProduto($row);
            $cat->save();

            return $this->jsonCreated("Categoria cadastrada", $cat->toArray());
        } catch( Exception $e ) {
            return $this->jsonException($e);
        }
    }

    public function deletarCategoria(int $id)
    {
        try {
            CategoriaProduto::where("id", "=", $id)->forceDelete();

            return $this->jsonNoContent();
        } catch( Exception $e ) {
            return $this->jsonException($e);
        }
    }

    public function obterListas()
    {
        $cols = ["categorias_produtos.id", "categorias_produtos.nome", "cp.nome AS categoria"];
        try {
            $categorias = CategoriaProduto::select($cols)->leftJoin("categorias_produtos AS cp", "cp.id", "=", "categorias_produtos.id_categoria")
            ->get();

            return $this->json(["categorias" => $categorias->toArray()]);
        } catch( Exception $e ) {
            return $this->jsonException($e);
        }
    }
}
