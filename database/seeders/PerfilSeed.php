<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PerfilSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $profiles = [
            [
                "id_user"         => 1,
                "nome"            => "Admin",
                "cpf"             => null,
                "cpf_responsavel" => false,
                "telefone"        => null,
                "altura"          => 1.7,
                "sexo"            => "N",
                "genero"          => "Prefere não identificar",
            ],
            [
                "id_user"         => 2,
                "nome"            => "Alisson Naimayer",
                "cpf"             => "02870190042",
                "cpf_responsavel" => false,
                "telefone"        => "48998159050",
                "altura"          => 1.7,
                "sexo"            => "M",
                "genero"          => "Masculino",
            ],
            [
                "id_user"         => 3,
                "nome"            => "Tester",
                "cpf"             => null,
                "cpf_responsavel" => false,
                "telefone"        => null,
                "altura"          => 1.7,
                "sexo"            => "N",
                "genero"          => "Prefere não identificar",
            ],
        ];

        DB::table("perfil_user")->insert($profiles);

        $n = DB::table("perfil_user")->select()->get()->count() + 1;
        DB::statement("ALTER SEQUENCE perfil_user_id_seq RESTART WITH $n;");
    }
}
