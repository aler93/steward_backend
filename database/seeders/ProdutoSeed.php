<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CategoriaProduto;
use Illuminate\Support\Facades\DB;

class ProdutoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorias = $this->getIdCategorias();

        $produtos = [
            [
                "uuid"                   => uuid(),
                "category_id"            => $categorias["Padaria"],
                "nome"                   => "Pão",
                "descricao"              => "",
                "informacao_nutricional" => "",
            ],
        ];

        foreach ($produtos as $produto) {
            DB::table("produtos")->insert($produto);
        }
    }

    private function getIdCategorias(): array
    {
        $categorias = CategoriaProduto::all()->toArray();
        $parsed = [];
        foreach( $categorias as $cat ) {
            $parsed[$cat["nome"]] = $cat["id"];
        }

        return $parsed;
    }
}
