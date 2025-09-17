<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Categories = ['Electronics','Mobiles','Laptops','Desktops','Fashions'];
        foreach ($Categories as $item) {
            Category::create(['name' => $item]);
        }
    }
}
