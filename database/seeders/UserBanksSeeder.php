<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserBank;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserBanksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userId = User::select('id')->first();

        UserBank::create([
            'user_id' => $userId->id,
            'bank_id' => 3,
            'bank_acc_name' => "Kaung Sett Thu",
            'bank_acc_no'  => "09981864561"
        ]);
        UserBank::create([
            'user_id' => $userId->id,
            'bank_id' => 5,
            'bank_acc_name' => "Kaung Sett Thu",
            'bank_acc_no'  => "099818645611"
        ]);

        //  UserBank::create([
        //     'user_id' => 2,
        //     'bank_id' => 3,
        //     'bank_acc_name' => "Kaung Sett Thu",
        //     'bank_acc_no'  => "099818645611"
        // ]);
        //  UserBank::create([
        //     'user_id' => 2,
        //     'bank_id' => 7,
        //     'bank_acc_name' => "Kaung Sett Thu",
        //     'bank_acc_no'  => "099818645611"
        // ]);
    }
}
