<?php

namespace App\Repositories;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoRepository
{
    private $colsSimple = ["produtos.uuid", "produtos.nome", "cp.nome AS categoria", "produtos.descricao"];
    private $colsFull   = ["produtos.uuid", "produtos.nome", "cp.nome AS categoria", "produtos.descricao", "produtos.informacao_nutricional"];

    public function obterProdutos(Request $request, bool $full = false): array
    {
        $produtos = Produto::select($this->colsSimple)
                           ->leftJoin("categorias_produtos AS cp", "cp.id", "=", "produtos.id_categoria");

        if ($request->input("id_categoria")) {
            $produtos->where("produtos.id_categoria", "=", $request->input("id_categoria"));
        }
        if ($request->input("nome")) {
            $produtos->orWhere("produtos.nome", "like", like($request->input("id_categoria")));
        }

        return $produtos->get()->toArray();
    }
}
