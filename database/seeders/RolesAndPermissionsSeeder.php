<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

           $Admin = Role::create(
            [
                    'name' => "Admin",
            ]);

        $user = Role::create(
            [
                    'name' => "User",
            ]);

        $permissions = ['admin_access', 'admin_index', 'user_access', 'user_index'];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }


        $Admin->givePermissionTo(['admin_access','admin_index']);
        $user->givePermissionTo(['admin_access','user_index']);


    }
}
