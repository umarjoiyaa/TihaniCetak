<?php

namespace App\Http\Controllers;
use App\Helpers\Helper;
use App\Models\LaporanPemeriksaanKualitiPenjilidan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporanPemeriksaanKualitiPenjilidanController extends Controller
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

            $query = LaporanPemeriksaanKualitiPenjilidan::select('id', 'sale_order_id', 'date', 'time', 'mesin', 'status')->with('sale_order');

            // Apply search if a search term is provided
            if (!empty($search)) {
                $searchLower = strtolower($search);
                $query->where(function ($q) use ($searchLower) {
                    $q
                        ->where('date', 'like', '%' . $searchLower . '%')
                        ->orWhere('time', 'like', '%' . $searchLower . '%')
                        ->oWhere('mesin', 'like', '%' . $searchLower . '%')
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('order_no', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('kod_buku', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('description', 'like', '%' . $searchLower . '%');
                        })
                        ->oWhere('status', 'like', '%' . $searchLower . '%');
                    // Add more columns as needed
                });
            }
            // Determine the column to sort by
            $results = null;

            if (!empty($columnsData)) {
                $sortableColumns = [
                    1 => 'date',
                    2 => 'time',
                    3 => 'mesin',
                    4 => 'sale_order_id',
                    5 => 'sale_order_id',
                    6 => 'sale_order_id',
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
                                $q->where('date', 'like', '%' . $searchLower . '%');
                                break;
                            case 2:
                                $q->where('time', 'like', '%' . $searchLower . '%');
                                break;
                            case 3:
                                $q->where('mesin', 'like', '%' . $searchLower . '%');
                                break;
                            case 4:
                                $q->whereHas('sale_order', function ($query) use ($searchLower) {
                                    $query->where('order_no', 'like', '%' . $searchLower . '%');
                                });
                                break;
                            case 5:
                                $q->whereHas('sale_order', function ($query) use ($searchLower) {
                                    $query->where('kod_buku', 'like', '%' . $searchLower . '%');
                                });
                                break;
                            case 6:
                                $q->whereHas('sale_order', function ($query) use ($searchLower) {
                                    $query->where('description', 'like', '%' . $searchLower . '%');
                                });
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
                if ($row->status == 'checked') {
                    $row->status = '<span class="badge badge-warning">Checked</span>';
                    $actions = '<a class="dropdown-item" href="' . route('laporan_pemeriksaan_kualiti_penjilidan.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('laporan_pemeriksaan_kualiti_penjilidan.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('laporan_pemeriksaan_kualiti_penjilidan.verify', $row->id) . '">Verify</a>
                    <a class="dropdown-item"  id="swal-warning" data-delete="' . route('laporan_pemeriksaan_kualiti_penjilidan.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'verified') {
                    $row->status = '<span class="badge badge-success">Verified</span>';
                    $actions = '<a class="dropdown-item" href="' . route('laporan_pemeriksaan_kualiti_penjilidan.view', $row->id) . '">View</a>
                                <a class="dropdown-item"  id="swal-warning" data-delete="' . route('laporan_pemeriksaan_kualiti_penjilidan.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'declined') {
                    $row->status = '<span class="badge badge-danger">Declined</span>';
                    $actions = '<a class="dropdown-item" href="' . route('laporan_pemeriksaan_kualiti_penjilidan.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('laporan_pemeriksaan_kualiti_penjilidan.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('laporan_pemeriksaan_kualiti_penjilidan.verify', $row->id) . '">Verify</a>
                    <a class="dropdown-item"  id="swal-warning" data-delete="' . route('laporan_pemeriksaan_kualiti_penjilidan.delete', $row->id) . '">Delete</a>';
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

            $query = LaporanPemeriksaanKualitiPenjilidan::select('id', 'sale_order_id', 'date', 'time', 'mesin', 'status')->with('sale_order');

            // Apply search if a search term is provided
            if (!empty($search)) {
                $searchLower = strtolower($search);
                $query->where(function ($q) use ($searchLower) {
                    $q
                        ->where('date', 'like', '%' . $searchLower . '%')
                        ->orWhere('time', 'like', '%' . $searchLower . '%')
                        ->oWhere('mesin', 'like', '%' . $searchLower . '%')
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('order_no', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('kod_buku', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('description', 'like', '%' . $searchLower . '%');
                        })
                        ->oWhere('status', 'like', '%' . $searchLower . '%');
                    // Add more columns as needed
                });
            }

            $sortableColumns = [
                1 => 'date',
                2 => 'time',
                3 => 'mesin',
                4 => 'sale_order_id',
                5 => 'sale_order_id',
                6 => 'sale_order_id',
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
                if ($row->status == 'checked') {
                    $row->status = '<span class="badge badge-warning">Checked</span>';
                    $actions = '<a class="dropdown-item" href="' . route('laporan_pemeriksaan_kualiti_penjilidan.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('laporan_pemeriksaan_kualiti_penjilidan.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('laporan_pemeriksaan_kualiti_penjilidan.verify', $row->id) . '">Verify</a>
                    <a class="dropdown-item"  id="swal-warning" data-delete="' . route('laporan_pemeriksaan_kualiti_penjilidan.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'verified') {
                    $row->status = '<span class="badge badge-success">Verified</span>';
                    $actions = '<a class="dropdown-item" href="' . route('laporan_pemeriksaan_kualiti_penjilidan.view', $row->id) . '">View</a>
                                <a class="dropdown-item"  id="swal-warning" data-delete="' . route('laporan_pemeriksaan_kualiti_penjilidan.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'declined') {
                    $row->status = '<span class="badge badge-danger">Declined</span>';
                    $actions = '<a class="dropdown-item" href="' . route('laporan_pemeriksaan_kualiti_penjilidan.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('laporan_pemeriksaan_kualiti_penjilidan.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('laporan_pemeriksaan_kualiti_penjilidan.verify', $row->id) . '">Verify</a>
                    <a class="dropdown-item"  id="swal-warning" data-delete="' . route('laporan_pemeriksaan_kualiti_penjilidan.delete', $row->id) . '">Delete</a>';
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
            Auth::user()->hasPermissionTo('LAPORAN PEMERIKSAAN KUALITI PENJILIDAN List') ||
            Auth::user()->hasPermissionTo('LAPORAN PEMERIKSAAN KUALITI PENJILIDAN Create') ||
            Auth::user()->hasPermissionTo('LAPORAN PEMERIKSAAN KUALITI PENJILIDAN Update') ||
            Auth::user()->hasPermissionTo('LAPORAN PEMERIKSAAN KUALITI PENJILIDAN View') ||
            Auth::user()->hasPermissionTo('LAPORAN PEMERIKSAAN KUALITI PENJILIDAN Delete') ||
            Auth::user()->hasPermissionTo('LAPORAN PEMERIKSAAN KUALITI PENJILIDAN Verify')
        ) {
            Helper::logSystemActivity('LAPORAN PEMERIKSAAN KUALITI PENJILIDAN', 'LAPORAN PEMERIKSAAN KUALITI PENJILIDAN List');
            return view('Mes.LaporanPemeriksaanKualitiPenjilidan.index');
        }
        return back()->with('custom_errors', 'You don`t have Right Permission');
    }

    public function create(){
        if (!Auth::user()->hasPermissionTo('LAPORAN PEMERIKSAAN KUALITI PENJILIDAN Create')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        Helper::logSystemActivity('LAPORAN PEMERIKSAAN KUALITI PENJILIDAN', 'LAPORAN PEMERIKSAAN KUALITI PENJILIDAN Create');
        return view('Mes.LaporanPemeriksaanKualitiPenjilidan.create');
    }

    public function store(Request $request)
    {
        if (!Auth::user()->hasPermissionTo('LAPORAN PEMERIKSAAN KUALITI PENJILIDAN Create')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $validator = null;

        $validatedData = $request->validate([
            'sale_order' => 'required',
            'date' => 'required',
            'time' => 'required',
            'mesin' => 'required',
        ]);

        // If validations fail
        if (!$validatedData) {
            return redirect()->back()
                ->withErrors($validator)->withInput();
        }

        $laporan_pemeriksaan_kualiti_penjilidan = new LaporanPemeriksaanKualitiPenjilidan();
        $laporan_pemeriksaan_kualiti_penjilidan->sale_order_id = $request->sale_order;
        $laporan_pemeriksaan_kualiti_penjilidan->date = $request->date;
        $laporan_pemeriksaan_kualiti_penjilidan->time = $request->time;
        $laporan_pemeriksaan_kualiti_penjilidan->created_by = Auth::user()->id;

        $laporan_pemeriksaan_kualiti_penjilidan->mesin = $request->mesin;

        $laporan_pemeriksaan_kualiti_penjilidan->b_1 = $request->b_1;
        $laporan_pemeriksaan_kualiti_penjilidan->b_2 = $request->b_2;
        $laporan_pemeriksaan_kualiti_penjilidan->b_3 = $request->b_3;
        $laporan_pemeriksaan_kualiti_penjilidan->b_4 = $request->b_4;
        $laporan_pemeriksaan_kualiti_penjilidan->b_5 = $request->b_5;
        $laporan_pemeriksaan_kualiti_penjilidan->b_6 = $request->b_6;
        $laporan_pemeriksaan_kualiti_penjilidan->b_7 = $request->b_7;
        $laporan_pemeriksaan_kualiti_penjilidan->b_8 = $request->b_8;
        $laporan_pemeriksaan_kualiti_penjilidan->b_9 = $request->b_9;

        $laporan_pemeriksaan_kualiti_penjilidan->status = 'checked';
        $laporan_pemeriksaan_kualiti_penjilidan->save();

        Helper::logSystemActivity('LAPORAN PEMERIKSAAN KUALITI PENJILIDAN', 'LAPORAN PEMERIKSAAN KUALITI PENJILIDAN Store');
        return redirect()->route('laporan_pemeriksaan_kualiti_penjilidan')->with('custom_success', 'LAPORAN PEMERIKSAAN KUALITI PENJILIDAN has been Created Successfully !');
    }

    public function edit($id){
        if (!Auth::user()->hasPermissionTo('LAPORAN PEMERIKSAAN KUALITI PENJILIDAN Update')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $laporan_pemeriksaan_kualiti_penjilidan = LaporanPemeriksaanKualitiPenjilidan::find($id);
        Helper::logSystemActivity('LAPORAN PEMERIKSAAN KUALITI PENJILIDAN', 'LAPORAN PEMERIKSAAN KUALITI PENJILIDAN Update');
        return view('Mes.LaporanPemeriksaanKualitiPenjilidan.edit', compact('laporan_pemeriksaan_kualiti_penjilidan'));
    }

    public function view($id){
        if (!Auth::user()->hasPermissionTo('LAPORAN PEMERIKSAAN KUALITI PENJILIDAN View')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $laporan_pemeriksaan_kualiti_penjilidan = LaporanPemeriksaanKualitiPenjilidan::find($id);
        Helper::logSystemActivity('LAPORAN PEMERIKSAAN KUALITI PENJILIDAN', 'LAPORAN PEMERIKSAAN KUALITI PENJILIDAN View');
        return view('Mes.LaporanPemeriksaanKualitiPenjilidan.view', compact('laporan_pemeriksaan_kualiti_penjilidan'));
    }

    public function update(Request $request, $id)
    {
        if (!Auth::user()->hasPermissionTo('LAPORAN PEMERIKSAAN KUALITI PENJILIDAN Update')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $validator = null;

        $validatedData = $request->validate([
            'sale_order' => 'required',
            'date' => 'required',
            'time' => 'required',
            'mesin' => 'required',
        ]);

        // If validations fail
        if (!$validatedData) {
            return redirect()->back()
                ->withErrors($validator)->withInput();
        }

        $laporan_pemeriksaan_kualiti_penjilidan = LaporanPemeriksaanKualitiPenjilidan::find($id);
        $laporan_pemeriksaan_kualiti_penjilidan->sale_order_id = $request->sale_order;
        $laporan_pemeriksaan_kualiti_penjilidan->date = $request->date;
        $laporan_pemeriksaan_kualiti_penjilidan->time = $request->time;
        $laporan_pemeriksaan_kualiti_penjilidan->created_by = Auth::user()->id;

        $laporan_pemeriksaan_kualiti_penjilidan->mesin = $request->mesin;

        $laporan_pemeriksaan_kualiti_penjilidan->b_1 = $request->b_1;
        $laporan_pemeriksaan_kualiti_penjilidan->b_2 = $request->b_2;
        $laporan_pemeriksaan_kualiti_penjilidan->b_3 = $request->b_3;
        $laporan_pemeriksaan_kualiti_penjilidan->b_4 = $request->b_4;
        $laporan_pemeriksaan_kualiti_penjilidan->b_5 = $request->b_5;
        $laporan_pemeriksaan_kualiti_penjilidan->b_6 = $request->b_6;
        $laporan_pemeriksaan_kualiti_penjilidan->b_7 = $request->b_7;
        $laporan_pemeriksaan_kualiti_penjilidan->b_8 = $request->b_8;
        $laporan_pemeriksaan_kualiti_penjilidan->b_9 = $request->b_9;

        $laporan_pemeriksaan_kualiti_penjilidan->status = 'checked';
        $laporan_pemeriksaan_kualiti_penjilidan->save();

        Helper::logSystemActivity('LAPORAN PEMERIKSAAN KUALITI PENJILIDAN', 'LAPORAN PEMERIKSAAN KUALITI PENJILIDAN Update');
        return redirect()->route('laporan_pemeriksaan_kualiti_penjilidan')->with('custom_success', 'LAPORAN PEMERIKSAAN KUALITI PENJILIDAN has been Updated Successfully !');
    }

    public function verify($id){
        if (!Auth::user()->hasPermissionTo('LAPORAN PEMERIKSAAN KUALITI PENJILIDAN Verify')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $laporan_pemeriksaan_kualiti_penjilidan = LaporanPemeriksaanKualitiPenjilidan::find($id);
        Helper::logSystemActivity('LAPORAN PEMERIKSAAN KUALITI PENJILIDAN', 'LAPORAN PEMERIKSAAN KUALITI PENJILIDAN Update');
        return view('Mes.LaporanPemeriksaanKualitiPenjilidan.verify', compact('laporan_pemeriksaan_kualiti_penjilidan'));
    }

    public function approve_approve(Request $request, $id){
        if (!Auth::user()->hasPermissionTo('LAPORAN PEMERIKSAAN KUALITI PENJILIDAN Verify')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $laporan_pemeriksaan_kualiti_penjilidan = LaporanPemeriksaanKualitiPenjilidan::find($id);
        $laporan_pemeriksaan_kualiti_penjilidan->status = 'verified';
        $laporan_pemeriksaan_kualiti_penjilidan->verified_by_date = Carbon::now()->format('Y-m-d H:i:s');
        $laporan_pemeriksaan_kualiti_penjilidan->verified_by_user = Auth::user()->user_name;
        $laporan_pemeriksaan_kualiti_penjilidan->verified_by_designation = (Auth::user()->designation != null) ? Auth::user()->designation->name : 'not assign';
        $laporan_pemeriksaan_kualiti_penjilidan->verified_by_department = (Auth::user()->department != null) ? Auth::user()->department->name : 'not assign';
        $laporan_pemeriksaan_kualiti_penjilidan->save();

        Helper::logSystemActivity('LAPORAN PEMERIKSAAN KUALITI PENJILIDAN', 'LAPORAN PEMERIKSAAN KUALITI PENJILIDAN Verified');
        return redirect()->route('laporan_pemeriksaan_kualiti_penjilidan')->with('custom_success', 'LAPORAN PEMERIKSAAN KUALITI PENJILIDAN has been Successfully Verified!');
    }

    public function approve_decline(Request $request, $id){
        if (!Auth::user()->hasPermissionTo('LAPORAN PEMERIKSAAN KUALITI PENJILIDAN Verify')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $laporan_pemeriksaan_kualiti_penjilidan = LaporanPemeriksaanKualitiPenjilidan::find($id);
        $laporan_pemeriksaan_kualiti_penjilidan->status = 'declined';
        $laporan_pemeriksaan_kualiti_penjilidan->save();
        Helper::logSystemActivity('LAPORAN PEMERIKSAAN KUALITI PENJILIDAN', 'LAPORAN PEMERIKSAAN KUALITI PENJILIDAN Declined');
        return redirect()->route('laporan_pemeriksaan_kualiti_penjilidan')->with('custom_success', 'LAPORAN PEMERIKSAAN KUALITI PENJILIDAN has been Successfully Declined!');
    }

    public function delete($id){
        if (!Auth::user()->hasPermissionTo('LAPORAN PEMERIKSAAN KUALITI PENJILIDAN Delete')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $laporan_pemeriksaan_kualiti_penjilidan = LaporanPemeriksaanKualitiPenjilidan::find($id);
        $laporan_pemeriksaan_kualiti_penjilidan->delete();
        Helper::logSystemActivity('LAPORAN PEMERIKSAAN KUALITI PENJILIDAN', 'LAPORAN PEMERIKSAAN KUALITI PENJILIDAN Delete');
        return redirect()->route('laporan_pemeriksaan_kualiti_penjilidan')->with('custom_success', 'LAPORAN PEMERIKSAAN KUALITI PENJILIDAN has been Successfully Deleted!');
    }
}
