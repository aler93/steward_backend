<?php

namespace App\Repositories;

use App\Models\ListaUser;
use Exception;
use Illuminate\Support\Facades\DB;

class ListaRepository
{
    public function cadastrarLista(array $lista)
    {
        try{
            DB::beginTransaction();

            $produtos = $lista["produtos"];
            unset($lista["produtos"]);

            $lista = new ListaUser($lista);
            $lista->save();

            $this->cadastrarProdutosLista($produtos, $lista->id);

            DB::commit();
        }catch (Exception $e) {
            DB::rollBack();

            throw $e;
        }
    }

    private function cadastrarProdutosLista(array $produtos, int $idLista)
    {
        $rows = [];

        $ordem = 0;
        foreach( $produtos as $row ) {
            $ordem++;

            $rows[] = [
                "produto"     => $row["produto"],
                "id_lista"    => $idLista,
                "ordem"       => $row["ordem"] ?? $ordem,
                "observacoes" => $row["observacoes"],
            ];
        }

        DB::table("lista_produtos")->insert($rows);
    }
}
