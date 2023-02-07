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
        $legumes    = CategoriaProduto::where("nome", "=", "Legumes")->first();
        $frutas     = CategoriaProduto::where("nome", "=", "Frutas")->first();
        $ovos       = CategoriaProduto::where("nome", "=", "Ovos")->first();
        $carnes     = CategoriaProduto::where("nome", "=", "Carnes")->first();
        $frios      = CategoriaProduto::where("nome", "=", "Frios")->first();
        $padaria    = CategoriaProduto::where("nome", "=", "Padaria")->first();
        $sobremesas = CategoriaProduto::where("nome", "=", "Sobremesas")->first();

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
                "id_categoria"           => $frutas->id,
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
                "id_categoria"           => $frutas->id,
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
                "nome"                   => "Agrião",
                "informacao_nutricional" => []
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
                "nome"                   => "Cebolinha",
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
                "nome"                   => "Espinafre",
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
                "nome"                   => "Hortelã",
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
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $frutas->id,
                "nome"                   => "Acerola",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $frutas->id,
                "nome"                   => "Ameixa",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $frutas->id,
                "nome"                   => "Amora",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $frutas->id,
                "nome"                   => "Banana branca",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $frutas->id,
                "nome"                   => "Banana caturra",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $frutas->id,
                "nome"                   => "Banana da terra",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $frutas->id,
                "nome"                   => "Cacau",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $frutas->id,
                "nome"                   => "Carambola",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $frutas->id,
                "nome"                   => "Coco",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $frutas->id,
                "nome"                   => "Fruta do Conde",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $frutas->id,
                "nome"                   => "Goiaba",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $frutas->id,
                "nome"                   => "Jaca",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $frutas->id,
                "nome"                   => "Kiwi",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $frutas->id,
                "nome"                   => "Laranja",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $frutas->id,
                "nome"                   => "Laranja Lima",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $frutas->id,
                "nome"                   => "Laranja pera",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $frutas->id,
                "nome"                   => "Laranja Umbigo",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $frutas->id,
                "nome"                   => "Limão siciliano",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $frutas->id,
                "nome"                   => "Limão Tahiti",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $frutas->id,
                "nome"                   => "Mamão",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $frutas->id,
                "nome"                   => "Manga",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $frutas->id,
                "nome"                   => "Maracujá",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $frutas->id,
                "nome"                   => "Maçã",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $frutas->id,
                "nome"                   => "Maçã gala",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $frutas->id,
                "nome"                   => "Maçã Red",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $frutas->id,
                "nome"                   => "Melancia",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $frutas->id,
                "nome"                   => "Melão",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $frutas->id,
                "nome"                   => "Morango",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $frutas->id,
                "nome"                   => "Nectarina",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $frutas->id,
                "nome"                   => "Pera",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $frutas->id,
                "nome"                   => "Pêssego",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $frutas->id,
                "nome"                   => "Uva",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $frutas->id,
                "nome"                   => "Uva verde",
                "informacao_nutricional" => []
            ],
            // Ovos
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $ovos->id,
                "nome"                   => "Ovo branco",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $ovos->id,
                "nome"                   => "Ovo vermelho",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $ovos->id,
                "nome"                   => "Ovo de codorna",
                "informacao_nutricional" => []
            ],
            // Carnes
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $carnes->id,
                "nome"                   => "Frango",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $carnes->id,
                "nome"                   => "Carne moída de frango",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $carnes->id,
                "nome"                   => "Coração de frango",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $carnes->id,
                "nome"                   => "Carne Bovina",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $carnes->id,
                "nome"                   => "Carne moída",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $carnes->id,
                "nome"                   => "Linguiça toscana",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $carnes->id,
                "nome"                   => "Linguiça de pernil",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $carnes->id,
                "nome"                   => "Carne suína",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $carnes->id,
                "nome"                   => "Almôndegas",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $carnes->id,
                "nome"                   => "Fruto do mar",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $frios->id,
                "nome"                   => "Empanados de frango",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $frios->id,
                "nome"                   => "Lasanha congelada",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $frios->id,
                "nome"                   => "Pizza congelada",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $frios->id,
                "nome"                   => "Torta congelada",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $frios->id,
                "nome"                   => "Hambúrger",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $frios->id,
                "nome"                   => "Waffle",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $frios->id,
                "nome"                   => "Pão de queijo",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $frios->id,
                "nome"                   => "Queijo",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $padaria->id,
                "nome"                   => "Pão de forma",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $padaria->id,
                "nome"                   => "Pão cacetinho",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $padaria->id,
                "nome"                   => "Pão sovadinho",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $padaria->id,
                "nome"                   => "Pão de cachorro quente",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $padaria->id,
                "nome"                   => "Pão de hambúrger",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $padaria->id,
                "nome"                   => "Pão de alho",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $padaria->id,
                "nome"                   => "Pão Sírio",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $padaria->id,
                "nome"                   => "Wrap",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $sobremesas->id,
                "nome"                   => "Sorvete",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $sobremesas->id,
                "nome"                   => "Barra de chocolate",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $sobremesas->id,
                "nome"                   => "Iogurte",
                "informacao_nutricional" => []
            ],
            [
                "uuid"                   => uuid(),
                "id_categoria"           => $sobremesas->id,
                "nome"                   => "Chantilly",
                "informacao_nutricional" => []
            ],
        ];

        $now = Carbon::now()->format("Y-m-d H:i:s");
        foreach ($produtos as &$row) {
            $row["informacao_nutricional"] = json_encode($row["informacao_nutricional"]);
            $row["created_at"]             = $now;
            $row["updated_at"]             = $now;
        }

        $batch = array_chunk($produtos, 250);
        foreach ($batch as $insert) {
            DB::table("produtos")->insert($insert);
        }
    }
}
