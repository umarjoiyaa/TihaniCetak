<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\LaporanProsesPencetakani;
use App\Models\LaporanProsesPencetakaniC;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporanProsesPencetakaniCetakController extends Controller
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

            $query = LaporanProsesPencetakani::select('id', 'sale_order_id', 'date', 'time', 'user_text', 'seksyen_no', 'kuaniti_cetakan', 'kuaniti_waste', 'status')->with('sale_order');

            // Apply search if a search term is provided
            if (!empty($search)) {
                $searchLower = strtolower($search);
                $query->where(function ($q) use ($searchLower) {
                    $q
                        ->where('date', 'like', '%' . $searchLower . '%')
                        ->orWhere('time', 'like', '%' . $searchLower . '%')
                        ->oWhere('user_text', 'like', '%' . $searchLower . '%')
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('order_no', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('kod_buku', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('description', 'like', '%' . $searchLower . '%');
                        })
                        ->oWhere('seksyen_no', 'like', '%' . $searchLower . '%')
                        ->oWhere('kuaniti_cetakan', 'like', '%' . $searchLower . '%')
                        ->oWhere('kuaniti_waste', 'like', '%' . $searchLower . '%')
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
                    3 => 'sale_order_id',
                    4 => 'sale_order_id',
                    5 => 'sale_order_id',
                    6 => 'seksyen_no',
                    7 => 'user_text',
                    8 => 'kuaniti_cetakan',
                    9 => 'kuaniti_waste',
                    10 => 'status',
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
                                $q->whereHas('sale_order', function ($query) use ($searchLower) {
                                    $query->where('order_no', 'like', '%' . $searchLower . '%');
                                });
                                break;
                            case 4:
                                $q->whereHas('sale_order', function ($query) use ($searchLower) {
                                    $query->where('kod_buku', 'like', '%' . $searchLower . '%');
                                });
                                break;
                            case 5:
                                $q->whereHas('sale_order', function ($query) use ($searchLower) {
                                    $query->where('description', 'like', '%' . $searchLower . '%');
                                });
                                break;
                            case 6:
                                $q->where('seksyen_no', 'like', '%' . $searchLower . '%');
                                break;
                            case 7:
                                $q->where('user_text', 'like', '%' . $searchLower . '%');
                                break;
                            case 8:
                                $q->where('kuaniti_cetakan', 'like', '%' . $searchLower . '%');
                                break;
                            case 9:
                                $q->where('kuaniti_waste', 'like', '%' . $searchLower . '%');
                                break;
                            case 10:
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
                    $actions = '<a class="dropdown-item" href="' . route('laporan_proses_pencetakani.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('laporan_proses_pencetakani.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('laporan_proses_pencetakani.verify', $row->id) . '">Verify</a>
                    <a class="dropdown-item" href="' . route('laporan_proses_pencetakani.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'verified') {
                    $row->status = '<span class="badge badge-success">Verified</span>';
                    $actions = '<a class="dropdown-item" href="' . route('laporan_proses_pencetakani.view', $row->id) . '">View</a>
                                <a class="dropdown-item" href="' . route('laporan_proses_pencetakani.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'declined') {
                    $row->status = '<span class="badge badge-danger">Declined</span>';
                    $actions = '<a class="dropdown-item" href="' . route('laporan_proses_pencetakani.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('laporan_proses_pencetakani.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('laporan_proses_pencetakani.verify', $row->id) . '">Verify</a>
                    <a class="dropdown-item" href="' . route('laporan_proses_pencetakani.delete', $row->id) . '">Delete</a>';
                }

                $row->action = '<div class="dropdown">
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

            $query = LaporanProsesPencetakani::select('id', 'sale_order_id', 'date', 'time', 'user_text', 'seksyen_no', 'kuaniti_cetakan', 'kuaniti_waste', 'status')->with('sale_order');

            // Apply search if a search term is provided
            if (!empty($search)) {
                $searchLower = strtolower($search);
                $query->where(function ($q) use ($searchLower) {
                    $q
                        ->where('date', 'like', '%' . $searchLower . '%')
                        ->orWhere('time', 'like', '%' . $searchLower . '%')
                        ->oWhere('user_text', 'like', '%' . $searchLower . '%')
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('order_no', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('kod_buku', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('description', 'like', '%' . $searchLower . '%');
                        })
                        ->oWhere('seksyen_no', 'like', '%' . $searchLower . '%')
                        ->oWhere('kuaniti_cetakan', 'like', '%' . $searchLower . '%')
                        ->oWhere('kuaniti_waste', 'like', '%' . $searchLower . '%')
                        ->oWhere('status', 'like', '%' . $searchLower . '%');
                    // Add more columns as needed
                });
            }

            $sortableColumns = [
                1 => 'date',
                2 => 'time',
                3 => 'sale_order_id',
                4 => 'sale_order_id',
                5 => 'sale_order_id',
                6 => 'seksyen_no',
                7 => 'user_text',
                8 => 'kuaniti_cetakan',
                9 => 'kuaniti_waste',
                10 => 'status',
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
                    $actions = '<a class="dropdown-item" href="' . route('laporan_proses_pencetakani.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('laporan_proses_pencetakani.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('laporan_proses_pencetakani.verify', $row->id) . '">Verify</a>
                    <a class="dropdown-item" href="' . route('laporan_proses_pencetakani.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'verified') {
                    $row->status = '<span class="badge badge-success">Verified</span>';
                    $actions = '<a class="dropdown-item" href="' . route('laporan_proses_pencetakani.view', $row->id) . '">View</a>
                                <a class="dropdown-item" href="' . route('laporan_proses_pencetakani.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'declined') {
                    $row->status = '<span class="badge badge-danger">Declined</span>';
                    $actions = '<a class="dropdown-item" href="' . route('laporan_proses_pencetakani.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('laporan_proses_pencetakani.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('laporan_proses_pencetakani.verify', $row->id) . '">Verify</a>
                    <a class="dropdown-item" href="' . route('laporan_proses_pencetakani.delete', $row->id) . '">Delete</a>';
                }

                $row->action = '<div class="dropdown">
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
            Auth::user()->hasPermissionTo('LAPORAN PROSES PENCETAKANI List') ||
            Auth::user()->hasPermissionTo('LAPORAN PROSES PENCETAKANI Create') ||
            Auth::user()->hasPermissionTo('LAPORAN PROSES PENCETAKANI Update') ||
            Auth::user()->hasPermissionTo('LAPORAN PROSES PENCETAKANI View') ||
            Auth::user()->hasPermissionTo('LAPORAN PROSES PENCETAKANI Delete') ||
            Auth::user()->hasPermissionTo('LAPORAN PROSES PENCETAKANI Verify')
        ) {
            Helper::logSystemActivity('LAPORAN PROSES PENCETAKANI', 'LAPORAN PROSES PENCETAKANI List');
            return view('Mes.LaporanProsesPencetakani.index');
        }
        return back()->with('custom_errors', 'You don`t have Right Permission');
    }

    public function create(){
        if (!Auth::user()->hasPermissionTo('LAPORAN PROSES PENCETAKANI Create')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $users = User::all();
        Helper::logSystemActivity('LAPORAN PROSES PENCETAKANI', 'LAPORAN PROSES PENCETAKANI Create');
        return view('Mes.LaporanProsesPencetakani.create', compact('users'));
    }

    public function store(Request $request)
    {
        if (!Auth::user()->hasPermissionTo('LAPORAN PROSES PENCETAKANI Create')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $validator = null;

        $validatedData = $request->validate([
            'sale_order' => 'required',
            'date' => 'required',
            'time' => 'required',
            'user' => 'required',
            'seksyen_no' => 'required',
            'kuaniti_cetakan' => 'required',
            'kuaniti_waste' => 'required',
            'semasa' => 'required'
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

        $laporan_proses_pencetakani = new LaporanProsesPencetakani();
        $laporan_proses_pencetakani->sale_order_id = $request->sale_order;
        $laporan_proses_pencetakani->date = $request->date;
        $laporan_proses_pencetakani->time = $request->time;
        $laporan_proses_pencetakani->created_by = Auth::user()->id;

        $laporan_proses_pencetakani->seksyen_no = $request->seksyen_no;
        $laporan_proses_pencetakani->kuaniti_cetakan = $request->kuaniti_cetakan;
        $laporan_proses_pencetakani->kuaniti_waste = $request->kuaniti_waste;
        $laporan_proses_pencetakani->user_id = json_encode($userIds);
        $laporan_proses_pencetakani->user_text = $userText;

        $laporan_proses_pencetakani->b_1 = $request->b_1;
        $laporan_proses_pencetakani->b_2 = $request->b_2;
        $laporan_proses_pencetakani->b_3 = $request->b_3;
        $laporan_proses_pencetakani->b_4 = $request->b_4;
        $laporan_proses_pencetakani->b_5 = $request->b_5;
        $laporan_proses_pencetakani->b_6 = $request->b_6;
        $laporan_proses_pencetakani->b_7 = $request->b_7;
        $laporan_proses_pencetakani->b_8 = $request->b_8;
        $laporan_proses_pencetakani->b_9 = $request->b_9;
        $laporan_proses_pencetakani->b_10 = $request->b_10;

        $laporan_proses_pencetakani->status = 'checked';
        $laporan_proses_pencetakani->save();

        foreach($request->semasa as $value){
           $detail = new LaporanProsesPencetakaniC();
           $detail->laporan_proses = $laporan_proses_pencetakani->id;
           $detail->c_1 = $value['1'] ?? null;
           $detail->c_2 = $value['2'] ?? null;
           $detail->c_3 = $value['3'] ?? null;
           $detail->c_4 = $value['4'] ?? null;
           $detail->c_5 = $value['5'] ?? null;
           $detail->c_6 = $value['6'] ?? null;
           $detail->c_7 = $value['7'] ?? null;
           $detail->c_8 = $value['8'] ?? null;
           $detail->c_9 = $value['9'] ?? null;
           $detail->c_10 = $value['10'] ?? null;
           $detail->save();
        }

        Helper::logSystemActivity('LAPORAN PROSES PENCETAKANI', 'LAPORAN PROSES PENCETAKANI Store');
        return redirect()->route('laporan_proses_pencetakani')->with('custom_success', 'LAPORAN PROSES PENCETAKANI has been Created Successfully !');
    }

    public function edit($id){
        if (!Auth::user()->hasPermissionTo('LAPORAN PROSES PENCETAKANI Update')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $laporan_proses_pencetakani = LaporanProsesPencetakani::find($id);
        $details = LaporanProsesPencetakaniC::where('laporan_proses', '=', $id)->get();
        $users = User::all();
        Helper::logSystemActivity('LAPORAN PROSES PENCETAKANI', 'LAPORAN PROSES PENCETAKANI Update');
        return view('Mes.LaporanProsesPencetakani.edit', compact('laporan_proses_pencetakani', 'users', 'details'));
    }

    public function view($id){
        if (!Auth::user()->hasPermissionTo('LAPORAN PROSES PENCETAKANI View')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $laporan_proses_pencetakani = LaporanProsesPencetakani::find($id);
        $details = LaporanProsesPencetakaniC::where('laporan_proses', '=', $id)->get();
        $users = User::all();
        Helper::logSystemActivity('LAPORAN PROSES PENCETAKANI', 'LAPORAN PROSES PENCETAKANI View');
        return view('Mes.LaporanProsesPencetakani.view', compact('laporan_proses_pencetakani', 'users', 'details'));
    }

    public function update(Request $request, $id)
    {
        if (!Auth::user()->hasPermissionTo('LAPORAN PROSES PENCETAKANI Update')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $validator = null;

        $validatedData = $request->validate([
            'sale_order' => 'required',
            'date' => 'required',
            'time' => 'required',
            'user' => 'required',
            'seksyen_no' => 'required',
            'kuaniti_cetakan' => 'required',
            'kuaniti_waste' => 'required',
            'semasa' => 'required'
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

        $laporan_proses_pencetakani = LaporanProsesPencetakani::find($id);
        $laporan_proses_pencetakani->sale_order_id = $request->sale_order;
        $laporan_proses_pencetakani->date = $request->date;
        $laporan_proses_pencetakani->time = $request->time;
        $laporan_proses_pencetakani->created_by = Auth::user()->id;

        $laporan_proses_pencetakani->seksyen_no = $request->seksyen_no;
        $laporan_proses_pencetakani->kuaniti_cetakan = $request->kuaniti_cetakan;
        $laporan_proses_pencetakani->kuaniti_waste = $request->kuaniti_waste;
        $laporan_proses_pencetakani->user_id = json_encode($userIds);
        $laporan_proses_pencetakani->user_text = $userText;

        $laporan_proses_pencetakani->b_1 = $request->b_1;
        $laporan_proses_pencetakani->b_2 = $request->b_2;
        $laporan_proses_pencetakani->b_3 = $request->b_3;
        $laporan_proses_pencetakani->b_4 = $request->b_4;
        $laporan_proses_pencetakani->b_5 = $request->b_5;
        $laporan_proses_pencetakani->b_6 = $request->b_6;
        $laporan_proses_pencetakani->b_7 = $request->b_7;
        $laporan_proses_pencetakani->b_8 = $request->b_8;
        $laporan_proses_pencetakani->b_9 = $request->b_9;
        $laporan_proses_pencetakani->b_10 = $request->b_10;

        $laporan_proses_pencetakani->status = 'checked';
        $laporan_proses_pencetakani->save();

        LaporanProsesPencetakaniC::where('laporan_proses', '=', $id)->delete();

        foreach($request->semasa as $value){
           $detail = new LaporanProsesPencetakaniC();
           $detail->laporan_proses = $laporan_proses_pencetakani->id;
           $detail->c_1 = $value['1'] ?? null;
           $detail->c_2 = $value['2'] ?? null;
           $detail->c_3 = $value['3'] ?? null;
           $detail->c_4 = $value['4'] ?? null;
           $detail->c_5 = $value['5'] ?? null;
           $detail->c_6 = $value['6'] ?? null;
           $detail->c_7 = $value['7'] ?? null;
           $detail->c_8 = $value['8'] ?? null;
           $detail->c_9 = $value['9'] ?? null;
           $detail->c_10 = $value['10'] ?? null;
           $detail->save();
        }

        Helper::logSystemActivity('LAPORAN PROSES PENCETAKANI', 'LAPORAN PROSES PENCETAKANI Update');
        return redirect()->route('laporan_proses_pencetakani')->with('custom_success', 'LAPORAN PROSES PENCETAKANI has been Updated Successfully !');
    }

    public function verify($id){
        if (!Auth::user()->hasPermissionTo('LAPORAN PROSES PENCETAKANI Verify')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $laporan_proses_pencetakani = LaporanProsesPencetakani::find($id);
        $details = LaporanProsesPencetakaniC::where('laporan_proses', '=', $id)->get();
        $users = User::all();
        Helper::logSystemActivity('LAPORAN PROSES PENCETAKANI', 'LAPORAN PROSES PENCETAKANI Update');
        return view('Mes.LaporanProsesPencetakani.verify', compact('laporan_proses_pencetakani', 'users', 'details'));
    }

    public function approve_approve(Request $request, $id){
        if (!Auth::user()->hasPermissionTo('LAPORAN PROSES PENCETAKANI Verify')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $laporan_proses_pencetakani = LaporanProsesPencetakani::find($id);
        $laporan_proses_pencetakani->status = 'verified';
        $laporan_proses_pencetakani->verified_by_date = Carbon::now()->format('Y-m-d H:i:s');
        $laporan_proses_pencetakani->verified_by_user = Auth::user()->user_name;
        $laporan_proses_pencetakani->verified_by_designation = (Auth::user()->designation != null) ? Auth::user()->designation->name : 'not assign';
        $laporan_proses_pencetakani->verified_by_department = (Auth::user()->department != null) ? Auth::user()->department->name : 'not assign';
        $laporan_proses_pencetakani->save();

        foreach($request->semasa as $key => $value){
            $detail = LaporanProsesPencetakaniC::find($key);
            $detail->c_10 = $value['1'] ?? null;
            $detail->save();
         }

        Helper::logSystemActivity('LAPORAN PROSES PENCETAKANI', 'LAPORAN PROSES PENCETAKANI Verified');
        return redirect()->route('laporan_proses_pencetakani')->with('custom_success', 'LAPORAN PROSES PENCETAKANI has been Successfully Verified!');
    }

    public function approve_decline(Request $request, $id){
        if (!Auth::user()->hasPermissionTo('LAPORAN PROSES PENCETAKANI Verify')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $laporan_proses_pencetakani = LaporanProsesPencetakani::find($id);
        $laporan_proses_pencetakani->status = 'declined';
        $laporan_proses_pencetakani->save();
        Helper::logSystemActivity('LAPORAN PROSES PENCETAKANI', 'LAPORAN PROSES PENCETAKANI Declined');
        return redirect()->route('laporan_proses_pencetakani')->with('custom_success', 'LAPORAN PROSES PENCETAKANI has been Successfully Declined!');
    }

    public function delete($id){
        if (!Auth::user()->hasPermissionTo('LAPORAN PROSES PENCETAKANI Delete')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $laporan_proses_pencetakani = LaporanProsesPencetakani::find($id);
        LaporanProsesPencetakaniC::where('laporan_proses', '=', $id)->delete();
        $laporan_proses_pencetakani->delete();
        Helper::logSystemActivity('LAPORAN PROSES PENCETAKANI', 'LAPORAN PROSES PENCETAKANI Delete');
        return redirect()->route('laporan_proses_pencetakani')->with('custom_success', 'LAPORAN PROSES PENCETAKANI has been Successfully Deleted!');
    }
}
