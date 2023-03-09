<?php

namespace App\Repositories;

use App\Models\Inventario;
use App\Models\Produto;
use DB;
use Exception;
use Illuminate\Http\Request;

class InventarioRepository
{
    public $medidas = ["kg", "grama", "litro", "unidade"];

    public function validarUnidades(array $produtos): array
    {
        $invalido = [];
        foreach ($produtos as $prod) {
            if (!in_array(strtolower($prod["medida_quantidade"]), $this->medidas)) {
                $invalido[] = $prod["produto"];
            }
        }

        return $invalido;
    }

    public function cadastrarInventario(array $produtos, int $idUser): Exception|array
    {
        try {
            $rows = [];
            foreach ($produtos as $row) {
                $idProd  = null;
                $produto = $row["produto"] ?? "";

                if (isset($row["uuid_produto"])) {
                    $prod    = Produto::where("uuid", "=", $row["uuid_produto"])->first();
                    $idProd  = $prod->id;
                    $produto = $prod->nome;
                }
                $rows[] = [
                    "id_user"           => $idUser,
                    "id_produto"        => $idProd,
                    "produto"           => $produto,
                    "quantidade"        => $row["quantidade"],
                    "medida_quantidade" => $row["medida_quantidade"],
                    "validade"          => $row["validade"],
                ];
            }

            DB::beginTransaction();
            $chunk = array_chunk($rows, 250);
            foreach ($chunk as $insert) {
                //$inv = new Inventario($insert);
                //$inv->save();
                DB::table("inventario")->insert($insert);
            }
            DB::commit();

            return $rows;
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
