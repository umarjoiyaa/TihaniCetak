<?php

namespace App\Http\Controllers;
use App\Helpers\Helper;
use App\Models\LaporanPemeriksaanKualiti;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LaporanPemeriksaanKualitiController extends Controller
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

            $query = LaporanPemeriksaanKualiti::select('id', 'sale_order_id', 'date', 'time', 'mesin', 'jenis', 'status', 'b_1', 'b_2', 'b_3', 'b_4', 'b_5', 'b_6')->with('sale_order');

            // Apply search if a search term is provided
            if (!empty($search)) {
                $searchLower = strtolower($search);
                $query->where(function ($q) use ($searchLower) {
                    $q
                        ->where('date', 'like', '%' . $searchLower . '%')
                        ->orWhere('time', 'like', '%' . $searchLower . '%')
                        ->orWhere('mesin', 'like', '%' . $searchLower . '%')
                        ->orWhere('jenis', 'like', '%' . $searchLower . '%')
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('order_no', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('kod_buku', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('description', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhere('b_1', 'like', '%' . $searchLower . '%')
                        ->orWhere('b_2', 'like', '%' . $searchLower . '%')
                        ->orWhere('b_3', 'like', '%' . $searchLower . '%')
                        ->orWhere('b_4', 'like', '%' . $searchLower . '%')
                        ->orWhere('b_5', 'like', '%' . $searchLower . '%')
                        ->orWhere('b_6', 'like', '%' . $searchLower . '%')
                        ->orWhere('status', 'like', '%' . $searchLower . '%');
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
                    7 => 'jenis',
                    8 => 'b_1',
                    9 => 'b_2',
                    10 => 'b_3',
                    11 => 'b_4',
                    12 => 'b_5',
                    13 => 'b_6',
                    14 => 'status',
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
                                $q->where('jenis', 'like', '%' . $searchLower . '%');
                                break;
                            case 8:
                                $q->where('b_1', 'like', '%' . $searchLower . '%');
                                break;
                            case 9:
                                $q->where('b_2', 'like', '%' . $searchLower . '%');
                                break;
                            case 10:
                                 $q->where('b_3', 'like', '%' . $searchLower . '%');
                                break;
                            case 11:
                                $q->where('b_4', 'like', '%' . $searchLower . '%');
                                break;
                            case 12:
                                $q->where('b_5', 'like', '%' . $searchLower . '%');
                               break;
                            case 13:
                                $q->where('b_6', 'like', '%' . $searchLower . '%');
                                 break;
                            case 14:
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
                    $actions = '<a class="dropdown-item" href="' . route('laporan_pemeriksaan_kualiti.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('laporan_pemeriksaan_kualiti.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('laporan_pemeriksaan_kualiti.verify', $row->id) . '">Verify</a>
                    <a class="dropdown-item" id="swal-warning" data-delete="' . route('laporan_pemeriksaan_kualiti.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'verified') {
                    $row->status = '<span class="badge badge-success">Verified</span>';
                    $actions = '<a class="dropdown-item" href="' . route('laporan_pemeriksaan_kualiti.view', $row->id) . '">View</a>
                                <a class="dropdown-item" id="swal-warning" data-delete="' . route('laporan_pemeriksaan_kualiti.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'declined') {
                    $row->status = '<span class="badge badge-danger">Declined</span>';
                    $actions = '<a class="dropdown-item" href="' . route('laporan_pemeriksaan_kualiti.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('laporan_pemeriksaan_kualiti.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('laporan_pemeriksaan_kualiti.verify', $row->id) . '">Verify</a>
                    <a class="dropdown-item" id="swal-warning" data-delete="' . route('laporan_pemeriksaan_kualiti.delete', $row->id) . '">Delete</a>';
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

            $query = LaporanPemeriksaanKualiti::select('id', 'sale_order_id', 'date', 'time', 'mesin', 'jenis', 'status', 'b_1', 'b_2', 'b_3', 'b_4', 'b_5', 'b_6')->with('sale_order');

            // Apply search if a search term is provided
            if (!empty($search)) {
                $searchLower = strtolower($search);
                $query->where(function ($q) use ($searchLower) {
                    $q
                        ->where('date', 'like', '%' . $searchLower . '%')
                        ->orWhere('time', 'like', '%' . $searchLower . '%')
                        ->orWhere('mesin', 'like', '%' . $searchLower . '%')
                        ->orWhere('jenis', 'like', '%' . $searchLower . '%')
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('order_no', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('kod_buku', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('description', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhere('b_1', 'like', '%' . $searchLower . '%')
                        ->orWhere('b_2', 'like', '%' . $searchLower . '%')
                        ->orWhere('b_3', 'like', '%' . $searchLower . '%')
                        ->orWhere('b_4', 'like', '%' . $searchLower . '%')
                        ->orWhere('b_5', 'like', '%' . $searchLower . '%')
                        ->orWhere('b_6', 'like', '%' . $searchLower . '%')
                        ->orWhere('status', 'like', '%' . $searchLower . '%');
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
                7 => 'jenis',
                8 => 'b_1',
                9 => 'b_2',
                10 => 'b_3',
                11 => 'b_4',
                12 => 'b_5',
                13 => 'b_6',
                14 => 'status',
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
                    $actions = '<a class="dropdown-item" href="' . route('laporan_pemeriksaan_kualiti.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('laporan_pemeriksaan_kualiti.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('laporan_pemeriksaan_kualiti.verify', $row->id) . '">Verify</a>
                    <a class="dropdown-item" id="swal-warning" data-delete="' . route('laporan_pemeriksaan_kualiti.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'verified') {
                    $row->status = '<span class="badge badge-success">Verified</span>';
                    $actions = '<a class="dropdown-item" href="' . route('laporan_pemeriksaan_kualiti.view', $row->id) . '">View</a>
                                <a class="dropdown-item" id="swal-warning" data-delete="' . route('laporan_pemeriksaan_kualiti.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'declined') {
                    $row->status = '<span class="badge badge-danger">Declined</span>';
                    $actions = '<a class="dropdown-item" href="' . route('laporan_pemeriksaan_kualiti.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('laporan_pemeriksaan_kualiti.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('laporan_pemeriksaan_kualiti.verify', $row->id) . '">Verify</a>
                    <a class="dropdown-item" id="swal-warning" data-delete="' . route('laporan_pemeriksaan_kualiti.delete', $row->id) . '">Delete</a>';
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
            Auth::user()->hasPermissionTo('LAPORAN PEMERIKSAAN KUALITI List') ||
            Auth::user()->hasPermissionTo('LAPORAN PEMERIKSAAN KUALITI Create') ||
            Auth::user()->hasPermissionTo('LAPORAN PEMERIKSAAN KUALITI Update') ||
            Auth::user()->hasPermissionTo('LAPORAN PEMERIKSAAN KUALITI View') ||
            Auth::user()->hasPermissionTo('LAPORAN PEMERIKSAAN KUALITI Delete') ||
            Auth::user()->hasPermissionTo('LAPORAN PEMERIKSAAN KUALITI Verify')
        ) {
            Helper::logSystemActivity('LAPORAN PEMERIKSAAN KUALITI', 'LAPORAN PEMERIKSAAN KUALITI List');
            return view('Mes.LaporanPemeriksaanKualiti.index');
        }
        return back()->with('custom_errors', 'You don`t have Right Permission');
    }

    public function create(){
        if (!Auth::user()->hasPermissionTo('LAPORAN PEMERIKSAAN KUALITI Create')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        Helper::logSystemActivity('LAPORAN PEMERIKSAAN KUALITI', 'LAPORAN PEMERIKSAAN KUALITI Create');
        return view('Mes.LaporanPemeriksaanKualiti.create');
    }

    public function store(Request $request)
    {
        if (!Auth::user()->hasPermissionTo('LAPORAN PEMERIKSAAN KUALITI Create')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $validator = null;

        $validatedData = $request->validate([
            'sale_order' => 'required',
            'date' => 'required',
            'time' => 'required',
            'mesin' => 'required',
            'jenis' => 'required',

        ]);

        // If validations fail
        if (!$validatedData) {
            return redirect()->back()
                ->withErrors($validator)->withInput();
        }

        $carbonTime = Carbon::createFromFormat('H:i', $request->time);
        $timeIn12HourFormat = $carbonTime->format('h:i A');


        $laporan_pemeriksaan_kualiti = new LaporanPemeriksaanKualiti();
        $laporan_pemeriksaan_kualiti->sale_order_id = $request->sale_order;
        $laporan_pemeriksaan_kualiti->date = $request->date;
        $laporan_pemeriksaan_kualiti->time = $timeIn12HourFormat;
        $laporan_pemeriksaan_kualiti->created_by = Auth::user()->id;

        $laporan_pemeriksaan_kualiti->seksyen_no = $request->seksyen_no;
        $laporan_pemeriksaan_kualiti->mesin = $request->mesin;
        $laporan_pemeriksaan_kualiti->jenis = $request->jenis;

        $laporan_pemeriksaan_kualiti->b_1 = $request->b_1;
        $laporan_pemeriksaan_kualiti->b_2 = $request->b_2;
        $laporan_pemeriksaan_kualiti->b_3 = $request->b_3;
        $laporan_pemeriksaan_kualiti->b_4 = $request->b_4;
        $laporan_pemeriksaan_kualiti->b_5 = $request->b_5;
        $laporan_pemeriksaan_kualiti->b_6 = $request->b_6;

        $laporan_pemeriksaan_kualiti->status = 'checked';
        $laporan_pemeriksaan_kualiti->save();

        Helper::logSystemActivity('LAPORAN PEMERIKSAAN KUALITI', 'LAPORAN PEMERIKSAAN KUALITI Store');
        return redirect()->route('laporan_pemeriksaan_kualiti')->with('custom_success', 'LAPORAN PEMERIKSAAN KUALITI has been Created Successfully !');
    }

    public function edit($id){
        if (!Auth::user()->hasPermissionTo('LAPORAN PEMERIKSAAN KUALITI Update')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $laporan_pemeriksaan_kualiti = LaporanPemeriksaanKualiti::find($id);
        Helper::logSystemActivity('LAPORAN PEMERIKSAAN KUALITI', 'LAPORAN PEMERIKSAAN KUALITI Update');
        return view('Mes.LaporanPemeriksaanKualiti.edit', compact('laporan_pemeriksaan_kualiti'));
    }

    public function view($id){
        if (!Auth::user()->hasPermissionTo('LAPORAN PEMERIKSAAN KUALITI View')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $laporan_pemeriksaan_kualiti = LaporanPemeriksaanKualiti::find($id);
        Helper::logSystemActivity('LAPORAN PEMERIKSAAN KUALITI', 'LAPORAN PEMERIKSAAN KUALITI View');
        return view('Mes.LaporanPemeriksaanKualiti.view', compact('laporan_pemeriksaan_kualiti'));
    }

    public function update(Request $request, $id)
    {
        if (!Auth::user()->hasPermissionTo('LAPORAN PEMERIKSAAN KUALITI Update')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $validator = null;

        $validatedData = $request->validate([
            'sale_order' => 'required',
            'date' => 'required',
            'time' => 'required',
            'mesin' => 'required',
            'jenis' => 'required',
            
        ]);

        // If validations fail
        if (!$validatedData) {
            return redirect()->back()
                ->withErrors($validator)->withInput();
        }

        $carbonTime = Carbon::createFromFormat('H:i', $request->time);
        $timeIn12HourFormat = $carbonTime->format('h:i A');

        $laporan_pemeriksaan_kualiti = LaporanPemeriksaanKualiti::find($id);
        $laporan_pemeriksaan_kualiti->sale_order_id = $request->sale_order;
        $laporan_pemeriksaan_kualiti->date = $request->date;
        $laporan_pemeriksaan_kualiti->time = $timeIn12HourFormat;
        $laporan_pemeriksaan_kualiti->created_by = Auth::user()->id;

        $laporan_pemeriksaan_kualiti->seksyen_no = $request->seksyen_no;
        $laporan_pemeriksaan_kualiti->mesin = $request->mesin;
        $laporan_pemeriksaan_kualiti->jenis = $request->jenis;

        $laporan_pemeriksaan_kualiti->b_1 = $request->b_1;
        $laporan_pemeriksaan_kualiti->b_2 = $request->b_2;
        $laporan_pemeriksaan_kualiti->b_3 = $request->b_3;
        $laporan_pemeriksaan_kualiti->b_4 = $request->b_4;
        $laporan_pemeriksaan_kualiti->b_5 = $request->b_5;
        $laporan_pemeriksaan_kualiti->b_6 = $request->b_6;

        $laporan_pemeriksaan_kualiti->status = 'checked';
        $laporan_pemeriksaan_kualiti->save();

        Helper::logSystemActivity('LAPORAN PEMERIKSAAN KUALITI', 'LAPORAN PEMERIKSAAN KUALITI Update');
        return redirect()->route('laporan_pemeriksaan_kualiti')->with('custom_success', 'LAPORAN PEMERIKSAAN KUALITI has been Updated Successfully !');
    }

    public function verify($id){
        if (!Auth::user()->hasPermissionTo('LAPORAN PEMERIKSAAN KUALITI Verify')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $laporan_pemeriksaan_kualiti = LaporanPemeriksaanKualiti::find($id);
        Helper::logSystemActivity('LAPORAN PEMERIKSAAN KUALITI', 'LAPORAN PEMERIKSAAN KUALITI Update');
        return view('Mes.LaporanPemeriksaanKualiti.verify', compact('laporan_pemeriksaan_kualiti'));
    }

    public function approve_approve(Request $request, $id){
        if (!Auth::user()->hasPermissionTo('LAPORAN PEMERIKSAAN KUALITI Verify')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $laporan_pemeriksaan_kualiti = LaporanPemeriksaanKualiti::find($id);
        $laporan_pemeriksaan_kualiti->status = 'verified';
        $laporan_pemeriksaan_kualiti->verified_by_date = Carbon::now('Asia/Kuala_Lumpur')->format('d-m-Y h:i:s A');
        $laporan_pemeriksaan_kualiti->verified_by_user = Auth::user()->user_name;
        $laporan_pemeriksaan_kualiti->verified_by_designation = (Auth::user()->designations != null) ? Auth::user()->designations->name : 'not assign';
        $laporan_pemeriksaan_kualiti->verified_by_department = (Auth::user()->departments != null) ? Auth::user()->departments->name : 'not assign';
        $laporan_pemeriksaan_kualiti->save();

        Helper::logSystemActivity('LAPORAN PEMERIKSAAN KUALITI', 'LAPORAN PEMERIKSAAN KUALITI Verified');
        return redirect()->route('laporan_pemeriksaan_kualiti')->with('custom_success', 'LAPORAN PEMERIKSAAN KUALITI has been Successfully Verified!');
    }

    public function approve_decline(Request $request, $id){
        if (!Auth::user()->hasPermissionTo('LAPORAN PEMERIKSAAN KUALITI Verify')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $laporan_pemeriksaan_kualiti = LaporanPemeriksaanKualiti::find($id);
        $laporan_pemeriksaan_kualiti->status = 'declined';
        $laporan_pemeriksaan_kualiti->save();
        Helper::logSystemActivity('LAPORAN PEMERIKSAAN KUALITI', 'LAPORAN PEMERIKSAAN KUALITI Declined');
        return redirect()->route('laporan_pemeriksaan_kualiti')->with('custom_success', 'LAPORAN PEMERIKSAAN KUALITI has been Successfully Declined!');
    }

    public function delete($id){
        if (!Auth::user()->hasPermissionTo('LAPORAN PEMERIKSAAN KUALITI Delete')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $laporan_pemeriksaan_kualiti = LaporanPemeriksaanKualiti::find($id);
        $laporan_pemeriksaan_kualiti->delete();
        Helper::logSystemActivity('LAPORAN PEMERIKSAAN KUALITI', 'LAPORAN PEMERIKSAAN KUALITI Delete');
        return redirect()->route('laporan_pemeriksaan_kualiti')->with('custom_success', 'LAPORAN PEMERIKSAAN KUALITI has been Successfully Deleted!');
    }
}
