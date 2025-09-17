<?php

namespace Database\Seeders;

use App\Models\UserBank;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserBanksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserBank::create([
            'user_id' => 1,
            'bank_id' => 3,
            'bank_acc_name' => "Kaung Sett Thu",
            'bank_acc_no'  => "09981864561"
        ]);
        UserBank::create([
            'user_id' => 1,
            'bank_id' => 5,
            'bank_acc_name' => "Kaung Sett Thu",
            'bank_acc_no'  => "099818645611"
        ]);

         UserBank::create([
            'user_id' => 2,
            'bank_id' => 3,
            'bank_acc_name' => "Kaung Sett Thu",
            'bank_acc_no'  => "099818645611"
        ]);
         UserBank::create([
            'user_id' => 2,
            'bank_id' => 7,
            'bank_acc_name' => "Kaung Sett Thu",
            'bank_acc_no'  => "099818645611"
        ]);
    }
}
