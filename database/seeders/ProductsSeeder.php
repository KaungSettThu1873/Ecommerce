<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $Categroy = Category::all();

        Product::Create([
                "category_id" => 1,
                "name" => "Samsung 55\" Smart Tv ",
                "img_path" => "https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.samsung.com%2Fus%2Ftelevisions-home-theater%2Ftvs%2Fuhd-tvs%2F55--class-nu6900-smart-4k-uhd-tv--2018--un55nu6900fxza%2Fv2%2F&psig=AOvVaw1s9KScIBy9RWkaucF9Ufz_&ust=1758195494569000&source=images&cd=vfe&opi=89978449&ved=0CBYQjRxqFwoTCOjKzOHa348DFQAAAAAdAAAAABAh",
                "price"    => 8000000,
                "quantity" => 20,
                "instock"  => true,
                "status"   => true
        ]);

        Product::Create([
                "category_id" => 1,
                "name" => "Panasonic Washing Machine",
                "img_path" => "https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.lazada.com.my%2Fproducts%2Fpanasonic-na-f80vb7-8kg-top-load-washing-machine-powerful-washing-automatic-na-f80vb7hrt-washer-mesin-basuh-i844446242.html&psig=AOvVaw1suP_J4133QS4Qyk4_rk5n&ust=1758196638137000&source=images&cd=vfe&opi=89978449&ved=0CBYQjRxqFwoTCPj8-IHf348DFQAAAAAdAAAAABBS",
                "price"    => 1000000,
                "quantity" => 30,
                "instock"  => true,
                "status"   => true
        ]);

        Product::Create([
                "category_id" => 2,
                "name" => "Iphone 17 pro max",
                "img_path" => "https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.boostmobile.com%2Fshop%2Fiphone-17-pro-max.html&psig=AOvVaw14nISYAcsH-4UVg5-DD0Rg&ust=1758196805081000&source=images&cd=vfe&opi=89978449&ved=0CBcQjRxqFwoTCJCUz9Hf348DFQAAAAAdAAAAABAE",
                "price"    => 7000000,
                "quantity" => 10,
                "instock"  => true,
                "status"   => true
        ]);

        Product::Create([
                "category_id" => 3,
                "name" => "HP ZBook Fury 16 inch G11 Mobile Workstation Laptop",
                "img_path" => "https://hp.widen.net/content/ueb2dopafr/webp/ueb2dopafr.png?w=573&h=430&dpi=72&color=ffffff00",
                "price"    => 7000000,
                "quantity" => 10,
                "instock"  => true,
                "status"   => true
        ]);

          Product::Create([
                "category_id" => 4,
                "name" => "Going hands-on with the ROG Strix GA35's killer combo of Ryzen 9 3950X and GeForce RTX 2080 Ti power",
                "img_path" => "https://rog.asus.com/media/158708354417.jpg",
                "price"    => 10000000,
                "quantity" => 10,
                "instock"  => true,
                "status"   => true
        ]);

                Product::Create([
                "category_id" => 4,
                "name" => "Going hands-on with the ROG Strix GS39's killer combo of Ryzen 9 3950X and GeForce RTX 2080 Ti power",
                "img_path" => "https://rog.asus.com/media/158708354417.jpg",
                "price"    => 13000000,
                "quantity" => 10,
                "instock"  => true,
                "status"   => true
        ]);

          Product::Create([
                "category_id" => 5,
                "name" => "Black PAW Hoodie",
                "img_path" => "https://www.sirimpawsible.com/cdn/shop/files/black-paw-hoodie-back-view.webp?v=1752756888&width=832",
                "price"    => 100000,
                "quantity" => 100,
                "instock"  => true,
                "status"   => true
        ]);
    }
}
