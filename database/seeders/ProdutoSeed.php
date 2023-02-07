<?php

namespace Database\Seeders;

use App\Models\CategoriaProduto;
use Carbon\Carbon;
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
        $legumes = CategoriaProduto::where("nome", "=", "Legumes")->first();

        /*
         template:
        [
            "uuid"                   => uuid(),
            "id_categoria"           => $hortifruti->id,
            "nome"                   => "Abacate",
            "informacao_nutricional" => []
        ],
         * */

        $produtos = [
            // Hortifruti
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $legumes->id,
                "nome"                   => "Abacate",
                "informacao_nutricional" => [
                    "quantidade" => "100 gramas",
                    "info"       => [

                        "calorias"        => ["nome" => "Calorias", "valor" => 160, "unidade" => "cal"],
                        "gorduras_totais" => ["nome"     => "Gorduras Totais (g)",
                                              "valor"    => 15,
                                              "unidade"  => "g",
                                              "detalhes" => ["gorduras_saturadas" => ["nome" => "Gorduras Saturadas (g)", "valor" => 2.1, "unidade" => "g"]]
                        ],
                        "colesterol"      => ["nome" => "Colesterol (mg)", "valor" => 0, "unidade" => "mg"],
                        "sodio"           => ["nome" => "Sódio (mg)", "valor" => 7, "unidade" => "mg"],
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
                        "vitamina_d"      => ["nome" => "Vitamina D (IU)", "valor" => 12, "unidade" => "iu"],
                        "cobalamina"      => ["nome" => "Cobalamina (µg)", "valor" => 0, "unidade" => "µg"],
                    ],
                ]
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $legumes->id,
                "nome"                   => "Abacaxi",
                "informacao_nutricional" => [
                    "quantidade" => "100 gramas",
                    "info"       => [
                        "calorias"        => ["nome" => "Calorias", "valor" => 50, "unidade" => "cal"],
                        "gorduras_totais" => ["nome"     => "Gorduras Totais (g)",
                                              "valor"    => 0.1,
                                              "unidade"  => "g",
                                              "detalhes" => ["gorduras_saturadas" => ["nome" => "Gorduras Saturadas (g)", "valor" => 0, "unidade" => "g"]]
                        ],
                        "colesterol"      => ["nome" => "Colesterol (mg)", "valor" => 0, "unidade" => "mg"],
                        "sodio"           => ["nome" => "Sódio (mg)", "valor" => 1, "unidade" => "mg"],
                        "potassio"        => ["nome" => "Potássio (mg)", "valor" => 109, "unidade" => "mg"],
                        "carboidratos"    => ["nome"     => "Carboidratos (g)", "valor" => 13, "unidade" => "g",
                                              "detalhes" => [
                                                  "fibra_alimentar" => ["nome" => "Fibra Alimentar (g)", "valor" => 1.4, "unidade" => "g"],
                                                  "Açúcar"          => ["nome" => "Açúcar (g)", "valor" => 10, "unidade" => "g"]]
                        ],
                        "proteinas"       => ["nome" => "Proteínas (g)", "valor" => 0.5, "unidade" => "g"],
                        "vitamina_c"      => ["nome" => "Vitamina C (mg)", "valor" => 47.8, "unidade" => "mg"],
                        "ferro"           => ["nome" => "Ferro (mg)", "valor" => 0.3, "unidade" => "mg"],
                        "vitamina_b6"     => ["nome" => "Vitamina B6 (mg)", "valor" => 0.1, "unidade" => "mg"],
                        "magnesio"        => ["nome" => "Magnésio (mg)", "valor" => 12, "unidade" => "mg"],
                        "calcio"          => ["nome" => "Cálcio (mg)", "valor" => 13, "unidade" => "mg"],
                        "vitamina_d"      => ["nome" => "Vitamina D (IU)", "valor" => 0, "unidade" => "iu"],
                        "cobalamina"      => ["nome" => "Cobalamina (µg)", "valor" => 0, "unidade" => "µg"],
                    ]
                ]
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $legumes->id,
                "nome"                   => "Alface",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $legumes->id,
                "nome"                   => "Alho",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $legumes->id,
                "nome"                   => "Aspargo",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $legumes->id,
                "nome"                   => "Batata doce",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $legumes->id,
                "nome"                   => "Batata inglesa",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $legumes->id,
                "nome"                   => "Beringela",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $legumes->id,
                "nome"                   => "Beterraba",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $legumes->id,
                "nome"                   => "Brócolis",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $legumes->id,
                "nome"                   => "Cebola",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $legumes->id,
                "nome"                   => "Cebola",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $legumes->id,
                "nome"                   => "Cebola roxa",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $legumes->id,
                "nome"                   => "Cenoura",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $legumes->id,
                "nome"                   => "Chuchu",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $legumes->id,
                "nome"                   => "Couve flor",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $legumes->id,
                "nome"                   => "Gengibre",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $legumes->id,
                "nome"                   => "Milho verde",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $legumes->id,
                "nome"                   => "Moranga",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $legumes->id,
                "nome"                   => "Nabo",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $legumes->id,
                "nome"                   => "Palmito",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $legumes->id,
                "nome"                   => "Pepino japonês",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $legumes->id,
                "nome"                   => "Pepino salada",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $legumes->id,
                "nome"                   => "Pimenta",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $legumes->id,
                "nome"                   => "Pimentão amarelo",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $legumes->id,
                "nome"                   => "Pimentão verde",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $legumes->id,
                "nome"                   => "Pimentão vermelho",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $legumes->id,
                "nome"                   => "Repolho",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $legumes->id,
                "nome"                   => "Tomate",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $legumes->id,
                "nome"                   => "Tomate cereja",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $legumes->id,
                "nome"                   => "Vagem",
                "informacao_nutricional" => []
            ],
        ];

        $now = Carbon::now()->format("Y-m-d H:i:s");
        foreach ($produtos as &$row) {
            $row["informacao_nutricional"] = json_encode($row["informacao_nutricional"]);
            $row["created_at"]             = $now;
            $row["updated_at"]             = $now;
        }

        DB::table("produtos")->insert($produtos);
    }
}
