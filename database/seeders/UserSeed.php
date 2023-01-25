<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
                "password" => "admin123"
            ]
        ];

        DB::table("users")->insert($users);
    }
}
