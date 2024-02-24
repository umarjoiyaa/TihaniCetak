<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\LaporanProsesLipat;
use App\Models\LaporanProsesLipatB;
use App\Models\LaporanProsesLipatC;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporanProsesLipatController extends Controller
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

            $query = LaporanProsesLipat::select('id', 'sale_order_id', 'date', 'time', 'user_text', 'mesin', 'status')->with('sale_order');

            // Apply search if a search term is provided
            if (!empty($search)) {
                $searchLower = strtolower($search);
                $query->where(function ($q) use ($searchLower) {
                    $q
                        ->where('date', 'like', '%' . $searchLower . '%')
                        ->orWhere('time', 'like', '%' . $searchLower . '%')
                        ->oWhere('user_text', 'like', '%' . $searchLower . '%')
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
                    7 => 'user_text',
                    8 => 'status',
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
                                $q->where('user_text', 'like', '%' . $searchLower . '%');
                                break;
                            case 8:
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
                    $actions = '<a class="dropdown-item" href="' . route('laporan_proses_lipat.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('laporan_proses_lipat.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('laporan_proses_lipat.verify', $row->id) . '">Verify</a>
                    <a class="dropdown-item" id="swal-warning" data-delete="' . route('laporan_proses_lipat.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'verified') {
                    $row->status = '<span class="badge badge-success">Verified</span>';
                    $actions = '<a class="dropdown-item" href="' . route('laporan_proses_lipat.view', $row->id) . '">View</a>
                                <a class="dropdown-item" id="swal-warning" data-delete="' . route('laporan_proses_lipat.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'declined') {
                    $row->status = '<span class="badge badge-danger">Declined</span>';
                    $actions = '<a class="dropdown-item" href="' . route('laporan_proses_lipat.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('laporan_proses_lipat.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('laporan_proses_lipat.verify', $row->id) . '">Verify</a>
                    <a class="dropdown-item" id="swal-warning" data-delete="' . route('laporan_proses_lipat.delete', $row->id) . '">Delete</a>';
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

            $query = LaporanProsesLipat::select('id', 'sale_order_id', 'date', 'time', 'user_text', 'mesin', 'status')->with('sale_order');

            // Apply search if a search term is provided
            if (!empty($search)) {
                $searchLower = strtolower($search);
                $query->where(function ($q) use ($searchLower) {
                    $q
                        ->where('date', 'like', '%' . $searchLower . '%')
                        ->orWhere('time', 'like', '%' . $searchLower . '%')
                        ->oWhere('user_text', 'like', '%' . $searchLower . '%')
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
                7 => 'user_text',
                8 => 'status',
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
                    $actions = '<a class="dropdown-item" href="' . route('laporan_proses_lipat.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('laporan_proses_lipat.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('laporan_proses_lipat.verify', $row->id) . '">Verify</a>
                    <a class="dropdown-item" id="swal-warning" data-delete="' . route('laporan_proses_lipat.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'verified') {
                    $row->status = '<span class="badge badge-success">Verified</span>';
                    $actions = '<a class="dropdown-item" href="' . route('laporan_proses_lipat.view', $row->id) . '">View</a>
                                <a class="dropdown-item" id="swal-warning" data-delete="' . route('laporan_proses_lipat.delete', $row->id) . '">Delete</a>';
                } else if ($row->status == 'declined') {
                    $row->status = '<span class="badge badge-danger">Declined</span>';
                    $actions = '<a class="dropdown-item" href="' . route('laporan_proses_lipat.view', $row->id) . '">View</a>
                    <a class="dropdown-item" href="' . route('laporan_proses_lipat.edit', $row->id) . '">Edit</a>
                    <a class="dropdown-item" href="' . route('laporan_proses_lipat.verify', $row->id) . '">Verify</a>
                    <a class="dropdown-item" id="swal-warning" data-delete="' . route('laporan_proses_lipat.delete', $row->id) . '">Delete</a>';
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
            Auth::user()->hasPermissionTo('LAPORAN PROSES LIPAT List') ||
            Auth::user()->hasPermissionTo('LAPORAN PROSES LIPAT Create') ||
            Auth::user()->hasPermissionTo('LAPORAN PROSES LIPAT Update') ||
            Auth::user()->hasPermissionTo('LAPORAN PROSES LIPAT View') ||
            Auth::user()->hasPermissionTo('LAPORAN PROSES LIPAT Delete') ||
            Auth::user()->hasPermissionTo('LAPORAN PROSES LIPAT Verify')
        ) {
            Helper::logSystemActivity('LAPORAN PROSES LIPAT', 'LAPORAN PROSES LIPAT List');
            return view('Mes.LaporanProsesLipat.index');
        }
        return back()->with('custom_errors', 'You don`t have Right Permission');
    }

    public function create(){
        if (!Auth::user()->hasPermissionTo('LAPORAN PROSES LIPAT Create')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $users = User::all();
        Helper::logSystemActivity('LAPORAN PROSES LIPAT', 'LAPORAN PROSES LIPAT Create');
        return view('Mes.LaporanProsesLipat.create', compact('users'));
    }

    public function store(Request $request)
    {
        if (!Auth::user()->hasPermissionTo('LAPORAN PROSES LIPAT Create')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $validator = null;

        $validatedData = $request->validate([
            'sale_order' => 'required',
            'date' => 'required',
            'time' => 'required',
            'user' => 'required',
            'seksyen_no' => 'required',
            'mesin' => 'required',
            'pengesahan' => 'required',
            'section' => 'required'
        ]);

        // If validations fail
        if (!$validatedData) {
            return redirect()->back()
                ->withErrors($validator)->withInput();
        }

        $userIds = $request->user;
        $userNames = [];

        foreach ($userIds as $userId) {
            $user = User::find($userId);
            if ($user) {
               $userNames[] = $user->full_name;
            }
        }

        $userText = implode(', ', $userNames);

        $laporan_proses_lipat = new LaporanProsesLipat();
        $laporan_proses_lipat->sale_order_id = $request->sale_order;
        $laporan_proses_lipat->date = $request->date;
        $laporan_proses_lipat->time = $request->time;
        $laporan_proses_lipat->created_by = Auth::user()->id;

        $laporan_proses_lipat->seksyen_no = $request->seksyen_no;
        $laporan_proses_lipat->mesin = $request->mesin;
        $laporan_proses_lipat->user_id = json_encode($userIds);
        $laporan_proses_lipat->user_text = $userText;

        $laporan_proses_lipat->status = 'checked';
        $laporan_proses_lipat->save();

        $pengesahan = $request->pengesahan;
        ksort($pengesahan);

        foreach($pengesahan as $value){
           $detail = new LaporanProsesLipatB();
           $detail->proses_lipat_id = $laporan_proses_lipat->id;
           $detail->b_1 = $value['1'] ?? null;
           $detail->b_2 = $value['2'] ?? null;
           $detail->b_3 = $value['3'] ?? null;
           $detail->b_4 = $value['4'] ?? null;
           $detail->b_5 = $value['5'] ?? null;
           $detail->save();
        }

        $section = $request->section;
        ksort($section);

        foreach($section as $key => $value){

            $section_b = $value;
            ksort($section_b);

            foreach($section_b as $key1 => $value1){

                $detail_b = new LaporanProsesLipatC();
                $detail_b->proses_lipat_id = $laporan_proses_lipat->id;
                $detail_b->row = $key;
                $detail_b->c_1 = $key1;
                $detail_b->c_2 = $value1['1'] ?? null;
                $detail_b->c_3 = $value1['2'] ?? null;
                $detail_b->c_4 = $value1['3'] ?? null;
                $detail_b->c_5 = $value1['4'] ?? null;
                $detail_b->c_6 = $value1['5'] ?? null;
                $detail_b->save();
            }
         }

        Helper::logSystemActivity('LAPORAN PROSES LIPAT', 'LAPORAN PROSES LIPAT Store');
        return redirect()->route('laporan_proses_lipat')->with('custom_success', 'LAPORAN PROSES LIPAT has been Created Successfully !');
    }

    public function edit($id){
        if (!Auth::user()->hasPermissionTo('LAPORAN PROSES LIPAT Update')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $laporan_proses_lipat = LaporanProsesLipat::find($id);
        $details = LaporanProsesLipatB::where('proses_lipat_id', '=', $id)->get();
        $detailss = LaporanProsesLipatC::where('proses_lipat_id', '=', $id)->get();
        $sections = LaporanProsesLipatC::where('proses_lipat_id', '=', $id)->select('row')->distinct()->get();
        $users = User::all();
        Helper::logSystemActivity('LAPORAN PROSES LIPAT', 'LAPORAN PROSES LIPAT Update');
        return view('Mes.LaporanProsesLipat.edit', compact('laporan_proses_lipat', 'users', 'details', 'detailss', 'sections'));
    }

    public function view($id){
        if (!Auth::user()->hasPermissionTo('LAPORAN PROSES LIPAT View')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $laporan_proses_lipat = LaporanProsesLipat::find($id);
        $details = LaporanProsesLipatB::where('proses_lipat_id', '=', $id)->get();
        $detailss = LaporanProsesLipatC::where('proses_lipat_id', '=', $id)->get();
        $sections = LaporanProsesLipatC::where('proses_lipat_id', '=', $id)->select('row')->distinct()->get();
        $users = User::all();
        Helper::logSystemActivity('LAPORAN PROSES LIPAT', 'LAPORAN PROSES LIPAT View');
        return view('Mes.LaporanProsesLipat.view', compact('laporan_proses_lipat', 'users', 'details', 'detailss', 'sections'));
    }

    public function update(Request $request, $id)
    {
        if (!Auth::user()->hasPermissionTo('LAPORAN PROSES LIPAT Update')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $validator = null;

        $validatedData = $request->validate([
            'sale_order' => 'required',
            'date' => 'required',
            'time' => 'required',
            'user' => 'required',
            'seksyen_no' => 'required',
            'mesin' => 'required',
            'pengesahan' => 'required',
            'section' => 'required'
        ]);

        // If validations fail
        if (!$validatedData) {
            return redirect()->back()
                ->withErrors($validator)->withInput();
        }

        $userIds = $request->user;
        $userNames = [];

        foreach ($userIds as $userId) {
            $user = User::find($userId);
            if ($user) {
               $userNames[] = $user->full_name;
            }
        }

        $userText = implode(', ', $userNames);

        $laporan_proses_lipat = LaporanProsesLipat::find($id);
        $laporan_proses_lipat->sale_order_id = $request->sale_order;
        $laporan_proses_lipat->date = $request->date;
        $laporan_proses_lipat->time = $request->time;
        $laporan_proses_lipat->created_by = Auth::user()->id;

        $laporan_proses_lipat->seksyen_no = $request->seksyen_no;
        $laporan_proses_lipat->mesin = $request->mesin;
        $laporan_proses_lipat->user_id = json_encode($userIds);
        $laporan_proses_lipat->user_text = $userText;

        $laporan_proses_lipat->status = 'checked';
        $laporan_proses_lipat->save();

        LaporanProsesLipatB::where('proses_lipat_id', '=', $id)->delete();

        $pengesahan = $request->pengesahan;
        ksort($pengesahan);

        foreach($pengesahan as $value){
           $detail = new LaporanProsesLipatB();
           $detail->proses_lipat_id = $laporan_proses_lipat->id;
           $detail->b_1 = $value['1'] ?? null;
           $detail->b_2 = $value['2'] ?? null;
           $detail->b_3 = $value['3'] ?? null;
           $detail->b_4 = $value['4'] ?? null;
           $detail->b_5 = $value['5'] ?? null;
           $detail->save();
        }

        LaporanProsesLipatC::where('proses_lipat_id', '=', $id)->delete();

        $section = $request->section;
        ksort($section);

        foreach($section as $key => $value){
            $section_b = $value;
            ksort($section_b);

            foreach($section_b as $key1 => $value1){

                $detail_b = new LaporanProsesLipatC();
                $detail_b->proses_lipat_id = $laporan_proses_lipat->id;
                $detail_b->row = $key;
                $detail_b->c_1 = $key1;
                $detail_b->c_2 = $value1['1'] ?? null;
                $detail_b->c_3 = $value1['2'] ?? null;
                $detail_b->c_4 = $value1['3'] ?? null;
                $detail_b->c_5 = $value1['4'] ?? null;
                $detail_b->c_6 = $value1['5'] ?? null;
                $detail_b->save();
            }
         }

        Helper::logSystemActivity('LAPORAN PROSES LIPAT', 'LAPORAN PROSES LIPAT Update');
        return redirect()->route('laporan_proses_lipat')->with('custom_success', 'LAPORAN PROSES LIPAT has been Updated Successfully !');
    }

    public function verify($id){
        if (!Auth::user()->hasPermissionTo('LAPORAN PROSES LIPAT Verify')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $laporan_proses_lipat = LaporanProsesLipat::find($id);
        $details = LaporanProsesLipatB::where('proses_lipat_id', '=', $id)->get();
        $detailss = LaporanProsesLipatC::where('proses_lipat_id', '=', $id)->get();
        $sections = LaporanProsesLipatC::where('proses_lipat_id', '=', $id)->select('row')->distinct()->get();
        $users = User::all();
        Helper::logSystemActivity('LAPORAN PROSES LIPAT', 'LAPORAN PROSES LIPAT Update');
        return view('Mes.LaporanProsesLipat.verify', compact('laporan_proses_lipat', 'users', 'details', 'detailss', 'sections'));
    }

    public function approve_approve(Request $request, $id){
        if (!Auth::user()->hasPermissionTo('LAPORAN PROSES LIPAT Verify')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $laporan_proses_lipat = LaporanProsesLipat::find($id);
        $laporan_proses_lipat->status = 'verified';
        $laporan_proses_lipat->verified_by_date = Carbon::now()->format('Y-m-d H:i:s');
        $laporan_proses_lipat->verified_by_user = Auth::user()->user_name;
        $laporan_proses_lipat->verified_by_designation = (Auth::user()->designation != null) ? Auth::user()->designation->name : 'not assign';
        $laporan_proses_lipat->verified_by_department = (Auth::user()->department != null) ? Auth::user()->department->name : 'not assign';
        $laporan_proses_lipat->save();

        $section = $request->section;
        ksort($section);

         foreach($section as $key => $value){

            $section_b = $value;
            ksort($section_b);

            foreach($section_b as $key1 => $value1){
                $detail_b = LaporanProsesLipatC::where('proses_lipat_id', '=', $id)->where('row', '=', $key)->where('c_1', '=', $key1)->first();
                $detail_b->c_6 = $value1['1'] ?? null;
                $detail_b->save();
            }
         }

        Helper::logSystemActivity('LAPORAN PROSES LIPAT', 'LAPORAN PROSES LIPAT Verified');
        return redirect()->route('laporan_proses_lipat')->with('custom_success', 'LAPORAN PROSES LIPAT has been Successfully Verified!');
    }

    public function approve_decline(Request $request, $id){
        if (!Auth::user()->hasPermissionTo('LAPORAN PROSES LIPAT Verify')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }

        $laporan_proses_lipat = LaporanProsesLipat::find($id);
        $laporan_proses_lipat->status = 'declined';
        $laporan_proses_lipat->save();
        Helper::logSystemActivity('LAPORAN PROSES LIPAT', 'LAPORAN PROSES LIPAT Declined');
        return redirect()->route('laporan_proses_lipat')->with('custom_success', 'LAPORAN PROSES LIPAT has been Successfully Declined!');
    }

    public function delete($id){
        if (!Auth::user()->hasPermissionTo('LAPORAN PROSES LIPAT Delete')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $laporan_proses_lipat = LaporanProsesLipat::find($id);
        LaporanProsesLipatB::where('proses_lipat_id', '=', $id)->delete();
        LaporanProsesLipatC::where('proses_lipat_id', '=', $id)->delete();
        $laporan_proses_lipat->delete();
        Helper::logSystemActivity('LAPORAN PROSES LIPAT', 'LAPORAN PROSES LIPAT Delete');
        return redirect()->route('laporan_proses_lipat')->with('custom_success', 'LAPORAN PROSES LIPAT has been Successfully Deleted!');
    }
}
