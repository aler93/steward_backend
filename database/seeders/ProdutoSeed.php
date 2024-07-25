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
                "id_categoria"           => $categorias["Padaria"],
                "nome"                   => "Pão fatiado Visconti",
                "descricao"              => "Pão tradicional. 400g",
                "informacao_nutricional" => $this->nutricionalPaoFatiadoVisconti(),
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $categorias["Padaria"],
                "nome"                   => "Waffle",
                "descricao"              => "Waffle 8 unidades",
                "informacao_nutricional" => [],
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $categorias["Padaria"],
                "nome"                   => "Pão de queijo",
                "descricao"              => "",
                "informacao_nutricional" => [],
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $categorias["Padaria"],
                "nome"                   => "Pão sovado",
                "descricao"              => "",
                "informacao_nutricional" => [],
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $categorias["Padaria"],
                "nome"                   => "Pão cacetinho",
                "descricao"              => "",
                "informacao_nutricional" => [],
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $categorias["Padaria"],
                "nome"                   => "Broa",
                "descricao"              => "",
                "informacao_nutricional" => [],
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $categorias["Padaria"],
                "nome"                   => "Rosquinha de polvilho",
                "descricao"              => "",
                "informacao_nutricional" => [],
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $categorias["Padaria"],
                "nome"                   => "Biscoitos",
                "descricao"              => "",
                "informacao_nutricional" => [],
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

    private function nutricionalPaoFatiadoVisconti(): string
    {
        $info = [
            [
                "Porção" => "50g (2 fatias)",
                "Valor energético (kcal)" => 138,
                "Carboidratos (g)" => 25,
                "Açúcares totais (g)" => 5.5,
                "Açucares adicionados (g)" => 1.9,
                "Proteínas (g)" => 4.5,
                "Gorduras totais (g)" => 2.2,
                "Gorduras saturadas (g)" => 0.6,
                "Gorduras trans (g)" => 0,
                "Fibras alimentares (g)" => 1.3,
                "Sódio (mg)" => 237
            ]
        ];

        return json_encode($info);
    }
}
