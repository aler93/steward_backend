<?php

namespace App\Http\Controllers\Mercado;

use App\Http\Controllers\Controller;
use App\Repositories\ProdutoRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Produto;
use Exception;

class ProdutoController extends Controller
{
    private array             $cols = ["produtos.uuid", "produtos.nome", "cp.nome AS categoria", "produtos.descricao", "produtos.informacao_nutricional"];
    private ProdutoRepository $repository;

    public function __construct(ProdutoRepository $produtoRepository)
    {
        $this->repository = $produtoRepository;
    }

    public function obterProdutos(Request $request): JsonResponse
    {
        try {
            $produtos = $this->repository->obterProdutos($request);

            return $this->json(["produtos" => $produtos]);
        } catch (Exception $e) {
            return $this->jsonException($e);
        }
    }

    public function obterProdutosPorCategoria(Request $request): JsonResponse
    {
        $output = [];
        try {
            $produtos   = $this->repository->obterProdutos($request);
            $categorias = array_values(array_unique(array_column($produtos, "categoria")));

            foreach ($categorias as $categoria) {
                foreach ($produtos as $row) {
                    if ($row["categoria"] == $categoria) {
                        unset($row["categoria"]);
                        $output[$categoria][] = $row;
                    }
                }
            }

            return $this->json(["produtos" => $output]);
        } catch (Exception $e) {
            return $this->jsonException($e);
        }
    }

    public function obterProdutoDetalhes(string $uuid, Request $request): JsonResponse
    {
        try {
            $produto = Produto::select($this->cols)
                              ->where("uuid", "=", $uuid)
                              ->leftJoin("categorias_produtos AS cp", "cp.id", "=", "produtos.id_categoria");

            if ($request->input("id_categoria")) {
                $produto->where("produtos.id_categoria", "=", $request->input("id_categoria"));
            }
            if ($request->input("nome")) {
                $produto->orWhere("produtos.nome", "like", like($request->input("id_categoria")));
            }

            $produto                           = $produto->first()->toArray();
            $produto["informacao_nutricional"] = json_decode($produto["informacao_nutricional"]);

            return $this->json(["produto" => $produto]);
        } catch (Exception $e) {
            return $this->jsonException($e);
        }
    }
}
