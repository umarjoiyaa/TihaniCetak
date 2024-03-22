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
            'Product View',
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
            'REKOD SERAHAN PLATE CETAX DAN SAMPLE List',
            'REKOD SERAHAN PLATE CETAX DAN SAMPLE Create',
            'REKOD SERAHAN PLATE CETAX DAN SAMPLE Update',
            'REKOD SERAHAN PLATE CETAX DAN SAMPLE View',
            'REKOD SERAHAN PLATE CETAX DAN SAMPLE Delete',
            'LAPORAN PROSES PENCETAKANI List',
            'LAPORAN PROSES PENCETAKANI Create',
            'LAPORAN PROSES PENCETAKANI Update',
            'LAPORAN PROSES PENCETAKANI Verify',
            'LAPORAN PROSES PENCETAKANI View',
            'LAPORAN PROSES PENCETAKANI Delete',
            'LAPORAN PROSES LIPAT List',
            'LAPORAN PROSES LIPAT Create',
            'LAPORAN PROSES LIPAT Update',
            'LAPORAN PROSES LIPAT Verify',
            'LAPORAN PROSES LIPAT View',
            'LAPORAN PROSES LIPAT Delete',
            'LAPORAN PROSES PENJILIDAN List',
            'LAPORAN PROSES PENJILIDAN Create',
            'LAPORAN PROSES PENJILIDAN Update',
            'LAPORAN PROSES PENJILIDAN Verify',
            'LAPORAN PROSES PENJILIDAN View',
            'LAPORAN PROSES PENJILIDAN Delete',
            'LAPORAN PROSES PENJILIDAN SADDLE List',
            'LAPORAN PROSES PENJILIDAN SADDLE Create',
            'LAPORAN PROSES PENJILIDAN SADDLE Update',
            'LAPORAN PROSES PENJILIDAN SADDLE Verify',
            'LAPORAN PROSES PENJILIDAN SADDLE View',
            'LAPORAN PROSES PENJILIDAN SADDLE Delete',
            'LAPORAN PROSES THREE KNIFE List',
            'LAPORAN PROSES THREE KNIFE Create',
            'LAPORAN PROSES THREE KNIFE Update',
            'LAPORAN PROSES THREE KNIFE Verify',
            'LAPORAN PROSES THREE KNIFE View',
            'LAPORAN PROSES THREE KNIFE Delete',
            'PROSES PENCETAKAN List',
            'PROSES PENCETAKAN Create',
            'PROSES PENCETAKAN Update',
            'PROSES PENCETAKAN Verify',
            'PROSES PENCETAKAN View',
            'PROSES PENCETAKAN Delete',
            'CTP List',
            'CTP Create',
            'CTP Update',
            'CTP Verify',
            'CTP View',
            'CTP Delete',
            'POD List',
            'POD Create',
            'POD Update',
            'POD Verify',
            'POD View',
            'POD Delete',
            'LAPORAN PEMERIKSAAN KUALITI List',
            'LAPORAN PEMERIKSAAN KUALITI Create',
            'LAPORAN PEMERIKSAAN KUALITI Update',
            'LAPORAN PEMERIKSAAN KUALITI Verify',
            'LAPORAN PEMERIKSAAN KUALITI View',
            'LAPORAN PEMERIKSAAN KUALITI Delete',
            'LAPORAN PEMERIKSAAN KUALITI PENJILIDAN List',
            'LAPORAN PEMERIKSAAN KUALITI PENJILIDAN Create',
            'LAPORAN PEMERIKSAAN KUALITI PENJILIDAN Update',
            'LAPORAN PEMERIKSAAN KUALITI PENJILIDAN Verify',
            'LAPORAN PEMERIKSAAN KUALITI PENJILIDAN View',
            'LAPORAN PEMERIKSAAN KUALITI PENJILIDAN Delete',
            'LAPORAN PEMERIKSAAN KUALITI PENJILIDAN SADDLE List',
            'LAPORAN PEMERIKSAAN KUALITI PENJILIDAN SADDLE Create',
            'LAPORAN PEMERIKSAAN KUALITI PENJILIDAN SADDLE Update',
            'LAPORAN PEMERIKSAAN KUALITI PENJILIDAN SADDLE Verify',
            'LAPORAN PEMERIKSAAN KUALITI PENJILIDAN SADDLE View',
            'LAPORAN PEMERIKSAAN KUALITI PENJILIDAN SADDLE Delete',
         ];

         $permissionss = [
            'PROSES THREE KNIFE List',
            'PROSES THREE KNIFE Create',
            'PROSES THREE KNIFE Update',
            'PROSES THREE KNIFE Verify',
            'PROSES THREE KNIFE View',
            'PROSES THREE KNIFE Delete',
            'PROSES PEMBUNGKUSAN List',
            'PROSES PEMBUNGKUSAN Create',
            'PROSES PEMBUNGKUSAN Update',
            'PROSES PEMBUNGKUSAN Verify',
            'PROSES PEMBUNGKUSAN View',
            'PROSES PEMBUNGKUSAN Delete',
            'PENGUMPULAN GATHERING List',
            'PENGUMPULAN GATHERING Create',
            'PENGUMPULAN GATHERING Update',
            'PENGUMPULAN GATHERING Verify',
            'PENGUMPULAN GATHERING View',
            'PENGUMPULAN GATHERING Delete',
            'KULIT BUKU List',
            'KULIT BUKU Create',
            'KULIT BUKU Update',
            'KULIT BUKU Verify',
            'KULIT BUKU View',
            'KULIT BUKU Delete',
            'DIGITAL PRINTING List',
            'DIGITAL PRINTING Create',
            'DIGITAL PRINTING Update',
            'DIGITAL PRINTING Proses',
            'DIGITAL PRINTING Verify',
            'DIGITAL PRINTING View',
            'DIGITAL PRINTING Delete',
            'PLATE CETAK List',
            'PLATE CETAK Create',
            'PLATE CETAK Update',
            'PLATE CETAK Verify',
            'PLATE CETAK View',
            'PLATE CETAK Delete',
            'MESIN LIPAT List',
            'MESIN LIPAT Create',
            'MESIN LIPAT Update',
            'MESIN LIPAT Verify',
            'MESIN LIPAT View',
            'MESIN LIPAT Proses',
            'MESIN LIPAT Delete',
            'COVER & ENDPAPER List',
            'COVER & ENDPAPER Create',
            'COVER & ENDPAPER Update',
            'COVER & ENDPAPER Verify',
            'COVER & ENDPAPER View',
            'COVER & ENDPAPER Proses',
            'COVER & ENDPAPER Delete',
            'TEXT List',
            'TEXT Create',
            'TEXT Update',
            'TEXT View',
            'TEXT Delete',
            'STAPLE BIND List',
            'STAPLE BIND Create',
            'STAPLE BIND Update',
            'STAPLE BIND Verify',
            'STAPLE BIND View',
            'STAPLE BIND Proses',
            'STAPLE BIND Delete',
            'PERFECT BIND List',
            'PERFECT BIND Create',
            'PERFECT BIND Update',
            'PERFECT BIND Verify',
            'PERFECT BIND View',
            'PERFECT BIND Proses',
            'PERFECT BIND Delete',
            'MESIN 3 KNIFE List',
            'MESIN 3 KNIFE Create',
            'MESIN 3 KNIFE Update',
            'MESIN 3 KNIFE Verify',
            'MESIN 3 KNIFE View',
            'MESIN 3 KNIFE Proses',
            'MESIN 3 KNIFE Delete',
            'BORANG SERAH KERJA (KULIT BUKU/COVER) List',
            'BORANG SERAH KERJA (KULIT BUKU/COVER) Create',
            'BORANG SERAH KERJA (KULIT BUKU/COVER) Update',
            'BORANG SERAH KERJA (KULIT BUKU/COVER) Purchasing',
            'BORANG SERAH KERJA (KULIT BUKU/COVER) Transfer',
            'BORANG SERAH KERJA (KULIT BUKU/COVER) Receive',
            'BORANG SERAH KERJA (KULIT BUKU/COVER) View',
            'BORANG SERAH KERJA (KULIT BUKU/COVER) Delete',
            'BORANG SERAH KERJA (TEKS) List',
            'BORANG SERAH KERJA (TEKS) Create',
            'BORANG SERAH KERJA (TEKS) Update',
            'BORANG SERAH KERJA (TEKS) Purchasing',
            'BORANG SERAH KERJA (TEKS) Transfer',
            'BORANG SERAH KERJA (TEKS) Receive',
            'BORANG SERAH KERJA (TEKS) View',
            'BORANG SERAH KERJA (TEKS) Delete',
            'PRINTING PROCESS List',
            'PRINTING PROCESS Update',
            'PRINTING PROCESS Verify',
            'PRINTING PROCESS View',
            'PRODUCTION SCHEDULING View',
            'GOOD RECEIVING List',
            'GOOD RECEIVING Receive',
            'GOOD RECEIVING View',
            'MATERIAL REQUEST List',
            'MATERIAL REQUEST Create',
            'MATERIAL REQUEST Update',
            'MATERIAL REQUEST View',
            'MATERIAL REQUEST Delete',
            'MANAGE TRANSFER List',
            'MANAGE TRANSFER Create',
            'MANAGE TRANSFER Update',
            'MANAGE TRANSFER Receive',
            'MANAGE TRANSFER View',
            'MANAGE TRANSFER Delete',
            'STOCK IN List',
            'STOCK IN Create',
            'STOCK IN Update',
            'STOCK IN View',
            'STOCK IN Delete',
            'STOCK TRANSFER List',
            'STOCK TRANSFER Create',
            'STOCK TRANSFER Update',
            'STOCK TRANSFER View',
            'STOCK TRANSFER Delete',
            'STOCK TRANSFER Receive',
            'STOCK TRANSFER LOCATION List',
            'STOCK TRANSFER LOCATION Create',
            'STOCK TRANSFER LOCATION Update',
            'STOCK TRANSFER LOCATION View',
            'STOCK TRANSFER LOCATION Delete',
            'INVENTORY REPORT View'
            'INVENTORY REPORT View',
            'LAPORAN PEMERIKSAAN AKHIR, PEMBUNGKISAN DAN PENGHANTARAN KE STOR List',
            'LAPORAN PEMERIKSAAN AKHIR, PEMBUNGKISAN DAN PENGHANTARAN KE STOR Create',
            'LAPORAN PEMERIKSAAN AKHIR, PEMBUNGKISAN DAN PENGHANTARAN KE STOR Update',
            'LAPORAN PEMERIKSAAN AKHIR, PEMBUNGKISAN DAN PENGHANTARAN KE STOR View',
            'LAPORAN PEMERIKSAAN AKHIR, PEMBUNGKISAN DAN PENGHANTARAN KE STOR Delete',
            'LAPORAN PEMERIKSAAN AKHIR, PEMBUNGKISAN DAN PENGHANTARAN KE STOR Check',
            'LAPORAN PEMERIKSAAN AKHIR, PEMBUNGKISAN DAN PENGHANTARAN KE STOR Verify QC',
            'LAPORAN PEMERIKSAAN AKHIR, PEMBUNGKISAN DAN PENGHANTARAN KE STOR Transfer to store',
            'LAPORAN PEMERIKSAAN AKHIR, PEMBUNGKISAN DAN PENGHANTARAN KE STOR Receive by store',
         ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        foreach ($permissionss as $perm) {
            Permission::create(['name' => $perm]);
        }
    }
}
