<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\MesinLipat;
use App\Models\MesinLipatDetail;
use App\Models\MesinLipatDetailB;
use App\Models\User;
use Carbon\Carbon;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductionJobSheet_MesinLipatController extends Controller
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

            $query = MesinLipat::select('id', 'sale_order_id', 'date','status', 'jumlah_seksyen','jenis_lipatan','mesin')->with('sale_order');

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
                        ->orWhere('jumlah_seksyen', 'like', '%' . $searchLower . '%')
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('sale_order_qty', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhere('jenis_lipatan', 'like', '%' . $searchLower . '%')
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
                    6 => 'jumlah_seksyen',
                    7 => 'sale_order_id',
                    8 => 'jenis_lipatan',
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
                                $q->where('jumlah_seksyen', 'like', '%' . $searchLower . '%');
                                break;
                            case 7:
                                $q->whereHas('sale_order', function ($query) use ($searchLower) {
                                    $query->where('sale_order_qty', 'like', '%' . $searchLower . '%');
                                });
                                break;
                            case 8:
                                $q->where('jenis_lipatan', 'like', '%' . $searchLower . '%');
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
                    $actions = '<a class="dropdown-item" href="' . route('mesin_lipat.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('mesin_lipat.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('mesin_lipat.proses', $row->id) . '">Proses</a>
                    <a class="dropdown-item" id="swal-warning" data-delete="' . route('mesin_lipat.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'Started') {
                    $row->status = '<span class="badge badge-success">Started</span>';
                    $actions = '<a class="dropdown-item" href="' . route('mesin_lipat.view', $row->id) . '">View</a>
                                <a class="dropdown-item" href="' . route('mesin_lipat.proses', $row->id) . '">Proses</a>';
                } else if ($row->status == 'Paused') {
                    $row->status = '<span class="badge badge-info">Paused</span>';
                    $actions = '<a class="dropdown-item" href="' . route('mesin_lipat.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('mesin_lipat.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('mesin_lipat.proses', $row->id) . '">Proses</a>';
                } else if ($row->status == 'Completed') {
                    $row->status = '<span class="badge badge-success">Completed</span>';
                    $actions = '<a class="dropdown-item" href="' . route('mesin_lipat.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('mesin_lipat.verify', $row->id) . '">Verify</a>';
                } else if ($row->status == 'declined') {
                    $row->status = '<span class="badge badge-danger">Declined</span>';
                    $actions = '<a class="dropdown-item" href="' . route('mesin_lipat.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('mesin_lipat.verify', $row->id) . '">Verify</a>';
                } else if ($row->status == 'verified') {
                    $row->status = '<span class="badge badge-success">Verified</span>';
                    $actions = '<a class="dropdown-item" href="' . route('mesin_lipat.view', $row->id) . '">View</a>';
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

            $query = MesinLipat::select('id', 'sale_order_id', 'date','status', 'jumlah_seksyen','jenis_lipatan','mesin')->with('sale_order');

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
                        ->orWhere('jumlah_seksyen', 'like', '%' . $searchLower . '%')
                        ->orWhereHas('sale_order', function ($query) use ($searchLower) {
                            $query->where('sale_order_qty', 'like', '%' . $searchLower . '%');
                        })
                        ->orWhere('jenis_lipatan', 'like', '%' . $searchLower . '%')
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
                6 => 'jumlah_seksyen',
                7 => 'sale_order_id',
                8 => 'jenis_lipatan',
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
                    $actions = '<a class="dropdown-item" href="' . route('mesin_lipat.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('mesin_lipat.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('mesin_lipat.proses', $row->id) . '">Proses</a>
                    <a class="dropdown-item" id="swal-warning" data-delete="' . route('mesin_lipat.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'Started') {
                    $row->status = '<span class="badge badge-success">Started</span>';
                    $actions = '<a class="dropdown-item" href="' . route('mesin_lipat.view', $row->id) . '">View</a>
                                <a class="dropdown-item" href="' . route('mesin_lipat.proses', $row->id) . '">Proses</a>';
                } else if ($row->status == 'Paused') {
                    $row->status = '<span class="badge badge-info">Paused</span>';
                    $actions = '<a class="dropdown-item" href="' . route('mesin_lipat.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('mesin_lipat.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('mesin_lipat.proses', $row->id) . '">Proses</a>';
                } else if ($row->status == 'Completed') {
                    $row->status = '<span class="badge badge-success">Completed</span>';
                    $actions = '<a class="dropdown-item" href="' . route('mesin_lipat.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('mesin_lipat.verify', $row->id) . '">Verify</a>';
                } else if ($row->status == 'declined') {
                    $row->status = '<span class="badge badge-danger">Declined</span>';
                    $actions = '<a class="dropdown-item" href="' . route('mesin_lipat.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('mesin_lipat.verify', $row->id) . '">Verify</a>';
                } else if ($row->status == 'verified') {
                    $row->status = '<span class="badge badge-success">Verified</span>';
                    $actions = '<a class="dropdown-item" href="' . route('mesin_lipat.view', $row->id) . '">View</a>';
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
            Auth::user()->hasPermissionTo('MESIN LIPAT List') ||
            Auth::user()->hasPermissionTo('MESIN LIPAT Create') ||
            Auth::user()->hasPermissionTo('MESIN LIPAT Update') ||
            Auth::user()->hasPermissionTo('MESIN LIPAT View') ||
            Auth::user()->hasPermissionTo('MESIN LIPAT Delete') ||
            Auth::user()->hasPermissionTo('MESIN LIPAT Proses')
        ) {
            Helper::logSystemActivity('MESIN LIPAT', 'MESIN LIPAT List');
            return view('Production.ProductionJobSheet_MesinLipat.index');
        }
        return back()->with('custom_errors', 'You don`t have Right Permission');
    }

    public function create(){
        if (!Auth::user()->hasPermissionTo('MESIN LIPAT Create')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        // $suppliers = Supplier::select('id', 'name')->get();
        Helper::logSystemActivity('MESIN LIPAT', 'MESIN LIPAT Create');
        return view('Production.ProductionJobSheet_MesinLipat.create');
    }

    public function store(Request $request)
    {
        if (!Auth::user()->hasPermissionTo('MESIN LIPAT Create')) {
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

        $mesin_lipat = new MesinLipat();
        $mesin_lipat->sale_order_id = $request->sale_order;
        $mesin_lipat->date = $request->date;
        $mesin_lipat->jumlah_seksyen = $request->jumlah_seksyen == null ? 0 : $request->jumlah_seksyen;
        $mesin_lipat->mesin = $request->mesin;
        $mesin_lipat->jenis_lipatan = $request->jenis_lipatan;
        $mesin_lipat->created_by = Auth::user()->id;


        $mesin_lipat->status = 'Not-initiated';
        $mesin_lipat->save();

        Helper::logSystemActivity('MESIN LIPAT', 'MESIN LIPAT Store');
        return redirect()->route('mesin_lipat')->with('custom_success', 'MESIN LIPAT has been Created Successfully !');
    }


    public function edit($id){
        if (!Auth::user()->hasPermissionTo('MESIN LIPAT Update')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $mesin_lipat = MesinLipat::find($id);
        Helper::logSystemActivity('MESIN LIPAT', 'MESIN LIPAT Update');
        return view('Production.ProductionJobSheet_MesinLipat.edit',compact('mesin_lipat'));
    }

    public function view($id){
        if (!Auth::user()->hasPermissionTo('MESIN LIPAT View')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $mesin_lipat = MesinLipat::find($id);
        $users = User::all();
        $check_machines = MesinLipatDetail::where('machine', '=', $mesin_lipat->mesin)->where('mesin_lipat_id',  '=', $id)->orderby('id', 'DESC')->first();
        $details = MesinLipatDetail::where('mesin_lipat_id',  '=', $id)->orderby('id', 'ASC')->get();
        $detailIds = $details->pluck('id')->toArray();
        $detailbs = MesinLipatDetailB::whereIn('mesin_lipat_detail_id', $detailIds)->orderby('id', 'ASC')->get();
        Helper::logSystemActivity('MESIN LIPAT', 'MESIN LIPAT View');
        return view('Production.ProductionJobSheet_MesinLipat.view', compact('mesin_lipat', 'users', 'check_machines', 'details', 'detailbs'));
    }

    public function update(Request $request,$id)
    {
        if (!Auth::user()->hasPermissionTo('MESIN LIPAT Update')) {
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

        $mesin_lipat = MesinLipat::find($id);
        $mesin_lipat->sale_order_id = $request->sale_order;
        $mesin_lipat->date = $request->date;
        $mesin_lipat->jumlah_seksyen = $request->jumlah_seksyen == null ? 0 : $request->jumlah_seksyen;
        $mesin_lipat->mesin = $request->mesin;
        $mesin_lipat->jenis_lipatan = $request->jenis_lipatan;
        $mesin_lipat->created_by = Auth::user()->id;

        if($mesin_lipat->status == 'Paused'){
            $mesin_lipat->status = 'Paused';
        }else{
            $mesin_lipat->status = 'Not-initiated';
        }
        $mesin_lipat->save();

        Helper::logSystemActivity('MESIN LIPAT', 'MESIN LIPAT update');
        return redirect()->route('mesin_lipat')->with('custom_success', 'MESIN LIPAT has been Created Successfully !');
    }

    public function proses($id){
        if (!Auth::user()->hasPermissionTo('MESIN LIPAT Proses')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $mesin_lipat = MesinLipat::find($id);
        $users = User::all();
        $check_machines = MesinLipatDetail::where('machine', '=', $mesin_lipat->mesin)->where('mesin_lipat_id',  '=', $id)->orderby('id', 'DESC')->first();
        $details = MesinLipatDetail::where('mesin_lipat_id',  '=', $id)->orderby('id', 'ASC')->get();
        $detailIds = $details->pluck('id')->toArray();
        $detailbs = MesinLipatDetailB::whereIn('mesin_lipat_detail_id', $detailIds)->orderby('id', 'ASC')->get();
        Helper::logSystemActivity('MESIN LIPAT', 'MESIN LIPAT Update');
        return view('Production.ProductionJobSheet_MesinLipat.proses', compact('mesin_lipat', 'users', 'check_machines', 'details', 'detailbs'));
    }

    public function proses_update(Request $request, $id)
    {
        if (!Auth::user()->hasPermissionTo('MESIN LIPAT Proses')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $storedData = json_decode($request->input('details'), true);
        $mesin_lipat = MesinLipat::find($id);
        $mesin_lipat->operator = json_encode($request->operator);
        $mesin_lipat->save();

        $details = MesinLipatDetail::where('mesin_lipat_id',  '=', $id)->orderby('id', 'ASC')->get();
        $detailIds = $details->pluck('id')->toArray();
        MesinLipatDetailB::whereIn('mesin_lipat_detail_id', $detailIds)->delete();

        foreach($storedData as $key => $value){
            $detail = new MesinLipatDetailB();
            $detail->mesin_lipat_detail_id = $value['hiddenId'] ?? null;
            $detail->section_no = $value['section_no'] ?? null;
            $detail->last_fold = $value['last_fold'] ?? null;
            $detail->rejection = $value['rejection'] ?? null;
            $detail->good_count = $value['good_count'] ?? null;
            $detail->check_operator_text = $value['check_operator_text'] ?? null;
            $detail->save();
        }
        Helper::logSystemActivity('MESIN LIPAT', 'MESIN LIPAT Proses Update');
        return redirect()->route('mesin_lipat')->with('custom_success', 'MESIN LIPAT has been Proses Updated Successfully !');
    }

    public function verify($id){
        if (!Auth::user()->hasPermissionTo('MESIN LIPAT Verify')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $mesin_lipat = MesinLipat::find($id);
        $users = User::all();
        $check_machines = MesinLipatDetail::where('machine', '=', $mesin_lipat->mesin)->where('mesin_lipat_id',  '=', $id)->orderby('id', 'DESC')->first();
        $details = MesinLipatDetail::where('mesin_lipat_id',  '=', $id)->orderby('id', 'ASC')->get();
        $detailIds = $details->pluck('id')->toArray();
        $detailbs = MesinLipatDetailB::whereIn('mesin_lipat_detail_id', $detailIds)->orderby('id', 'ASC')->get();
        Helper::logSystemActivity('MESIN LIPAT', 'MESIN LIPAT Update');
        return view('Production.ProductionJobSheet_MesinLipat.verify', compact('mesin_lipat', 'users', 'check_machines', 'details', 'detailbs'));
    }


    public function print($id){
        $mesin_lipat = MesinLipat::find($id);
        $users = User::all();
        $check_machines = MesinLipatDetail::where('machine', '=', $mesin_lipat->mesin)->where('mesin_lipat_id',  '=', $id)->orderby('id', 'DESC')->first();
        $details = MesinLipatDetail::where('mesin_lipat_id',  '=', $id)->orderby('id', 'ASC')->get();
        $detailIds = $details->pluck('id')->toArray();
        $detailbs = MesinLipatDetailB::whereIn('mesin_lipat_detail_id', $detailIds)->orderby('id', 'ASC')->get();

        $pdf = PDF::loadView('Production.ProductionJobSheet_MesinLipat.pdf', [
            'mesin_lipat' => $mesin_lipat,
            'users' => $users,
            'check_machines' => $check_machines,
            'details' => $details,
            'detailbs' => $detailbs
        ]);
        return $pdf->stream('Production.ProductionJobSheet_MesinLipat.pdf');
    }

    public function approve_approve(Request $request, $id){
        if (!Auth::user()->hasPermissionTo('MESIN LIPAT Verify')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $mesin_lipat = MesinLipat::find($id);
        $mesin_lipat->status = 'verified';
        $mesin_lipat->verified_by_date = Carbon::now('Asia/Kuala_Lumpur')->format('d-m-Y h:i:s A');
        $mesin_lipat->verified_by_user = Auth::user()->user_name;
        $mesin_lipat->verified_by_designation = (Auth::user()->designations != null) ? Auth::user()->designations->name : 'not assign';
        $mesin_lipat->verified_by_department = (Auth::user()->departments != null) ? Auth::user()->departments->name : 'not assign';
        $mesin_lipat->save();

        $storedData = json_decode($request->input('details'), true);
        foreach($storedData as $key => $value){
            if ($value != null) {
                $detail = MesinLipatDetailB::where('mesin_lipat_detail_id', '=', $value['hiddenId'])->first();
                $detail->check_verify_text = $value['check_verify_text'] ?? null;
                $detail->save();
            }
        }

        Helper::logSystemActivity('MESIN LIPAT', 'MESIN LIPAT Verified');
        return redirect()->route('mesin_lipat')->with('custom_success', 'MESIN LIPAT has been Successfully Verified!');
    }

    public function approve_decline(Request $request, $id){
        if (!Auth::user()->hasPermissionTo('MESIN LIPAT Verify')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $mesin_lipat = MesinLipat::find($id);
        $mesin_lipat->status = 'declined';
        $mesin_lipat->save();
        Helper::logSystemActivity('MESIN LIPAT', 'MESIN LIPAT Declined');
        return redirect()->route('mesin_lipat')->with('custom_success', 'MESIN LIPAT has been Successfully Declined!');
    }

    public function delete($id){
        if (!Auth::user()->hasPermissionTo('MESIN LIPAT Delete')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $mesin_lipat = MesinLipat::find($id);
        MesinLipatDetail::where('mesin_lipat_id', $id)->delete();
        MesinLipatDetailB::where('mesin_lipat_detail_id', $id)->delete();
        $mesin_lipat->delete();
        Helper::logSystemActivity('MESIN LIPAT', 'MESIN LIPAT Delete');
        return redirect()->route('mesin_lipat')->with('custom_success', 'MESIN LIPAT has been Successfully Deleted!');
    }

    public function machine_starter(Request $request)
    {
        $ismachinestart = null;

        $JustSelected = MesinLipat::where('id', '=', $request->mesin_lipat_id)->where('mesin' ,'=' , $request->machine)->orderby('id', 'DESC')->first();

        if(!empty($JustSelected)){
            $ismachinestart = MesinLipatDetail::where('end_time', '=', null)->where('machine', '=', $request->machine)->where('mesin_lipat_id', '!=', $request->mesin_lipat_id)->orderby('id', 'DESC')->first();
        }

        $alreadyexist = MesinLipatDetail::where('status', '=', 1)->where('machine', '=', $request->machine)->where('mesin_lipat_id', '=', $request->mesin_lipat_id)->orderby('id', 'DESC')->first();
        $alreadypaused = MesinLipatDetail::where('status', '=', 1)->where('machine', '=', $request->machine)->where('mesin_lipat_id', '=', $request->mesin_lipat_id)->orderby('id', 'DESC')->first();
        $stopped = MesinLipatDetail::where('machine', '=', $request->machine)->where('mesin_lipat_id', '=', $request->mesin_lipat_id)->where('status', '=', 3)->first();

        if (!$ismachinestart) {

            if ($request->status == 1 && !$alreadyexist && !$stopped) {
                MesinLipatDetail::create([
                    'machine' => $request->machine,
                    'mesin_lipat_id' => $request->mesin_lipat_id,
                    'status' => $request->status,
                    'start_time' => Carbon::now('Asia/Kuala_Lumpur')->format('d-m-Y h:i:s A')
                ]);
                $digital = MesinLipat::find($request->mesin_lipat_id);
                $digital->status = 'Started';
                $digital->save();
                $check_machine = MesinLipatDetail::where('machine', '=', $request->machine)->where('mesin_lipat_id',  '=', $request->mesin_lipat_id)->orderby('id', 'DESC')->first();
                $details = MesinLipatDetail::where('mesin_lipat_id',  '=', $request->mesin_lipat_id)->orderby('id', 'ASC')->get();
                return response()->json([
                    'message' => 'Machine Started ' . Carbon::now('Asia/Kuala_Lumpur')->format('d-m-Y h:i:s A'),
                    'check_machine' => $check_machine,
                    'details' => $details
                ]);
            } else if ($request->status == 2 && $alreadypaused && !$stopped) {

                $mpo = MesinLipatDetail::where('machine', $request->machine)->where('mesin_lipat_id', $request->mesin_lipat_id)->where('end_time', '=', null)->orderby('id', 'DESC')->first();
                $mpo->status = $request->status;
                $mpo->end_time = Carbon::now('Asia/Kuala_Lumpur')->format('d-m-Y h:i:s A');
                $mpo->remarks = $request->remarks;
                $mpo->save();
                $start_time = Carbon::parse($mpo->start_time);
                $end_time = Carbon::parse($mpo->end_time);
                $duration = $end_time->diffInMinutes($start_time);
                $mpo->duration = $duration;
                $mpo->save();
                $digital = MesinLipat::find($request->mesin_lipat_id);
                $digital->status = 'Paused';
                $digital->save();
                $check_machine = MesinLipatDetail::where('machine', '=', $request->machine)->where('mesin_lipat_id',  '=', $request->mesin_lipat_id)->orderby('id', 'DESC')->first();
                $details = MesinLipatDetail::where('mesin_lipat_id',  '=', $request->mesin_lipat_id)->orderby('id', 'ASC')->get();
                return response()->json([
                    'message' => 'Machine Paused ' . Carbon::now('Asia/Kuala_Lumpur')->format('d-m-Y h:i:s A'),
                    'check_machine' => $check_machine,
                    'details' => $details
                ]);
            } else if ($request->status == 3 && !$stopped) {
                $mpo = MesinLipatDetail::where('machine', $request->machine)->where('mesin_lipat_id', $request->mesin_lipat_id)->orderby('id', 'DESC')->first();
                $mpo->status = $request->status;
                $mpo->end_time = Carbon::now('Asia/Kuala_Lumpur')->format('d-m-Y h:i:s A');
                $mpo->save();
                $start_time = Carbon::parse($mpo->start_time);
                $end_time = Carbon::parse($mpo->end_time);
                $duration = $end_time->diffInMinutes($start_time);
                $mpo->duration = $duration;
                $mpo->save();
                $digital = MesinLipat::find($request->mesin_lipat_id);
                $digital->status = 'Completed';
                $digital->save();
                $check_machine = MesinLipatDetail::where('machine', '=', $request->machine)->where('mesin_lipat_id',  '=', $request->mesin_lipat_id)->orderby('id', 'DESC')->first();
                $details = MesinLipatDetail::where('mesin_lipat_id',  '=', $request->mesin_lipat_id)->orderby('id', 'ASC')->get();
                return response()->json([
                    'message' => 'Machine Stopped ' . Carbon::now('Asia/Kuala_Lumpur')->format('d-m-Y h:i:s A'),
                    'check_machine' => $check_machine,
                    'details' => $details
                ]);
            }
        }else{
            $check_machine = MesinLipatDetail::where('machine', '=', $request->machine)->where('mesin_lipat_id',  '=', $request->mesin_lipat_id)->orderby('id', 'DESC')->first();
            $details = MesinLipatDetail::where('mesin_lipat_id',  '=', $request->mesin_lipat_id)->orderby('id', 'ASC')->get();
            return response()->json([
                'message' => 'Same Machine Is Running On Other Mesin Lipat!',
                'check_machine' => $check_machine,
                'details' => $details
            ]);
        }
    }

}
