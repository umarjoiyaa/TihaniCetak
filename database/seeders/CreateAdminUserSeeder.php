<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\SaleOrder;
use App\Models\Supplier;
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

        $sale_order = SaleOrder::create([
            'order_no' => 'SO-001496',
            'customer' => 'Mr admin',
            'po_no' => 'PO-001123',
            'terms' => 'ok',
            'date' => '01-03-2023',
            'item' => '1',
            'description' => 'qwerty',
            'uom' => 'Meter',
            'sale_order_qty' => '23',
            'delivery_qty' => '90',
            'remaining_qty' => '08',
            'status' => 'Repeat',
            'kod_buku' => '120',
            'catekan' => '7',
            'size' => '90',
            'pages_cover' => '12',
            'pages_text' => '23',
            'paper_cover' => '34',
            'paper_text' => '334',
            'printing_cover' => '234',
            'printing_text' => 'qwerty',
            'finishing' => 'qwerty',
            'binding' => 'qwerty',
            'shrinking_wrapping' => 'qwerty',
            'extra_stock' => '90',
            'remarks' => 'qwerty',
            'delivery_date' => '01-03-2023',
            'order_status' => 'published',
        ]);

        Supplier::create([
            'name' => 'Supplier A',
            'code' => 'SPA'
        ]);

        Supplier::create([
            'name' => 'Supplier B',
            'code' => 'SPB'
        ]);

        Supplier::create([
            'name' => 'Supplier C',
            'code' => 'SPC'
        ]);
    }
}
