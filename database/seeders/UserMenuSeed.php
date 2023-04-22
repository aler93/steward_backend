<?php

namespace Database\Seeders;

use App\Models\MenuItems;
use App\Models\User;
use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserMenuSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin   = User::where("email", "=", "admin@steward.com.br")->first();
        $alisson = User::where("email", "=", "anaimayer3@gmail.com")->first();
        $menu    = MenuItems::all();

        $items = [];
        foreach ($menu as $item) {
            $items[] = [
                "id_user" => $admin->id,
                "id_menu" => $item->id,
            ];

            $items[] = [
                "id_user" => $alisson->id,
                "id_menu" => $item->id,
            ];
        }

        DB::table("user_menu")->insert($items);
    }
}
