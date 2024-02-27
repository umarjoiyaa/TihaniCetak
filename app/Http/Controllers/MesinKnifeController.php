<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\MesinKnife;
use App\Models\MesinKnifeDetail;
use App\Models\MesinKnifeDetailB;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MesinKnifeController extends Controller
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

            $query = MesinKnife::select('id', 'sale_order_id', 'date','status', 'mesin')->with('sale_order');

            // Apply search if a search term is provided
            if (!empty($search)) {
                $searchLower = strtolower($search);
                $query->where(function ($q) use ($searchLower) {
                    $q
                        ->where('date', 'like', '%' . $searchLower . '%')
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('order_no', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('customer', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('kod_buku', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('description', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('sale_order_qty', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('size', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhere('mesin', 'like', '%' . $searchLower . '%')
                        ->orWhere('status', 'like', '%' . $searchLower . '%');
                    // Add more columns as needed
                });
            }


            // Determine the column to sort by
            $results = null;

            if (!empty($columnsData)) {
                $sortableColumns = [
                    1 => 'date',
                    2 => 'sale_order_id',
                    3 => 'sale_order_id',
                    4 => 'sale_order_id',
                    5 => 'sale_order_id',
                    6 => 'sale_order_id',
                    7 => 'sale_order_id',
                    8 => 'mesin',
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
                                $q->whereHas('sale_order', function ($query) use ($searchLower) {
                                    $query->where('order_no', 'like', '%' . $searchLower . '%');
                                });
                                break;
                            case 3:
                                $q->whereHas('sale_order', function ($query) use ($searchLower) {
                                    $query->where('customer', 'like', '%' . $searchLower . '%');
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
                                $q->where('mesin', 'like', '%' . $searchLower . '%');
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
                if ($row->status == 'Not-initiated') {
                    $row->status = '<span class="badge badge-warning">Not-initiated</span>';
                    $actions = '<a class="dropdown-item" href="' . route('mesin_knife.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('mesin_knife.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('mesin_knife.proses', $row->id) . '">Proses</a>
                    <a class="dropdown-item" id="swal-warning" data-delete="' . route('mesin_knife.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'Started') {
                    $row->status = '<span class="badge badge-success">Started</span>';
                    $actions = '<a class="dropdown-item" href="' . route('mesin_knife.view', $row->id) . '">View</a>
                                <a class="dropdown-item" href="' . route('mesin_knife.proses', $row->id) . '">Proses</a>
                                <a class="dropdown-item" id="swal-warning" data-delete="' . route('mesin_knife.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'Paused') {
                    $row->status = '<span class="badge badge-info">Paused</span>';
                    $actions = '<a class="dropdown-item" href="' . route('mesin_knife.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('mesin_knife.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('mesin_knife.proses', $row->id) . '">Proses</a>
                    <a class="dropdown-item" id="swal-warning" data-delete="' . route('mesin_knife.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'Completed') {
                    $row->status = '<span class="badge badge-success">Completed</span>';
                    $actions = '<a class="dropdown-item" href="' . route('mesin_knife.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('mesin_knife.verify', $row->id) . '">Verify</a>
                    <a class="dropdown-item" id="swal-warning" data-delete="' . route('mesin_knife.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'declined') {
                    $row->status = '<span class="badge badge-danger">Declined</span>';
                    $actions = '<a class="dropdown-item" href="' . route('mesin_knife.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('mesin_knife.verify', $row->id) . '">Verify</a>
                    <a class="dropdown-item" id="swal-warning" data-delete="' . route('mesin_knife.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'verified') {
                    $row->status = '<span class="badge badge-success">Verified</span>';
                    $actions = '<a class="dropdown-item" href="' . route('mesin_knife.view', $row->id) . '">View</a>
                    <a class="dropdown-item" id="swal-warning" data-delete="' . route('mesin_knife.delete', $row->id) . '">Delete</a>';
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

            $query = MesinKnife::select('id', 'sale_order_id', 'date','status', 'mesin')->with('sale_order');

            // Apply search if a search term is provided
            if (!empty($search)) {
                $searchLower = strtolower($search);
                $query->where(function ($q) use ($searchLower) {
                    $q
                        ->where('date', 'like', '%' . $searchLower . '%')
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('order_no', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('customer', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('kod_buku', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('description', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('sale_order_qty', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('size', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhere('mesin', 'like', '%' . $searchLower . '%')
                        ->orWhere('status', 'like', '%' . $searchLower . '%');
                    // Add more columns as needed
                });
            }

            $sortableColumns = [
                1 => 'date',
                2 => 'sale_order_id',
                3 => 'sale_order_id',
                4 => 'sale_order_id',
                5 => 'sale_order_id',
                6 => 'sale_order_id',
                7 => 'sale_order_id',
                8 => 'mesin',
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
                if ($row->status == 'Not-initiated') {
                    $row->status = '<span class="badge badge-warning">Not-initiated</span>';
                    $actions = '<a class="dropdown-item" href="' . route('mesin_knife.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('mesin_knife.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('mesin_knife.proses', $row->id) . '">Proses</a>
                    <a class="dropdown-item" id="swal-warning" data-delete="' . route('mesin_knife.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'Started') {
                    $row->status = '<span class="badge badge-success">Started</span>';
                    $actions = '<a class="dropdown-item" href="' . route('mesin_knife.view', $row->id) . '">View</a>
                                <a class="dropdown-item" href="' . route('mesin_knife.proses', $row->id) . '">Proses</a>
                                <a class="dropdown-item" id="swal-warning" data-delete="' . route('mesin_knife.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'Paused') {
                    $row->status = '<span class="badge badge-info">Paused</span>';
                    $actions = '<a class="dropdown-item" href="' . route('mesin_knife.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('mesin_knife.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('mesin_knife.proses', $row->id) . '">Proses</a>
                    <a class="dropdown-item" id="swal-warning" data-delete="' . route('mesin_knife.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'Completed') {
                    $row->status = '<span class="badge badge-success">Completed</span>';
                    $actions = '<a class="dropdown-item" href="' . route('mesin_knife.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('mesin_knife.verify', $row->id) . '">Verify</a>
                    <a class="dropdown-item" id="swal-warning" data-delete="' . route('mesin_knife.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'declined') {
                    $row->status = '<span class="badge badge-danger">Declined</span>';
                    $actions = '<a class="dropdown-item" href="' . route('mesin_knife.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('mesin_knife.verify', $row->id) . '">Verify</a>
                    <a class="dropdown-item" id="swal-warning" data-delete="' . route('mesin_knife.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'verified') {
                    $row->status = '<span class="badge badge-success">Verified</span>';
                    $actions = '<a class="dropdown-item" href="' . route('mesin_knife.view', $row->id) . '">View</a>
                    <a class="dropdown-item" id="swal-warning" data-delete="' . route('mesin_knife.delete', $row->id) . '">Delete</a>';
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
            Auth::user()->hasPermissionTo('MESIN 3 KNIFE List') ||
            Auth::user()->hasPermissionTo('MESIN 3 KNIFE Create') ||
            Auth::user()->hasPermissionTo('MESIN 3 KNIFE Update') ||
            Auth::user()->hasPermissionTo('MESIN 3 KNIFE View') ||
            Auth::user()->hasPermissionTo('MESIN 3 KNIFE Delete') ||
            Auth::user()->hasPermissionTo('MESIN 3 KNIFE Proses')
        ) {
            Helper::logSystemActivity('MESIN 3 KNIFE', 'MESIN 3 KNIFE List');
            return view('Production.MesinKnife.index');
        }
        return back()->with('custom_errors', 'You don`t have Right Permission');
    }

    public function create(){
        if (!Auth::user()->hasPermissionTo('MESIN 3 KNIFE Create')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        Helper::logSystemActivity('MESIN 3 KNIFE', 'MESIN 3 KNIFE Create');
        return view('Production.MesinKnife.create');
    }

    public function store(Request $request)
    {
        if (!Auth::user()->hasPermissionTo('MESIN 3 KNIFE Create')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $validator = null;

        $validatedData = $request->validate([
            'sale_order' => 'required',
            'date' => 'required'
        ]);

        // If validations fail
        if (!$validatedData) {
            return redirect()->back()
                ->withErrors($validator)->withInput();
        }

        $mesin_knife = new MesinKnife();
        $mesin_knife->sale_order_id = $request->sale_order;
        $mesin_knife->date = $request->date;
        $mesin_knife->mesin = $request->mesin;
        $mesin_knife->created_by = Auth::user()->id;

        $mesin_knife->status = 'Not-initiated';
        $mesin_knife->save();

        Helper::logSystemActivity('MESIN 3 KNIFE', 'MESIN 3 KNIFE Store');
        return redirect()->route('mesin_knife')->with('custom_success', 'MESIN 3 KNIFE has been Created Successfully !');
    }


    public function edit($id){
        if (!Auth::user()->hasPermissionTo('MESIN 3 KNIFE Update')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $mesin_knife = MesinKnife::find($id);
        Helper::logSystemActivity('MESIN 3 KNIFE', 'MESIN 3 KNIFE Update');
        return view('Production.MesinKnife.edit',compact('mesin_knife'));
    }

    public function view($id){
        if (!Auth::user()->hasPermissionTo('MESIN 3 KNIFE View')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $mesin_knife = MesinKnife::find($id);
        $users = User::all();
        $check_machines = MesinKnifeDetail::where('machine', '=', $mesin_knife->mesin)->where('knife_id',  '=', $id)->orderby('id', 'DESC')->first();
        $details = MesinKnifeDetail::where('knife_id',  '=', $id)->orderby('id', 'ASC')->get();
        $detailIds = $details->pluck('id')->toArray();
        $detailbs = MesinKnifeDetailB::whereIn('knife_detail_id', $detailIds)->orderby('id', 'ASC')->get();
        Helper::logSystemActivity('MESIN 3 KNIFE', 'MESIN 3 KNIFE View');
        return view('Production.MesinKnife.view', compact('mesin_knife', 'users', 'check_machines', 'details', 'detailbs'));
    }

    public function update(Request $request,$id)
    {
        if (!Auth::user()->hasPermissionTo('MESIN 3 KNIFE Update')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $validator = null;

        $validatedData = $request->validate([
            'sale_order' => 'required',
            'date' => 'required',
        ]);

        // If validations fail
        if (!$validatedData) {
            return redirect()->back()
                ->withErrors($validator)->withInput();
        }

        $mesin_knife =  MesinKnife::find($id);
        $mesin_knife->sale_order_id = $request->sale_order;
        $mesin_knife->date = $request->date;
        $mesin_knife->mesin = $request->mesin;
        $mesin_knife->created_by = Auth::user()->id;

        $mesin_knife->status = 'Not-initiated';
        $mesin_knife->save();

        Helper::logSystemActivity('MESIN 3 KNIFE', 'MESIN 3 KNIFE update');
        return redirect()->route('mesin_knife')->with('custom_success', 'MESIN 3 KNIFE has been Created Successfully !');
    }

    public function proses($id){
        if (!Auth::user()->hasPermissionTo('MESIN 3 KNIFE Proses')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $mesin_knife = MesinKnife::find($id);
        $users = User::all();
        $check_machines = MesinKnifeDetail::where('machine', '=', $mesin_knife->mesin)->where('knife_id',  '=', $id)->orderby('id', 'DESC')->first();
        $details = MesinKnifeDetail::where('knife_id',  '=', $id)->orderby('id', 'ASC')->get();
        $detailIds = $details->pluck('id')->toArray();
        $detailbs = MesinKnifeDetailB::whereIn('knife_detail_id', $detailIds)->orderby('id', 'ASC')->get();
        Helper::logSystemActivity('MESIN 3 KNIFE', 'MESIN 3 KNIFE Update');
        return view('Production.MesinKnife.proses', compact('mesin_knife', 'users', 'check_machines', 'details', 'detailbs'));
    }

    public function proses_update(Request $request, $id)
    {
        if (!Auth::user()->hasPermissionTo('MESIN 3 KNIFE Proses')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $storedData = json_decode($request->input('details'), true);
        $mesin_knife = MesinKnife::find($id);
        $mesin_knife->operator = json_encode($request->operator);
        $mesin_knife->save();

        $details = MesinKnifeDetail::where('knife_id',  '=', $id)->orderby('id', 'ASC')->get();
        $detailIds = $details->pluck('id')->toArray();
        MesinKnifeDetailB::whereIn('knife_detail_id', $detailIds)->delete();

        foreach($storedData as $key => $value){
            if ($value != null) {
                $detail = new MesinKnifeDetailB();
                $detail->knife_detail_id = $value['hiddenId'] ?? null;
                $detail->good_count = $value['good_count'] ?? null;
                $detail->rejection = $value['rejection'] ?? null;
                $detail->total_produce = $value['total_produce'] ?? null;
                $detail->check_operator_text = $value['check_operator_text'] ?? null;
                $detail->save();
            }
        }
        Helper::logSystemActivity('MESIN 3 KNIFE', 'MESIN 3 KNIFE Proses Update');
        return redirect()->route('mesin_knife')->with('custom_success', 'MESIN 3 KNIFE has been Proses Updated Successfully !');
    }

    public function verify($id){
        if (!Auth::user()->hasPermissionTo('MESIN 3 KNIFE Verify')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $mesin_knife = MesinKnife::find($id);
        $users = User::all();
        $check_machines = MesinKnifeDetail::where('machine', '=', $mesin_knife->mesin)->where('knife_id',  '=', $id)->orderby('id', 'DESC')->first();
        $details = MesinKnifeDetail::where('knife_id',  '=', $id)->orderby('id', 'ASC')->get();
        $detailIds = $details->pluck('id')->toArray();
        $detailbs = MesinKnifeDetailB::whereIn('knife_detail_id', $detailIds)->orderby('id', 'ASC')->get();
        Helper::logSystemActivity('MESIN 3 KNIFE', 'MESIN 3 KNIFE Update');
        return view('Production.MesinKnife.verify', compact('mesin_knife', 'users', 'check_machines', 'details', 'detailbs'));
    }

    public function approve_approve(Request $request, $id){
        if (!Auth::user()->hasPermissionTo('MESIN 3 KNIFE Verify')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $mesin_knife = MesinKnife::find($id);
        $mesin_knife->status = 'verified';
        $mesin_knife->verified_by_date = Carbon::now('Asia/Kuala_Lumpur')->format('d-m-Y h:i:s A');
        $mesin_knife->verified_by_user = Auth::user()->user_name;
        $mesin_knife->verified_by_designation = (Auth::user()->designation != null) ? Auth::user()->designation->name : 'not assign';
        $mesin_knife->verified_by_department = (Auth::user()->department != null) ? Auth::user()->department->name : 'not assign';
        $mesin_knife->save();

        $storedData = json_decode($request->input('details'), true);
        foreach($storedData as $key => $value){
            if ($value != null) {
                $detail = MesinKnifeDetailB::where('knife_detail_id', '=', $value['hiddenId'])->first();
                $detail->check_verify_text = $value['check_verify_text'] ?? null;
                $detail->save();
            }
        }

        Helper::logSystemActivity('MESIN 3 KNIFE', 'MESIN 3 KNIFE Verified');
        return redirect()->route('mesin_knife')->with('custom_success', 'MESIN 3 KNIFE has been Successfully Verified!');
    }

    public function approve_decline(Request $request, $id){
        if (!Auth::user()->hasPermissionTo('MESIN 3 KNIFE Verify')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $mesin_knife = MesinKnife::find($id);
        $mesin_knife->status = 'declined';
        $mesin_knife->save();
        Helper::logSystemActivity('MESIN 3 KNIFE', 'MESIN 3 KNIFE Declined');
        return redirect()->route('mesin_knife')->with('custom_success', 'MESIN 3 KNIFE has been Successfully Declined!');
    }

    public function delete($id){
        if (!Auth::user()->hasPermissionTo('MESIN 3 KNIFE Delete')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $mesin_knife = MesinKnife::find($id);
        MesinKnifeDetail::where('knife_id', $id)->delete();
        MesinKnifeDetailB::where('knife_detail_id', $id)->delete();
        $mesin_knife->delete();
        Helper::logSystemActivity('MESIN 3 KNIFE', 'MESIN 3 KNIFE Delete');
        return redirect()->route('mesin_knife')->with('custom_success', 'MESIN 3 KNIFE has been Successfully Deleted!');
    }

    public function machine_starter(Request $request)
    {
        $ismachinestart = null;

        $JustSelected = MesinKnife::where('id', '=', $request->knife_id)->where('mesin' ,'=' , $request->machine)->orderby('id', 'DESC')->first();

        if(!empty($JustSelected)){
            $ismachinestart = MesinKnifeDetail::where('end_time', '=', null)->where('machine', '=', $request->machine)->where('knife_id', '!=', $request->knife_id)->orderby('id', 'DESC')->first();
        }

        $alreadyexist = MesinKnifeDetail::where('status', '=', 1)->where('machine', '=', $request->machine)->where('knife_id', '=', $request->knife_id)->orderby('id', 'DESC')->first();
        $alreadypaused = MesinKnifeDetail::where('status', '=', 1)->where('machine', '=', $request->machine)->where('knife_id', '=', $request->knife_id)->orderby('id', 'DESC')->first();
        $stopped = MesinKnifeDetail::where('machine', '=', $request->machine)->where('knife_id', '=', $request->knife_id)->where('status', '=', 3)->first();

        if (!$ismachinestart) {

            if ($request->status == 1 && !$alreadyexist && !$stopped) {

                MesinKnifeDetail::create([
                    'machine' => $request->machine,
                    'knife_id' => $request->knife_id,
                    'status' => $request->status,
                    'start_time' => Carbon::now('Asia/Kuala_Lumpur')->format('d-m-Y h:i:s A')
                ]);
                $digital = MesinKnife::find($request->knife_id);
                $digital->status = 'Started';
                $digital->save();
                $check_machine = MesinKnifeDetail::where('machine', '=', $request->machine)->where('knife_id',  '=', $request->knife_id)->orderby('id', 'DESC')->first();
                $details = MesinKnifeDetail::where('knife_id',  '=', $request->knife_id)->orderby('id', 'ASC')->get();
                return response()->json([
                    'message' => 'Machine Started ' . Carbon::now('Asia/Kuala_Lumpur')->format('d-m-Y h:i:s A'),
                    'check_machine' => $check_machine,
                    'details' => $details
                ]);
            } else if ($request->status == 2 && $alreadypaused && !$stopped) {

                $mpo = MesinKnifeDetail::where('machine', $request->machine)->where('knife_id', $request->knife_id)->where('end_time', '=', null)->orderby('id', 'DESC')->first();
                $mpo->status = $request->status;
                $mpo->end_time = Carbon::now('Asia/Kuala_Lumpur')->format('d-m-Y h:i:s A');
                $mpo->save();
                $start_time = Carbon::parse($mpo->start_time);
                $end_time = Carbon::parse($mpo->end_time);
                $duration = $end_time->diffInMinutes($start_time);
                $mpo->duration = $duration;
                $mpo->save();
                $digital = MesinKnife::find($request->knife_id);
                $digital->status = 'Paused';
                $digital->save();
                $check_machine = MesinKnifeDetail::where('machine', '=', $request->machine)->where('knife_id',  '=', $request->knife_id)->orderby('id', 'DESC')->first();
                $details = MesinKnifeDetail::where('knife_id',  '=', $request->knife_id)->orderby('id', 'ASC')->get();
                return response()->json([
                    'message' => 'Machine Paused ' . Carbon::now('Asia/Kuala_Lumpur')->format('d-m-Y h:i:s A'),
                    'check_machine' => $check_machine,
                    'details' => $details
                ]);
            } else if ($request->status == 3 && !$stopped) {
                $mpo = MesinKnifeDetail::where('machine', $request->machine)->where('knife_id', $request->knife_id)->orderby('id', 'DESC')->first();
                $mpo->status = $request->status;
                $mpo->end_time = Carbon::now('Asia/Kuala_Lumpur')->format('d-m-Y h:i:s A');
                $mpo->save();
                $start_time = Carbon::parse($mpo->start_time);
                $end_time = Carbon::parse($mpo->end_time);
                $duration = $end_time->diffInMinutes($start_time);
                $mpo->duration = $duration;
                $mpo->save();
                $digital = MesinKnife::find($request->knife_id);
                $digital->status = 'Completed';
                $digital->save();
                $check_machine = MesinKnifeDetail::where('machine', '=', $request->machine)->where('knife_id',  '=', $request->knife_id)->orderby('id', 'DESC')->first();
                $details = MesinKnifeDetail::where('knife_id',  '=', $request->knife_id)->orderby('id', 'ASC')->get();
                return response()->json([
                    'message' => 'Machine Stopped ' . Carbon::now('Asia/Kuala_Lumpur')->format('d-m-Y h:i:s A'),
                    'check_machine' => $check_machine,
                    'details' => $details
                ]);
            }
        }else{
            $check_machine = MesinKnifeDetail::where('machine', '=', $request->machine)->where('knife_id',  '=', $request->knife_id)->orderby('id', 'DESC')->first();
            $details = MesinKnifeDetail::where('knife_id',  '=', $request->knife_id)->orderby('id', 'ASC')->get();
            return response()->json([
                'message' => 'Same Machine Is Running On Other Staple Bind!',
                'check_machine' => $check_machine,
                'details' => $details
            ]);
        }
    }
}
