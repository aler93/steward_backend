<?php

namespace App\Repositories;

use App\Models\ListaProduto;
use App\Models\ListaUser;
use App\Services\Log;
use Exception;
use Illuminate\Support\Facades\DB;

class ListaRepository
{
    private $log;

    public function __construct()
    {
        $today     = date("Ymd");
        $this->log = new Log($today . "_lista_repository.log");
    }

    public function cadastrarLista(array $lista): array
    {
        try {
            DB::beginTransaction();

            $out = $lista;
            unset($out["id_user"]);

            $produtos = $lista["produtos"];
            unset($lista["produtos"]);

            $lista = new ListaUser($lista);
            $lista->save();

            $this->cadastrarProdutosLista($produtos, $lista->id);

            DB::commit();

            return $out;
        } catch (Exception $e) {
            DB::rollBack();

            throw $e;
        }
    }

    private function cadastrarProdutosLista(array $produtos, int $idLista)
    {
        $rows = [];

        $ordem = 0;
        foreach ($produtos as $row) {
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

    public function validadeUserLista(string $uuidLista, $user): bool
    {
        return false;
    }

    public function listaParaInventario(int $idLista, int $idUser)
    {
        try {
            $produtos = ListaProduto::where("id_lista", "=", $idLista)->get();
            $inv      = [];
            foreach ($produtos as $row) {
                if ($row->status) {
                    $inv[] = [
                        "id_user"           => $idUser,
                        "produto"           => $row->produto,
                        "quantidade"        => 1,
                        "medida_quantidade" => "unidade",
                    ];
                }
            }

            DB::table("inventario")->insert($inv);
        } catch (Exception $e) {
            $msg = $e->getMessage() . "\n" . $e->getTraceAsString();
            $this->log->gravar("Erro ao salvar produtos da Lista de Mercado para o Inventário:\n" . $msg);
        }
    }
}
