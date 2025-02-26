<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehicleBrandSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            // USA
            [
                "name"           => "Chevrolet",
                "origin"         => "USA",
                "year_foudation" => 1911,
            ],
            [
                "name"           => "Cadillac",
                "origin"         => "USA",
                "year_foudation" => 1902,
            ],
            [
                "name"           => "Chrysler",
                "origin"         => "USA",
                "year_foudation" => null,
            ],
            [
                "name"           => "Dodge",
                "origin"         => "USA",
                "year_foudation" => null,
            ],
            [
                "name"           => "Ford",
                "origin"         => "USA",
                "year_foudation" => null,
            ],
            [
                "name"           => "Jeep",
                "origin"         => "USA",
                "year_foudation" => null,
            ],
            [
                "name"           => "GMC",
                "origin"         => "USA",
                "year_foudation" => 1911,
            ],
            [
                "name"           => "Lucid",
                "origin"         => "USA",
                "year_foudation" => null,
            ],
            [
                "name"           => "Tesla",
                "origin"         => "USA",
                "year_foudation" => null,
            ],
            [
                "name"           => "Rivian",
                "origin"         => "USA",
                "year_foudation" => null,
            ],
            [
                "name"           => "Kenworth",
                "origin"         => "USA",
                "year_foudation" => null,
            ],
            [
                "name"           => "Peterbilt",
                "origin"         => "USA",
                "year_foudation" => null,
            ],
            [
                "name"           => "Western Star",
                "origin"         => "USA",
                "year_foudation" => null,
            ],
            [
                "name"           => "Hummer",
                "origin"         => "USA",
                "year_foudation" => null,
            ],
            // Japan
            [
                "name"           => "Honda",
                "origin"         => "Japão",
                "year_foudation" => 1948,
            ],
            [
                "name"           => "Toyota",
                "origin"         => "Japão",
                "year_foudation" => 1937,
            ],
            [
                "name"           => "Mazda",
                "origin"         => "Japão",
                "year_foudation" => null,
            ],
            [
                "name"           => "Nissan",
                "origin"         => "Japão",
                "year_foudation" => null,
            ],
            [
                "name"           => "Subaru",
                "origin"         => "Japão",
                "year_foudation" => null,
            ],
            [
                "name"           => "Mitsubishi",
                "origin"         => "Japão",
                "year_foudation" => null,
            ],
            [
                "name"           => "Lexus",
                "origin"         => "Japão",
                "year_foudation" => null,
            ],
            [
                "name"           => "Suzuki",
                "origin"         => "Japão",
                "year_foudation" => null,
            ],
            [
                "name"           => "Acura",
                "origin"         => "Japão",
                "year_foudation" => null,
            ],
            [
                "name"           => "Infiniti",
                "origin"         => "Japão",
                "year_foudation" => null,
            ],
            // South Korea
            [
                "name"           => "Kia",
                "origin"         => "Coréia do Sul",
                "year_foudation" => null,
            ],
            [
                "name"           => "Hyundai",
                "origin"         => "Coréia do Sul",
                "year_foudation" => null,
            ],
            [
                "name"           => "Genesis Motor",
                "origin"         => "Coréia do Sul",
                "year_foudation" => null,
            ],
            [
                "name"           => "SsangYong",
                "origin"         => "Coréia do Sul",
                "year_foudation" => null,
            ],
            // France
            [
                "name"           => "Alpine",
                "origin"         => "França",
                "year_foudation" => 1955,
            ],
            [
                "name"           => "Bugatti",
                "origin"         => "França",
                "year_foudation" => 1909,
            ],
            [
                "name"           => "Citroën",
                "origin"         => "França",
                "year_foudation" => null,
            ],
            [
                "name"           => "Renault",
                "origin"         => "França",
                "year_foudation" => null,
            ],
            [
                "name"           => "Peugeot",
                "origin"         => "França",
                "year_foudation" => null,
            ],
            // Germany
            [
                "name"           => "Audi",
                "origin"         => "Alemanha",
                "year_foudation" => 1909,
            ],
            [
                "name"           => "BMW",
                "origin"         => "Alemanha",
                "year_foudation" => 1916,
            ],
            [
                "name"           => "Mercedes Benz",
                "origin"         => "Alemanha",
                "year_foudation" => 1926,
            ],
            [
                "name"           => "Mercedes AMG",
                "origin"         => "Alemanha",
                "year_foudation" => 1967,
            ],
            [
                "name"           => "Porsche",
                "origin"         => "Alemanha",
                "year_foudation" => null,
            ],
            [
                "name"           => "Volkswagen",
                "origin"         => "Alemanha",
                "year_foudation" => 1937,
            ],
            [
                "name"           => "Opel",
                "origin"         => "Alemanha",
                "year_foudation" => null,
            ],
            // Italy
            [
                "name"           => "Fiat",
                "origin"         => "Itália",
                "year_foudation" => 1899,
            ],
            [
                "name"           => "Ferrari",
                "origin"         => "Itália",
                "year_foudation" => 1939,
            ],
            [
                "name"           => "Alfa Romeo",
                "origin"         => "Itália",
                "year_foudation" => null,
            ],
            [
                "name"           => "Lamborghini",
                "origin"         => "Itália",
                "year_foudation" => null,
            ],
            [
                "name"           => "Maserati",
                "origin"         => "Itália",
                "year_foudation" => null,
            ],
            [
                "name"           => "Lancia",
                "origin"         => "Itália",
                "year_foudation" => null,
            ],
            [
                "name"           => "Pagani",
                "origin"         => "Itália",
                "year_foudation" => null,
            ],
            [
                "name"           => "Iveco",
                "origin"         => "Itália",
                "year_foudation" => null,
            ],
            // Swidish
            [
                "name"           => "Volvo",
                "origin"         => "Suécia",
                "year_foudation" => null,
            ],
            [
                "name"           => "Koenigsegg",
                "origin"         => "Suécia",
                "year_foudation" => null,
            ],
            [
                "name"           => "Scania",
                "origin"         => "Suécia",
                "year_foudation" => null,
            ],
            [
                "name"           => "Saab",
                "origin"         => "Suécia",
                "year_foudation" => null,
            ],
            [
                "name"           => "Polestar",
                "origin"         => "Suécia",
                "year_foudation" => null,
            ],
            // Chinese
            [
                "name"           => "BYD",
                "origin"         => "China",
                "year_foudation" => null,
            ],
            [
                "name"           => "Chery",
                "origin"         => "China",
                "year_foudation" => null,
            ],
            [
                "name"           => "JAC",
                "origin"         => "China",
                "year_foudation" => null,
            ],
            [
                "name"           => "GWM",
                "origin"         => "China",
                "year_foudation" => null,
            ],
        ];

        DB::table("vehicle_brands")->insert($brands);

        $restart = count($brands) + 1;
        DB::statement("ALTER SEQUENCE vehicle_brands_id_seq RESTART WITH {$restart};");
    }
}
