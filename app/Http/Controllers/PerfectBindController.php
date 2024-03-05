<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\PerfectBind;
use App\Models\PerfectBindDetail;
use App\Models\PerfectBindDetailB;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerfectBindController extends Controller
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

            $query = PerfectBind::select('id', 'sale_order_id', 'date','status', 'mesin', 'jenis')->with('sale_order', 'senari_semak');

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
                        ->orWhereHas('senari_semak', function ($query) use ($searchLower) {
                            $query->where('item_cover_text', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('sale_order_qty', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhere('jenis', 'like', '%' . $searchLower . '%')
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
                    8 => 'jenis',
                    9 => 'mesin',
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
                                $q->whereHas('senari_semak', function ($query) use ($searchLower) {
                                    $query->where('item_cover_text', 'like', '%' . $searchLower . '%');
                                });
                                break;
                            case 7:
                                $q->whereHas('sale_order', function ($query) use ($searchLower) {
                                    $query->where('sale_order_qty', 'like', '%' . $searchLower . '%');
                                });
                                break;
                            case 8:
                                $q->where('jenis', 'like', '%' . $searchLower . '%');
                                break;
                            case 9:
                                $q->where('mesin', 'like', '%' . $searchLower . '%');
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
                if ($row->status == 'Not-initiated') {
                    $row->status = '<span class="badge badge-warning">Not-initiated</span>';
                    $actions = '<a class="dropdown-item" href="' . route('perfect_bind.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('perfect_bind.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('perfect_bind.proses', $row->id) . '">Proses</a>
                    <a class="dropdown-item" id="swal-warning" data-delete="' . route('perfect_bind.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'Started') {
                    $row->status = '<span class="badge badge-success">Started</span>';
                    $actions = '<a class="dropdown-item" href="' . route('perfect_bind.view', $row->id) . '">View</a>
                                <a class="dropdown-item" href="' . route('perfect_bind.proses', $row->id) . '">Proses</a>';
                } else if ($row->status == 'Paused') {
                    $row->status = '<span class="badge badge-info">Paused</span>';
                    $actions = '<a class="dropdown-item" href="' . route('perfect_bind.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('perfect_bind.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('perfect_bind.proses', $row->id) . '">Proses</a>';
                } else if ($row->status == 'Completed') {
                    $row->status = '<span class="badge badge-success">Completed</span>';
                    $actions = '<a class="dropdown-item" href="' . route('perfect_bind.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('perfect_bind.verify', $row->id) . '">Verify</a>';
                } else if ($row->status == 'declined') {
                    $row->status = '<span class="badge badge-danger">Declined</span>';
                    $actions = '<a class="dropdown-item" href="' . route('perfect_bind.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('perfect_bind.verify', $row->id) . '">Verify</a>';
                } else if ($row->status == 'verified') {
                    $row->status = '<span class="badge badge-success">Verified</span>';
                    $actions = '<a class="dropdown-item" href="' . route('perfect_bind.view', $row->id) . '">View</a>';
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

            $query = PerfectBind::select('id', 'sale_order_id', 'date','status', 'mesin', 'jenis')->with('sale_order', 'senari_semak');

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
                        ->orWhereHas('senari_semak', function ($query) use ($searchLower) {
                            $query->where('item_cover_text', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('sale_order_qty', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhere('jenis', 'like', '%' . $searchLower . '%')
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
                8 => 'jenis',
                9 => 'mesin',
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
                if ($row->status == 'Not-initiated') {
                    $row->status = '<span class="badge badge-warning">Not-initiated</span>';
                    $actions = '<a class="dropdown-item" href="' . route('perfect_bind.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('perfect_bind.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('perfect_bind.proses', $row->id) . '">Proses</a>
                    <a class="dropdown-item" id="swal-warning" data-delete="' . route('perfect_bind.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'Started') {
                    $row->status = '<span class="badge badge-success">Started</span>';
                    $actions = '<a class="dropdown-item" href="' . route('perfect_bind.view', $row->id) . '">View</a>
                                <a class="dropdown-item" href="' . route('perfect_bind.proses', $row->id) . '">Proses</a>';
                } else if ($row->status == 'Paused') {
                    $row->status = '<span class="badge badge-info">Paused</span>';
                    $actions = '<a class="dropdown-item" href="' . route('perfect_bind.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('perfect_bind.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('perfect_bind.proses', $row->id) . '">Proses</a>';
                } else if ($row->status == 'Completed') {
                    $row->status = '<span class="badge badge-success">Completed</span>';
                    $actions = '<a class="dropdown-item" href="' . route('perfect_bind.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('perfect_bind.verify', $row->id) . '">Verify</a>';
                } else if ($row->status == 'declined') {
                    $row->status = '<span class="badge badge-danger">Declined</span>';
                    $actions = '<a class="dropdown-item" href="' . route('perfect_bind.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('perfect_bind.verify', $row->id) . '">Verify</a>';
                } else if ($row->status == 'verified') {
                    $row->status = '<span class="badge badge-success">Verified</span>';
                    $actions = '<a class="dropdown-item" href="' . route('perfect_bind.view', $row->id) . '">View</a>';
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
            Auth::user()->hasPermissionTo('PERFECT BIND List') ||
            Auth::user()->hasPermissionTo('PERFECT BIND Create') ||
            Auth::user()->hasPermissionTo('PERFECT BIND Update') ||
            Auth::user()->hasPermissionTo('PERFECT BIND View') ||
            Auth::user()->hasPermissionTo('PERFECT BIND Delete') ||
            Auth::user()->hasPermissionTo('PERFECT BIND Proses')
        ) {
            Helper::logSystemActivity('PERFECT BIND', 'PERFECT BIND List');
            return view('Production.PerfectBind.index');
        }
        return back()->with('custom_errors', 'You don`t have Right Permission');
    }

    public function create(){
        if (!Auth::user()->hasPermissionTo('PERFECT BIND Create')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        Helper::logSystemActivity('PERFECT BIND', 'PERFECT BIND Create');
        return view('Production.PerfectBind.create');
    }

    public function store(Request $request)
    {
        if (!Auth::user()->hasPermissionTo('PERFECT BIND Create')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $validator = null;

        $validatedData = $request->validate([
            'sale_order' => 'required',
            'date' => 'required',
            'jenis' => 'required',
        ]);

        // If validations fail
        if (!$validatedData) {
            return redirect()->back()
                ->withErrors($validator)->withInput();
        }

        $perfect_bind = new PerfectBind();
        $perfect_bind->sale_order_id = $request->sale_order;
        $perfect_bind->date = $request->date;
        $perfect_bind->mesin = $request->mesin;
        $perfect_bind->jenis = $request->jenis;
        $perfect_bind->created_by = Auth::user()->id;

        $perfect_bind->status = 'Not-initiated';
        $perfect_bind->save();

        Helper::logSystemActivity('PERFECT BIND', 'PERFECT BIND Store');
        return redirect()->route('perfect_bind')->with('custom_success', 'PERFECT BIND has been Created Successfully !');
    }


    public function edit($id){
        if (!Auth::user()->hasPermissionTo('PERFECT BIND Update')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $perfect_bind = PerfectBind::find($id);
        Helper::logSystemActivity('PERFECT BIND', 'PERFECT BIND Update');
        return view('Production.PerfectBind.edit',compact('perfect_bind'));
    }

    public function view($id){
        if (!Auth::user()->hasPermissionTo('PERFECT BIND View')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $perfect_bind = PerfectBind::find($id);
        $users = User::all();
        $check_machines = PerfectBindDetail::where('machine', '=', $perfect_bind->mesin)->where('perfect_id',  '=', $id)->orderby('id', 'DESC')->first();
        $details = PerfectBindDetail::where('perfect_id',  '=', $id)->orderby('id', 'ASC')->get();
        $detailIds = $details->pluck('id')->toArray();
        $detailbs = PerfectBindDetailB::whereIn('perfect_detail_id', $detailIds)->orderby('id', 'ASC')->get();
        Helper::logSystemActivity('PERFECT BIND', 'PERFECT BIND View');
        return view('Production.PerfectBind.view', compact('perfect_bind', 'users', 'check_machines', 'details', 'detailbs'));
    }

    public function update(Request $request,$id)
    {
        if (!Auth::user()->hasPermissionTo('PERFECT BIND Update')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $validator = null;

        $validatedData = $request->validate([
            'sale_order' => 'required',
            'date' => 'required',
            'jenis' => 'required',
        ]);

        // If validations fail
        if (!$validatedData) {
            return redirect()->back()
                ->withErrors($validator)->withInput();
        }

        $perfect_bind =  PerfectBind::find($id);
        $perfect_bind->sale_order_id = $request->sale_order;
        $perfect_bind->date = $request->date;
        $perfect_bind->mesin = $request->mesin;
        $perfect_bind->jenis = $request->jenis;
        $perfect_bind->created_by = Auth::user()->id;

        if($perfect_bind->status == 'Paused'){
            $perfect_bind->status = 'Paused';
        }else{
            $perfect_bind->status = 'Not-initiated';
        }
        $perfect_bind->save();

        Helper::logSystemActivity('PERFECT BIND', 'PERFECT BIND update');
        return redirect()->route('perfect_bind')->with('custom_success', 'PERFECT BIND has been Created Successfully !');
    }

    public function proses($id){
        if (!Auth::user()->hasPermissionTo('PERFECT BIND Proses')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $perfect_bind = PerfectBind::find($id);
        $users = User::all();
        $check_machines = PerfectBindDetail::where('machine', '=', $perfect_bind->mesin)->where('perfect_id',  '=', $id)->orderby('id', 'DESC')->first();
        $details = PerfectBindDetail::where('perfect_id',  '=', $id)->orderby('id', 'ASC')->get();
        $detailIds = $details->pluck('id')->toArray();
        $detailbs = PerfectBindDetailB::whereIn('perfect_detail_id', $detailIds)->orderby('id', 'ASC')->get();
        Helper::logSystemActivity('PERFECT BIND', 'PERFECT BIND Update');
        return view('Production.PerfectBind.proses', compact('perfect_bind', 'users', 'check_machines', 'details', 'detailbs'));
    }

    public function proses_update(Request $request, $id)
    {
        if (!Auth::user()->hasPermissionTo('PERFECT BIND Proses')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $storedData = json_decode($request->input('details'), true);
        $perfect_bind = PerfectBind::find($id);
        $perfect_bind->operator = json_encode($request->operator);
        $perfect_bind->save();

        $details = PerfectBindDetail::where('perfect_id',  '=', $id)->orderby('id', 'ASC')->get();
        $detailIds = $details->pluck('id')->toArray();
        PerfectBindDetailB::whereIn('perfect_detail_id', $detailIds)->delete();

        foreach($storedData as $key => $value){
            if ($value != null) {
                $detail = new PerfectBindDetailB();
                $detail->perfect_detail_id = $value['hiddenId'] ?? null;
                $detail->good_count = $value['good_count'] ?? null;
                $detail->rejection = $value['rejection'] ?? null;
                $detail->total_produce = $value['total_produce'] ?? null;
                $detail->check_operator_text = $value['check_operator_text'] ?? null;
                $detail->save();
            }
        }
        Helper::logSystemActivity('PERFECT BIND', 'PERFECT BIND Proses Update');
        return redirect()->route('perfect_bind')->with('custom_success', 'PERFECT BIND has been Proses Updated Successfully !');
    }

    public function verify($id){
        if (!Auth::user()->hasPermissionTo('PERFECT BIND Verify')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $perfect_bind = PerfectBind::find($id);
        $users = User::all();
        $check_machines = PerfectBindDetail::where('machine', '=', $perfect_bind->mesin)->where('perfect_id',  '=', $id)->orderby('id', 'DESC')->first();
        $details = PerfectBindDetail::where('perfect_id',  '=', $id)->orderby('id', 'ASC')->get();
        $detailIds = $details->pluck('id')->toArray();
        $detailbs = PerfectBindDetailB::whereIn('perfect_detail_id', $detailIds)->orderby('id', 'ASC')->get();
        Helper::logSystemActivity('PERFECT BIND', 'PERFECT BIND Update');
        return view('Production.PerfectBind.verify', compact('perfect_bind', 'users', 'check_machines', 'details', 'detailbs'));
    }

    public function approve_approve(Request $request, $id){
        if (!Auth::user()->hasPermissionTo('PERFECT BIND Verify')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $perfect_bind = PerfectBind::find($id);
        $perfect_bind->status = 'verified';
        $perfect_bind->verified_by_date = Carbon::now('Asia/Kuala_Lumpur')->format('d-m-Y h:i:s A');
        $perfect_bind->verified_by_user = Auth::user()->user_name;
        $perfect_bind->verified_by_designation = (Auth::user()->designations != null) ? Auth::user()->designations->name : 'not assign';
        $perfect_bind->verified_by_department = (Auth::user()->departments != null) ? Auth::user()->departments->name : 'not assign';
        $perfect_bind->save();

        $storedData = json_decode($request->input('details'), true);
        foreach($storedData as $key => $value){
            if ($value != null) {
                $detail = PerfectBindDetailB::where('perfect_detail_id', '=', $value['hiddenId'])->first();
                $detail->check_verify_text = $value['check_verify_text'] ?? null;
                $detail->save();
            }
        }

        Helper::logSystemActivity('PERFECT BIND', 'PERFECT BIND Verified');
        return redirect()->route('perfect_bind')->with('custom_success', 'PERFECT BIND has been Successfully Verified!');
    }

    public function approve_decline(Request $request, $id){
        if (!Auth::user()->hasPermissionTo('PERFECT BIND Verify')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $perfect_bind = PerfectBind::find($id);
        $perfect_bind->status = 'declined';
        $perfect_bind->save();
        Helper::logSystemActivity('PERFECT BIND', 'PERFECT BIND Declined');
        return redirect()->route('perfect_bind')->with('custom_success', 'PERFECT BIND has been Successfully Declined!');
    }

    public function delete($id){
        if (!Auth::user()->hasPermissionTo('PERFECT BIND Delete')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $perfect_bind = PerfectBind::find($id);
        PerfectBindDetail::where('perfect_id', $id)->delete();
        PerfectBindDetailB::where('perfect_detail_id', $id)->delete();
        $perfect_bind->delete();
        Helper::logSystemActivity('PERFECT BIND', 'PERFECT BIND Delete');
        return redirect()->route('perfect_bind')->with('custom_success', 'PERFECT BIND has been Successfully Deleted!');
    }

    public function machine_starter(Request $request)
    {
        $ismachinestart = null;

        $JustSelected = PerfectBind::where('id', '=', $request->perfect_id)->where('mesin' ,'=' , $request->machine)->orderby('id', 'DESC')->first();

        if(!empty($JustSelected)){
            $ismachinestart = PerfectBindDetail::where('end_time', '=', null)->where('machine', '=', $request->machine)->where('perfect_id', '!=', $request->perfect_id)->orderby('id', 'DESC')->first();
        }

        $alreadyexist = PerfectBindDetail::where('status', '=', 1)->where('machine', '=', $request->machine)->where('perfect_id', '=', $request->perfect_id)->orderby('id', 'DESC')->first();
        $alreadypaused = PerfectBindDetail::where('status', '=', 1)->where('machine', '=', $request->machine)->where('perfect_id', '=', $request->perfect_id)->orderby('id', 'DESC')->first();
        $stopped = PerfectBindDetail::where('machine', '=', $request->machine)->where('perfect_id', '=', $request->perfect_id)->where('status', '=', 3)->first();

        if (!$ismachinestart) {

            if ($request->status == 1 && !$alreadyexist && !$stopped) {

                PerfectBindDetail::create([
                    'machine' => $request->machine,
                    'perfect_id' => $request->perfect_id,
                    'status' => $request->status,
                    'start_time' => Carbon::now('Asia/Kuala_Lumpur')->format('d-m-Y h:i:s A')
                ]);
                $digital = PerfectBind::find($request->perfect_id);
                $digital->status = 'Started';
                $digital->save();
                $check_machine = PerfectBindDetail::where('machine', '=', $request->machine)->where('perfect_id',  '=', $request->perfect_id)->orderby('id', 'DESC')->first();
                $details = PerfectBindDetail::where('perfect_id',  '=', $request->perfect_id)->orderby('id', 'ASC')->get();
                return response()->json([
                    'message' => 'Machine Started ' . Carbon::now('Asia/Kuala_Lumpur')->format('d-m-Y h:i:s A'),
                    'check_machine' => $check_machine,
                    'details' => $details
                ]);
            } else if ($request->status == 2 && $alreadypaused && !$stopped) {

                $mpo = PerfectBindDetail::where('machine', $request->machine)->where('perfect_id', $request->perfect_id)->where('end_time', '=', null)->orderby('id', 'DESC')->first();
                $mpo->status = $request->status;
                $mpo->end_time = Carbon::now('Asia/Kuala_Lumpur')->format('d-m-Y h:i:s A');
                $mpo->remarks = $request->remarks;
                $mpo->save();
                $start_time = Carbon::parse($mpo->start_time);
                $end_time = Carbon::parse($mpo->end_time);
                $duration = $end_time->diffInMinutes($start_time);
                $mpo->duration = $duration;
                $mpo->save();
                $digital = PerfectBind::find($request->perfect_id);
                $digital->status = 'Paused';
                $digital->save();
                $check_machine = PerfectBindDetail::where('machine', '=', $request->machine)->where('perfect_id',  '=', $request->perfect_id)->orderby('id', 'DESC')->first();
                $details = PerfectBindDetail::where('perfect_id',  '=', $request->perfect_id)->orderby('id', 'ASC')->get();
                return response()->json([
                    'message' => 'Machine Paused ' . Carbon::now('Asia/Kuala_Lumpur')->format('d-m-Y h:i:s A'),
                    'check_machine' => $check_machine,
                    'details' => $details
                ]);
            } else if ($request->status == 3 && !$stopped) {
                $mpo = PerfectBindDetail::where('machine', $request->machine)->where('perfect_id', $request->perfect_id)->orderby('id', 'DESC')->first();
                $mpo->status = $request->status;
                $mpo->end_time = Carbon::now('Asia/Kuala_Lumpur')->format('d-m-Y h:i:s A');
                $mpo->save();
                $start_time = Carbon::parse($mpo->start_time);
                $end_time = Carbon::parse($mpo->end_time);
                $duration = $end_time->diffInMinutes($start_time);
                $mpo->duration = $duration;
                $mpo->save();
                $digital = PerfectBind::find($request->perfect_id);
                $digital->status = 'Completed';
                $digital->save();
                $check_machine = PerfectBindDetail::where('machine', '=', $request->machine)->where('perfect_id',  '=', $request->perfect_id)->orderby('id', 'DESC')->first();
                $details = PerfectBindDetail::where('perfect_id',  '=', $request->perfect_id)->orderby('id', 'ASC')->get();
                return response()->json([
                    'message' => 'Machine Stopped ' . Carbon::now('Asia/Kuala_Lumpur')->format('d-m-Y h:i:s A'),
                    'check_machine' => $check_machine,
                    'details' => $details
                ]);
            }
        }else{
            $check_machine = PerfectBindDetail::where('machine', '=', $request->machine)->where('perfect_id',  '=', $request->perfect_id)->orderby('id', 'DESC')->first();
            $details = PerfectBindDetail::where('perfect_id',  '=', $request->perfect_id)->orderby('id', 'ASC')->get();
            return response()->json([
                'message' => 'Same Machine Is Running On Other Staple Bind!',
                'check_machine' => $check_machine,
                'details' => $details
            ]);
        }
    }
}
