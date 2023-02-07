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

        DB::statement("ALTER SEQUENCE categorias_produtos_id_seq RESTART WITH 10;");

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
                "nome"         => "Ovos",
                "id_categoria" => 2,
            ],
            /*[
                "nome"         => "Pratos prontos",
                "id_categoria" => 2,
            ],*/
            [
                "nome"         => "Legumes",
                "id_categoria" => 2,
            ],
            [
                "nome"         => "Frutas",
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
            [
                "nome"         => "Temperos",
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

        DB::table("categorias_produtos")->insertOrIgnore($categorias);

        $n = DB::table("categorias_produtos")->select()->get()->count() + 1;
        DB::statement("ALTER SEQUENCE categorias_produtos_id_seq RESTART WITH $n;");
    }
}
