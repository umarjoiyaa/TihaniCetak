<?php

namespace App\Http\Controllers;
use App\Helpers\Helper;
use App\Models\ProsesPencetakan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProsesPencetakanController extends Controller
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

            $query = ProsesPencetakan::select('id', 'sale_order_id', 'date', 'time', 'mesin', 'status')->with('sale_order');

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
                    $actions = '<a class="dropdown-item" href="' . route('proses_pencetakan.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('proses_pencetakan.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('proses_pencetakan.verify', $row->id) . '">Verify</a>
                    <a class="dropdown-item"  id="swal-warning" data-delete="' . route('proses_pencetakan.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'verified') {
                    $row->status = '<span class="badge badge-success">Verified</span>';
                    $actions = '<a class="dropdown-item" href="' . route('proses_pencetakan.view', $row->id) . '">View</a>
                                <a class="dropdown-item"  id="swal-warning" data-delete="' . route('proses_pencetakan.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'declined') {
                    $row->status = '<span class="badge badge-danger">Declined</span>';
                    $actions = '<a class="dropdown-item" href="' . route('proses_pencetakan.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('proses_pencetakan.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('proses_pencetakan.verify', $row->id) . '">Verify</a>
                    <a class="dropdown-item"  id="swal-warning" data-delete="' . route('proses_pencetakan.delete', $row->id) . '">Delete</a>';
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

            $query = ProsesPencetakan::select('id', 'sale_order_id', 'date', 'time', 'mesin', 'status')->with('sale_order');

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
                    $actions = '<a class="dropdown-item" href="' . route('proses_pencetakan.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('proses_pencetakan.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('proses_pencetakan.verify', $row->id) . '">Verify</a>
                    <a class="dropdown-item"  id="swal-warning" data-delete="' . route('proses_pencetakan.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'verified') {
                    $row->status = '<span class="badge badge-success">Verified</span>';
                    $actions = '<a class="dropdown-item" href="' . route('proses_pencetakan.view', $row->id) . '">View</a>
                                <a class="dropdown-item"  id="swal-warning" data-delete="' . route('proses_pencetakan.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'declined') {
                    $row->status = '<span class="badge badge-danger">Declined</span>';
                    $actions = '<a class="dropdown-item" href="' . route('proses_pencetakan.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('proses_pencetakan.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('proses_pencetakan.verify', $row->id) . '">Verify</a>
                    <a class="dropdown-item"  id="swal-warning" data-delete="' . route('proses_pencetakan.delete', $row->id) . '">Delete</a>';
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
            Auth::user()->hasPermissionTo('PROSES PENCETAKAN List') ||
            Auth::user()->hasPermissionTo('PROSES PENCETAKAN Create') ||
            Auth::user()->hasPermissionTo('PROSES PENCETAKAN Update') ||
            Auth::user()->hasPermissionTo('PROSES PENCETAKAN View') ||
            Auth::user()->hasPermissionTo('PROSES PENCETAKAN Delete') ||
            Auth::user()->hasPermissionTo('PROSES PENCETAKAN Verify')
        ) {
            Helper::logSystemActivity('PROSES PENCETAKAN', 'PROSES PENCETAKAN List');
            return view('Mes.ProsesPencetakan.index');
        }
        return back()->with('custom_errors', 'You don`t have Right Permission');
    }

    public function create(){
        if (!Auth::user()->hasPermissionTo('PROSES PENCETAKAN Create')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        Helper::logSystemActivity('PROSES PENCETAKAN', 'PROSES PENCETAKAN Create');
        return view('Mes.ProsesPencetakan.create');
    }

    public function store(Request $request)
    {
        if (!Auth::user()->hasPermissionTo('PROSES PENCETAKAN Create')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $validator = null;

        $validatedData = $request->validate([
            'sale_order' => 'required',
            'date' => 'required',
            'time' => 'required',
            'mesin' => 'required',
            'jenis' => 'required',
            'seksyen_no' => 'required',
            'side' => 'required'
        ]);

        // If validations fail
        if (!$validatedData) {
            return redirect()->back()
                ->withErrors($validator)->withInput();
        }

        $proses_pencetakan = new ProsesPencetakan();
        $proses_pencetakan->sale_order_id = $request->sale_order;
        $proses_pencetakan->date = $request->date;
        $proses_pencetakan->time = $request->time;
        $proses_pencetakan->created_by = Auth::user()->id;

        $proses_pencetakan->seksyen_no = $request->seksyen_no;
        $proses_pencetakan->mesin = $request->mesin;
        $proses_pencetakan->jenis = $request->jenis;
        $proses_pencetakan->side = $request->side;

        $proses_pencetakan->b_1 = $request->b_1;
        $proses_pencetakan->b_2 = $request->b_2;
        $proses_pencetakan->b_3 = $request->b_3;
        $proses_pencetakan->b_4 = $request->b_4;
        $proses_pencetakan->b_5 = $request->b_5;
        $proses_pencetakan->b_6 = $request->b_6;
        $proses_pencetakan->b_7 = $request->b_7;
        $proses_pencetakan->b_8 = $request->b_8;
        $proses_pencetakan->b_9 = $request->b_9;
        $proses_pencetakan->b_10 = $request->b_10;
        $proses_pencetakan->b_11 = $request->b_11;
        $proses_pencetakan->b_12 = $request->b_12;
        $proses_pencetakan->b_13 = $request->b_13;
        $proses_pencetakan->b_14 = $request->b_14;
        $proses_pencetakan->b_15 = $request->b_15;
        $proses_pencetakan->b_16 = $request->b_16;
        $proses_pencetakan->b_17 = $request->b_17;
        $proses_pencetakan->b_18 = $request->b_18;

        $proses_pencetakan->status = 'checked';
        $proses_pencetakan->save();

        Helper::logSystemActivity('PROSES PENCETAKAN', 'PROSES PENCETAKAN Store');
        return redirect()->route('proses_pencetakan')->with('custom_success', 'PROSES PENCETAKAN has been Created Successfully !');
    }

    public function edit($id){
        if (!Auth::user()->hasPermissionTo('PROSES PENCETAKAN Update')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $proses_pencetakan = ProsesPencetakan::find($id);
        Helper::logSystemActivity('PROSES PENCETAKAN', 'PROSES PENCETAKAN Update');
        return view('Mes.ProsesPencetakan.edit', compact('proses_pencetakan'));
    }

    public function view($id){
        if (!Auth::user()->hasPermissionTo('PROSES PENCETAKAN View')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $proses_pencetakan = ProsesPencetakan::find($id);
        Helper::logSystemActivity('PROSES PENCETAKAN', 'PROSES PENCETAKAN View');
        return view('Mes.ProsesPencetakan.view', compact('proses_pencetakan'));
    }

    public function update(Request $request, $id)
    {
        if (!Auth::user()->hasPermissionTo('PROSES PENCETAKAN Update')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $validator = null;

        $validatedData = $request->validate([
            'sale_order' => 'required',
            'date' => 'required',
            'time' => 'required',
            'mesin' => 'required',
            'jenis' => 'required',
            'seksyen_no' => 'required',
            'side' => 'required'
        ]);

        // If validations fail
        if (!$validatedData) {
            return redirect()->back()
                ->withErrors($validator)->withInput();
        }

        $proses_pencetakan = ProsesPencetakan::find($id);
        $proses_pencetakan->sale_order_id = $request->sale_order;
        $proses_pencetakan->date = $request->date;
        $proses_pencetakan->time = $request->time;
        $proses_pencetakan->created_by = Auth::user()->id;

        $proses_pencetakan->seksyen_no = $request->seksyen_no;
        $proses_pencetakan->mesin = $request->mesin;
        $proses_pencetakan->jenis = $request->jenis;
        $proses_pencetakan->side = $request->side;

        $proses_pencetakan->b_1 = $request->b_1;
        $proses_pencetakan->b_2 = $request->b_2;
        $proses_pencetakan->b_3 = $request->b_3;
        $proses_pencetakan->b_4 = $request->b_4;
        $proses_pencetakan->b_5 = $request->b_5;
        $proses_pencetakan->b_6 = $request->b_6;
        $proses_pencetakan->b_7 = $request->b_7;
        $proses_pencetakan->b_8 = $request->b_8;
        $proses_pencetakan->b_9 = $request->b_9;
        $proses_pencetakan->b_10 = $request->b_10;
        $proses_pencetakan->b_11 = $request->b_11;
        $proses_pencetakan->b_12 = $request->b_12;
        $proses_pencetakan->b_13 = $request->b_13;
        $proses_pencetakan->b_14 = $request->b_14;
        $proses_pencetakan->b_15 = $request->b_15;
        $proses_pencetakan->b_16 = $request->b_16;
        $proses_pencetakan->b_17 = $request->b_17;
        $proses_pencetakan->b_18 = $request->b_18;

        $proses_pencetakan->status = 'checked';
        $proses_pencetakan->save();

        Helper::logSystemActivity('PROSES PENCETAKAN', 'PROSES PENCETAKAN Update');
        return redirect()->route('proses_pencetakan')->with('custom_success', 'PROSES PENCETAKAN has been Updated Successfully !');
    }

    public function verify($id){
        if (!Auth::user()->hasPermissionTo('PROSES PENCETAKAN Verify')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $proses_pencetakan = ProsesPencetakan::find($id);
        Helper::logSystemActivity('PROSES PENCETAKAN', 'PROSES PENCETAKAN Update');
        return view('Mes.ProsesPencetakan.verify', compact('proses_pencetakan'));
    }

    public function approve_approve(Request $request, $id){
        if (!Auth::user()->hasPermissionTo('PROSES PENCETAKAN Verify')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $proses_pencetakan = ProsesPencetakan::find($id);
        $proses_pencetakan->status = 'verified';
        $proses_pencetakan->verified_by_date = Carbon::now('Asia/Kuala_Lumpur')->format('d-m-Y h:i:s A');
        $proses_pencetakan->verified_by_user = Auth::user()->user_name;
        $proses_pencetakan->verified_by_designation = (Auth::user()->designation != null) ? Auth::user()->designation->name : 'not assign';
        $proses_pencetakan->verified_by_department = (Auth::user()->department != null) ? Auth::user()->department->name : 'not assign';
        $proses_pencetakan->save();

        Helper::logSystemActivity('PROSES PENCETAKAN', 'PROSES PENCETAKAN Verified');
        return redirect()->route('proses_pencetakan')->with('custom_success', 'PROSES PENCETAKAN has been Successfully Verified!');
    }

    public function approve_decline(Request $request, $id){
        if (!Auth::user()->hasPermissionTo('PROSES PENCETAKAN Verify')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $proses_pencetakan = ProsesPencetakan::find($id);
        $proses_pencetakan->status = 'declined';
        $proses_pencetakan->save();
        Helper::logSystemActivity('PROSES PENCETAKAN', 'PROSES PENCETAKAN Declined');
        return redirect()->route('proses_pencetakan')->with('custom_success', 'PROSES PENCETAKAN has been Successfully Declined!');
    }

    public function delete($id){
        if (!Auth::user()->hasPermissionTo('PROSES PENCETAKAN Delete')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $proses_pencetakan = ProsesPencetakan::find($id);
        $proses_pencetakan->delete();
        Helper::logSystemActivity('PROSES PENCETAKAN', 'PROSES PENCETAKAN Delete');
        return redirect()->route('proses_pencetakan')->with('custom_success', 'PROSES PENCETAKAN has been Successfully Deleted!');
    }
}
