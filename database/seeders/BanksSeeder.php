<?php

namespace Database\Seeders;

use App\Models\Bank;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BanksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $BanksName = ['KBZ Banking','KBZ Pay','AYA Banking','AYA Pay',"UAB Banking","UAB Pay","A+ Banking","A+ Pay","MAB Banking","Wave Pay"];
        foreach($BanksName as $item) {
            Bank::create([
                'name' => $item
            ]);
        }
    }
}
