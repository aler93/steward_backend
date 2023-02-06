<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                "id"       => 1,
                //"name"     => "Admin",
                "uuid"     => uuid(),
                "email"    => "admin@steward.com.br",
                "password" => Hash::make("admin123"),
                "admin"    => true,
            ],
            [
                "id"       => 2,
                //"name"     => "Alisson Naimayer",
                "uuid"     => "e3ee1e8a-2833-4f7c-9c56-b7c338935b7b",
                "email"    => "anaimayer3@gmail.com",
                "password" => Hash::make("11351892"),
                "admin"    => true,
            ],
            [
                "id"       => 3,
                //"name"     => "Testes",
                "uuid"     => "4a367edf-afff-4681-b6c7-d7b7deb6f99a",
                "email"    => "testes@gmail.com",
                "password" => Hash::make("11351892"),
                "admin"    => false,
            ],
        ];

        DB::table("users")->insertOrIgnore($users);

        $n = DB::table("users")->select()->get()->count() + 1;
        DB::statement("ALTER SEQUENCE users_id_seq RESTART WITH 4;");
    }
}
