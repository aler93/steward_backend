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
                "name"  => "e-mail",
                "status" => true,
            ],
            [
                "name"  => "SMS",
                "status" => true,
            ],
            [
                "name"  => "Telegram",
                "status" => true,
            ],
            [
                "name"  => "Whatsapp",
                "status" => true,
            ],
            [
                "name"  => "Sinal de fumaça",
                "status" => true,
            ],
        ];

        DB::table("communication_channels")->insert($canais);
        //DB::connection("mongodb")->table("canais_comunicacao")->insert($canais);
    }
}
