<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserBank;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\CartsSeeder;
use Database\Seeders\ProductsSeeder;
use Database\Seeders\UserBanksSeeder;
use Database\Seeders\CategoriesSeeder;
use Database\Seeders\RolesAndPermissionsSeeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        user::Create(['name' => "KaungSett",'email'=>"kaungsettthu1873@gmail.com",'password'=>"Kst97542106",'role' => 'Admin']);
        user::Create(['name' => "ZawZaw",'email'=>"zawzaw1873@gmail.com",'password'=>"Kst97542106",'role' => 'User']);


        $this->call([
            RolesAndPermissionsSeeder::class,
            BanksSeeder::class,
            UserBanksSeeder::class,
            CategoriesSeeder::class,
            ProductsSeeder::class,
            CartsSeeder::class
            ]);
    }
}
