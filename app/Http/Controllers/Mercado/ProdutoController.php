<?php

namespace App\Http\Controllers\Mercado;

use App\Http\Controllers\Controller;
use App\Models\CategoriaProduto;
use Illuminate\Http\Request;
use App\Models\Produto;
use Exception;

class ProdutoController extends Controller
{
    private int $perPage = 50;

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
            $categorias = CategoriaProduto::select($cols)->leftJoin("categorias_produtos AS cp", "cp.id", "=", "categorias_produtos.categoria_id")
            ->get();

            return $this->json(["categorias" => $categorias->toArray()]);
        } catch( Exception $e ) {
            return $this->jsonException($e);
        }
    }

    public function produtos(Request $request)
    {
        $page   = $request->input("page") ?? 0;
        $limit  = $request->input("limit") ?? $this->perPage;
        $offset = $page * $limit;

        try {
            $produtos = Produto::query();

            if( strlen($request->input("filter")) > 0 ) {
                $filter   = like($request->input("filter"));
                $produtos = $produtos->where("nome", "ilike", $filter);
            }
            if( strlen($request->input("categoria_id")) > 0 ) {
                $id   = $request->input("categoria_id");
                if( $id < 100 ) {
                    $categorias = CategoriaProduto::where("categoria_id", "=", $id)->get()->toArray();
                    $ids = array_column($categorias, "id");

                    $produtos = $produtos->whereIn("categoria_id", $ids);
                } else {
                    $produtos = $produtos->where("categoria_id", "=", $id);
                }
            }

            $produtos = $produtos->limit($limit)->offset($offset);
            $produtos = $produtos->get()->toArray();

            foreach($produtos as &$row) {
                if( strlen($row["image_link"]) <= 0 ) {
                    $row["image_link"] = env("APP_URL") . "/no-image.png";
                }
            }

            return $this->json(["count" => count($produtos), "produtos" => $produtos]);
        } catch( Exception $e ) {
            return $this->jsonException($e);
        }
    }
}
