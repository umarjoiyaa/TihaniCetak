<?php

namespace Database\Seeders;

use App\Models\Area;
use App\Models\AreaLevel;
use App\Models\AreaShelf;
use App\Models\Customer;
use App\Models\GoodReceiving;
use App\Models\GoodReceivingProduct;
use App\Models\Product;
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

        SaleOrder::create([
            'order_no' => 'SO-001497',
            'customer' => 'EDUKID DISTRIBUTORS SDN BHD',
            'po_no' => 'PO-001124',
            'terms' => 'ok',
            'date' => '02-03-2023',
            'item' => '1',
            'description' => 'abc',
            'uom' => 'Temperature',
            'sale_order_qty' => '124',
            'delivery_qty' => '90',
            'remaining_qty' => '08',
            'status' => 'New',
            'kod_buku' => '250',
            'catekan' => '9',
            'size' => '123',
            'pages_cover' => '21',
            'pages_text' => '32',
            'paper_cover' => '43',
            'paper_text' => '343',
            'printing_cover' => '432',
            'printing_text' => 'abc',
            'finishing' => 'abc',
            'binding' => 'abc',
            'shrinking_wrapping' => 'abc',
            'extra_stock' => '100',
            'remarks' => 'abc',
            'delivery_date' => '02-03-2023',
            'order_status' => 'In-Progress',
            'approval_status' => 'published',
        ]);

        SaleOrder::create([
            'order_no' => 'SO-001496',
            'customer' => 'EDUKID DISTRIBUTORS SDN BHD',
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
            'order_status' => 'In-Progress',
            'approval_status' => 'published',
        ]);

        Product::create([
            'item_code' => 'AA',
            'description' => 'ITEM A',
            'group' => 'PAPERS',
            'base_uom' => 'UNITS'
        ]);

        Product::create([
            'item_code' => 'BB',
            'description' => 'ITEM B',
            'group' => 'SEMI FG',
            'base_uom' => 'UNITS'
        ]);

        Product::create([
            'item_code' => 'CC',
            'description' => 'ITEM C',
            'group' => 'RAW MATERIAL',
            'base_uom' => 'UNITS'
        ]);

        Product::create([
            'item_code' => 'DD',
            'description' => 'ITEM D',
            'group' => 'PAPERS',
            'base_uom' => 'UNITS'
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

        Customer::create([
            'name' => 'Customer A',
            'code' => 'CRA'
        ]);

        Customer::create([
            'name' => 'Customer B',
            'code' => 'CRB'
        ]);

        Customer::create([
            'name' => 'Customer C',
            'code' => 'CRC'
        ]);

        $good_receiving = GoodReceiving::create([
            'doc_key' => '454574',
            'doc_no' => 'P003654',
            'doc_date' => '16-03-2024',
            'incomming_qty' => 400,
            'receive_qty' => 0,
            'po_no' => 'PO-11231-1',
            'creditor_name' => 'Supplier A',
            'date' => '25-03-2024',
        ]);

        GoodReceivingProduct::create([
            'receiving_id' => $good_receiving->id,
            'product_id' => 1,
            'quantity' => 200,
            'delivery_date' => '20-03-2024',
        ]);

        GoodReceivingProduct::create([
            'receiving_id' => $good_receiving->id,
            'product_id' => 3,
            'quantity' => 200,
            'delivery_date' => '20-03-2024',
        ]);

        AreaLevel::create([
            'name' => 'Level 1',
            'code' => 'Level 1'
        ]);

        AreaLevel::create([
            'name' => 'Level 2',
            'code' => 'Level 2'
        ]);

    }
}
