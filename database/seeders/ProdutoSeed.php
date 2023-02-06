<?php

namespace Database\Seeders;

use App\Models\CategoriaProduto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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
        $hortifruti = CategoriaProduto::where("nome", "=", "Hortifruti")->first();

        $produtos = [
            // Hortifruti
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $hortifruti->id,
                "nome"                   => "Abacate",
                "informacao_nutricional" => [
                    "quantidade" => "100 gramas",
                    "info"       => [
                        [
                            "calorias"        => ["nome" => "Calorias", "valor" => 160, "unidade" => "cal"],
                            "gorduras_totais" => ["nome"     => "Gorduras Totais (g)",
                                                  "valor"    => 15,
                                                  "unidade"  => "g",
                                                  "detalhes" => ["gorduras_saturadas" => ["nome" => "Gorduras Saturadas (g)", "valor" => 2.1, "unidade" => "g"]]],
                            "colesterol"      => ["nome" => "Colesterol (mg)", "valor" => 0, "unidade" => "mg"],
                            "sodio"           => ["nome" => "Sódio (mg)", "valor" => 7], "unidade" => "mg",
                            "potassio"        => ["nome" => "Potássio (mg)", "valor" => 485, "unidade" => "mg"],
                            "carboidratos"    => ["nome"     => "Carboidratos (g)", "valor" => 9, "unidade" => "g",
                                                  "detalhes" => [
                                                      "fibra_alimentar" => ["nome" => "Fibra Alimentar (g)", "valor" => 7, "unidade" => "g"],
                                                      "Açúcar"          => ["nome" => "Açúcar (g)", "valor" => 0.7, "unidade" => "g"]]
                            ],
                            "proteinas"       => ["nome" => "Proteínas (g)", "valor" => 2, "unidade" => "g"],
                            "vitamina_c"      => ["nome" => "Vitamina C (mg)", "valor" => 10, "unidade" => "mg"],
                            "ferro"           => ["nome" => "Ferro (mg)", "valor" => 0.6, "unidade" => "mg"],
                            "vitamina_b6"     => ["nome" => "Vitamina B6 (mg)", "valor" => 0.3, "unidade" => "mg"],
                            "magnesio"        => ["nome" => "Magnésio (mg)", "valor" => 29, "unidade" => "mg"],
                            "calcio"          => ["nome" => "Cálcio (mg)", "valor" => 12, "unidade" => "mg"],
                            "vitamina_d"      => ["nome" => "Vitamina D (IU)", "valor" => 12, "unidade" => "mg"],
                            "cobalamina"      => ["nome" => "Cobalamina (µg)", "valor" => 0, "unidade" => "µg"],
                        ],
                    ]
                ]
            ]
        ];

        foreach( $produtos as &$row ) {
            $row["informacao_nutricional"] = json_encode($row["informacao_nutricional"]);
        }

        DB::table("produtos")->insert($produtos);
    }
}
