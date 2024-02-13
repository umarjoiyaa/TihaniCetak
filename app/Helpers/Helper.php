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

        $dashboards = [
            'Dashboard' => [
                'View',
            ],
            'Machine Dashboard' => [
                'View',
            ],
            'Production Dashboard' => [
                'View',
            ]
        ];

        $reports = [
            'Material Stock' => [
                'View'
            ],
            'Report' => [
                'View'
            ],
            'Stock' => [
                'View'
            ]
        ];

        $users = [
            'Role' => [
                'List',
                'Create',
                'Update',
                'Delete'
            ],
            'User' => [
                'List',
                'Create',
                'Update',
                'Delete'
            ]
        ];

        $products = [
            'Product' => [
                'List',
                'Create',
                'Update',
                'Delete'
            ]
        ];

        $materials = [
            'Category' => [
                'List',
                'Create',
                'Update',
                'Delete'
            ],
            'UOM' => [
                'List',
                'Create',
                'Update',
                'Delete'
            ],
            'Supplier' => [
                'List',
                'Create',
                'Update',
                'Delete'
            ],
            'Material' => [
                'List',
                'Create',
                'Update',
                'Delete'
            ],
            'Material In' => [
                'List',
                'Create',
                'Update',
                'Delete'
            ],
            'Material Out' => [
                'List',
                'Create',
                'Update',
                'Delete'
            ]
        ];

        $productions = [
            'Batch' => [
                'List',
                'Create',
                'Update',
                'Delete'
            ],
            'Purchase Order' => [
                'List',
                'Create',
                'Update',
                'Delete'
            ],
            'Production Order' => [
                'List',
                'Create',
                'Update',
                'Delete'
            ],
            'Press' => [
                'List',
                'Create',
                'Update',
                'Delete'
            ],
            'Shotblast' => [
                'List',
                'Create',
                'Update',
                'Delete'
            ]
        ];

        $progresses = [
            'Grinding' => [
                'List',
                'Create',
                'Update',
                'Delete'
            ],
            'Drilling' => [
                'List',
                'Create',
                'Update',
                'Delete'
            ],
            'Final Checking' => [
                'List',
                'Create',
                'Update',
                'Delete'
            ]
        ];

        $warehouses = [
            'Pellete' => [
                'List',
                'Create',
                'Update',
                'Delete'
            ],
            'WareHouse' => [
                'List',
                'Create',
                'Update',
                'Delete'
            ],
            'WareHouse In' => [
                'List',
                'Create',
                'Update',
                'Delete'
            ],
            'WareHouse Out' => [
                'List',
                'Create',
                'Update',
                'Delete'
            ],
            'Check Pellete' => [
                'View'
            ]
        ];

        $others = [
            'Profile' => [
                'View',
                'Update'
            ]
        ];
    
        if ($permissions == 'dashboards') {
            return $dashboards;
        } else if ($permissions == 'reports') {
            return $reports;
        } else if ($permissions == 'users') {
            return $users;
        } else if ($permissions == 'products') {
            return $products;
        } else if ($permissions == 'materials') {
            return $materials;
        } else if ($permissions == 'productions') {
            return $productions;
        } else if ($permissions == 'progresses') {
            return $progresses;
        } else if ($permissions == 'warehouses') {
            return $warehouses;
        } else if ($permissions == 'others') {
            return $others;
        }

    }

}
