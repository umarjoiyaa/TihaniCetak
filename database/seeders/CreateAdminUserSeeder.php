<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $role = Role::create(['name' => 'Admin']);

        $user = User::create([
            'user_name' => 'admin',
            'full_name' => 'Mr admin',
            'email' => 'admin@gmail.com',
            'is_active' => 'yes',
            'password' => bcrypt('Admin@321'),
            'role_ids' => json_encode(["1"]),
        ]);

        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);

    }
}
