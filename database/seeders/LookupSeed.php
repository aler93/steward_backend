<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LookupSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lookups = [
            // Sexo
            [
                "descricao"  => "Sexo",
                "id_externo" => "sexo",
                "valor"      => "F",
            ],
            [
                "descricao"  => "Sexo",
                "id_externo" => "sexo",
                "valor"      => "M",
            ],
            [
                "descricao"  => "Sexo",
                "id_externo" => "sexo",
                "valor"      => "O",
            ],
            [
                "descricao"  => "Sexo",
                "id_externo" => "sexo",
                "valor"      => "N",
            ],
            // Gênero
            [
                "descricao"  => "Gênero",
                "id_externo" => "genero",
                "valor"      => "Feminino",
            ],
            [
                "descricao"  => "Gênero",
                "id_externo" => "genero",
                "valor"      => "Masculino",
            ],
            [
                "descricao"  => "Gênero",
                "id_externo" => "genero",
                "valor"      => "Outro",
            ],
            [
                "descricao"  => "Gênero",
                "id_externo" => "genero",
                "valor"      => "Prefere não identificar",
            ],
        ];

        foreach($lookups as &$row) {
            $row["created_at"] = now();
            $row["updated_at"] = now();
        }

        DB::table("lookups")->insert($lookups);
    }
}
