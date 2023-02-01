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
                "name"     => "Admin",
                "uuid"     => uuid(),
                "email"    => "admin@steward.com.br",
                "password" => Hash::make("admin123"),
                "admin"    => true,
            ],
            [
                "id"       => 2,
                "name"     => "Alisson Naimayer",
                "uuid"     => uuid(),
                "email"    => "anaimayer3@gmail.com",
                "password" => Hash::make("11351892"),
                "admin"    => true,
            ],
        ];

        DB::table("users")->insert($users);
    }
}
