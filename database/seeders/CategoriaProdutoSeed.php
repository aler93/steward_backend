<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaProdutoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoriasBases = [
            [
                "id"        => 1,
                "nome"      => "Limpeza",
                "image_url" => "https://uauingleza.com.br/wp-content/uploads/2023/04/Produtos_de_limpeza_saiba_como_escolher_os_ideiais_para_a_sua_casa_2.jpg.jpeg",
            ],
            [
                "id"        => 2,
                "nome"      => "Comida",
                "image_url" => "https://img.freepik.com/vetores-gratis/vista-aerea-de-comida-no-prato_1308-47981.jpg",
            ],
            [
                "id"        => 3,
                "nome"      => "Bebidas",
                "image_url" => "https://confeitariaparispoa.com.br/images/categorias/bebidas.png",
            ],
            [
                "id"        => 4,
                "nome"      => "Automotivo",
                "image_url" => "https://img.freepik.com/vetores-premium/icone-de-carro-preto-icone-de-vetor-de-carro-no-fundo-branco-isolado-sinal-do-veiculo-ilustracao-vetorial_882636-360.jpg",
            ],
            [
                "id"        => 5,
                "nome"      => "Eletrônicos",
                "image_url" => "https://cdn-icons-png.flaticon.com/512/5214/5214141.png",
            ],
            [
                "id"        => 6,
                "nome"      => "Móveis",
                "image_url" => "https://cdn-icons-png.flaticon.com/512/2590/2590525.png",
            ],
            [
                "id"        => 7,
                "nome"      => "Petshop",
                "image_url" => "https://cdn-icons-png.flaticon.com/512/4889/4889146.png",
            ],
            [
                "id"        => 8,
                "nome"      => "Saúde",
                "image_url" => "https://img.freepik.com/vetores-premium/icone-de-cruz-vermelha-circular_665900-32.jpg",
            ],
            [
                "id"        => 9,
                "nome"      => "Outros",
                "image_url" => "https://cdn-icons-png.flaticon.com/512/30/30254.png",
            ],
        ];

        DB::table("categorias_produtos")->insert($categoriasBases);

        DB::statement("ALTER SEQUENCE categorias_produtos_id_seq RESTART WITH 100;");

        $categorias = [
            // Higiene 1
            [
                "nome"         => "Higiene pessoal",
                "id_categoria" => 1,
            ],
            [
                "nome"         => "Higiene bucal",
                "id_categoria" => 1,
            ],
            [
                "nome"         => "Limpeza p/ casa",
                "id_categoria" => 1,
            ],
            [
                "nome"         => "Inseticida",
                "id_categoria" => 1,
            ],
            // Comida 2
            [
                "nome"         => "Frios",
                "id_categoria" => 2,
            ],
            [
                "nome"         => "Carnes",
                "id_categoria" => 2,
            ],
            [
                "nome"         => "Hortifruti",
                "id_categoria" => 2,
            ],
            [
                "nome"         => "Padaria",
                "id_categoria" => 2,
            ],
            [
                "nome"         => "Sobremesas",
                "id_categoria" => 2,
            ],
            [
                "nome"         => "Diet/Fitness",
                "id_categoria" => 2,
            ],
            // Bebidas 3
            [
                "nome"         => "Álcool",
                "id_categoria" => 3,
            ],
            [
                "nome"         => "Sucos",
                "id_categoria" => 3,
            ],
            [
                "nome"         => "Refrigerantes",
                "id_categoria" => 3,
            ],
            [
                "nome"         => "Chás",
                "id_categoria" => 3,
            ],
            [
                "nome"         => "Café",
                "id_categoria" => 3,
            ],
            [
                "nome"         => "Leite",
                "id_categoria" => 3,
            ],
            // Automotivo 4
            [
                "nome"         => "Aditivo",
                "id_categoria" => 4,
            ],
            [
                "nome"         => "Limpeza automotiva",
                "id_categoria" => 4,
            ],
            // Eletrônicos 5
            [
                "nome"         => "Smartphones",
                "id_categoria" => 5,
            ],
            [
                "nome"         => "Hardware",
                "id_categoria" => 5,
            ],
            [
                "nome"         => "TVs",
                "id_categoria" => 5,
            ],
            [
                "nome"         => "Som",
                "id_categoria" => 5,
            ],
            [
                "nome"         => "Periféricos",
                "id_categoria" => 5,
            ],
            // Móveis 6
            [
                "nome"         => "Quarto",
                "id_categoria" => 6,
            ],
            [
                "nome"         => "Cozinha",
                "id_categoria" => 6,
            ],
            [
                "nome"         => "Sala de estar",
                "id_categoria" => 6,
            ],
            [
                "nome"         => "Banheiro",
                "id_categoria" => 6,
            ],
            [
                "nome"         => "Escritório",
                "id_categoria" => 6,
            ],
            [
                "nome"         => "Sala de jantar",
                "id_categoria" => 6,
            ],
            [
                "nome"         => "Varanda",
                "id_categoria" => 6,
            ],
            // Petshop 7
            [
                "nome"         => "Ração",
                "id_categoria" => 7,
            ],
            [
                "nome"         => "Petisco",
                "id_categoria" => 7,
            ],
            [
                "nome"         => "Higiene",
                "id_categoria" => 7,
            ],
            // Saúde 8
            [
                "nome"         => "Remédio",
                "id_categoria" => 8,
            ],
            [
                "nome"         => "Primeiro socorros",
                "id_categoria" => 8,
            ],
        ];

        DB::table("categorias_produtos")->insert($categorias);
    }
}
