<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuItemsSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            [
                "name"  => "Mercado",
                "path"  => "/mercado",
                "order" => 1,
            ],
            [
                "name"  => "Inventário",
                "path"  => "/inventario",
                "order" => 2,
            ],
            [
                "name"  => "divider",
                "path"  => "/divider",
                "order" => 3,
            ],
            [
                "name"  => "Abastecimento",
                "path"  => "/carro/abastecimento",
                "order" => 4,
            ],
            [
                "name"  => "Saúde",
                "path"  => "/saude",
                "order" => 5,
            ],
        ];

        DB::table("menu_items")->insert($items);
    }
}
