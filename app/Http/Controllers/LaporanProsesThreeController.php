<?php

namespace App\Http\Controllers;
use App\Helpers\Helper;
use App\Models\LaporanProsesThree;
use App\Models\LaporanProsesThreeC;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporanProsesThreeController extends Controller
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

            $query = LaporanProsesThree::select('id', 'sale_order_id', 'date', 'time', 'user_text', 'status')->with('sale_order');

            // Apply search if a search term is provided
            if (!empty($search)) {
                $searchLower = strtolower($search);
                $query->where(function ($q) use ($searchLower) {
                    $q
                        ->where('date', 'like', '%' . $searchLower . '%')
                        ->orWhere('time', 'like', '%' . $searchLower . '%')
                        ->orWhere('user_text', 'like', '%' . $searchLower . '%')
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('order_no', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('kod_buku', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('description', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('size', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('sale_order_qty', 'like', '%' . $searchLower . '%');
                        })
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
                    3 => 'sale_order_id',
                    4 => 'sale_order_id',
                    5 => 'sale_order_id',
                    6 => 'sale_order_id',
                    7 => 'sale_order_id',
                    8 => 'user_text',
                    9 => 'status',
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
                                $q->whereHas('sale_order', function ($query) use ($searchLower) {
                                    $query->where('sale_order_qty', 'like', '%' . $searchLower . '%');
                                });
                                break;
                            case 7:
                                $q->whereHas('sale_order', function ($query) use ($searchLower) {
                                    $query->where('size', 'like', '%' . $searchLower . '%');
                                });
                                break;
                            case 8:
                                $q->where('user_text', 'like', '%' . $searchLower . '%');
                                break;
                            case 9:
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
                    $actions = '<a class="dropdown-item" href="' . route('laporan_proses_three.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('laporan_proses_three.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('laporan_proses_three.verify', $row->id) . '">Verify</a>
                    <a class="dropdown-item"  id="swal-warning" data-delete="' . route('laporan_proses_three.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'verified') {
                    $row->status = '<span class="badge badge-success">Verified</span>';
                    $actions = '<a class="dropdown-item" href="' . route('laporan_proses_three.view', $row->id) . '">View</a>
                                <a class="dropdown-item"  id="swal-warning" data-delete="' . route('laporan_proses_three.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'declined') {
                    $row->status = '<span class="badge badge-danger">Declined</span>';
                    $actions = '<a class="dropdown-item" href="' . route('laporan_proses_three.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('laporan_proses_three.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('laporan_proses_three.verify', $row->id) . '">Verify</a>
                    <a class="dropdown-item"  id="swal-warning" data-delete="' . route('laporan_proses_three.delete', $row->id) . '">Delete</a>';
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

            $query = LaporanProsesThree::select('id', 'sale_order_id', 'date', 'time', 'user_text', 'status')->with('sale_order');

            // Apply search if a search term is provided
            if (!empty($search)) {
                $searchLower = strtolower($search);
                $query->where(function ($q) use ($searchLower) {
                    $q
                        ->where('date', 'like', '%' . $searchLower . '%')
                        ->orWhere('time', 'like', '%' . $searchLower . '%')
                        ->orWhere('user_text', 'like', '%' . $searchLower . '%')
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('order_no', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('kod_buku', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('description', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('size', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('sale_order_qty', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhere('status', 'like', '%' . $searchLower . '%');
                    // Add more columns as needed
                });
            }

            $sortableColumns = [
                1 => 'date',
                2 => 'time',
                3 => 'sale_order_id',
                4 => 'sale_order_id',
                5 => 'sale_order_id',
                6 => 'sale_order_id',
                7 => 'sale_order_id',
                8 => 'user_text',
                9 => 'status',
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
                    $actions = '<a class="dropdown-item" href="' . route('laporan_proses_three.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('laporan_proses_three.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('laporan_proses_three.verify', $row->id) . '">Verify</a>
                    <a class="dropdown-item"  id="swal-warning" data-delete="' . route('laporan_proses_three.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'verified') {
                    $row->status = '<span class="badge badge-success">Verified</span>';
                    $actions = '<a class="dropdown-item" href="' . route('laporan_proses_three.view', $row->id) . '">View</a>
                                <a class="dropdown-item"  id="swal-warning" data-delete="' . route('laporan_proses_three.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'declined') {
                    $row->status = '<span class="badge badge-danger">Declined</span>';
                    $actions = '<a class="dropdown-item" href="' . route('laporan_proses_three.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('laporan_proses_three.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('laporan_proses_three.verify', $row->id) . '">Verify</a>
                    <a class="dropdown-item"  id="swal-warning" data-delete="' . route('laporan_proses_three.delete', $row->id) . '">Delete</a>';
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
            Auth::user()->hasPermissionTo('LAPORAN PROSES THREE KNIFE List') ||
            Auth::user()->hasPermissionTo('LAPORAN PROSES THREE KNIFE Create') ||
            Auth::user()->hasPermissionTo('LAPORAN PROSES THREE KNIFE Update') ||
            Auth::user()->hasPermissionTo('LAPORAN PROSES THREE KNIFE View') ||
            Auth::user()->hasPermissionTo('LAPORAN PROSES THREE KNIFE Delete') ||
            Auth::user()->hasPermissionTo('LAPORAN PROSES THREE KNIFE Verify')
        ) {
            Helper::logSystemActivity('LAPORAN PROSES THREE KNIFE', 'LAPORAN PROSES THREE KNIFE List');
            return view('Mes.LaporanProsesThree.index');
        }
        return back()->with('custom_errors', 'You don`t have Right Permission');
    }

    public function create(){
        if (!Auth::user()->hasPermissionTo('LAPORAN PROSES THREE KNIFE Create')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $users = User::all();
        Helper::logSystemActivity('LAPORAN PROSES THREE KNIFE', 'LAPORAN PROSES THREE KNIFE Create');
        return view('Mes.LaporanProsesThree.create', compact('users'));
    }

    public function store(Request $request)
    {
        if (!Auth::user()->hasPermissionTo('LAPORAN PROSES THREE KNIFE Create')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $validator = null;

        $validatedData = $request->validate([
            'sale_order' => 'required',
            'date' => 'required',
            'time' => 'required',
            'user' => 'required',

        ],[
            'user.required' => 'The operator field is required.',
        ]);

        // If validations fail
        if (!$validatedData) {
            return redirect()->back()
                ->withErrors($validator)->withInput();
        }

        $carbonTime = Carbon::createFromFormat('H:i', $request->time);
        $timeIn12HourFormat = $carbonTime->format('h:i A');


        $userIds = $request->user;
        $userNames = [];

        foreach ($userIds as $userId) {
            $user = User::find($userId);
            if ($user) {
               $userNames[] = $user->user_name;
            }
        }

        $userText = implode(', ', $userNames);

        $laporan_proses_three = new LaporanProsesThree();
        $laporan_proses_three->sale_order_id = $request->sale_order;
        $laporan_proses_three->date = $request->date;
        $laporan_proses_three->time = $timeIn12HourFormat;
        $laporan_proses_three->created_by = Auth::user()->id;

        $laporan_proses_three->good_count = $request->good_count == null ? '' :  $request->good_count;
        $laporan_proses_three->user_id = json_encode($userIds);
        $laporan_proses_three->user_text = $userText;

        $laporan_proses_three->b_1 = $request->b_1;
        $laporan_proses_three->b_2 = $request->b_2;
        $laporan_proses_three->b_3 = $request->b_3;
        $laporan_proses_three->b_4 = $request->b_4;
        $laporan_proses_three->b_5 = $request->b_5;
        $laporan_proses_three->b_6 = $request->b_6;
        $laporan_proses_three->b_7 = $request->b_7;
        $laporan_proses_three->b_8 = $request->b_8;
        $laporan_proses_three->b_9 = $request->b_9;
        $laporan_proses_three->b_10 = $request->b_10;
        $laporan_proses_three->b_11 = $request->b_11;

        $laporan_proses_three->status = 'checked';
        $laporan_proses_three->save();
        if($request->semasa != null){
        foreach($request->semasa as $value){
           $detail = new LaporanProsesThreeC();
           $detail->proses_three_id = $laporan_proses_three->id;
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
           $detail->c_11 = $value['11'] ?? null;
           $detail->c_12 = $value['12'] ?? null;
           $detail->c_13 = $value['13'] ?? null;
           $detail->save();
        }
    }


        Helper::logSystemActivity('LAPORAN PROSES THREE KNIFE', 'LAPORAN PROSES THREE KNIFE Store');
        return redirect()->route('laporan_proses_three')->with('custom_success', 'LAPORAN PROSES THREE KNIFE has been Created Successfully !');
    }

    public function edit($id){
        if (!Auth::user()->hasPermissionTo('LAPORAN PROSES THREE KNIFE Update')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $laporan_proses_three = LaporanProsesThree::find($id);
        $details = LaporanProsesThreeC::where('proses_three_id', '=', $id)->get();
        $users = User::all();
        Helper::logSystemActivity('LAPORAN PROSES THREE KNIFE', 'LAPORAN PROSES THREE KNIFE Update');
        return view('Mes.LaporanProsesThree.edit', compact('laporan_proses_three', 'users', 'details'));
    }

    public function view($id){
        if (!Auth::user()->hasPermissionTo('LAPORAN PROSES THREE KNIFE View')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $laporan_proses_three = LaporanProsesThree::find($id);
        $details = LaporanProsesThreeC::where('proses_three_id', '=', $id)->get();
        $users = User::all();
        Helper::logSystemActivity('LAPORAN PROSES THREE KNIFE', 'LAPORAN PROSES THREE KNIFE View');
        return view('Mes.LaporanProsesThree.view', compact('laporan_proses_three', 'users', 'details'));
    }

    public function update(Request $request, $id)
    {
        if (!Auth::user()->hasPermissionTo('LAPORAN PROSES THREE KNIFE Update')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $validator = null;

        $validatedData = $request->validate([
            'sale_order' => 'required',
            'date' => 'required',
            'time' => 'required',
            'user' => 'required',

        ],[
            'user.required' => 'The operator field is required.',
        ]);

        // If validations fail
        if (!$validatedData) {
            return redirect()->back()
                ->withErrors($validator)->withInput();
        }

        $carbonTime = Carbon::createFromFormat('H:i', $request->time);
        $timeIn12HourFormat = $carbonTime->format('h:i A');


        $userIds = $request->user;
        $userNames = [];

        foreach ($userIds as $userId) {
            $user = User::find($userId);
            if ($user) {
               $userNames[] = $user->user_name;
            }
        }

        $userText = implode(', ', $userNames);

        $laporan_proses_three = LaporanProsesThree::find($id);
        $laporan_proses_three->sale_order_id = $request->sale_order;
        $laporan_proses_three->date = $request->date;
        $laporan_proses_three->time = $timeIn12HourFormat;
        $laporan_proses_three->created_by = Auth::user()->id;

        $laporan_proses_three->good_count = $request->good_count == null ? '' :  $request->good_count;
        $laporan_proses_three->user_id = json_encode($userIds);
        $laporan_proses_three->user_text = $userText;

        $laporan_proses_three->b_1 = $request->b_1;
        $laporan_proses_three->b_2 = $request->b_2;
        $laporan_proses_three->b_3 = $request->b_3;
        $laporan_proses_three->b_4 = $request->b_4;
        $laporan_proses_three->b_5 = $request->b_5;
        $laporan_proses_three->b_6 = $request->b_6;
        $laporan_proses_three->b_7 = $request->b_7;
        $laporan_proses_three->b_8 = $request->b_8;
        $laporan_proses_three->b_9 = $request->b_9;
        $laporan_proses_three->b_10 = $request->b_10;
        $laporan_proses_three->b_11 = $request->b_11;

        $laporan_proses_three->status = 'checked';
        $laporan_proses_three->save();

        LaporanProsesThreeC::where('proses_three_id', '=', $id)->delete();
        if($request->semasa != null){
        foreach($request->semasa as $value){
           $detail = new LaporanProsesThreeC();
           $detail->proses_three_id = $laporan_proses_three->id;
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
           $detail->c_11 = $value['11'] ?? null;
           $detail->c_12 = $value['12'] ?? null;
           $detail->c_13 = $value['13'] ?? null;
           $detail->save();
        }
    }


        Helper::logSystemActivity('LAPORAN PROSES THREE KNIFE', 'LAPORAN PROSES THREE KNIFE Update');
        return redirect()->route('laporan_proses_three')->with('custom_success', 'LAPORAN PROSES THREE KNIFE has been Updated Successfully !');
    }

    public function verify($id){
        if (!Auth::user()->hasPermissionTo('LAPORAN PROSES THREE KNIFE Verify')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $laporan_proses_three = LaporanProsesThree::find($id);
        $details = LaporanProsesThreeC::where('proses_three_id', '=', $id)->get();
        $users = User::all();
        Helper::logSystemActivity('LAPORAN PROSES THREE KNIFE', 'LAPORAN PROSES THREE KNIFE Update');
        return view('Mes.LaporanProsesThree.verify', compact('laporan_proses_three', 'users', 'details'));
    }

    public function approve_approve(Request $request, $id){
        if (!Auth::user()->hasPermissionTo('LAPORAN PROSES THREE KNIFE Verify')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $laporan_proses_three = LaporanProsesThree::find($id);
        $laporan_proses_three->status = 'verified';
        $laporan_proses_three->verified_by_date = Carbon::now('Asia/Kuala_Lumpur')->format('d-m-Y h:i:s A');
        $laporan_proses_three->verified_by_user = Auth::user()->user_name;
        $laporan_proses_three->verified_by_designation = (Auth::user()->designations != null) ? Auth::user()->designations->name : 'not assign';
        $laporan_proses_three->verified_by_department = (Auth::user()->departments != null) ? Auth::user()->departments->name : 'not assign';
        $laporan_proses_three->save();

        foreach($request->semasa as $key => $value){
            $detail = LaporanProsesThreeC::find($key);
            $detail->c_13 = $value['1'] ?? null;
            $detail->save();
         }

        Helper::logSystemActivity('LAPORAN PROSES THREE KNIFE', 'LAPORAN PROSES THREE KNIFE Verified');
        return redirect()->route('laporan_proses_three')->with('custom_success', 'LAPORAN PROSES THREE KNIFE has been Successfully Verified!');
    }

    public function approve_decline(Request $request, $id){
        if (!Auth::user()->hasPermissionTo('LAPORAN PROSES THREE KNIFE Verify')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $laporan_proses_three = LaporanProsesThree::find($id);
        $laporan_proses_three->status = 'declined';
        $laporan_proses_three->save();
        Helper::logSystemActivity('LAPORAN PROSES THREE KNIFE', 'LAPORAN PROSES THREE KNIFE Declined');
        return redirect()->route('laporan_proses_three')->with('custom_success', 'LAPORAN PROSES THREE KNIFE has been Successfully Declined!');
    }

    public function delete($id){
        // dd($id);
        if (!Auth::user()->hasPermissionTo('LAPORAN PROSES THREE KNIFE Delete')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $laporan_proses_three = LaporanProsesThree::find($id);

        LaporanProsesThreeC::where('proses_three_id', '=', $id)->delete();
        $laporan_proses_three->delete();
        Helper::logSystemActivity('LAPORAN PROSES THREE KNIFE', 'LAPORAN PROSES THREE KNIFE Delete');
        return redirect()->route('laporan_proses_three')->with('custom_success', 'LAPORAN PROSES THREE KNIFE has been Successfully Deleted!');
    }
}
