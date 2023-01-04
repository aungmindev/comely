<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'all_access']);
        $adminRole = Role::create(['name' => 'Admin']);

        $adminRole->givePermissionTo([
            'all_access',
        ]);

        $user = User::find(1);
        $user->assignRole('Admin');
    }
}
