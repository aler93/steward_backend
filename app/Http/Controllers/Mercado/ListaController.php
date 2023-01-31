<?php

namespace App\Http\Controllers\Mercado;

use App\Http\Controllers\Controller;
use App\Models\ListaProduto;
use App\Models\ListaUser;
use App\Repositories\ListaRepository;
use Exception;
use Illuminate\Http\Request;

class ListaController extends Controller
{
    private ListaRepository $repository;

    public function __construct(ListaRepository $repository)
    {
        $this->repository = $repository;
    }

    public function cadastrarLista(Request $request)
    {
        try {
            $dados = $request->input("lista");

            $dados["uuid"] = uuid();
            $dados["id_user"] = auth()->user()->id;

            $this->repository->cadastrarLista($dados);

            return $this->jsonCreated("Lista cadastrada com sucesso");
        } catch( Exception $e ) {
            return $this->jsonException($e);
        }
    }

    public function atualizarStatusLista(string $uuidLista)
    {
        try {
            $lista = ListaUser::where("uuid", "=", $uuidLista)->first();
            if( is_null($lista) ) {
                throw new Exception("Lista não encontrada", 404);
            }

            $lista->status = !$lista->status;
            $lista->save();

            return $this->jsonMessage("Status da lista atualizado");
        } catch( Exception $e ) {
            return $this->jsonException($e);
        }
    }

    public function listasDoUsuario(Request $request)
    {
        $limit  = $request->input("limit") ?? 15;
        $offset = $request->input("offset") ?? 0;

        try {
            $user = auth()->user();

            $dados = ListaUser::where("id_user", "=", $user->id)->limit($limit)->offset($offset);

            if( $request->input("filter") == "pendentes" ) {
                $dados = ListaUser::where("status", "=", false);
            }
            if( $request->input("filter") == "concluidas" ) {
                $dados = ListaUser::where("status", "=", true);
            }

            $saida = $dados->orderByDesc("created_at")->get()->toArray();
            foreach( $saida as &$row ) {
                $row["data_compra_f"] = date("d/m/Y", strtotime($row["data_compra"]));
            }

            return $this->json(["listas" => $saida]);
        } catch( Exception $e ) {
            return $this->jsonException($e);
        }
    }

    public function obterLista(string $uuidLista)
    {
        try {
            $lista = ListaUser::where("uuid", "=", $uuidLista)->first();
            $produtos = ListaProduto::where("id_lista", "=", $lista->id)->orderBy("status")->orderBy("ordem")->get();
            
            $lista = $lista->toArray();
            $lista["produtos"] = $produtos->toArray();

            return $this->json(["lista" => $lista]);
        } catch( Exception $e ) {
            return $this->jsonException($e);
        }
    }

    public function removerLista(string $uuidLista)
    {
        try {
            $lista = ListaUser::where("uuid", "=", $uuidLista)->first();
            ListaProduto::where("id_lista", "=", $lista->id)->forceDelete();

            $lista->forceDelete();

            return $this->jsonNoContent();
        } catch( Exception $e ) {
            return $this->jsonException($e);
        }
    }

    public function atualizarStatusProduto(int $idProduto)
    {
        try {
            $prod = ListaProduto::where("id", "=", $idProduto)->first();
            if( is_null($prod) ) {
                throw new Exception("Produto não encontrado", 404);
            }

            $prod->status = !$prod->status;
            $prod->save();

            return $this->jsonMessage("Status do produto atualizado");
        } catch( Exception $e ) {
            return $this->jsonException($e);
        }
    }

    public function adicionarProduto(Request $request, string $uuidLista)
    {
        try {
            $lista = ListaUser::where("uuid", "=", $uuidLista)->first();
            if( is_null($lista) ) {
                throw new Exception("Lista não encontrado", 404);
            }

            if( $lista->status ) {
                throw new Exception("Essa lista já foi concluída", 400);
            }

            $total = ListaProduto::where("id_lista", "=", $lista->id)->count();

            $produto = [
                "id_lista"    => $lista->id,
                "produto"     => $request->input("produto"),
                "observacoes" => $request->input("observacoes"),
                "ordem"       => $total + 1,
            ];

            $lp = new ListaProduto($produto);
            $lp->save();

            return $this->jsonCreated("Produto adicionado na lista");
        } catch( Exception $e ) {
            return $this->jsonException($e);
        }
    }

    public function removerProduto(int $idProduto)
    {
        try {
            $prod = ListaProduto::where("id", "=", $idProduto)->first();
            if( is_null($prod) ) {
                throw new Exception("Produto não encontrado", 404);
            }

            if( $prod->status ) {
                throw new Exception("Produto já foi obtido", 400);
            }

            $prod->forceDelete();

            return $this->jsonMessage("", 204);
        } catch( Exception $e ) {
            return $this->jsonException($e);
        }
    }
}
