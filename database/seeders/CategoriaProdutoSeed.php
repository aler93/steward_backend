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
                "id"   => 1,
                "nome" => "Limpeza"
            ],
            [
                "id"   => 2,
                "nome" => "Comida"
            ],
            [
                "id"   => 3,
                "nome" => "Bebidas"
            ],
            [
                "id"   => 4,
                "nome" => "Automotivo"
            ],
            [
                "id"   => 5,
                "nome" => "Eletrônicos"
            ],
            [
                "id"   => 6,
                "nome" => "Móveis"
            ],
            [
                "id"   => 7,
                "nome" => "Petshop"
            ],
            [
                "id"   => 8,
                "nome" => "Saúde"
            ],
            [
                "id"   => 9,
                "nome" => "Outros"
            ],
        ];

        DB::table("categorias_produtos")->insert($categoriasBases);

        DB::statement("ALTER SEQUENCE categorias_produtos_id_seq RESTART WITH 100;");

        $categorias = [
            // Higiene 1
            [
                "nome"         => "Higiene pessoal",
                "categoria_id" => 1,
            ],
            [
                "nome"         => "Higiene bucal",
                "categoria_id" => 1,
            ],
            [
                "nome"         => "Limpeza p/ casa",
                "categoria_id" => 1,
            ],
            [
                "nome"         => "Inseticida",
                "categoria_id" => 1,
            ],
            // Comida 2
            [
                "nome"         => "Frios",
                "categoria_id" => 2,
            ],
            [
                "nome"         => "Carnes",
                "categoria_id" => 2,
            ],
            [
                "nome"         => "Hortifruti",
                "categoria_id" => 2,
            ],
            [
                "nome"         => "Frutas",
                "categoria_id" => 2,
            ],
            [
                "nome"         => "Legumes",
                "categoria_id" => 2,
            ],
            [
                "nome"         => "Padaria",
                "categoria_id" => 2,
            ],
            [
                "nome"         => "Sobremesas",
                "categoria_id" => 2,
            ],
            [
                "nome"         => "Diet/Fitness",
                "categoria_id" => 2,
            ],
            // Bebidas 3
            [
                "nome"         => "Álcool",
                "categoria_id" => 3,
            ],
            [
                "nome"         => "Sucos",
                "categoria_id" => 3,
            ],
            [
                "nome"         => "Refrigerantes",
                "categoria_id" => 3,
            ],
            [
                "nome"         => "Chás",
                "categoria_id" => 3,
            ],
            [
                "nome"         => "Café",
                "categoria_id" => 3,
            ],
            [
                "nome"         => "Leite",
                "categoria_id" => 3,
            ],
            // Automotivo 4
            [
                "nome"         => "Aditivo",
                "categoria_id" => 4,
            ],
            [
                "nome"         => "Limpeza automotiva",
                "categoria_id" => 4,
            ],
            // Eletrônicos 5
            [
                "nome"         => "Smartphones",
                "categoria_id" => 5,
            ],
            [
                "nome"         => "Hardware",
                "categoria_id" => 5,
            ],
            [
                "nome"         => "TVs",
                "categoria_id" => 5,
            ],
            [
                "nome"         => "Som",
                "categoria_id" => 5,
            ],
            [
                "nome"         => "Periféricos",
                "categoria_id" => 5,
            ],
            // Móveis 6
            [
                "nome"         => "Quarto",
                "categoria_id" => 6,
            ],
            [
                "nome"         => "Cozinha",
                "categoria_id" => 6,
            ],
            [
                "nome"         => "Sala de estar",
                "categoria_id" => 6,
            ],
            [
                "nome"         => "Banheiro",
                "categoria_id" => 6,
            ],
            [
                "nome"         => "Escritório",
                "categoria_id" => 6,
            ],
            [
                "nome"         => "Sala de jantar",
                "categoria_id" => 6,
            ],
            [
                "nome"         => "Varanda",
                "categoria_id" => 6,
            ],
            // Petshop 7
            [
                "nome"         => "Ração",
                "categoria_id" => 7,
            ],
            [
                "nome"         => "Petisco",
                "categoria_id" => 7,
            ],
            [
                "nome"         => "Higiene",
                "categoria_id" => 7,
            ],
            // Saúde 8
            [
                "nome"         => "Remédio",
                "categoria_id" => 8,
            ],
            [
                "nome"         => "Primeiro socorros",
                "categoria_id" => 8,
            ],
        ];

        DB::table("categorias_produtos")->insert($categorias);
    }
}
