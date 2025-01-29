<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CanaisComunicacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $canais = [
            [
                "nome"  => "e-mail",
                "ativo" => true,
            ],
            [
                "nome"  => "SMS",
                "ativo" => true,
            ],
            [
                "nome"  => "Telegram",
                "ativo" => true,
            ],
            [
                "nome"  => "Whatsapp",
                "ativo" => true,
            ],
            [
                "nome"  => "Sinal de fumaça",
                "ativo" => true,
            ],
        ];

        DB::table("canais_comunicacao")->insert($canais);
        //DB::connection("mongodb")->table("canais_comunicacao")->insert($canais);
    }
}
