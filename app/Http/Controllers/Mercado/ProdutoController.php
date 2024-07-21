<?php

namespace App\Http\Controllers\Mercado;

use App\Http\Controllers\Controller;
use App\Models\CategoriaProduto;
use Illuminate\Http\Request;
use App\Models\Produto;
use Exception;

class ProdutoController extends Controller
{
    public function pesquisar(Request $request)
    {
        try {
            if( $request->input("categoria") ) {
                return $this->prodsPorCategoria($request->input("categoria"), $request->input("produto", ""));
            }

            return $this->json([
                "recurso" => [],
            ]);
        } catch (Exception $e) {
            return $this->jsonException($e, $e->getCode());
        }
    }

    private function prodsPorCategoria(int $idCategoria, string $produto)
    {
        try {
            $prods = Produto::where("id_categoria", "=", $idCategoria)->get()->toArray();
            dd($prods);

            if( strlen($produto) > 0 ) {
                foreach( $prods as &$prod ) {
                    //
                }
            }

            return $this->json([
                "recurso" => [],
            ]);
        } catch (Exception $e) {
            return $this->jsonException($e, $e->getCode());
        }
    }

}
