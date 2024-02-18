<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\POD;
use App\Models\SaleOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class PODController extends Controller
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

            $query = pod::select('id', 'sale_order_id', 'date', 'status','time','file_artwork_1','file_artwork_2','file_artwork_3','file_artwork_4','file_artwork_5','file_artwork_6','file_artwork_7','first_piece_1','first_piece_2','first_piece_3','first_piece_4','first_piece_5','first_piece_6','first_piece_7','first_piece_8','first_piece_9','first_piece_10','first_piece_11')->with('sale_order');

            // Apply search if a search term is provided
            if (!empty($search)) {
                $searchLower = strtolower($search);
                $query->where(function ($q) use ($searchLower) {
                    $q
                        ->where('date', 'like', '%' . $searchLower . '%')
                        ->where('time', 'like', '%' . $searchLower . '%')
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('order_no', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('kod_buku', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('description', 'like', '%' . $searchLower . '%');
                        })
                        ->where('file_artwork_1', 'like', '%' . $searchLower . '%')
                        ->where('file_artwork_2', 'like', '%' . $searchLower . '%')
                        ->where('file_artwork_3', 'like', '%' . $searchLower . '%')
                        ->where('file_artwork_4', 'like', '%' . $searchLower . '%')
                        ->where('file_artwork_5', 'like', '%' . $searchLower . '%')
                        ->where('file_artwork_6', 'like', '%' . $searchLower . '%')
                        ->where('file_artwork_7', 'like', '%' . $searchLower . '%')
                        ->where('first_piece_1', 'like', '%' . $searchLower . '%')
                        ->where('first_piece_2', 'like', '%' . $searchLower . '%')
                        ->where('first_piece_3', 'like', '%' . $searchLower . '%')
                        ->where('first_piece_4', 'like', '%' . $searchLower . '%')
                        ->where('first_piece_5', 'like', '%' . $searchLower . '%')
                        ->where('first_piece_6', 'like', '%' . $searchLower . '%')
                        ->where('first_piece_7', 'like', '%' . $searchLower . '%')
                        ->where('first_piece_8', 'like', '%' . $searchLower . '%')
                        ->where('first_piece_9', 'like', '%' . $searchLower . '%')
                        ->where('first_piece_10', 'like', '%' . $searchLower . '%')
                        ->where('first_piece_11', 'like', '%' . $searchLower . '%')

                        ->where('status', 'like', '%' . $searchLower . '%');
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
                    6 => 'file_artwork_1',
                    7 => 'file_artwork_2',
                    8 => 'file_artwork_3',
                    9 => 'file_artwork_4',
                    10 => 'file_artwork_5',
                    11 => 'file_artwork_6',
                    12 => 'file_artwork_7',
                    13 => 'first_piece_1',
                    14 => 'first_piece_2',
                    15 => 'first_piece_3',
                    16 => 'first_piece_4',
                    17 => 'first_piece_5',
                    18 => 'first_piece_6',
                    19 => 'first_piece_7',
                    20 => 'first_piece_8',
                    21 => 'first_piece_9',
                    22 => 'first_piece_10',
                    23 => 'first_piece_11',
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
                                $q->whereHas('sale_order', function ($query) use ($searchLower) {
                                    $query->where('order_no', 'like', '%' . $searchLower . '%');
                                });

                                break;
                            case 4:
                                $q->whereHas('sale_order', function ($query) use ($searchLower) {
                                    $query->where('description', 'like', '%' . $searchLower . '%');
                                });
                                break;
                            case 5:
                                $q->whereHas('sale_order', function ($query) use ($searchLower) {
                                    $query->where('kod_buku', 'like', '%' . $searchLower . '%');
                                });
                                break;
                            case 6:
                                $q->where('file_artwork_1', 'like', '%' . $searchLower . '%');
                                break;
                            case 7:
                                $q->where('file_artwork_2', 'like', '%' . $searchLower . '%');
                                break;
                            case 8:
                                $q->where('file_artwork_3', 'like', '%' . $searchLower . '%');
                                break;
                            case 9:
                                $q->where('file_artwork_4', 'like', '%' . $searchLower . '%');
                                break;
                            case 10:
                                $q->where('file_artwork_5', 'like', '%' . $searchLower . '%');
                                break;
                            case 11:
                                $q->where('file_artwork_6', 'like', '%' . $searchLower . '%');
                                break;
                            case 12:
                                $q->where('file_artwork_7', 'like', '%' . $searchLower . '%');
                                break;
                            case 13:
                                $q->where('first_piece_1', 'like', '%' . $searchLower . '%');
                                break;
                            case 14:
                                $q->where('first_piece_2', 'like', '%' . $searchLower . '%');
                                break;
                            case 15:
                                $q->where('first_piece_3', 'like', '%' . $searchLower . '%');
                                break;
                            case 16:
                                $q->where('first_piece_4', 'like', '%' . $searchLower . '%');
                                break;
                            case 17:
                                $q->where('first_piece_5', 'like', '%' . $searchLower . '%');
                                break;
                            case 18:
                                $q->where('first_piece_6', 'like', '%' . $searchLower . '%');
                                break;
                            case 19:
                                $q->where('first_piece_7', 'like', '%' . $searchLower . '%');
                                break;
                            case 20:
                                $q->where('first_piece_8', 'like', '%' . $searchLower . '%');
                                break;
                            case 21:
                                $q->where('first_piece_9', 'like', '%' . $searchLower . '%');
                                break;
                            case 22:
                                $q->where('first_piece_10', 'like', '%' . $searchLower . '%');
                                break;
                            case 23:
                                $q->where('first_piece_11', 'like', '%' . $searchLower . '%');
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
                    $actions = '<a class="dropdown-item" href="' . route('pod.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('pod.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('pod.verify', $row->id) . '">Verify</a>
                    <a class="dropdown-item" href="' . route('pod.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'verified') {
                    $row->status = '<span class="badge badge-success">Verified</span>';
                    $actions = '<a class="dropdown-item" href="' . route('pod.view', $row->id) . '">View</a>
                                <a class="dropdown-item" href="' . route('pod.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'declined') {
                    $row->status = '<span class="badge badge-danger">Declined</span>';
                    $actions = '<a class="dropdown-item" href="' . route('pod.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('pod.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('pod.verify', $row->id) . '">Verify</a>
                    <a class="dropdown-item" href="' . route('pod.delete', $row->id) . '">Delete</a>';
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

            $query = pod::select('id', 'sale_order_id', 'date', 'status','time','file_artwork_1','file_artwork_2','file_artwork_3','file_artwork_4','file_artwork_5','file_artwork_6','file_artwork_7','first_piece_1','first_piece_2','first_piece_3','first_piece_4','first_piece_5','first_piece_6','first_piece_7','first_piece_8','first_piece_9','first_piece_10','first_piece_11')->with('sale_order');

            // Apply search if a search term is provided
            if (!empty($search)) {
                $searchLower = strtolower($search);
                $query->where(function ($q) use ($searchLower) {
                    $q
                        ->where('date', 'like', '%' . $searchLower . '%')
                        ->where('time', 'like', '%' . $searchLower . '%')
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('order_no', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('kod_buku', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('description', 'like', '%' . $searchLower . '%');
                        })
                        ->where('file_artwork_1', 'like', '%' . $searchLower . '%')
                        ->where('file_artwork_2', 'like', '%' . $searchLower . '%')
                        ->where('file_artwork_3', 'like', '%' . $searchLower . '%')
                        ->where('file_artwork_4', 'like', '%' . $searchLower . '%')
                        ->where('file_artwork_5', 'like', '%' . $searchLower . '%')
                        ->where('file_artwork_6', 'like', '%' . $searchLower . '%')
                        ->where('file_artwork_7', 'like', '%' . $searchLower . '%')
                        ->where('first_piece_1', 'like', '%' . $searchLower . '%')
                        ->where('first_piece_2', 'like', '%' . $searchLower . '%')
                        ->where('first_piece_3', 'like', '%' . $searchLower . '%')
                        ->where('first_piece_4', 'like', '%' . $searchLower . '%')
                        ->where('first_piece_5', 'like', '%' . $searchLower . '%')
                        ->where('first_piece_6', 'like', '%' . $searchLower . '%')
                        ->where('first_piece_7', 'like', '%' . $searchLower . '%')
                        ->where('first_piece_8', 'like', '%' . $searchLower . '%')
                        ->where('first_piece_9', 'like', '%' . $searchLower . '%')
                        ->where('first_piece_10', 'like', '%' . $searchLower . '%')
                        ->where('first_piece_11', 'like', '%' . $searchLower . '%')

                        ->where('status', 'like', '%' . $searchLower . '%');
                    // Add more columns as needed
                });
            }

            $sortableColumns = [
                1 => 'date',
                2 => 'time',
                3 => 'sale_order_id',
                4 => 'sale_order_id',
                5 => 'sale_order_id',
                6 => 'file_artwork_1',
                7 => 'file_artwork_2',
                8 => 'file_artwork_3',
                9 => 'file_artwork_4',
                10 => 'file_artwork_5',
                11 => 'file_artwork_6',
                12 => 'file_artwork_7',
                13 => 'first_piece_1',
                14 => 'first_piece_2',
                15 => 'first_piece_3',
                16 => 'first_piece_4',
                17 => 'first_piece_5',
                18 => 'first_piece_6',
                19 => 'first_piece_7',
                20 => 'first_piece_8',
                21 => 'first_piece_9',
                22 => 'first_piece_10',
                23 => 'first_piece_11',
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
                    $actions = '<a class="dropdown-item" href="' . route('pod.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('pod.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('pod.verify', $row->id) . '">Verify</a>
                    <a class="dropdown-item" href="' . route('pod.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'verified') {
                    $row->status = '<span class="badge badge-success">Verified</span>';
                    $actions = '<a class="dropdown-item" href="' . route('pod.view', $row->id) . '">View</a>
                                <a class="dropdown-item" href="' . route('pod.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'declined') {
                    $row->status = '<span class="badge badge-danger">Declined</span>';
                    $actions = '<a class="dropdown-item" href="' . route('pod.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('pod.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('pod.verify', $row->id) . '">Verify</a>
                    <a class="dropdown-item" href="' . route('pod.delete', $row->id) . '">Delete</a>';
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
            Auth::user()->hasPermissionTo('POD List') ||
            Auth::user()->hasPermissionTo('POD Create') ||
            Auth::user()->hasPermissionTo('POD Update') ||
            Auth::user()->hasPermissionTo('POD View') ||
            Auth::user()->hasPermissionTo('POD Delete') ||
            Auth::user()->hasPermissionTo('POD Verify')
        ) {
            Helper::logSystemActivity('POD List', 'POD List');
            return view('Mes.Pod.index');
        }
        return back()->with('custom_errors', 'You don`t have Right Permission');
    }


    public function create(){
        if (!Auth::user()->hasPermissionTo('POD Create')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        Helper::logSystemActivity('POD', 'POD Create');
        return view('Mes.pod.create');
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
        $sale_order = SaleOrder::select('id', 'order_no', 'description', 'kod_buku', 'status')->where('id', $request->id)->first();
        return response()->json($sale_order);
    }


    public function store(Request $request)
    {
        // dd($request);
        if (!Auth::user()->hasPermissionTo('POD Create')) {
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

        $pod = new POD();
        $pod->sale_order_id = $request->sale_order;
        $pod->date = $request->date;
        $pod->time = $request->time;
        $pod->created_by = Auth::user()->id;

        $pod->file_artwork_1 = $request->file_artwork_1;
        $pod->file_artwork_2 = $request->file_artwork_2;
        $pod->file_artwork_3 = $request->file_artwork_3;
        $pod->file_artwork_4 = $request->file_artwork_4;
        $pod->file_artwork_5 = $request->file_artwork_5;
        $pod->file_artwork_6 = $request->file_artwork_6;
        $pod->file_artwork_7 = $request->file_artwork_7;



        $pod->first_piece_1 = $request->first_piece_1;
        $pod->first_piece_2 = $request->first_piece_2;
        $pod->first_piece_3 = $request->first_piece_3;
        $pod->first_piece_4 = $request->first_piece_4;
        $pod->first_piece_5 = $request->first_piece_5;
        $pod->first_piece_6 = $request->first_piece_6;
        $pod->first_piece_7 = $request->first_piece_7;
        $pod->first_piece_8 = $request->first_piece_8;
        $pod->first_piece_9 = $request->first_piece_9;
        $pod->first_piece_10 = $request->first_piece_10;
        // dd($request->first_piece_11);
        $pod->first_piece_11 = $request->first_piece_11;

        $pod->status = 'checked';
        $pod->save();
        Helper::logSystemActivity('POD', 'POD Store');
        return redirect()->route('pod')->with('custom_success', 'POD has been Created Successfully !');
    }

    public function edit($id)
    {
        if (!Auth::user()->hasPermissionTo('POD Update')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $pod = POD::find($id);
        Helper::logSystemActivity('POD', 'POD Update');
        return view('Mes.Pod.edit', compact('pod'));
    }

    public function view($id)
    {
        if (!Auth::user()->hasPermissionTo('POD View')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $pod = POD::find($id);
        Helper::logSystemActivity('POD', 'POD View');
        return view('Mes.Pod.view', compact('pod'));
    }

    public function update(Request $request, $id)
    {
        if (!Auth::user()->hasPermissionTo('POD Update')) {
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

        $pod = pod::find($id);
        $pod->sale_order_id = $request->sale_order;
        $pod->date = $request->date;
        $pod->time = $request->time;
        $pod->created_by = Auth::user()->id;

        $pod->file_artwork_1 = $request->file_artwork_1;
        $pod->file_artwork_2 = $request->file_artwork_2;
        $pod->file_artwork_3 = $request->file_artwork_3;
        $pod->file_artwork_4 = $request->file_artwork_4;
        $pod->file_artwork_5 = $request->file_artwork_5;
        $pod->file_artwork_6 = $request->file_artwork_6;
        $pod->file_artwork_7 = $request->file_artwork_7;


        $pod->first_piece_1 = $request->first_piece_1;
        $pod->first_piece_2 = $request->first_piece_2;
        $pod->first_piece_3 = $request->first_piece_3;
        $pod->first_piece_4 = $request->first_piece_4;
        $pod->first_piece_5 = $request->first_piece_5;
        $pod->first_piece_6 = $request->first_piece_6;
        $pod->first_piece_7 = $request->first_piece_7;
        $pod->first_piece_8 = $request->first_piece_8;
        $pod->first_piece_9 = $request->first_piece_9;
        $pod->first_piece_10 = $request->first_piece_10;
        $pod->first_piece_11 = $request->first_piece_11;

        $pod->status = 'checked';
        $pod->save();
        Helper::logSystemActivity('POD', 'POD Update');
        return redirect()->route('pod')->with('custom_success', 'POD has been Updated Successfully !');
    }

    public function verify($id)
    {
        if (!Auth::user()->hasPermissionTo('POD Verify')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $pod = POD::find($id);
        Helper::logSystemActivity('POD', 'POD Update');
        return view('Mes.Pod.verify', compact('pod'));
    }

    public function approve_approve(Request $request, $id)
    {
        if (!Auth::user()->hasPermissionTo('POD Verify')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $pod = POD::find($id);
        $pod->status = 'verified';
        $pod->verified_by_date = Carbon::now()->format('Y-m-d H:i:s');
        $pod->verified_by_user = Auth::user()->user_name;
        $pod->verified_by_designation = (Auth::user()->designation != null) ? Auth::user()->designation->name : 'not assign';
        $pod->verified_by_department = (Auth::user()->department != null) ? Auth::user()->department->name : 'not assign';
        $pod->save();
        Helper::logSystemActivity('POD', 'POD Verified');
        return redirect()->route('pod')->with('custom_success', 'POD has been Successfully Verified!');
    }

    public function approve_decline(Request $request, $id)
    {
        if (!Auth::user()->hasPermissionTo('POD Verify')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $pod = pod::find($id);
        $pod->status = 'declined';
        $pod->save();
        Helper::logSystemActivity('POD', 'POD Declined');
        return redirect()->route('pod')->with('custom_success', 'POD has been Successfully Declined!');
    }

    public function delete($id)
    {
        if (!Auth::user()->hasPermissionTo('POD Delete')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $pod = pod::find($id);
        $pod->delete();
        Helper::logSystemActivity('POD', 'POD Delete');
        return redirect()->route('pod')->with('custom_success', 'POD has been Successfully Deleted!');
    }

}
