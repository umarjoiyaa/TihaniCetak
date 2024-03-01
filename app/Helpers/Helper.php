<?php

namespace App\Helpers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Helper
{
    public static function logSystemActivity($action_on, $action_type)
    {
        DB::table('system_logs')->insert([
            'action_on' => $action_on,
            'action_type' => $action_type,
            'action_from' => url()->full(),
            'action_by' => Auth::id(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }

    public static function getpermissions($permissions)
    {

        $managements = [
            'SaleOrder' => [
                'SaleOrder List',
                'SaleOrder View',
                'SaleOrder Upload',
                'SaleOrder Approve',
                'SaleOrder Publish',
            ]
        ];

        $laporan_rekod_proses = [
            'Senarai Semak Pencetakan Digital' => [
                'Senarai Semak Pencetakan Digital List',
                'Senarai Semak Pencetakan Digital Create',
                'Senarai Semak Pencetakan Digital Update',
                'Senarai Semak Pencetakan Digital View',
                'Senarai Semak Pencetakan Digital Delete',
                'Senarai Semak Pencetakan Digital Verify',
            ],
            'Senarai Semak Pra Cetak' => [
                'Senarai Semak Pra Cetak List',
                'Senarai Semak Pra Cetak Create',
                'Senarai Semak Pra Cetak Update',
                'Senarai Semak Pra Cetak View',
                'Senarai Semak Pra Cetak Delete',
                'Senarai Semak Pra Cetak Verify',
            ],
            'REKOD SERAHAN PLATE CETAX DAN SAMPLE' => [
                'REKOD SERAHAN PLATE CETAX DAN SAMPLE List',
                'REKOD SERAHAN PLATE CETAX DAN SAMPLE Create',
                'REKOD SERAHAN PLATE CETAX DAN SAMPLE Update',
                'REKOD SERAHAN PLATE CETAX DAN SAMPLE View',
                'REKOD SERAHAN PLATE CETAX DAN SAMPLE Delete',
            ],
            'LAPORAN PROSES PENCETAKANI' => [
                'LAPORAN PROSES PENCETAKANI List',
                'LAPORAN PROSES PENCETAKANI Create',
                'LAPORAN PROSES PENCETAKANI Update',
                'LAPORAN PROSES PENCETAKANI Verify',
                'LAPORAN PROSES PENCETAKANI View',
                'LAPORAN PROSES PENCETAKANI Delete',
            ],
            'LAPORAN PROSES LIPAT' => [
                'LAPORAN PROSES LIPAT List',
                'LAPORAN PROSES LIPAT Create',
                'LAPORAN PROSES LIPAT Update',
                'LAPORAN PROSES LIPAT Verify',
                'LAPORAN PROSES LIPAT View',
                'LAPORAN PROSES LIPAT Delete',
            ],
            'LAPORAN PROSES PENJILIDAN' => [
                'LAPORAN PROSES PENJILIDAN List',
                'LAPORAN PROSES PENJILIDAN Create',
                'LAPORAN PROSES PENJILIDAN Update',
                'LAPORAN PROSES PENJILIDAN Verify',
                'LAPORAN PROSES PENJILIDAN View',
                'LAPORAN PROSES PENJILIDAN Delete',
            ],
            'LAPORAN PROSES PENJILIDAN SADDLE' => [
                'LAPORAN PROSES PENJILIDAN SADDLE List',
                'LAPORAN PROSES PENJILIDAN SADDLE Create',
                'LAPORAN PROSES PENJILIDAN SADDLE Update',
                'LAPORAN PROSES PENJILIDAN SADDLE Verify',
                'LAPORAN PROSES PENJILIDAN SADDLE View',
                'LAPORAN PROSES PENJILIDAN SADDLE Delete',
            ],
            'LAPORAN PROSES THREE KNIFE' => [
                'LAPORAN PROSES THREE KNIFE List',
                'LAPORAN PROSES THREE KNIFE Create',
                'LAPORAN PROSES THREE KNIFE Update',
                'LAPORAN PROSES THREE KNIFE Verify',
                'LAPORAN PROSES THREE KNIFE View',
                'LAPORAN PROSES THREE KNIFE Delete',
            ]
        ];

        $laporan_pemiriksaan_kualitis = [
            'CTP' => [
                'CTP List',
                'CTP Create',
                'CTP Update',
                'CTP Verify',
                'CTP View',
                'CTP Delete',
            ],
            'POD' => [
                'POD List',
                'POD Create',
                'POD Update',
                'POD Verify',
                'POD View',
                'POD Delete',
            ],
            'PLATE CETAK' => [
                'PLATE CETAK List',
                'PLATE CETAK Create',
                'PLATE CETAK Update',
                'PLATE CETAK Verify',
                'PLATE CETAK View',
                'PLATE CETAK Delete',
            ],
            'PROSES PENCETAKAN' => [
                'PROSES PENCETAKAN List',
                'PROSES PENCETAKAN Create',
                'PROSES PENCETAKAN Update',
                'PROSES PENCETAKAN Verify',
                'PROSES PENCETAKAN View',
                'PROSES PENCETAKAN Delete',
            ],
            'LAPORAN PEMERIKSAAN KUALITI' => [
                'LAPORAN PEMERIKSAAN KUALITI List',
                'LAPORAN PEMERIKSAAN KUALITI Create',
                'LAPORAN PEMERIKSAAN KUALITI Update',
                'LAPORAN PEMERIKSAAN KUALITI Verify',
                'LAPORAN PEMERIKSAAN KUALITI View',
                'LAPORAN PEMERIKSAAN KUALITI Delete',
            ],
            'LAPORAN PEMERIKSAAN KUALITI PENJILIDAN' => [
                'LAPORAN PEMERIKSAAN KUALITI PENJILIDAN List',
                'LAPORAN PEMERIKSAAN KUALITI PENJILIDAN Create',
                'LAPORAN PEMERIKSAAN KUALITI PENJILIDAN Update',
                'LAPORAN PEMERIKSAAN KUALITI PENJILIDAN Verify',
                'LAPORAN PEMERIKSAAN KUALITI PENJILIDAN View',
                'LAPORAN PEMERIKSAAN KUALITI PENJILIDAN Delete',
            ],
            'LAPORAN PEMERIKSAAN KUALITI PENJILIDAN SADDLE' => [
                'LAPORAN PEMERIKSAAN KUALITI PENJILIDAN SADDLE List',
                'LAPORAN PEMERIKSAAN KUALITI PENJILIDAN SADDLE Create',
                'LAPORAN PEMERIKSAAN KUALITI PENJILIDAN SADDLE Update',
                'LAPORAN PEMERIKSAAN KUALITI PENJILIDAN SADDLE Verify',
                'LAPORAN PEMERIKSAAN KUALITI PENJILIDAN SADDLE View',
                'LAPORAN PEMERIKSAAN KUALITI PENJILIDAN SADDLE Delete',
            ],
            'PROSES THREE KNIFE' => [
                'PROSES THREE KNIFE List',
                'PROSES THREE KNIFE Create',
                'PROSES THREE KNIFE Update',
                'PROSES THREE KNIFE Verify',
                'PROSES THREE KNIFE View',
                'PROSES THREE KNIFE Delete',
            ],
            'PROSES PEMBUNGKUSAN' => [
                'PROSES PEMBUNGKUSAN List',
                'PROSES PEMBUNGKUSAN Create',
                'PROSES PEMBUNGKUSAN Update',
                'PROSES PEMBUNGKUSAN Verify',
                'PROSES PEMBUNGKUSAN View',
                'PROSES PEMBUNGKUSAN Delete',
            ],
            'PENGUMPULAN GATHERING' => [
                'PENGUMPULAN GATHERING List',
                'PENGUMPULAN GATHERING Create',
                'PENGUMPULAN GATHERING Update',
                'PENGUMPULAN GATHERING Verify',
                'PENGUMPULAN GATHERING View',
                'PENGUMPULAN GATHERING Delete',
            ],
            'KULIT BUKU' => [
                'KULIT BUKU List',
                'KULIT BUKU Create',
                'KULIT BUKU Update',
                'KULIT BUKU Verify',
                'KULIT BUKU View',
                'KULIT BUKU Delete',
            ]
        ];

        $job_sheets = [
            'DIGITAL PRINTING' => [
                'DIGITAL PRINTING List',
                'DIGITAL PRINTING Create',
                'DIGITAL PRINTING Update',
                'DIGITAL PRINTING Proses',
                'DIGITAL PRINTING Verify',
                'DIGITAL PRINTING View',
                'DIGITAL PRINTING Delete',
            ],
            'MESIN LIPAT' => [
                'MESIN LIPAT List',
                'MESIN LIPAT Create',
                'MESIN LIPAT Update',
                'MESIN LIPAT Proses',
                'MESIN LIPAT Verify',
                'MESIN LIPAT View',
                'MESIN LIPAT Delete',
            ],
            'COVER & ENDPAPER' => [
                'COVER & ENDPAPER List',
                'COVER & ENDPAPER Create',
                'COVER & ENDPAPER Update',
                'COVER & ENDPAPER Proses',
                'COVER & ENDPAPER Verify',
                'COVER & ENDPAPER View',
                'COVER & ENDPAPER Delete',
            ],
            'TEXT' => [
                'TEXT List',
                'TEXT Create',
                'TEXT Update',
                'TEXT View',
                'TEXT Delete',
            ],
            'STAPLE BIND' => [
                'STAPLE BIND List',
                'STAPLE BIND Create',
                'STAPLE BIND Update',
                'STAPLE BIND Proses',
                'STAPLE BIND Verify',
                'STAPLE BIND View',
                'STAPLE BIND Delete',
            ],
            'PERFECT BIND' => [
                'PERFECT BIND List',
                'PERFECT BIND Create',
                'PERFECT BIND Update',
                'PERFECT BIND Proses',
                'PERFECT BIND Verify',
                'PERFECT BIND View',
                'PERFECT BIND Delete',
            ],
            'MESIN 3 KNIFE' => [
                'MESIN 3 KNIFE List',
                'MESIN 3 KNIFE Create',
                'MESIN 3 KNIFE Update',
                'MESIN 3 KNIFE Proses',
                'MESIN 3 KNIFE Verify',
                'MESIN 3 KNIFE View',
                'MESIN 3 KNIFE Delete',
            ],
            'BORANG SERAH KERJA (KULIT BUKU/COVER)' => [
                'BORANG SERAH KERJA (KULIT BUKU/COVER) List',
                'BORANG SERAH KERJA (KULIT BUKU/COVER) Create',
                'BORANG SERAH KERJA (KULIT BUKU/COVER) Update',
                'BORANG SERAH KERJA (KULIT BUKU/COVER) Verify',
                'BORANG SERAH KERJA (KULIT BUKU/COVER) View',
                'BORANG SERAH KERJA (KULIT BUKU/COVER) Delete',
            ],
            'BORANG SERAH KERJA (TEKS)' => [
                'BORANG SERAH KERJA (TEKS) List',
                'BORANG SERAH KERJA (TEKS) Create',
                'BORANG SERAH KERJA (TEKS) Update',
                'BORANG SERAH KERJA (TEKS) Verify',
                'BORANG SERAH KERJA (TEKS) View',
                'BORANG SERAH KERJA (TEKS) Delete',
            ]
        ];

        $productions = [
            'PRODUCTION SCHEDULING' => [
                'PRODUCTION SCHEDULING View',
            ],
            'PRINTING PROCESS' => [
                'PRINTING PROCESS List',
                'PRINTING PROCESS Update',
                'PRINTING PROCESS Verify',
                'PRINTING PROCESS View',
            ]
        ];

        $dashboards = [

        ];

        $wms_job_sheets = [

        ];

        $wms_dashboards = [

        ];

        $reports = [

        ];

        $administrations = [
            'Role' => [
                'Role List',
                'Role Create',
                'Role Update',
                'Role View',
                'Role Delete',
            ],
            'Department' => [
                'Department List',
                'Department Create',
                'Department Update',
                'Department View',
                'Department Delete',
            ],
            'Designation' => [
                'Designation List',
                'Designation Create',
                'Designation Update',
                'Designation View',
                'Designation Delete',
            ],
            'User' => [
                'User List',
                'User Create',
                'User Update',
                'User View',
                'User Delete',
            ]
        ];

        $databases = [
            'Product' => [
                'Product List',
                'Product Create',
                'Product Update',
                'Product View',
                'Product Delete',
            ],
            'UOM' => [
                'UOM List',
                'UOM Create',
                'UOM Update',
                'UOM View',
                'UOM Delete',
            ],
            'UOM Conversion' => [
                'UOM Conversion List',
                'UOM Conversion Create',
                'UOM Conversion Update',
                'UOM Conversion View',
                'UOM Conversion Delete',
            ],
            'Machine' => [
                'Machine List',
                'Machine Create',
                'Machine Update',
                'Machine View',
                'Machine Delete',
            ],
            'Area Level' => [
                'Area Level List',
                'Area Level Create',
                'Area Level Update',
                'Area Level View',
                'Area Level Delete',
            ],
            'Area' => [
                'Area List',
                'Area Create',
                'Area Update',
                'Area View',
                'Area Delete',
            ],
        ];

        if ($permissions == 'managements') {
            return $managements;
        } else if ($permissions == 'laporan_rekod_proses') {
            return $laporan_rekod_proses;
        } else if ($permissions == 'laporan_pemiriksaan_kualitis') {
            return $laporan_pemiriksaan_kualitis;
        } else if ($permissions == 'job_sheets') {
            return $job_sheets;
        } else if ($permissions == 'productions') {
            return $productions;
        } else if ($permissions == 'dashboards') {
            return $dashboards;
        } else if ($permissions == 'wms_job_sheets') {
            return $wms_job_sheets;
        } else if ($permissions == 'wms_dashboards') {
            return $wms_dashboards;
        } else if ($permissions == 'reports') {
            return $reports;
        } else if ($permissions == 'administrations') {
            return $administrations;
        } else if ($permissions == 'databases') {
            return $databases;
        }

    }

}
