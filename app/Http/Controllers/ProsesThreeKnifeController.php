<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\ProsesThreeKnife;
use App\Models\SaleOrder;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProsesThreeKnifeController extends Controller
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

            $query = ProsesThreeKnife::select('id', 'sale_order_id', 'date', 'status','time','b_1','b_2','b_3','b_4','b_5','b_6','b_7','b_8','b_9','b_10','b_11','b_12','b_13','machine')->with('sale_order');

            // Apply search if a search term is provided
            if (!empty($search)) {
                $searchLower = strtolower($search);
                $query->where(function ($q) use ($searchLower) {
                    $q
                        ->where('date', 'like', '%' . $searchLower . '%')
                        ->orWhere('time', 'like', '%' . $searchLower . '%')
                        ->orWhere('machine', 'like', '%' . $searchLower . '%')
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
                        ->orWhere('b_6', 'like', '%' . $searchLower . '%')
                        ->orWhere('b_7', 'like', '%' . $searchLower . '%')
                        ->orWhere('b_8', 'like', '%' . $searchLower . '%')
                        ->orWhere('b_9', 'like', '%' . $searchLower . '%')
                        ->orWhere('b_10', 'like', '%' . $searchLower . '%')
                        ->orWhere('b_11', 'like', '%' . $searchLower . '%')
                        ->orWhere('b_12', 'like', '%' . $searchLower . '%')
                        ->orWhere('b_13', 'like', '%' . $searchLower . '%')
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
                    3 => 'machine',
                    4 => 'sale_order_id',
                    5 => 'sale_order_id',
                    6 => 'sale_order_id',
                    7 => 'b_1',
                    8 => 'b_2',
                    9 => 'b_3',
                    10 => 'b_4',
                    11 => 'b_5',
                    12 => 'b_6',
                    13 => 'b_7',
                    14 => 'b_8',
                    15 => 'b_9',
                    16 => 'b_10',
                    17 => 'b_11',
                    18 => 'b_12',
                    19 => 'b_13',
                    20 => 'status',

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
                                $q->where('machine', 'like', '%' . $searchLower . '%');
                                break;

                            case 4:
                                $q->whereHas('sale_order', function ($query) use ($searchLower) {
                                    $query->where('order_no', 'like', '%' . $searchLower . '%');
                                });

                                break;
                            case 5:
                                $q->whereHas('sale_order', function ($query) use ($searchLower) {
                                    $query->where('description', 'like', '%' . $searchLower . '%');
                                });
                                break;
                            case 6:
                                $q->whereHas('sale_order', function ($query) use ($searchLower) {
                                    $query->where('kod_buku', 'like', '%' . $searchLower . '%');
                                });
                                break;
                            case 7:
                                $q->where('b_1', 'like', '%' . $searchLower . '%');
                                break;
                            case 8:
                                $q->where('b_2', 'like', '%' . $searchLower . '%');
                                break;
                            case 9:
                                $q->where('b_3', 'like', '%' . $searchLower . '%');
                                break;
                            case 10:
                                $q->where('b_4', 'like', '%' . $searchLower . '%');
                                break;
                            case 11:
                                $q->where('b_6', 'like', '%' . $searchLower . '%');
                                break;
                            case 12:
                                $q->where('b_7', 'like', '%' . $searchLower . '%');
                                break;
                            case 13:
                                $q->where('b_8', 'like', '%' . $searchLower . '%');
                                break;
                            case 14:
                                $q->where('b_9', 'like', '%' . $searchLower . '%');
                                break;
                            case 15:
                                $q->where('b_10', 'like', '%' . $searchLower . '%');
                                break;
                            case 16:
                                $q->where('b_11', 'like', '%' . $searchLower . '%');
                                break;
                            case 17:
                                $q->where('b_12', 'like', '%' . $searchLower . '%');
                                break;
                            case 18:
                                $q->where('b_13', 'like', '%' . $searchLower . '%');
                                break;
                            case 19:
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
                if ($row->status == 'checked') {
                    $row->status = '<span class="badge badge-warning">Checked</span>';
                    $actions = '<a class="dropdown-item" href="' . route('proses_three_knife.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('proses_three_knife.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('proses_three_knife.verify', $row->id) . '">Verify</a>
                    <a class="dropdown-item" id="swal-warning" data-delete="' . route('proses_three_knife.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'verified') {
                    $row->status = '<span class="badge badge-success">Verified</span>';
                    $actions = '<a class="dropdown-item" href="' . route('proses_three_knife.view', $row->id) . '">View</a>
                                <a class="dropdown-item" id="swal-warning" data-delete="' . route('proses_three_knife.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'declined') {
                    $row->status = '<span class="badge badge-danger">Declined</span>';
                    $actions = '<a class="dropdown-item" href="' . route('proses_three_knife.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('proses_three_knife.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('proses_three_knife.verify', $row->id) . '">Verify</a>
                    <a class="dropdown-item" id="swal-warning" data-delete="' . route('proses_three_knife.delete', $row->id) . '">Delete</a>';
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

            $query = ProsesThreeKnife::select('id', 'sale_order_id', 'machine' , 'date', 'status','time','b_1','b_2','b_3','b_4','b_5','b_6','b_7','b_8','b_9','b_10','b_11','b_12','b_13')->with('sale_order');

            // Apply search if a search term is provided
            if (!empty($search)) {
                $searchLower = strtolower($search);
                $query->where(function ($q) use ($searchLower) {
                    $q
                    ->where('date', 'like', '%' . $searchLower . '%')
                    ->orWhere('time', 'like', '%' . $searchLower . '%')
                    ->orWhere('machine', 'like', '%' . $searchLower . '%')
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
                    ->orWhere('b_6', 'like', '%' . $searchLower . '%')
                    ->orWhere('b_7', 'like', '%' . $searchLower . '%')
                    ->orWhere('b_8', 'like', '%' . $searchLower . '%')
                    ->orWhere('b_9', 'like', '%' . $searchLower . '%')
                    ->orWhere('b_10', 'like', '%' . $searchLower . '%')
                    ->orWhere('b_11', 'like', '%' . $searchLower . '%')
                    ->orWhere('b_12', 'like', '%' . $searchLower . '%')
                    ->orWhere('b_13', 'like', '%' . $searchLower . '%')
                    ->orWhere('status', 'like', '%' . $searchLower . '%');
                    // Add more columns as needed
                });
            }

            $sortableColumns = [
                1 => 'date',
                2 => 'time',
                3 => 'machine',
                4 => 'sale_order_id',
                5 => 'sale_order_id',
                6 => 'sale_order_id',
                7 => 'b_1',
                8 => 'b_2',
                9 => 'b_3',
                10 => 'b_4',
                11 => 'b_6',
                12 => 'b_7',
                13 => 'b_8',
                14 => 'b_9',
                15 => 'b_10',
                16 => 'b_11',
                17 => 'b_12',
                18 => 'b_13',
                19 => 'status',
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
                if ($row->status == 'checked') {
                    $row->status = '<span class="badge badge-warning">Checked</span>';
                    $actions = '<a class="dropdown-item" href="' . route('proses_three_knife.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('proses_three_knife.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('proses_three_knife.verify', $row->id) . '">Verify</a>
                    <a class="dropdown-item" id="swal-warning" data-delete="' . route('proses_three_knife.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'verified') {
                    $row->status = '<span class="badge badge-success">Verified</span>';
                    $actions = '<a class="dropdown-item" href="' . route('proses_three_knife.view', $row->id) . '">View</a>
                                <a class="dropdown-item" id="swal-warning" data-delete="' . route('proses_three_knife.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'declined') {
                    $row->status = '<span class="badge badge-danger">Declined</span>';
                    $actions = '<a class="dropdown-item" href="' . route('proses_three_knife.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('proses_three_knife.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('proses_three_knife.verify', $row->id) . '">Verify</a>
                    <a class="dropdown-item" id="swal-warning" data-delete="' . route('proses_three_knife.delete', $row->id) . '">Delete</a>';
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
            Auth::user()->hasPermissionTo('PROSES THREE KNIFE List') ||
            Auth::user()->hasPermissionTo('PROSES THREE KNIFE Create') ||
            Auth::user()->hasPermissionTo('PROSES THREE KNIFE Update') ||
            Auth::user()->hasPermissionTo('PROSES THREE KNIFE View') ||
            Auth::user()->hasPermissionTo('PROSES THREE KNIFE Delete') ||
            Auth::user()->hasPermissionTo('PROSES THREE KNIFE Verify')
        ) {
            Helper::logSystemActivity('PROSES THREE KNIFE List', 'PROSES THREE KNIFE List');
            return view('Mes.ProsesThreeKnife.index');
        }
        return back()->with('custom_errors', 'You don`t have Right Permission');
    }


    public function create(){
        if (!Auth::user()->hasPermissionTo('PROSES THREE KNIFE Create')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        Helper::logSystemActivity('PROSES THREE KNIFE', 'PROSES THREE KNIFE Create');
        return view('Mes.ProsesThreeKnife.create');
    }

    public function sale_order(Request $request)
    {
        $perPage = 10;
        $page = $request->input('page', 1);
        $search = $request->input('q');

        $query = SaleOrder::select('id', 'order_no')->where('order_status', '=', 'published');
        if ($search) {
            $query->where('order_no', 'like', '%' . $search . '%');
        }
        $heads = $query->paginate($perPage, ['*'], 'page', $page);

        return response()->json([
            'results' => $heads->items(),
            'pagination' => [
                'more' => $heads->hasMorePages(),
            ],
        ]);
    }

    public function sale_order_detail(Request $request)
    {
        $sale_order = SaleOrder::select('id', 'order_no', 'description', 'kod_buku', 'status','size')->where('id', $request->id)->first();
        return response()->json($sale_order);
    }


    public function store(Request $request)
    {
        // dd($request);
        if (!Auth::user()->hasPermissionTo('PROSES THREE KNIFE Create')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $validator = null;

        $validatedData = $request->validate([
            'sale_order' => 'required',
            'date' => 'required',
            'time' => 'required'
        ]);

        // If validations fail
        if (!$validatedData) {
            return redirect()->back()
                ->withErrors($validator)->withInput();
        }

        $carbonTime = Carbon::createFromFormat('H:i', $request->time);
        $timeIn12HourFormat = $carbonTime->format('h:i A');


        $proses_three_knife = new ProsesThreeKnife();
        $proses_three_knife->sale_order_id = $request->sale_order;
        $proses_three_knife->date = $request->date;
        $proses_three_knife->time = $timeIn12HourFormat;
        $proses_three_knife->machine = $request->machine;
        $proses_three_knife->created_by = Auth::user()->id;

        $proses_three_knife->b_1 = $request->b_1;
        $proses_three_knife->b_2 = $request->b_2;
        $proses_three_knife->b_3 = $request->b_3;
        $proses_three_knife->b_4 = $request->b_4;
        $proses_three_knife->b_5 = $request->b_5;
        $proses_three_knife->b_6 = $request->b_6;
        $proses_three_knife->b_7 = $request->b_7;
        $proses_three_knife->b_8 = $request->b_8;
        $proses_three_knife->b_9 = $request->b_9;
        $proses_three_knife->b_10 = $request->b_10;
        $proses_three_knife->b_11 = $request->b_11;
        $proses_three_knife->b_12 = $request->b_12;
        $proses_three_knife->b_13 = $request->b_13;

        $proses_three_knife->status = 'checked';
        $proses_three_knife->save();
        Helper::logSystemActivity('PROSES THREE KNIFE', 'PROSES THREE KNIFE Store');
        return redirect()->route('proses_three_knife')->with('custom_success', 'PROSES THREE KNIFE has been Created Successfully !');
    }
    public function edit($id)
    {
        if (!Auth::user()->hasPermissionTo('PROSES THREE KNIFE Update')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $proses_three_knife = ProsesThreeKnife::find($id);
        Helper::logSystemActivity('PROSES THREE KNIFE', 'PROSES THREE KNIFE Update');
        return view('Mes.ProsesThreeKnife.edit', compact('proses_three_knife'));
    }

    public function view($id)
    {
        if (!Auth::user()->hasPermissionTo('PROSES THREE KNIFE View')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $proses_three_knife = ProsesThreeKnife::find($id);
        Helper::logSystemActivity('PROSES THREE KNIFE', 'PROSES THREE KNIFE View');
        return view('Mes.ProsesThreeKnife.view', compact('proses_three_knife'));
    }

    public function update(Request $request, $id)
    {
        if (!Auth::user()->hasPermissionTo('PROSES THREE KNIFE Update')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $validator = null;

        $validatedData = $request->validate([
            'sale_order' => 'required',
            'date' => 'required',
            'time' => 'required'
        ]);

        // If validations fail
        if (!$validatedData) {
            return redirect()->back()
                ->withErrors($validator)->withInput();
        }


        $carbonTime = Carbon::createFromFormat('H:i', $request->time);
        $timeIn12HourFormat = $carbonTime->format('h:i A');


        $proses_three_knife = ProsesThreeKnife::find($id);
        $proses_three_knife->sale_order_id = $request->sale_order;
        $proses_three_knife->date = $request->date;
        $proses_three_knife->time = $timeIn12HourFormat;
        // $proses_three_knife->machine = $request->machine;
        $proses_three_knife->created_by = Auth::user()->id;

        $proses_three_knife->b_1 = $request->b_1;
        $proses_three_knife->b_2 = $request->b_2;
        $proses_three_knife->b_3 = $request->b_3;
        $proses_three_knife->b_4 = $request->b_4;
        $proses_three_knife->b_5 = $request->b_5;
        $proses_three_knife->b_6 = $request->b_6;
        $proses_three_knife->b_7 = $request->b_7;
        $proses_three_knife->b_8 = $request->b_8;
        $proses_three_knife->b_9 = $request->b_9;
        $proses_three_knife->b_10 = $request->b_10;
        $proses_three_knife->b_11 = $request->b_11;
        $proses_three_knife->b_12 = $request->b_12;
        $proses_three_knife->b_13 = $request->b_13;

        $proses_three_knife->status = 'checked';
        $proses_three_knife->save();
        Helper::logSystemActivity('PROSES THREE KNIFE', 'PROSES THREE KNIFE Update');
        return redirect()->route('proses_three_knife')->with('custom_success', 'PROSES THREE KNIFE has been Updated Successfully !');
    }

    public function verify($id)
    {
        if (!Auth::user()->hasPermissionTo('PROSES THREE KNIFE Verify')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $proses_three_knife = ProsesThreeKnife::find($id);
        Helper::logSystemActivity('PROSES THREE KNIFE', 'PROSES THREE KNIFE Update');
        return view('Mes.ProsesThreeKnife.verify', compact('proses_three_knife'));
    }

    public function approve_approve(Request $request, $id)
    {
        if (!Auth::user()->hasPermissionTo('PROSES THREE KNIFE Verify')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $proses_three_knife = ProsesThreeKnife::find($id);
        $proses_three_knife->status = 'verified';
        $proses_three_knife->verified_by_date = Carbon::now('Asia/Kuala_Lumpur')->format('d-m-Y h:i:s A');
        $proses_three_knife->verified_by_user = Auth::user()->user_name;
        $proses_three_knife->verified_by_designation = (Auth::user()->designation != null) ? Auth::user()->designation->name : 'not assign';
        $proses_three_knife->verified_by_department = (Auth::user()->department != null) ? Auth::user()->department->name : 'not assign';
        $proses_three_knife->save();
        Helper::logSystemActivity('PROSES THREE KNIFE', 'PROSES THREE KNIFE Verified');
        return redirect()->route('proses_three_knife')->with('custom_success', 'PROSES THREE KNIFE has been Successfully Verified!');
    }

    public function approve_decline(Request $request, $id)
    {
        if (!Auth::user()->hasPermissionTo('PROSES THREE KNIFE Verify')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $proses_three_knife = ProsesThreeKnife::find($id);
        $proses_three_knife->status = 'declined';
        $proses_three_knife->save();
        Helper::logSystemActivity('PROSES THREE KNIFE', 'PROSES THREE KNIFE Declined');
        return redirect()->route('proses_three_knife')->with('custom_success', 'PROSES THREE KNIFE has been Successfully Declined!');
    }

    public function delete($id)
    {
        if (!Auth::user()->hasPermissionTo('PROSES THREE KNIFE Delete')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $proses_three_knife = ProsesThreeKnife::find($id);
        $proses_three_knife->delete();
        Helper::logSystemActivity('PROSES THREE KNIFE', 'PROSES THREE KNIFE Delete');
        return redirect()->route('proses_three_knife')->with('custom_success', 'PROSES THREE KNIFE has been Successfully Deleted!');
    }
}
