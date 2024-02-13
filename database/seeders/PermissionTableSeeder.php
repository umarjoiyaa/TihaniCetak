<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'Dashboard',
            'Role List',
            'Role Create',
            'Role Update',
            'Role View',
            'Role Delete',
            'User List',
            'User Create',
            'User Update',
            'User View',
            'User Delete',
            'UOM List',
            'UOM Create',
            'UOM Update',
            'UOM View',
            'UOM Delete',
            'UOM Conversion List',
            'UOM Conversion Create',
            'UOM Conversion Update',
            'UOM Conversion View',
            'UOM Conversion Delete',
         ];

        foreach ($permissions as $permission) {
            if (!Permission::where('name', $permission)->exists()) {
                Permission::create(['name' => $permission]);
            }
        }
    }
}
