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
            'Department List',
            'Department Create',
            'Department Update',
            'Department View',
            'Department Delete',
            'Designation List',
            'Designation Create',
            'Designation Update',
            'Designation View',
            'Designation Delete',
            'Machine List',
            'Machine Create',
            'Machine Update',
            'Machine View',
            'Machine Delete',
            'Area Level List',
            'Area Level Create',
            'Area Level Update',
            'Area Level View',
            'Area Level Delete',
            'Area Shelf List',
            'Area Shelf Create',
            'Area Shelf Update',
            'Area Shelf View',
            'Area Shelf Delete',
            'Area List',
            'Area Create',
            'Area Update',
            'Area View',
            'Area Delete',
            'Product List',
            'Product Create',
            'Product Update',
            'Product View',
            'Product Delete',
            'SaleOrder List',
            'SaleOrder View',
            'SaleOrder Upload',
            'SaleOrder Approve',
            'SaleOrder Publish',
            'Senarai Semak Pencetakan Digital List',
            'Senarai Semak Pencetakan Digital Create',
            'Senarai Semak Pencetakan Digital Update',
            'Senarai Semak Pencetakan Digital View',
            'Senarai Semak Pencetakan Digital Delete',
            'Senarai Semak Pencetakan Digital Verify',
            'Senarai Semak Pra Cetak List',
            'Senarai Semak Pra Cetak Create',
            'Senarai Semak Pra Cetak Update',
            'Senarai Semak Pra Cetak View',
            'Senarai Semak Pra Cetak Delete',
            'Senarai Semak Pra Cetak Verify',
         ];

        foreach ($permissions as $permission) {
            if (!Permission::where('name', $permission)->exists()) {
                Permission::create(['name' => $permission]);
            }
        }
    }
}
