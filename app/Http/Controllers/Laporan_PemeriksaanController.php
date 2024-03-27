<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\LaporanPemeriksaanAkhir;
use App\Models\LaporanPemeriksaanAkhirSectionG;
use App\Models\LaporanPemeriksaanAkhirSectionG2;
use App\Models\LaporanPemeriksaanAkhirSenari;
use App\Models\LaporanPemeriksaanAkhirSenari2;
use App\Models\LaporanPemeriksaanAkhirSenariOther;
use App\Models\LaporanPemeriksaanAkhirSenariOther2;
use App\Models\User;
use Carbon\Carbon;
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

            $query = LaporanPemeriksaanAkhir::select('id', 'sale_order_id', 'date', 'created_by', 'status','c_kuantiti_1','user_text')->with('user', 'sale_order');

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
                            $query->where('kod_buku', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('description', 'like', '%' . $searchLower . '%');
                        })

                        ->OrWhere('user_text', 'like', '%' . $searchLower . '%')
                        ->OrWhere('c_kuantiti_1', 'like', '%' . $searchLower . '%')
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
                    5 => 'user_text',
                    6 => 'c_kuantiti_1',
                    7 => 'status',
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
                                    $query->where('kod_buku', 'like', '%' . $searchLower . '%');
                                });

                                break;
                            case 3:
                                $q->whereHas('sale_order', function ($query) use ($searchLower) {
                                    $query->where('description', 'like', '%' . $searchLower . '%');
                                });
                                break;
                            case 4:
                                $q->where('date', 'like', '%' . $searchLower . '%');
                                break;
                            case 5:
                                $q->where('user_text', 'like', '%' . $searchLower . '%');
                                break;
                                case 6:
                                    $q->where('c_kuantiti_1', 'like', '%' . $searchLower . '%');
                                    break;
                            case 7:
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
                if ($row->status == 'Not-initiated') {
                    $row->status = '<span class="badge badge-warning">Not-initiated</span>';
                    $actions = '<a class="dropdown-item" href="' . route('laporan_pemeriksaan.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('laporan_pemeriksaan.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="">Check</a>
                    <a class="dropdown-item" href="">VerifyQC</a>
                    <a class="dropdown-item" href="">Transfer to store</a>
                    <a class="dropdown-item" href="">Receive by store</a>
                    <a class="dropdown-item"  id="swal-warning" data-delete="' . route('laporan_pemeriksaan.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'verified') {
                    $row->status = '<span class="badge badge-success">Verified</span>';
                    $actions = '<a class="dropdown-item" href="' . route('laporan_pemeriksaan.view', $row->id) . '">View</a>
                                <a class="dropdown-item"  id="swal-warning" data-delete="' . route('laporan_pemeriksaan.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'declined') {
                    $row->status = '<span class="badge badge-danger">Declined</span>';
                    $actions = '<a class="dropdown-item" href="' . route('laporan_pemeriksaan.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('laporan_pemeriksaan.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('laporan_pemeriksaan.verify', $row->id) . '">Verify</a>
                    <a class="dropdown-item"  id="swal-warning" data-delete="' . route('laporan_pemeriksaan.delete', $row->id) . '">Delete</a>';
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

            $query = LaporanPemeriksaanAkhir::select('id', 'sale_order_id', 'date', 'created_by', 'status','c_kuantiti_1','user_text')->with('user', 'sale_order');

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
                            $query->where('kod_buku', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('description', 'like', '%' . $searchLower . '%');
                        })
                        ->OrWhere('user_text', 'like', '%' . $searchLower . '%')
                        ->OrWhere('c_kuantiti_1', 'like', '%' . $searchLower . '%')
                        ->OrWhere('status', 'like', '%' . $searchLower . '%');
                    // Add more columns as needed
                });
            }

            $sortableColumns = [
                1 => 'sale_order_id',
                2 => 'sale_order_id',
                3 => 'sale_order_id',
                4 => 'date',
                5 => 'user_text',
                6 => 'c_kuantiti_1',
                7 => 'status',
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
                if ($row->status == 'Not-initiated') {
                    $row->status = '<span class="badge badge-warning">Not-initiated</span>';
                    $actions = '<a class="dropdown-item" href="' . route('laporan_pemeriksaan.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('laporan_pemeriksaan.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="">Check</a>
                    <a class="dropdown-item" href="">VerifyQC</a>
                    <a class="dropdown-item" href="">Transfer to store</a>
                    <a class="dropdown-item" href="">Receive by store</a>
                    <a class="dropdown-item"  id="swal-warning" data-delete="' . route('laporan_pemeriksaan.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'verified') {
                    $row->status = '<span class="badge badge-success">Verified</span>';
                    $actions = '<a class="dropdown-item" href="' . route('laporan_pemeriksaan.view', $row->id) . '">View</a>
                                <a class="dropdown-item"  id="swal-warning" data-delete="' . route('laporan_pemeriksaan.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'declined') {
                    $row->status = '<span class="badge badge-danger">Declined</span>';
                    $actions = '<a class="dropdown-item" href="' . route('laporan_pemeriksaan.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('laporan_pemeriksaan.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('laporan_pemeriksaan.verify', $row->id) . '">Verify</a>
                    <a class="dropdown-item"  id="swal-warning" data-delete="' . route('laporan_pemeriksaan.delete', $row->id) . '">Delete</a>';
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
            Auth::user()->hasPermissionTo('LAPORAN PEMERIKSAAN AKHIR, PEMBUNGKISAN DAN PENGHANTARAN KE STOR List') ||
            Auth::user()->hasPermissionTo('LAPORAN PEMERIKSAAN AKHIR, PEMBUNGKISAN DAN PENGHANTARAN KE STOR Create') ||
            Auth::user()->hasPermissionTo('LAPORAN PEMERIKSAAN AKHIR, PEMBUNGKISAN DAN PENGHANTARAN KE STOR Update') ||
            Auth::user()->hasPermissionTo('LAPORAN PEMERIKSAAN AKHIR, PEMBUNGKISAN DAN PENGHANTARAN KE STOR View') ||
            Auth::user()->hasPermissionTo('LAPORAN PEMERIKSAAN AKHIR, PEMBUNGKISAN DAN PENGHANTARAN KE STOR Delete') ||
            Auth::user()->hasPermissionTo('LAPORAN PEMERIKSAAN AKHIR, PEMBUNGKISAN DAN PENGHANTARAN KE STOR Verify')
        ) {
            Helper::logSystemActivity('LAPORAN PEMERIKSAAN AKHIR, PEMBUNGKISAN DAN PENGHANTARAN KE STOR List', 'LAPORAN PEMERIKSAAN AKHIR, PEMBUNGKISAN DAN PENGHANTARAN KE STOR List');
            return view('WMS.Laporan_Pemeriksaa.index');
        }
        return back()->with('custom_errors', 'You don`t have Right Permission');
    }






    public function store(Request $request)
    {
        if (!Auth::user()->hasPermissionTo('LAPORAN PEMERIKSAAN AKHIR, PEMBUNGKISAN DAN PENGHANTARAN KE STOR Create')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $validator = null;

        $validatedData = $request->validate([
            'sale_order' => 'required',
            'date' => 'required',
            'user' => 'required',
            'di_bungkus_oleh' => 'required',
        ],[
            'user.required' => 'The operator field is required.',
        ]);

        // If validations fail
        if (!$validatedData) {
            return redirect()->back()
                ->withErrors($validator)->withInput();
        }




        $userIds = $request->user;
        $userNames = [];

        foreach ($userIds as $userId) {
            $user = User::find($userId);
            if ($user) {
               $userNames[] = $user->full_name;
            }
        }

        $userText = implode(', ', $userNames);

        $pembantuIds = $request->di_bungkus_oleh;
        $pembantuNames = [];

        foreach ($pembantuIds as $pembantuId) {
            $pembantu = User::find($pembantuId);
            if ($pembantu) {
               $pembantuNames[] = $pembantu->full_name;
            }
        }

        $pembantuText = implode(', ', $pembantuNames);

        $laporan_pemeriksaan_akhir = new LaporanPemeriksaanAkhir();
        $laporan_pemeriksaan_akhir->sale_order_id = $request->sale_order;
        $laporan_pemeriksaan_akhir->date = $request->date;

        $laporan_pemeriksaan_akhir->created_by = Auth::user()->id;

        $laporan_pemeriksaan_akhir->user_id = json_encode($userIds);
        $laporan_pemeriksaan_akhir->user_text = $userText;
        $laporan_pemeriksaan_akhir->di_bungkus_oleh = json_encode($pembantuIds);

        $laporan_pemeriksaan_akhir->b_1 = $request->b_1;
        $laporan_pemeriksaan_akhir->b_2 = $request->b_2;
        $laporan_pemeriksaan_akhir->b_3 = $request->b_3;

        $laporan_pemeriksaan_akhir->c_1 = $request->c_1;
        $laporan_pemeriksaan_akhir->c_kuantiti_1 = ($request->c_1 != null) ? $request->c_kuantiti_1 : null;
        $laporan_pemeriksaan_akhir->c_2 = $request->c_2;
        $laporan_pemeriksaan_akhir->c_berat_2 = ($request->c_2 != null) ? $request->c_berat_2 : null;

        $laporan_pemeriksaan_akhir->d_1 = $request->d_1;
        $laporan_pemeriksaan_akhir->d_2 = $request->d_2;

        $laporan_pemeriksaan_akhir->e_1 = $request->e_1;
        $laporan_pemeriksaan_akhir->e_2 = $request->e_2;
        $laporan_pemeriksaan_akhir->e_3 = $request->e_3;
        $laporan_pemeriksaan_akhir->e_4 = $request->e_4;
        $laporan_pemeriksaan_akhir->e_5 = $request->e_5;
        $laporan_pemeriksaan_akhir->e_6 = $request->e_6;

        $laporan_pemeriksaan_akhir->f_1 = $request->f_1;
        $laporan_pemeriksaan_akhir->f_2 = $request->f_2;
        $laporan_pemeriksaan_akhir->f_3 = $request->f_3;

        $laporan_pemeriksaan_akhir->kauntiti_siap_1 = $request->kauntiti_siap_1;
        $laporan_pemeriksaan_akhir->kauntiti_siap_2 = $request->kauntiti_siap_2;
        $laporan_pemeriksaan_akhir->kauntiti_siap_3 = $request->kauntiti_siap_3;
        $laporan_pemeriksaan_akhir->status = "Not-initiated";


        $laporan_pemeriksaan_akhir->save();

        // G section save

        $laporan_pemeriksaan_akhir_section = new LaporanPemeriksaanAkhirSectionG();
        $laporan_pemeriksaan_akhir_section->parent_id = $laporan_pemeriksaan_akhir->id;
        $laporan_pemeriksaan_akhir_section->subkontraktor_1 = $request->subkontraktor_1;
        $laporan_pemeriksaan_akhir_section->jumlah_1 = $request->jumlah_1;
        $laporan_pemeriksaan_akhir_section->disahkan_oleh_1 = $request->disahkan_oleh_1;
        $laporan_pemeriksaan_akhir_section->tcsb_1 = $request->tcsb_1;
        $laporan_pemeriksaan_akhir_section->jumlah_2 = $request->jumlah_2;
        $laporan_pemeriksaan_akhir_section->disahkan_oleh_2 = $request->disahkan_oleh_2;
        $laporan_pemeriksaan_akhir_section->subkontraktor_2 = $request->subkontraktor_2;
        $laporan_pemeriksaan_akhir_section->jumlah_3 = $request->jumlah_3;
        $laporan_pemeriksaan_akhir_section->disahkan_oleh_3 = $request->disahkan_oleh_3;
        $laporan_pemeriksaan_akhir_section->tcsb_2 = $request->tcsb_2;
        $laporan_pemeriksaan_akhir_section->jumlah_4 = $request->jumlah_4;
        $laporan_pemeriksaan_akhir_section->disahkan_oleh_4 = $request->disahkan_oleh_4;
        $laporan_pemeriksaan_akhir_section->subkontraktor_3 = $request->subkontraktor_3;
        $laporan_pemeriksaan_akhir_section->jumlah_5 = $request->jumlah_5;
        $laporan_pemeriksaan_akhir_section->disahkan_oleh_5 = $request->disahkan_oleh_5;
        $laporan_pemeriksaan_akhir_section->tcsb_3 = $request->tcsb_3;
        $laporan_pemeriksaan_akhir_section->jumlah_6 = $request->jumlah_6;
        $laporan_pemeriksaan_akhir_section->disahkan_oleh_6 = $request->disahkan_oleh_6;
        $laporan_pemeriksaan_akhir_section->subkontraktor_4 = $request->subkontraktor_4;
        $laporan_pemeriksaan_akhir_section->jumlah_7 = $request->jumlah_7;
        $laporan_pemeriksaan_akhir_section->disahkan_oleh_7 = $request->disahkan_oleh_7;
        $laporan_pemeriksaan_akhir_section->tcsb_4 = $request->tcsb_4;
        $laporan_pemeriksaan_akhir_section->jumlah_8 = $request->jumlah_8;
        $laporan_pemeriksaan_akhir_section->disahkan_oleh_8 = $request->disahkan_oleh_8;
        $laporan_pemeriksaan_akhir_section->subkontraktor_5 = $request->subkontraktor_5;
        $laporan_pemeriksaan_akhir_section->jumlah_9 = $request->jumlah_9;
        $laporan_pemeriksaan_akhir_section->disahkan_oleh_9 = $request->disahkan_oleh_9;
        $laporan_pemeriksaan_akhir_section->tcsb_5 = $request->tcsb_5;
        $laporan_pemeriksaan_akhir_section->jumlah_10 = $request->jumlah_10;
        $laporan_pemeriksaan_akhir_section->disahkan_oleh_10 = $request->disahkan_oleh_10;
        $laporan_pemeriksaan_akhir_section->subkontraktor_6 = $request->subkontraktor_6;
        $laporan_pemeriksaan_akhir_section->jumlah_11 = $request->jumlah_11;
        $laporan_pemeriksaan_akhir_section->disahkan_oleh_11 = $request->disahkan_oleh_11;
        $laporan_pemeriksaan_akhir_section->tcsb_6 = $request->tcsb_6;
        $laporan_pemeriksaan_akhir_section->jumlah_12 = $request->jumlah_12;
        $laporan_pemeriksaan_akhir_section->disahkan_oleh_12 = $request->disahkan_oleh_12;
        $laporan_pemeriksaan_akhir_section->save();


        $laporan_pemeriksaan_akhir_section2 = new LaporanPemeriksaanAkhirSectionG2();
        $laporan_pemeriksaan_akhir_section2->parent_id = $laporan_pemeriksaan_akhir->id;

        $laporan_pemeriksaan_akhir_section2->subkontraktor_7 = $request->subkontraktor_7;
        $laporan_pemeriksaan_akhir_section2->jumlah_13 = $request->jumlah_13;
        $laporan_pemeriksaan_akhir_section2->disahkan_oleh_13 = $request->disahkan_oleh_13;
        $laporan_pemeriksaan_akhir_section2->tcsb_7 = $request->tcsb_7;
        $laporan_pemeriksaan_akhir_section2->jumlah_14 = $request->jumlah_14;
        $laporan_pemeriksaan_akhir_section2->disahkan_oleh_14 = $request->disahkan_oleh_14;

        $laporan_pemeriksaan_akhir_section2->subkontraktor_8 = $request->subkontraktor_8;
        $laporan_pemeriksaan_akhir_section2->jumlah_15 = $request->jumlah_15;
        $laporan_pemeriksaan_akhir_section2->disahkan_oleh_15 = $request->disahkan_oleh_15;
        $laporan_pemeriksaan_akhir_section2->tcsb_8 = $request->tcsb_8;
        $laporan_pemeriksaan_akhir_section2->jumlah_16 = $request->jumlah_16;
        $laporan_pemeriksaan_akhir_section2->disahkan_oleh_16 = $request->disahkan_oleh_16;

        $laporan_pemeriksaan_akhir_section2->subkontraktor_9 = $request->subkontraktor_9;
        $laporan_pemeriksaan_akhir_section2->jumlah_17 = $request->jumlah_17;
        $laporan_pemeriksaan_akhir_section2->disahkan_oleh_17 = $request->disahkan_oleh_17;
        $laporan_pemeriksaan_akhir_section2->tcsb_9 = $request->tcsb_9;
        $laporan_pemeriksaan_akhir_section2->jumlah_18 = $request->jumlah_18;
        $laporan_pemeriksaan_akhir_section2->disahkan_oleh_18 = $request->disahkan_oleh_18;

        $laporan_pemeriksaan_akhir_section2->subkontraktor_10 = $request->subkontraktor_10;
        $laporan_pemeriksaan_akhir_section2->jumlah_19 = $request->jumlah_19;
        $laporan_pemeriksaan_akhir_section2->disahkan_oleh_19 = $request->disahkan_oleh_19;
        $laporan_pemeriksaan_akhir_section2->tcsb_10 = $request->tcsb_10;
        $laporan_pemeriksaan_akhir_section2->jumlah_20 = $request->jumlah_20;
        $laporan_pemeriksaan_akhir_section2->disahkan_oleh_20 = $request->disahkan_oleh_20;

        $laporan_pemeriksaan_akhir_section2->subkontraktor_11 = $request->subkontraktor_11;
        $laporan_pemeriksaan_akhir_section2->jumlah_21 = $request->jumlah_21;
        $laporan_pemeriksaan_akhir_section2->disahkan_oleh_21 = $request->disahkan_oleh_21;
        $laporan_pemeriksaan_akhir_section2->tcsb_11 = $request->tcsb_11;
        $laporan_pemeriksaan_akhir_section2->jumlah_22 = $request->jumlah_22;
        $laporan_pemeriksaan_akhir_section2->disahkan_oleh_22 = $request->disahkan_oleh_22;

        $laporan_pemeriksaan_akhir_section2->subkontraktor_12 = $request->subkontraktor_12;
        $laporan_pemeriksaan_akhir_section2->jumlah_23 = $request->jumlah_23;
        $laporan_pemeriksaan_akhir_section2->disahkan_oleh_23 = $request->disahkan_oleh_23;
        $laporan_pemeriksaan_akhir_section2->tcsb_12 = $request->tcsb_12;
        $laporan_pemeriksaan_akhir_section2->jumlah_24 = $request->jumlah_24;
        $laporan_pemeriksaan_akhir_section2->disahkan_oleh_24 = $request->disahkan_oleh_24;

        $laporan_pemeriksaan_akhir_section2->save();
        // dd($dataRow);
        $dataRow = json_decode($request->row, true);
        $dataKeputusan = json_decode($request->keputusan, true);
        // dd($dataRow);
        if(is_array($dataRow) ){
            foreach($dataRow as $key => $Data){
            foreach($Data as $key => $value){
                $laporan_pemeriksaan_akhir_senari = new LaporanPemeriksaanAkhirSenari();
                $laporan_pemeriksaan_akhir_senari->parent_id = $laporan_pemeriksaan_akhir->id;
                $laporan_pemeriksaan_akhir_senari->row_pallet = $value['pallet'] ?? '';
                $laporan_pemeriksaan_akhir_senari->row_1 = $value['first_td'] ?? '';
                    $laporan_pemeriksaan_akhir_senari->row_2 = $value['second_td'] ?? '';
                    $laporan_pemeriksaan_akhir_senari->save();
            }
            }
        }

        if(is_array($dataKeputusan) ){
            foreach($dataKeputusan as $key => $Data2){
            foreach($Data2 as $key => $value){
                $laporan_pemeriksaan_akhir_senari2 = new LaporanPemeriksaanAkhirSenari2();
                $laporan_pemeriksaan_akhir_senari2->parent_id = $laporan_pemeriksaan_akhir->id;
                $laporan_pemeriksaan_akhir_senari2->keputusan_row_pallet = $value['pallet'] ?? '';
                $laporan_pemeriksaan_akhir_senari2->keputusan_row_1 = $value['td_keputusan_1'] ?? '';
                $laporan_pemeriksaan_akhir_senari2->keputusan_row_2 = $value['td_keputusan_2'] ?? '';
                $laporan_pemeriksaan_akhir_senari2->keputusan_row_3 = $value['td_keputusan_3'] ?? '';
                $laporan_pemeriksaan_akhir_senari2->keputusan_row_4 = $value['td_keputusan_4'] ?? '';
                $laporan_pemeriksaan_akhir_senari2->keputusan_row_5 = $value['td_keputusan_5'] ?? '';
                $laporan_pemeriksaan_akhir_senari2->keputusan_row_6 = $value['td_keputusan_6'] ?? '';
                $laporan_pemeriksaan_akhir_senari2->keputusan_row_7 = $value['td_keputusan_7'] ?? '';
                $laporan_pemeriksaan_akhir_senari2->keputusan_row_8 = $value['td_keputusan_8'] ?? '';
                $laporan_pemeriksaan_akhir_senari2->keputusan_row_9 = $value['td_keputusan_9'] ?? '';
                $laporan_pemeriksaan_akhir_senari2->keputusan_row_10 = $value['td_keputusan_10'] ?? '';
                $laporan_pemeriksaan_akhir_senari2->keputusan_row_11 = $value['td_keputusan_11'] ?? '';
                $laporan_pemeriksaan_akhir_senari2->keputusan_row_12 = $value['td_keputusan_12'] ?? '';
                $laporan_pemeriksaan_akhir_senari2->keputusan_row_13 = $value['td_keputusan_13'] ?? '';
                $laporan_pemeriksaan_akhir_senari2->keputusan_row_14 = $value['td_keputusan_14'] ?? '';
                $laporan_pemeriksaan_akhir_senari2->keputusan_row_15 = $value['td_keputusan_15'] ?? '';
                $laporan_pemeriksaan_akhir_senari2->keputusan_row_16 = $value['td_keputusan_16'] ?? '';
                $laporan_pemeriksaan_akhir_senari2->keputusan_row_17 = $value['td_keputusan_17'] ?? '';
                $laporan_pemeriksaan_akhir_senari2->save();
            }
            }
        }

        Helper::logSystemActivity('LAPORAN PEMERIKSAAN AKHIR, PEMBUNGKISAN DAN PENGHANTARAN KE STOR Create', 'LAPORAN PEMERIKSAAN AKHIR, PEMBUNGKISAN DAN PENGHANTARAN KE STOR Create Store');
        return redirect()->route('Laporan_Pemeriksaan')->with('custom_success', 'LAPORAN PEMERIKSAAN AKHIR, PEMBUNGKISAN DAN PENGHANTARAN KE STOR Create has been Created Successfully !');
    }


    public function update(Request $request , $id)
    {
        if (!Auth::user()->hasPermissionTo('LAPORAN PEMERIKSAAN AKHIR, PEMBUNGKISAN DAN PENGHANTARAN KE STOR Update')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $validator = null;

        $validatedData = $request->validate([
            'sale_order' => 'required',
            'date' => 'required',
            'user' => 'required',
            'di_bungkus_oleh' => 'required',
        ],[
            'user.required' => 'The operator field is required.',
        ]);

        // If validations fail
        if (!$validatedData) {
            return redirect()->back()
                ->withErrors($validator)->withInput();
        }




        $userIds = $request->user;
        $userNames = [];

        foreach ($userIds as $userId) {
            $user = User::find($userId);
            if ($user) {
               $userNames[] = $user->full_name;
            }
        }

        $userText = implode(', ', $userNames);

        $pembantuIds = $request->di_bungkus_oleh;
        $pembantuNames = [];

        foreach ($pembantuIds as $pembantuId) {
            $pembantu = User::find($pembantuId);
            if ($pembantu) {
               $pembantuNames[] = $pembantu->full_name;
            }
        }

        $pembantuText = implode(', ', $pembantuNames);

        $laporan_pemeriksaan_akhir = LaporanPemeriksaanAkhir::find($id);
        $laporan_pemeriksaan_akhir->sale_order_id = $request->sale_order;
        $laporan_pemeriksaan_akhir->date = $request->date;

        $laporan_pemeriksaan_akhir->created_by = Auth::user()->id;

        $laporan_pemeriksaan_akhir->user_id = json_encode($userIds);
        $laporan_pemeriksaan_akhir->user_text = $userText;
        $laporan_pemeriksaan_akhir->di_bungkus_oleh = json_encode($pembantuIds);

        $laporan_pemeriksaan_akhir->b_1 = $request->b_1;
        $laporan_pemeriksaan_akhir->b_2 = $request->b_2;
        $laporan_pemeriksaan_akhir->b_3 = $request->b_3;

        $laporan_pemeriksaan_akhir->c_1 = $request->c_1;
        $laporan_pemeriksaan_akhir->c_kuantiti_1 = ($request->c_1 != null) ? $request->c_kuantiti_1 : null;
        $laporan_pemeriksaan_akhir->c_2 = $request->c_2;
        $laporan_pemeriksaan_akhir->c_berat_2 = ($request->c_2 != null) ? $request->c_berat_2 : null;

        $laporan_pemeriksaan_akhir->d_1 = $request->d_1;
        $laporan_pemeriksaan_akhir->d_2 = $request->d_2;

        $laporan_pemeriksaan_akhir->e_1 = $request->e_1;
        $laporan_pemeriksaan_akhir->e_2 = $request->e_2;
        $laporan_pemeriksaan_akhir->e_3 = $request->e_3;
        $laporan_pemeriksaan_akhir->e_4 = $request->e_4;
        $laporan_pemeriksaan_akhir->e_5 = $request->e_5;
        $laporan_pemeriksaan_akhir->e_6 = $request->e_6;

        $laporan_pemeriksaan_akhir->f_1 = $request->f_1;
        $laporan_pemeriksaan_akhir->f_2 = $request->f_2;
        $laporan_pemeriksaan_akhir->f_3 = $request->f_3;

        $laporan_pemeriksaan_akhir->kauntiti_siap_1 = $request->kauntiti_siap_1;
        $laporan_pemeriksaan_akhir->kauntiti_siap_2 = $request->kauntiti_siap_2;
        $laporan_pemeriksaan_akhir->kauntiti_siap_3 = $request->kauntiti_siap_3;

        $laporan_pemeriksaan_akhir->status = "Not-initiated";


        $laporan_pemeriksaan_akhir->save();

        // G section save

        $laporan_pemeriksaan_akhir_section =  LaporanPemeriksaanAkhirSectionG::find($id);
        $laporan_pemeriksaan_akhir_section->parent_id = $laporan_pemeriksaan_akhir->id;
        $laporan_pemeriksaan_akhir_section->subkontraktor_1 = $request->subkontraktor_1;
        $laporan_pemeriksaan_akhir_section->jumlah_1 = $request->jumlah_1;
        $laporan_pemeriksaan_akhir_section->disahkan_oleh_1 = $request->disahkan_oleh_1;
        $laporan_pemeriksaan_akhir_section->tcsb_1 = $request->tcsb_1;
        $laporan_pemeriksaan_akhir_section->jumlah_2 = $request->jumlah_2;
        $laporan_pemeriksaan_akhir_section->disahkan_oleh_2 = $request->disahkan_oleh_2;
        $laporan_pemeriksaan_akhir_section->subkontraktor_2 = $request->subkontraktor_2;
        $laporan_pemeriksaan_akhir_section->jumlah_3 = $request->jumlah_3;
        $laporan_pemeriksaan_akhir_section->disahkan_oleh_3 = $request->disahkan_oleh_3;
        $laporan_pemeriksaan_akhir_section->tcsb_2 = $request->tcsb_2;
        $laporan_pemeriksaan_akhir_section->jumlah_4 = $request->jumlah_4;
        $laporan_pemeriksaan_akhir_section->disahkan_oleh_4 = $request->disahkan_oleh_4;
        $laporan_pemeriksaan_akhir_section->subkontraktor_3 = $request->subkontraktor_3;
        $laporan_pemeriksaan_akhir_section->jumlah_5 = $request->jumlah_5;
        $laporan_pemeriksaan_akhir_section->disahkan_oleh_5 = $request->disahkan_oleh_5;
        $laporan_pemeriksaan_akhir_section->tcsb_3 = $request->tcsb_3;
        $laporan_pemeriksaan_akhir_section->jumlah_6 = $request->jumlah_6;
        $laporan_pemeriksaan_akhir_section->disahkan_oleh_6 = $request->disahkan_oleh_6;
        $laporan_pemeriksaan_akhir_section->subkontraktor_4 = $request->subkontraktor_4;
        $laporan_pemeriksaan_akhir_section->jumlah_7 = $request->jumlah_7;
        $laporan_pemeriksaan_akhir_section->disahkan_oleh_7 = $request->disahkan_oleh_7;
        $laporan_pemeriksaan_akhir_section->tcsb_4 = $request->tcsb_4;
        $laporan_pemeriksaan_akhir_section->jumlah_8 = $request->jumlah_8;
        $laporan_pemeriksaan_akhir_section->disahkan_oleh_8 = $request->disahkan_oleh_8;
        $laporan_pemeriksaan_akhir_section->subkontraktor_5 = $request->subkontraktor_5;
        $laporan_pemeriksaan_akhir_section->jumlah_9 = $request->jumlah_9;
        $laporan_pemeriksaan_akhir_section->disahkan_oleh_9 = $request->disahkan_oleh_9;
        $laporan_pemeriksaan_akhir_section->tcsb_5 = $request->tcsb_5;
        $laporan_pemeriksaan_akhir_section->jumlah_10 = $request->jumlah_10;
        $laporan_pemeriksaan_akhir_section->disahkan_oleh_10 = $request->disahkan_oleh_10;
        $laporan_pemeriksaan_akhir_section->subkontraktor_6 = $request->subkontraktor_6;
        $laporan_pemeriksaan_akhir_section->jumlah_11 = $request->jumlah_11;
        $laporan_pemeriksaan_akhir_section->disahkan_oleh_11 = $request->disahkan_oleh_11;
        $laporan_pemeriksaan_akhir_section->tcsb_6 = $request->tcsb_6;
        $laporan_pemeriksaan_akhir_section->jumlah_12 = $request->jumlah_12;
        $laporan_pemeriksaan_akhir_section->disahkan_oleh_12 = $request->disahkan_oleh_12;
        $laporan_pemeriksaan_akhir_section->save();


        $laporan_pemeriksaan_akhir_section2 = LaporanPemeriksaanAkhirSectionG2::find($id);
        $laporan_pemeriksaan_akhir_section2->parent_id = $laporan_pemeriksaan_akhir->id;

        $laporan_pemeriksaan_akhir_section2->subkontraktor_7 = $request->subkontraktor_7;
        $laporan_pemeriksaan_akhir_section2->jumlah_13 = $request->jumlah_13;
        $laporan_pemeriksaan_akhir_section2->disahkan_oleh_13 = $request->disahkan_oleh_13;
        $laporan_pemeriksaan_akhir_section2->tcsb_7 = $request->tcsb_7;
        $laporan_pemeriksaan_akhir_section2->jumlah_14 = $request->jumlah_14;
        $laporan_pemeriksaan_akhir_section2->disahkan_oleh_14 = $request->disahkan_oleh_14;

        $laporan_pemeriksaan_akhir_section2->subkontraktor_8 = $request->subkontraktor_8;
        $laporan_pemeriksaan_akhir_section2->jumlah_15 = $request->jumlah_15;
        $laporan_pemeriksaan_akhir_section2->disahkan_oleh_15 = $request->disahkan_oleh_15;
        $laporan_pemeriksaan_akhir_section2->tcsb_8 = $request->tcsb_8;
        $laporan_pemeriksaan_akhir_section2->jumlah_16 = $request->jumlah_16;
        $laporan_pemeriksaan_akhir_section2->disahkan_oleh_16 = $request->disahkan_oleh_16;

        $laporan_pemeriksaan_akhir_section2->subkontraktor_9 = $request->subkontraktor_9;
        $laporan_pemeriksaan_akhir_section2->jumlah_17 = $request->jumlah_17;
        $laporan_pemeriksaan_akhir_section2->disahkan_oleh_17 = $request->disahkan_oleh_17;
        $laporan_pemeriksaan_akhir_section2->tcsb_9 = $request->tcsb_9;
        $laporan_pemeriksaan_akhir_section2->jumlah_18 = $request->jumlah_18;
        $laporan_pemeriksaan_akhir_section2->disahkan_oleh_18 = $request->disahkan_oleh_18;

        $laporan_pemeriksaan_akhir_section2->subkontraktor_10 = $request->subkontraktor_10;
        $laporan_pemeriksaan_akhir_section2->jumlah_19 = $request->jumlah_19;
        $laporan_pemeriksaan_akhir_section2->disahkan_oleh_19 = $request->disahkan_oleh_19;
        $laporan_pemeriksaan_akhir_section2->tcsb_10 = $request->tcsb_10;
        $laporan_pemeriksaan_akhir_section2->jumlah_20 = $request->jumlah_20;
        $laporan_pemeriksaan_akhir_section2->disahkan_oleh_20 = $request->disahkan_oleh_20;

        $laporan_pemeriksaan_akhir_section2->subkontraktor_11 = $request->subkontraktor_11;
        $laporan_pemeriksaan_akhir_section2->jumlah_21 = $request->jumlah_21;
        $laporan_pemeriksaan_akhir_section2->disahkan_oleh_21 = $request->disahkan_oleh_21;
        $laporan_pemeriksaan_akhir_section2->tcsb_11 = $request->tcsb_11;
        $laporan_pemeriksaan_akhir_section2->jumlah_22 = $request->jumlah_22;
        $laporan_pemeriksaan_akhir_section2->disahkan_oleh_22 = $request->disahkan_oleh_22;

        $laporan_pemeriksaan_akhir_section2->subkontraktor_12 = $request->subkontraktor_12;
        $laporan_pemeriksaan_akhir_section2->jumlah_23 = $request->jumlah_23;
        $laporan_pemeriksaan_akhir_section2->disahkan_oleh_23 = $request->disahkan_oleh_23;
        $laporan_pemeriksaan_akhir_section2->tcsb_12 = $request->tcsb_12;
        $laporan_pemeriksaan_akhir_section2->jumlah_24 = $request->jumlah_24;
        $laporan_pemeriksaan_akhir_section2->disahkan_oleh_24 = $request->disahkan_oleh_24;

        $laporan_pemeriksaan_akhir_section2->save();
        // dd($dataRow);
        $dataRow = json_decode($request->row, true);
        $dataKeputusan = json_decode($request->keputusan, true);
        // dd($dataRow);

        LaporanPemeriksaanAkhirSenari::where('parent_id',$id)->delete();

        if(is_array($dataRow) ){
            foreach($dataRow as $key => $Data){
            foreach($Data as $key => $value){
                $laporan_pemeriksaan_akhir_senari = new LaporanPemeriksaanAkhirSenari();
                $laporan_pemeriksaan_akhir_senari->parent_id = $laporan_pemeriksaan_akhir->id;
                $laporan_pemeriksaan_akhir_senari->row_pallet = $value['pallet'] ?? '';
                $laporan_pemeriksaan_akhir_senari->row_1 = $value['first_td'] ?? '';
                    $laporan_pemeriksaan_akhir_senari->row_2 = $value['second_td'] ?? '';
                    $laporan_pemeriksaan_akhir_senari->save();
            }
            }
        }

        LaporanPemeriksaanAkhirSenari2::where('parent_id',$id)->delete();

        if(is_array($dataKeputusan) ){
            foreach($dataKeputusan as $key => $Data2){
            foreach($Data2 as $key => $value){
                $laporan_pemeriksaan_akhir_senari2 = new LaporanPemeriksaanAkhirSenari2();
                $laporan_pemeriksaan_akhir_senari2->parent_id = $laporan_pemeriksaan_akhir->id;
                $laporan_pemeriksaan_akhir_senari2->keputusan_row_pallet = $value['pallet'] ?? '';
                $laporan_pemeriksaan_akhir_senari2->keputusan_row_1 = $value['td_keputusan_1'] ?? '';
                $laporan_pemeriksaan_akhir_senari2->keputusan_row_2 = $value['td_keputusan_2'] ?? '';
                $laporan_pemeriksaan_akhir_senari2->keputusan_row_3 = $value['td_keputusan_3'] ?? '';
                $laporan_pemeriksaan_akhir_senari2->keputusan_row_4 = $value['td_keputusan_4'] ?? '';
                $laporan_pemeriksaan_akhir_senari2->keputusan_row_5 = $value['td_keputusan_5'] ?? '';
                $laporan_pemeriksaan_akhir_senari2->keputusan_row_6 = $value['td_keputusan_6'] ?? '';
                $laporan_pemeriksaan_akhir_senari2->keputusan_row_7 = $value['td_keputusan_7'] ?? '';
                $laporan_pemeriksaan_akhir_senari2->keputusan_row_8 = $value['td_keputusan_8'] ?? '';
                $laporan_pemeriksaan_akhir_senari2->keputusan_row_9 = $value['td_keputusan_9'] ?? '';
                $laporan_pemeriksaan_akhir_senari2->keputusan_row_10 = $value['td_keputusan_10'] ?? '';
                $laporan_pemeriksaan_akhir_senari2->keputusan_row_11 = $value['td_keputusan_11'] ?? '';
                $laporan_pemeriksaan_akhir_senari2->keputusan_row_12 = $value['td_keputusan_12'] ?? '';
                $laporan_pemeriksaan_akhir_senari2->keputusan_row_13 = $value['td_keputusan_13'] ?? '';
                $laporan_pemeriksaan_akhir_senari2->keputusan_row_14 = $value['td_keputusan_14'] ?? '';
                $laporan_pemeriksaan_akhir_senari2->keputusan_row_15 = $value['td_keputusan_15'] ?? '';
                $laporan_pemeriksaan_akhir_senari2->keputusan_row_16 = $value['td_keputusan_16'] ?? '';
                $laporan_pemeriksaan_akhir_senari2->keputusan_row_17 = $value['td_keputusan_17'] ?? '';
                $laporan_pemeriksaan_akhir_senari2->save();
            }
            }
        }

        Helper::logSystemActivity('LAPORAN PEMERIKSAAN AKHIR, PEMBUNGKISAN DAN PENGHANTARAN KE STOR Update', 'LAPORAN PEMERIKSAAN AKHIR, PEMBUNGKISAN DAN PENGHANTARAN KE STOR Update Store');
        return redirect()->route('Laporan_Pemeriksaan')->with('custom_success', 'LAPORAN PEMERIKSAAN AKHIR, PEMBUNGKISAN DAN PENGHANTARAN KE STOR Update has been Updated Successfully !');
    }


    // public function index(){
    //     return view('WMS.Laporan_Pemeriksaa.index');
    // }


    public function create(){
        if (!Auth::user()->hasPermissionTo('LAPORAN PEMERIKSAAN AKHIR, PEMBUNGKISAN DAN PENGHANTARAN KE STOR Create')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $users = User::all();

        Helper::logSystemActivity('LAPORAN PEMERIKSAAN AKHIR, PEMBUNGKISAN DAN PENGHANTARAN KE STOR', 'LAPORAN PEMERIKSAAN AKHIR, PEMBUNGKISAN DAN PENGHANTARAN KE STOR Create');
        return view('WMS.Laporan_Pemeriksaa.create',compact('users'));
    }

    public function edit($id){
        if (!Auth::user()->hasPermissionTo('LAPORAN PEMERIKSAAN AKHIR, PEMBUNGKISAN DAN PENGHANTARAN KE STOR Update')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $laporan_pemeriksaan_akhir = LaporanPemeriksaanAkhir::find($id);
        $laporan_pemeriksaan_akhir_section = LaporanPemeriksaanAkhirSectionG::find($id);
        $laporan_pemeriksaan_akhir_section2 = LaporanPemeriksaanAkhirSectionG2::find($id);
        $laporan_pemeriksaan_akhir_senari =  LaporanPemeriksaanAkhirSenari::where("parent_id",$id)->get();
        $laporan_pemeriksaan_akhir_senari2 =  LaporanPemeriksaanAkhirSenari2::where("parent_id",$id)->get();
        $users = User::all();

        Helper::logSystemActivity('LAPORAN PEMERIKSAAN AKHIR, PEMBUNGKISAN DAN PENGHANTARAN KE STOR', 'LAPORAN PEMERIKSAAN AKHIR, PEMBUNGKISAN DAN PENGHANTARAN KE STOR Update');
        return view('WMS.Laporan_Pemeriksaa.edit',compact('users','laporan_pemeriksaan_akhir','laporan_pemeriksaan_akhir_section','laporan_pemeriksaan_akhir_section2','laporan_pemeriksaan_akhir_senari','laporan_pemeriksaan_akhir_senari2'));
    }


    public function view($id){
        if (!Auth::user()->hasPermissionTo('LAPORAN PEMERIKSAAN AKHIR, PEMBUNGKISAN DAN PENGHANTARAN KE STOR View')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $laporan_pemeriksaan_akhir = LaporanPemeriksaanAkhir::find($id);
        $laporan_pemeriksaan_akhir_section = LaporanPemeriksaanAkhirSectionG::find($id);
        $laporan_pemeriksaan_akhir_section2 = LaporanPemeriksaanAkhirSectionG2::find($id);
        $laporan_pemeriksaan_akhir_senari =  LaporanPemeriksaanAkhirSenari::where("parent_id",$id)->get();
        $laporan_pemeriksaan_akhir_senari2 =  LaporanPemeriksaanAkhirSenari2::where("parent_id",$id)->get();
        $users = User::all();

        Helper::logSystemActivity('LAPORAN PEMERIKSAAN AKHIR, PEMBUNGKISAN DAN PENGHANTARAN KE STOR', 'LAPORAN PEMERIKSAAN AKHIR, PEMBUNGKISAN DAN PENGHANTARAN KE STOR View');
        return view('WMS.Laporan_Pemeriksaa.view',compact('users','laporan_pemeriksaan_akhir','laporan_pemeriksaan_akhir_section','laporan_pemeriksaan_akhir_section2','laporan_pemeriksaan_akhir_senari','laporan_pemeriksaan_akhir_senari2'));
    }

    public function delete($id){
        if (!Auth::user()->hasPermissionTo('LAPORAN PEMERIKSAAN AKHIR, PEMBUNGKISAN DAN PENGHANTARAN KE STOR Delete')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $laporan_pemeriksaan_akhir = LaporanPemeriksaanAkhir::find($id);
        $laporan_pemeriksaan_akhir_section = LaporanPemeriksaanAkhirSectionG::find($id)->delete();
        $laporan_pemeriksaan_akhir_section2 = LaporanPemeriksaanAkhirSectionG2::find($id)->delete();
        $laporan_pemeriksaan_akhir_senari =  LaporanPemeriksaanAkhirSenari::where("parent_id",$id)->delete();
        $laporan_pemeriksaan_akhir_senari2 =  LaporanPemeriksaanAkhirSenari2::where("parent_id",$id)->delete();
        $laporan_pemeriksaan_akhir->delete();

        Helper::logSystemActivity('LAPORAN PEMERIKSAAN AKHIR, PEMBUNGKISAN DAN PENGHANTARAN KE STOR', 'LAPORAN PEMERIKSAAN AKHIR, PEMBUNGKISAN DAN PENGHANTARAN KE STOR Delete');
        return redirect()->route('Laporan_Pemeriksaan')->with('custom_success', 'LAPORAN PEMERIKSAAN AKHIR, PEMBUNGKISAN DAN PENGHANTARAN KE STOR  Update has been Deleted Successfully !');
    }




    public function senarai(){
        $laporan_pemeriksaan_akhir_senari = LaporanPemeriksaanAkhirSenari::get();
        // dd($laporan_pemeriksaan_akhir_senari);
        $laporan_pemeriksaan_akhir_senari2 = LaporanPemeriksaanAkhirSenari2::get();


        return view('WMS.Laporan_Pemeriksaa.senarai',compact('laporan_pemeriksaan_akhir_senari','laporan_pemeriksaan_akhir_senari2'));
    }
}
