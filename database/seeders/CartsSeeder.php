<?php

namespace Database\Seeders;

use App\Models\Cart;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CartsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Carts = [
            [
                'user_id'    => 1,
                'product_id' => 1,
                'category_name' => 'Ecommerce',
                'quantity'      => 2,
                'price'         => 8000000
            ],
              [
                'user_id'    => 1,
                'product_id' => 1,
                'category_name' => 'Ecommerce',
                'quantity'      => 3,
                'price'         => 8000000
            ]
            ];
        foreach($Carts as $cart) {
             Cart::Create($cart);
        }
    }
}
