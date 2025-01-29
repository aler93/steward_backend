<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoPagamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipos = [
            [
                "nome" => "Cartão de crédito",
            ],
            [
                "nome" => "Cartão de débito",
            ],
            [
                "nome" => "Boleto",
            ],
            [
                "nome" => "Pix",
            ],
            [
                "nome" => "PayPal",
            ],
        ];

        DB::table("tipos_pagamentos")->insert($tipos);
        //DB::connection("mongodb")->table("tipos_pagamentos")->insert($tipos);
    }
}
