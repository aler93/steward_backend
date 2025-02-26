<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfileSeed extends Seeder
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
                "user_id" => 1,
                "name"    => "Admin",
                "height"  => null,
            ],
            [
                "user_id" => 2,
                "name"    => "Alisson Naimayer",
                "height"  => 1.7,
            ]
        ];

        DB::table("user_profile")->insert($profiles);
    }
}
