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
                "id_user" => 1,
                "nome"    => "Admin",
                "altura"  => null,
            ],
            [
                "id_user" => 2,
                "nome"    => "Alisson Naimayer",
                "altura"  => 1.7,
            ]
        ];

        DB::table("perfil_user")->insert($profiles);
    }
}
