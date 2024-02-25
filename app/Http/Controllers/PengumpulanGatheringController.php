<?php

namespace App\Http\Controllers;
use App\Helpers\Helper;
use App\Models\PengumpulanGathering;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengumpulanGatheringController extends Controller
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

            $query = PengumpulanGathering::select('id', 'sale_order_id', 'date', 'time', 'seksyen_no', 'status', 'b_1', 'b_2', 'b_3', 'b_4', 'b_5', 'b_6', 'b_7')->with('sale_order');

            // Apply search if a search term is provided
            if (!empty($search)) {
                $searchLower = strtolower($search);
                $query->where(function ($q) use ($searchLower) {
                    $q
                        ->where('date', 'like', '%' . $searchLower . '%')
                        ->orWhere('time', 'like', '%' . $searchLower . '%')
                        ->oWhere('seksyen_no', 'like', '%' . $searchLower . '%')
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('order_no', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('kod_buku', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('description', 'like', '%' . $searchLower . '%');
                        })
                        ->oWhere('b_1', 'like', '%' . $searchLower . '%')
                        ->oWhere('b_2', 'like', '%' . $searchLower . '%')
                        ->oWhere('b_3', 'like', '%' . $searchLower . '%')
                        ->oWhere('b_4', 'like', '%' . $searchLower . '%')
                        ->oWhere('b_5', 'like', '%' . $searchLower . '%')
                        ->oWhere('b_6', 'like', '%' . $searchLower . '%')
                        ->oWhere('b_7', 'like', '%' . $searchLower . '%')
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
                    7 => 'b_1',
                    8 => 'b_2',
                    9 => 'b_3',
                    10 => 'b_4',
                    11 => 'b_5',
                    12 => 'b_6',
                    13 => 'b_7',
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
                                    $q->where('b_5', 'like', '%' . $searchLower . '%');
                                    break;
                                case 12:
                                    $q->where('b_6', 'like', '%' . $searchLower . '%');
                                    break;
                                case 13:
                                    $q->where('b_7', 'like', '%' . $searchLower . '%');
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
                    $actions = '<a class="dropdown-item" href="' . route('pengumpulan_gathering.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('pengumpulan_gathering.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('pengumpulan_gathering.verify', $row->id) . '">Verify</a>
                    <a class="dropdown-item" id="swal-warning" data-delete="' . route('pengumpulan_gathering.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'verified') {
                    $row->status = '<span class="badge badge-success">Verified</span>';
                    $actions = '<a class="dropdown-item" href="' . route('pengumpulan_gathering.view', $row->id) . '">View</a>
                                <a class="dropdown-item" id="swal-warning" data-delete="' . route('pengumpulan_gathering.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'declined') {
                    $row->status = '<span class="badge badge-danger">Declined</span>';
                    $actions = '<a class="dropdown-item" href="' . route('pengumpulan_gathering.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('pengumpulan_gathering.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('pengumpulan_gathering.verify', $row->id) . '">Verify</a>
                    <a class="dropdown-item" id="swal-warning" data-delete="' . route('pengumpulan_gathering.delete', $row->id) . '">Delete</a>';
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

            $query = PengumpulanGathering::select('id', 'sale_order_id', 'date', 'time', 'seksyen_no', 'status', 'b_1', 'b_2', 'b_3', 'b_4', 'b_5', 'b_6', 'b_7')->with('sale_order');

            // Apply search if a search term is provided
            if (!empty($search)) {
                $searchLower = strtolower($search);
                $query->where(function ($q) use ($searchLower) {
                    $q
                        ->where('date', 'like', '%' . $searchLower . '%')
                        ->orWhere('time', 'like', '%' . $searchLower . '%')
                        ->oWhere('seksyen_no', 'like', '%' . $searchLower . '%')
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('order_no', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('kod_buku', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('description', 'like', '%' . $searchLower . '%');
                        })
                        ->oWhere('b_1', 'like', '%' . $searchLower . '%')
                        ->oWhere('b_2', 'like', '%' . $searchLower . '%')
                        ->oWhere('b_3', 'like', '%' . $searchLower . '%')
                        ->oWhere('b_4', 'like', '%' . $searchLower . '%')
                        ->oWhere('b_5', 'like', '%' . $searchLower . '%')
                        ->oWhere('b_6', 'like', '%' . $searchLower . '%')
                        ->oWhere('b_7', 'like', '%' . $searchLower . '%')
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
                7 => 'b_1',
                8 => 'b_2',
                9 => 'b_3',
                10 => 'b_4',
                11 => 'b_5',
                12 => 'b_6',
                13 => 'b_7',
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
                    $actions = '<a class="dropdown-item" href="' . route('pengumpulan_gathering.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('pengumpulan_gathering.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('pengumpulan_gathering.verify', $row->id) . '">Verify</a>
                    <a class="dropdown-item" id="swal-warning" data-delete="' . route('pengumpulan_gathering.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'verified') {
                    $row->status = '<span class="badge badge-success">Verified</span>';
                    $actions = '<a class="dropdown-item" href="' . route('pengumpulan_gathering.view', $row->id) . '">View</a>
                                <a class="dropdown-item" id="swal-warning" data-delete="' . route('pengumpulan_gathering.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'declined') {
                    $row->status = '<span class="badge badge-danger">Declined</span>';
                    $actions = '<a class="dropdown-item" href="' . route('pengumpulan_gathering.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('pengumpulan_gathering.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('pengumpulan_gathering.verify', $row->id) . '">Verify</a>
                    <a class="dropdown-item" id="swal-warning" data-delete="' . route('pengumpulan_gathering.delete', $row->id) . '">Delete</a>';
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
            Auth::user()->hasPermissionTo('PENGUMPULAN GATHERING List') ||
            Auth::user()->hasPermissionTo('PENGUMPULAN GATHERING Create') ||
            Auth::user()->hasPermissionTo('PENGUMPULAN GATHERING Update') ||
            Auth::user()->hasPermissionTo('PENGUMPULAN GATHERING View') ||
            Auth::user()->hasPermissionTo('PENGUMPULAN GATHERING Delete') ||
            Auth::user()->hasPermissionTo('PENGUMPULAN GATHERING Verify')
        ) {
            Helper::logSystemActivity('PENGUMPULAN GATHERING', 'PENGUMPULAN GATHERING List');
            return view('Mes.PengumpulanGathering.index');
        }
        return back()->with('custom_errors', 'You don`t have Right Permission');
    }

    public function create(){
        if (!Auth::user()->hasPermissionTo('PENGUMPULAN GATHERING Create')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        Helper::logSystemActivity('PENGUMPULAN GATHERING', 'PENGUMPULAN GATHERING Create');
        return view('Mes.PengumpulanGathering.create');
    }

    public function store(Request $request)
    {
        if (!Auth::user()->hasPermissionTo('PENGUMPULAN GATHERING Create')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $validator = null;

        $validatedData = $request->validate([
            'sale_order' => 'required',
            'date' => 'required',
            'time' => 'required',
            'seksyen_no' => 'required'
        ]);

        // If validations fail
        if (!$validatedData) {
            return redirect()->back()
                ->withErrors($validator)->withInput();
        }


        $carbonTime = Carbon::createFromFormat('H:i', $request->time);
        $timeIn12HourFormat = $carbonTime->format('h:i A');

        $pengumpulan_gathering = new PengumpulanGathering();
        $pengumpulan_gathering->sale_order_id = $request->sale_order;
        $pengumpulan_gathering->date = $request->date;
        $pengumpulan_gathering->time = $timeIn12HourFormat;
        $pengumpulan_gathering->created_by = Auth::user()->id;

        $pengumpulan_gathering->seksyen_no = $request->seksyen_no;

        $pengumpulan_gathering->b_1 = $request->b_1;
        $pengumpulan_gathering->b_2 = $request->b_2;
        $pengumpulan_gathering->b_3 = $request->b_3;
        $pengumpulan_gathering->b_4 = $request->b_4;
        $pengumpulan_gathering->b_5 = $request->b_5;
        $pengumpulan_gathering->b_6 = $request->b_6;
        $pengumpulan_gathering->b_7 = $request->b_7;

        $pengumpulan_gathering->status = 'checked';
        $pengumpulan_gathering->save();

        Helper::logSystemActivity('PENGUMPULAN GATHERING', 'PENGUMPULAN GATHERING Store');
        return redirect()->route('pengumpulan_gathering')->with('custom_success', 'PENGUMPULAN GATHERING has been Created Successfully !');
    }

    public function edit($id){
        if (!Auth::user()->hasPermissionTo('PENGUMPULAN GATHERING Update')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $pengumpulan_gathering = PengumpulanGathering::find($id);
        Helper::logSystemActivity('PENGUMPULAN GATHERING', 'PENGUMPULAN GATHERING Update');
        return view('Mes.PengumpulanGathering.edit', compact('pengumpulan_gathering'));
    }

    public function view($id){
        if (!Auth::user()->hasPermissionTo('PENGUMPULAN GATHERING View')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $pengumpulan_gathering = PengumpulanGathering::find($id);
        Helper::logSystemActivity('PENGUMPULAN GATHERING', 'PENGUMPULAN GATHERING View');
        return view('Mes.PengumpulanGathering.view', compact('pengumpulan_gathering'));
    }

    public function update(Request $request, $id)
    {
        if (!Auth::user()->hasPermissionTo('PENGUMPULAN GATHERING Update')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $validator = null;

        $validatedData = $request->validate([
            'sale_order' => 'required',
            'date' => 'required',
            'time' => 'required',
            'seksyen_no' => 'required'
        ]);

        // If validations fail
        if (!$validatedData) {
            return redirect()->back()
                ->withErrors($validator)->withInput();
        }

        $carbonTime = Carbon::createFromFormat('H:i', $request->time);
        $timeIn12HourFormat = $carbonTime->format('h:i A');


        $pengumpulan_gathering = PengumpulanGathering::find($id);
        $pengumpulan_gathering->sale_order_id = $request->sale_order;
        $pengumpulan_gathering->date = $request->date;
        $pengumpulan_gathering->time = $timeIn12HourFormat;
        $pengumpulan_gathering->created_by = Auth::user()->id;

        $pengumpulan_gathering->seksyen_no = $request->seksyen_no;

        $pengumpulan_gathering->b_1 = $request->b_1;
        $pengumpulan_gathering->b_2 = $request->b_2;
        $pengumpulan_gathering->b_3 = $request->b_3;
        $pengumpulan_gathering->b_4 = $request->b_4;
        $pengumpulan_gathering->b_5 = $request->b_5;
        $pengumpulan_gathering->b_6 = $request->b_6;
        $pengumpulan_gathering->b_7 = $request->b_7;

        $pengumpulan_gathering->status = 'checked';
        $pengumpulan_gathering->save();

        Helper::logSystemActivity('PENGUMPULAN GATHERING', 'PENGUMPULAN GATHERING Update');
        return redirect()->route('pengumpulan_gathering')->with('custom_success', 'PENGUMPULAN GATHERING has been Updated Successfully !');
    }

    public function verify($id){
        if (!Auth::user()->hasPermissionTo('PENGUMPULAN GATHERING Verify')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $pengumpulan_gathering = PengumpulanGathering::find($id);
        Helper::logSystemActivity('PENGUMPULAN GATHERING', 'PENGUMPULAN GATHERING Update');
        return view('Mes.PengumpulanGathering.verify', compact('pengumpulan_gathering'));
    }

    public function approve_approve(Request $request, $id){
        if (!Auth::user()->hasPermissionTo('PENGUMPULAN GATHERING Verify')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $pengumpulan_gathering = PengumpulanGathering::find($id);
        $pengumpulan_gathering->status = 'verified';
        $pengumpulan_gathering->verified_by_date = Carbon::now('Asia/Kuala_Lumpur')->format('d-m-Y h:i:s A');
        $pengumpulan_gathering->verified_by_user = Auth::user()->user_name;
        $pengumpulan_gathering->verified_by_designation = (Auth::user()->designation != null) ? Auth::user()->designation->name : 'not assign';
        $pengumpulan_gathering->verified_by_department = (Auth::user()->department != null) ? Auth::user()->department->name : 'not assign';
        $pengumpulan_gathering->save();

        Helper::logSystemActivity('PENGUMPULAN GATHERING', 'PENGUMPULAN GATHERING Verified');
        return redirect()->route('pengumpulan_gathering')->with('custom_success', 'PENGUMPULAN GATHERING has been Successfully Verified!');
    }

    public function approve_decline(Request $request, $id){
        if (!Auth::user()->hasPermissionTo('PENGUMPULAN GATHERING Verify')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $pengumpulan_gathering = PengumpulanGathering::find($id);
        $pengumpulan_gathering->status = 'declined';
        $pengumpulan_gathering->save();
        Helper::logSystemActivity('PENGUMPULAN GATHERING', 'PENGUMPULAN GATHERING Declined');
        return redirect()->route('pengumpulan_gathering')->with('custom_success', 'PENGUMPULAN GATHERING has been Successfully Declined!');
    }

    public function delete($id){
        if (!Auth::user()->hasPermissionTo('PENGUMPULAN GATHERING Delete')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $pengumpulan_gathering = PengumpulanGathering::find($id);
        $pengumpulan_gathering->delete();
        Helper::logSystemActivity('PENGUMPULAN GATHERING', 'PENGUMPULAN GATHERING Delete');
        return redirect()->route('pengumpulan_gathering')->with('custom_success', 'PENGUMPULAN GATHERING has been Successfully Deleted!');
    }
}
