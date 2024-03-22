<?php

namespace App\Http\Controllers;

use App\Models\LaporanPemeriksaanAkhir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Laporan_PemeriksaanController extends Controller
{

    public function Data(Request $request)
    {
        if ($request->ajax() && $request->input('columnsData') != null) {
            $columnsData = $request->input('columnsData');
            $draw = $request->input('draw');
            $start = $request->input('start');
            $length = $request->input('length');
            $search = $request->input('search.value');
            $orderByColumnIndex = $request->input('order.0.column'); // Get the index of the column to sort by
            $orderByDirection = $request->input('order.0.dir'); // Get the sort direction ('asc' or 'desc')

            $query = LaporanPemeriksaanAkhir::select('id', 'sale_order_id', 'date', 'created_by', 'status')->with('user', 'sale_order');

            // Apply search if a search term is provided
            if (!empty($search)) {
                $searchLower = strtolower($search);
                $query->where(function ($q) use ($searchLower) {
                    $q
                        ->where('date', 'like', '%' . $searchLower . '%')
                        ->orWhereHas('user', function ($query) use ($searchLower) {
                            $query->where('full_name', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('order_no', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('description', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('kod_buku', 'like', '%' . $searchLower . '%');
                        })
                        ->OrWhere('status', 'like', '%' . $searchLower . '%');
                    // Add more columns as needed
                });
            }
            // Determine the column to sort by
            $results = null;

            if (!empty($columnsData)) {
                $sortableColumns = [
                    1 => 'sale_order_id',
                    2 => 'sale_order_id',
                    3 => 'sale_order_id',
                    4 => 'date',
                    5 => 'created_by',
                    6 => 'status',
                    // Add more columns as needed
                ];
                if($orderByColumnIndex != null){
                    if($orderByColumnIndex == "0"){
                        $orderByColumn = 'created_at';
                        $orderByDirection = 'ASC';
                    }else{
                        $orderByColumn = $sortableColumns[$orderByColumnIndex];
                    }
                }else{
                    $orderByColumn = 'created_at';
                }
                if($orderByDirection == null){
                    $orderByDirection = 'ASC';
                }
                $results = $query->where(function ($q) use ($columnsData) {
                    foreach ($columnsData as $column) {
                        $searchLower = strtolower($column['value']);

                        switch ($column['index']) {
                            case 1:
                                $q->whereHas('sale_order', function ($query) use ($searchLower) {
                                    $query->where('order_no', 'like', '%' . $searchLower . '%');
                                });
                                break;
                            case 2:
                                $q->whereHas('sale_order', function ($query) use ($searchLower) {
                                    $query->where('description', 'like', '%' . $searchLower . '%');
                                });
                                break;
                            case 3:
                                $q->whereHas('sale_order', function ($query) use ($searchLower) {
                                    $query->where('kod_buku', 'like', '%' . $searchLower . '%');
                                });
                                break;
                            case 4:
                                $q->where('date', 'like', '%' . $searchLower . '%');
                                break;
                            case 5:
                                $q->whereHas('user', function ($query) use ($searchLower) {
                                    $query->where('full_name', 'like', '%' . $searchLower . '%');
                                });
                                break;
                            case 6:
                                $q->where('status', 'like', '%' . $searchLower . '%');
                                break;
                            default:
                                break;
                        }
                    }
                })->orderBy($orderByColumn, $orderByDirection)->get();
            }

            // Process and format the results for DataTables
            $recordsTotal = $results ? $results->count() : 0;

            // Check if there are results before applying skip and take
            if ($results->isNotEmpty()) {
                $uom = $results->skip($start)->take($length)->all();
            } else {
                $uom = [];
            }

            $index = 0;
            foreach ($uom as $row) {
                $row->sr_no = $start + $index + 1;
                if ($row->status == 'checked') {
                    $row->status = '<span class="badge badge-warning">Checked</span>';
                    $actions = '<a class="dropdown-item" href="' . route('senari_semak.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('senari_semak.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('senari_semak.verify', $row->id) . '">Verify</a>
                    <a class="dropdown-item"  id="swal-warning" data-delete="' . route('senari_semak.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'verified') {
                    $row->status = '<span class="badge badge-success">Verified</span>';
                    $actions = '<a class="dropdown-item" href="' . route('senari_semak.view', $row->id) . '">View</a>
                                <a class="dropdown-item"  id="swal-warning" data-delete="' . route('senari_semak.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'declined') {
                    $row->status = '<span class="badge badge-danger">Declined</span>';
                    $actions = '<a class="dropdown-item" href="' . route('senari_semak.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('senari_semak.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('senari_semak.verify', $row->id) . '">Verify</a>
                    <a class="dropdown-item"  id="swal-warning" data-delete="' . route('senari_semak.delete', $row->id) . '">Delete</a>';
                }

                $row->action = '<div class="dropdown dropdownwidth">
                                <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary"
                                data-toggle="dropdown" id="dropdownMenuButton" type="button">Action <i class="fas fa-caret-down ml-1"></i></button>
                                <div  class="dropdown-menu tx-13">
                                    ' . $actions . '
                                </div>
                            </div>';
                $index++;
            }

            // // Continue with your response
            $uomsWithoutAction = array_map(function ($row) {
                return $row;
            }, $uom);

            return response()->json([
                'draw' => $draw,
                'recordsTotal' => $recordsTotal,
                'recordsFiltered' => $recordsTotal, // Total records after filtering
                'data' => array_values($uomsWithoutAction),
            ]);
        } elseif ($request->ajax()) {

            $draw = $request->input('draw');
            $start = $request->input('start');
            $length = $request->input('length');
            $search = $request->input('search.value');
            $orderByColumnIndex = $request->input('order.0.column'); // Get the index of the column to sort by
            $orderByDirection = $request->input('order.0.dir'); // Get the sort direction ('asc' or 'desc')

            $query = SenariSemak::select('id', 'sale_order_id', 'date', 'created_by', 'status')->with('user', 'sale_order');

            // Apply search if a search term is provided
            if (!empty($search)) {
                $searchLower = strtolower($search);
                $query->where(function ($q) use ($searchLower) {
                    $q
                    ->where('date', 'like', '%' . $searchLower . '%')
                    ->orWhereHas('user', function ($query) use ($searchLower) {
                        $query->where('full_name', 'like', '%' . $searchLower . '%');
                    })
                    ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                        $query->where('order_no', 'like', '%' . $searchLower . '%');
                    })
                    ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                        $query->where('description', 'like', '%' . $searchLower . '%');
                    })
                    ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                        $query->where('kod_buku', 'like', '%' . $searchLower . '%');
                    })
                    ->OrWhere('status', 'like', '%' . $searchLower . '%');
                    // Add more columns as needed
                });
            }

            $sortableColumns = [
                1 => 'sale_order_id',
                2 => 'sale_order_id',
                3 => 'sale_order_id',
                4 => 'date',
                5 => 'created_by',
                6 => 'status',
                // Add more columns as needed
            ];
            if($orderByColumnIndex != null){
                if($orderByColumnIndex != "0"){
                    $orderByColumn = $sortableColumns[$orderByColumnIndex];
                    $query->orderBy($orderByColumn, $orderByDirection);
                }else{
                    $query->latest('created_at');
                }
            }else{
                $query->latest('created_at');
            }
            $recordsTotal = $query->count();

            $uom = $query
                ->skip($start)
                ->take($length)
                ->get();

            $uom->each(function ($row, $index)  use (&$start) {
                $row->sr_no = $start + $index + 1;
                if ($row->status == 'checked') {
                    $row->status = '<span class="badge badge-warning">Checked</span>';
                    $actions = '<a class="dropdown-item" href="' . route('senari_semak.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('senari_semak.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('senari_semak.verify', $row->id) . '">Verify</a>
                    <a class="dropdown-item"  id="swal-warning" data-delete="' . route('senari_semak.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'verified') {
                    $row->status = '<span class="badge badge-success">Verified</span>';
                    $actions = '<a class="dropdown-item" href="' . route('senari_semak.view', $row->id) . '">View</a>
                                <a class="dropdown-item"  id="swal-warning" data-delete="' . route('senari_semak.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'declined') {
                    $row->status = '<span class="badge badge-danger">Declined</span>';
                    $actions = '<a class="dropdown-item" href="' . route('senari_semak.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('senari_semak.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('senari_semak.verify', $row->id) . '">Verify</a>
                    <a class="dropdown-item"  id="swal-warning" data-delete="' . route('senari_semak.delete', $row->id) . '">Delete</a>';
                }

                $row->action = '<div class="dropdown dropdownwidth">
                                <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary"
                                data-toggle="dropdown" id="dropdownMenuButton" type="button">Action <i class="fas fa-caret-down ml-1"></i></button>
                                <div  class="dropdown-menu tx-13">
                                    ' . $actions . '
                                </div>
                            </div>';
            });

            return response()->json([
                'draw' => $draw,
                'recordsTotal' => $recordsTotal,
                'recordsFiltered' => $recordsTotal, // Total records after filtering
                'data' => $uom,
            ]);
        }
    }

    public function index(){
        if (
            Auth::user()->hasPermissionTo('Senarai Semak Pencetakan Digital List') ||
            Auth::user()->hasPermissionTo('Senarai Semak Pencetakan Digital Create') ||
            Auth::user()->hasPermissionTo('Senarai Semak Pencetakan Digital Update') ||
            Auth::user()->hasPermissionTo('Senarai Semak Pencetakan Digital View') ||
            Auth::user()->hasPermissionTo('Senarai Semak Pencetakan Digital Delete') ||
            Auth::user()->hasPermissionTo('Senarai Semak Pencetakan Digital Verify')
        ) {
            Helper::logSystemActivity('Senarai Semak Pencetakan Digital List', 'Senarai Semak Pencetakan Digital List');
            return view('WMS.Laporan_Pemeriksaa.index');
        }
        return back()->with('custom_errors', 'You don`t have Right Permission');
    }



    // public function index(){
    //     return view('WMS.Laporan_Pemeriksaa.index');
    // }
    public function create(){
        return view('WMS.Laporan_Pemeriksaa.create');
    }
    public function senarai(){
        return view('WMS.Laporan_Pemeriksaa.senarai');
    }
}
