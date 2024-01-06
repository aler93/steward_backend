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
                "user_id"         => 1,
                "nome"            => "Admin",
                "cpf"             => "02870190042",
                "cpf_responsavel" => true,
                "telefone"        => null,
                "altura"          => null,
                "avatar_url"      => "https://images.freeimages.com/fic/images/icons/977/rrze/720/user_admin.png",
            ],
            [
                "user_id"         => 2,
                "nome"            => "Alisson Naimayer",
                "cpf"             => "02870190042",
                "cpf_responsavel" => false,
                "telefone"        => "+5548998149050",
                "altura"          => "1.70",
                "avatar_url"      => "https://images.freeimages.com/fic/images/icons/977/rrze/720/user_admin.png",
            ]
        ];

        DB::table("perfil_user")->insert($profiles);
    }
}
