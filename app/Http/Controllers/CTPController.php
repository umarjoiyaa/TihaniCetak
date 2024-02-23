<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\CTP;
use App\Models\SaleOrder;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CTPController extends Controller
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

            $query = CTP::select('id', 'sale_order_id', 'date', 'status','time','file_artwork_1','file_artwork_2','file_artwork_3','file_artwork_4','file_artwork_5','file_artwork_6','file_artwork_7','file_artwork_8','impositions_1','impositions_2','impositions_3','impositions_4','impositions_5','impositions_6','impositions_7','impositions_8')->with('sale_order');

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
                        ->where('file_artwork_8', 'like', '%' . $searchLower . '%')
                        ->where('impositions_1', 'like', '%' . $searchLower . '%')
                        ->where('impositions_2', 'like', '%' . $searchLower . '%')
                        ->where('impositions_3', 'like', '%' . $searchLower . '%')
                        ->where('impositions_4', 'like', '%' . $searchLower . '%')
                        ->where('impositions_5', 'like', '%' . $searchLower . '%')
                        ->where('impositions_6', 'like', '%' . $searchLower . '%')
                        ->where('impositions_7', 'like', '%' . $searchLower . '%')
                        ->where('impositions_8', 'like', '%' . $searchLower . '%')
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
                    13 => 'file_artwork_8',
                    14 => 'impositions_1',
                    15 => 'impositions_2',
                    16 => 'impositions_3',
                    17 => 'impositions_4',
                    18 => 'impositions_5',
                    19 => 'impositions_6',
                    20 => 'impositions_7',
                    21 => 'impositions_8',
                    22 => 'status',
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
                                $q->where('file_artwork_8', 'like', '%' . $searchLower . '%');
                                break;
                            case 14:
                                $q->where('impositions_1', 'like', '%' . $searchLower . '%');
                                break;
                            case 15:
                                $q->where('impositions_2', 'like', '%' . $searchLower . '%');
                                break;
                            case 16:
                                $q->where('impositions_3', 'like', '%' . $searchLower . '%');
                                break;
                            case 17:
                                $q->where('impositions_4', 'like', '%' . $searchLower . '%');
                                break;
                            case 18:
                                $q->where('impositions_5', 'like', '%' . $searchLower . '%');
                                break;
                            case 19:
                                $q->where('impositions_6', 'like', '%' . $searchLower . '%');
                                break;
                            case 20:
                                $q->where('impositions_7', 'like', '%' . $searchLower . '%');
                                break;
                            case 21:
                                $q->where('impositions_8', 'like', '%' . $searchLower . '%');
                                break;
                            case 22:
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
                    $actions = '<a class="dropdown-item" href="' . route('ctp.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('ctp.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('ctp.verify', $row->id) . '">Verify</a>
                    <a class="dropdown-item"  id="swal-warning" data-delete="' . route('ctp.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'verified') {
                    $row->status = '<span class="badge badge-success">Verified</span>';
                    $actions = '<a class="dropdown-item" href="' . route('ctp.view', $row->id) . '">View</a>
                                <a class="dropdown-item"  id="swal-warning" data-delete="' . route('ctp.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'declined') {
                    $row->status = '<span class="badge badge-danger">Declined</span>';
                    $actions = '<a class="dropdown-item" href="' . route('ctp.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('ctp.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('ctp.verify', $row->id) . '">Verify</a>
                    <a class="dropdown-item"  id="swal-warning" data-delete="' . route('ctp.delete', $row->id) . '" >Delete</a>';
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

            $query = CTP::select('id', 'sale_order_id', 'date', 'status','time','file_artwork_1','file_artwork_2','file_artwork_3','file_artwork_4','file_artwork_5','file_artwork_6','file_artwork_7','file_artwork_8','impositions_1','impositions_2','impositions_3','impositions_4','impositions_5','impositions_6','impositions_7','impositions_8')->with('sale_order');

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
                        ->where('file_artwork_8', 'like', '%' . $searchLower . '%')
                        ->where('impositions_1', 'like', '%' . $searchLower . '%')
                        ->where('impositions_2', 'like', '%' . $searchLower . '%')
                        ->where('impositions_3', 'like', '%' . $searchLower . '%')
                        ->where('impositions_4', 'like', '%' . $searchLower . '%')
                        ->where('impositions_5', 'like', '%' . $searchLower . '%')
                        ->where('impositions_6', 'like', '%' . $searchLower . '%')
                        ->where('impositions_7', 'like', '%' . $searchLower . '%')
                        ->where('impositions_8', 'like', '%' . $searchLower . '%')
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
                13 => 'file_artwork_8',
                14 => 'impositions_1',
                15 => 'impositions_2',
                16 => 'impositions_3',
                17 => 'impositions_4',
                18 => 'impositions_5',
                19 => 'impositions_6',
                20 => 'impositions_7',
                21 => 'impositions_8',
                22 => 'status',
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
                    $actions = '<a class="dropdown-item" href="' . route('ctp.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('ctp.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('ctp.verify', $row->id) . '">Verify</a>
                    <a class="dropdown-item" id="swal-warning" data-delete="' . route('ctp.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'verified') {
                    $row->status = '<span class="badge badge-success">Verified</span>';
                    $actions = '<a class="dropdown-item" href="' . route('ctp.view', $row->id) . '">View</a>
                                <a class="dropdown-item" id="swal-warning" data-delete="' . route('ctp.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'declined') {
                    $row->status = '<span class="badge badge-danger">Declined</span>';
                    $actions = '<a class="dropdown-item" href="' . route('ctp.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('ctp.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('ctp.verify', $row->id) . '">Verify</a>
                    <a class="dropdown-item" id="swal-warning" data-delete="' . route('ctp.delete', $row->id) . '">Delete</a>';
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
            Auth::user()->hasPermissionTo('CTP List') ||
            Auth::user()->hasPermissionTo('CTP Create') ||
            Auth::user()->hasPermissionTo('CTP Update') ||
            Auth::user()->hasPermissionTo('CTP View') ||
            Auth::user()->hasPermissionTo('CTP Delete') ||
            Auth::user()->hasPermissionTo('CTP Verify')
        ) {
            Helper::logSystemActivity('CTP List', 'CTP List');
            return view('Mes.Ctp.index');
        }
        return back()->with('custom_errors', 'You don`t have Right Permission');
    }


    public function create(){
        if (!Auth::user()->hasPermissionTo('CTP Create')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        Helper::logSystemActivity('CTP', 'CTP Create');
        return view('Mes.Ctp.create');
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
        if (!Auth::user()->hasPermissionTo('CTP Create')) {
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

        $ctp = new CTP();
        $ctp->sale_order_id = $request->sale_order;
        $ctp->date = $request->date;
        $ctp->time = $request->time;
        $ctp->created_by = Auth::user()->id;

        $ctp->file_artwork_1 = $request->file_artwork_1;
        $ctp->file_artwork_2 = $request->file_artwork_2;
        $ctp->file_artwork_3 = $request->file_artwork_3;
        $ctp->file_artwork_4 = $request->file_artwork_4;
        $ctp->file_artwork_5 = $request->file_artwork_5;
        $ctp->file_artwork_6 = $request->file_artwork_6;
        $ctp->file_artwork_7 = $request->file_artwork_7;
        $ctp->file_artwork_8 = $request->file_artwork_8;


        $ctp->impositions_1 = $request->impositions_1;
        $ctp->impositions_2 = $request->impositions_2;
        $ctp->impositions_3 = $request->impositions_3;
        $ctp->impositions_4 = $request->impositions_4;
        $ctp->impositions_5 = $request->impositions_5;
        $ctp->impositions_6 = $request->impositions_6;
        $ctp->impositions_7 = $request->impositions_7;
        $ctp->impositions_8 = $request->impositions_8;
        $ctp->status = 'checked';
        $ctp->save();
        Helper::logSystemActivity('CTP', 'CTP Store');
        return redirect()->route('ctp')->with('custom_success', 'CTP has been Created Successfully !');
    }

    public function edit($id)
    {
        if (!Auth::user()->hasPermissionTo('CTP Update')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $ctp = CTP::find($id);
        Helper::logSystemActivity('CTP', 'CTP Update');
        return view('Mes.Ctp.edit', compact('ctp'));
    }

    public function view($id)
    {
        if (!Auth::user()->hasPermissionTo('CTP View')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $ctp = CTP::find($id);
        Helper::logSystemActivity('CTP', 'CTP View');
        return view('Mes.Ctp.view', compact('ctp'));
    }

    public function update(Request $request, $id)
    {
        if (!Auth::user()->hasPermissionTo('CTP Update')) {
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

        $ctp = CTP::find($id);
        $ctp->sale_order_id = $request->sale_order;
        $ctp->date = $request->date;
        $ctp->time = $request->time;
        $ctp->created_by = Auth::user()->id;

        $ctp->file_artwork_1 = $request->file_artwork_1;
        $ctp->file_artwork_2 = $request->file_artwork_2;
        $ctp->file_artwork_3 = $request->file_artwork_3;
        $ctp->file_artwork_4 = $request->file_artwork_4;
        $ctp->file_artwork_5 = $request->file_artwork_5;
        $ctp->file_artwork_6 = $request->file_artwork_6;
        $ctp->file_artwork_7 = $request->file_artwork_7;
        $ctp->file_artwork_8 = $request->file_artwork_8;


        $ctp->impositions_1 = $request->impositions_1;
        $ctp->impositions_2 = $request->impositions_2;
        $ctp->impositions_3 = $request->impositions_3;
        $ctp->impositions_4 = $request->impositions_4;
        $ctp->impositions_5 = $request->impositions_5;
        $ctp->impositions_6 = $request->impositions_6;
        $ctp->impositions_7 = $request->impositions_7;
        $ctp->impositions_8 = $request->impositions_8;

        $ctp->status = 'checked';
        $ctp->save();
        Helper::logSystemActivity('CTP', 'CTP Update');
        return redirect()->route('ctp')->with('custom_success', 'CTP has been Updated Successfully !');
    }

    public function verify($id)
    {
        if (!Auth::user()->hasPermissionTo('CTP Verify')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $ctp = CTP::find($id);
        Helper::logSystemActivity('CTP', 'CTP Update');
        return view('Mes.Ctp.verify', compact('ctp'));
    }

    public function approve_approve(Request $request, $id)
    {
        if (!Auth::user()->hasPermissionTo('CTP Verify')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $ctp = CTP::find($id);
        $ctp->status = 'verified';
        $ctp->verified_by_date = Carbon::now()->format('Y-m-d H:i:s');
        $ctp->verified_by_user = Auth::user()->user_name;
        $ctp->verified_by_designation = (Auth::user()->designation != null) ? Auth::user()->designation->name : 'not assign';
        $ctp->verified_by_department = (Auth::user()->department != null) ? Auth::user()->department->name : 'not assign';
        $ctp->save();
        Helper::logSystemActivity('CTP', 'CTP Verified');
        return redirect()->route('ctp')->with('custom_success', 'CTP has been Successfully Verified!');
    }

    public function approve_decline(Request $request, $id)
    {
        if (!Auth::user()->hasPermissionTo('CTP Verify')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $ctp = CTP::find($id);
        $ctp->status = 'declined';
        $ctp->save();
        Helper::logSystemActivity('CTP', 'CTP Declined');
        return redirect()->route('ctp')->with('custom_success', 'CTP has been Successfully Declined!');
    }

    public function delete($id)
    {
        if (!Auth::user()->hasPermissionTo('CTP Delete')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $ctp = CTP::find($id);
        $ctp->delete();
        Helper::logSystemActivity('CTP', 'CTP Delete');
        return redirect()->route('ctp')->with('custom_success', 'CTP has been Successfully Deleted!');
    }



}
