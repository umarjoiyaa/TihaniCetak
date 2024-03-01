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

            $query = ProsesPencetakan::select('id', 'sale_order_id', 'date', 'time', 'mesin', 'b_1','b_2','b_3','b_4','b_5','b_6','b_7','b_8','b_9','b_10','b_11','b_12','b_13','b_14','b_15','b_16','b_17','b_18','status')->with('sale_order');

            // Apply search if a search term is provided
            if (!empty($search)) {
                $searchLower = strtolower($search);
                $query->where(function ($q) use ($searchLower) {
                    $q
                        ->where('date', 'like', '%' . $searchLower . '%')
                        ->orWhere('time', 'like', '%' . $searchLower . '%')
                        ->orWhere('mesin', 'like', '%' . $searchLower . '%')
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
                        ->orWhere('b_8', 'like', '%' . $searchLower . '%')
                        ->orWhere('b_9', 'like', '%' . $searchLower . '%')
                        ->orWhere('b_10', 'like', '%' . $searchLower . '%')
                        ->orWhere('b_11', 'like', '%' . $searchLower . '%')
                        ->orWhere('b_12', 'like', '%' . $searchLower . '%')
                        ->orWhere('b_13', 'like', '%' . $searchLower . '%')
                        ->orWhere('b_14', 'like', '%' . $searchLower . '%')
                        ->orWhere('b_15', 'like', '%' . $searchLower . '%')
                        ->orWhere('b_16', 'like', '%' . $searchLower . '%')
                        ->orWhere('b_17', 'like', '%' . $searchLower . '%')
                        ->orWhere('b_18', 'like', '%' . $searchLower . '%')
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
                    7 => 'b_1',
                    8 => 'b_2',
                    9 => 'b_3',
                    10 => 'b_4',
                    11 => 'b_5',
                    12 => 'b_6',
                    13 => 'b_8',
                    14 => 'b_9',
                    15 => 'b_10',
                    16 => 'b_11',
                    17 => 'b_12',
                    18 => 'b_13',
                    19 => 'b_14',
                    20 => 'b_15',
                    21 => 'b_16',
                    22 => 'b_17',
                    23 => 'b_18',
                    24 => 'status',
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
                                $q->where('b_14', 'like', '%' . $searchLower . '%');
                                break;
                            case 20:
                                $q->where('b_15', 'like', '%' . $searchLower . '%');
                                break;
                            case 21:
                                $q->where('b_16', 'like', '%' . $searchLower . '%');
                                break;
                            case 22:
                                $q->where('b_17', 'like', '%' . $searchLower . '%');
                                break;
                            case 23:
                                $q->where('b_18', 'like', '%' . $searchLower . '%');
                                break;
                            case 24:
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

            $query = ProsesPencetakan::select('id', 'sale_order_id', 'date', 'time', 'mesin', 'b_1','b_2','b_3','b_4','b_5','b_6','b_7','b_8','b_9','b_10','b_11','b_12','b_13','b_14','b_15','b_16','b_17','b_18','status')->with('sale_order');

            // Apply search if a search term is provided
            if (!empty($search)) {
                $searchLower = strtolower($search);
                $query->where(function ($q) use ($searchLower) {
                    $q
                    ->where('date', 'like', '%' . $searchLower . '%')
                    ->orWhere('time', 'like', '%' . $searchLower . '%')
                    ->orWhere('mesin', 'like', '%' . $searchLower . '%')
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
                    ->orWhere('b_8', 'like', '%' . $searchLower . '%')
                    ->orWhere('b_9', 'like', '%' . $searchLower . '%')
                    ->orWhere('b_10', 'like', '%' . $searchLower . '%')
                    ->orWhere('b_11', 'like', '%' . $searchLower . '%')
                    ->orWhere('b_12', 'like', '%' . $searchLower . '%')
                    ->orWhere('b_13', 'like', '%' . $searchLower . '%')
                    ->orWhere('b_14', 'like', '%' . $searchLower . '%')
                    ->orWhere('b_15', 'like', '%' . $searchLower . '%')
                    ->orWhere('b_16', 'like', '%' . $searchLower . '%')
                    ->orWhere('b_17', 'like', '%' . $searchLower . '%')
                    ->orWhere('b_18', 'like', '%' . $searchLower . '%')
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
                7 => 'b_1',
                8 => 'b_2',
                9 => 'b_3',
                10 => 'b_4',
                11 => 'b_5',
                12 => 'b_6',
                13 => 'b_8',
                14 => 'b_9',
                15 => 'b_10',
                16 => 'b_11',
                17 => 'b_12',
                18 => 'b_13',
                19 => 'b_14',
                20 => 'b_15',
                21 => 'b_16',
                22 => 'b_17',
                23 => 'b_18',
                24 => 'status',
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

        $carbonTime = Carbon::createFromFormat('H:i', $request->time);
        $timeIn12HourFormat = $carbonTime->format('h:i A');


        $proses_pencetakan = new ProsesPencetakan();
        $proses_pencetakan->sale_order_id = $request->sale_order;
        $proses_pencetakan->date = $request->date;
        $proses_pencetakan->time = $timeIn12HourFormat;
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

        $carbonTime = Carbon::createFromFormat('H:i', $request->time);
        $timeIn12HourFormat = $carbonTime->format('h:i A');


        $proses_pencetakan = ProsesPencetakan::find($id);
        $proses_pencetakan->sale_order_id = $request->sale_order;
        $proses_pencetakan->date = $request->date;
        $proses_pencetakan->time = $timeIn12HourFormat;
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
        $proses_pencetakan->verified_by_designation = (Auth::user()->designations != null) ? Auth::user()->designations->name : 'not assign';
        $proses_pencetakan->verified_by_department = (Auth::user()->departments != null) ? Auth::user()->departments->name : 'not assign';
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
